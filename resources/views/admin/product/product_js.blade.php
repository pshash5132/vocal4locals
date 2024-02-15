@push('scripts')
<script>

    $(document).on("change","#category",function(){
        let id = $(this).val();
        $.ajax({
            method:'GET',
            url:"{{route('admin.product.get-subCategories')}}",
            data:{id},
            dataType:'json',
            success:function(res){
                $("#sub_category").html('<option value="" disabled selected>Select</option>');
                console.log(res);
                $.each(res,function(i,item){
                    $("#sub_category").append(`<option value="${item.id}">${item.name}</option>`);
                })
            }
        })
    })
    $.validator.addMethod("summernoteRequired", function(value, element) {
        return !($(element).summernote('isEmpty'));
    }, "Please enter description");
    $(document).ready(function () {
        $('#product_form').validate({
            rules: {
                image: {
                    required: true,
                    accept: "image/*"
                },
                name: {
                    required: true
                },
                category_id: {
                    required: true
                },
                expected_delivery_days: {
                    required: true
                },
                package_id: {
                    required: true
                },
                subcategory_id: {
                    required: true
                },
                brand_id: {
                    required: true
                },
                sku: {
                    required: true
                },
                offer_start_date: {
                    required: true
                },

                offer_end_date: {
                    required: true
                },
                product_type: {
                    required: true
                },
                status: {
                    required: true
                },
                long_description: {
                    summernoteRequired: true
                },
                short_description: {
                    required: true
                }
            },
            messages: {
                image: {
                    required: "Please select an image file",
                    accept: "Please upload only image files"
                },

                name: "Please enter the name",
                category_id: "Please select a category",
                expected_delivery_days: "Please enter expected delivery days",
                package_id: "Please select a package",
                subcategory_id: "Please select a subcategory",
                brand_id: "Please select a brand",
                sku: "Please enter SKU",
                offer_start_date: "Please select offer start date",
                offer_end_date: "Please select offer end date",
                product_type: "Please select product type",
                status: "Please select status",
                short_description: "Please enter description",
                long_description: {
                    summernoteRequired: "Please enter description"
                }

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            }
        });
    });
</script>
@endpush
