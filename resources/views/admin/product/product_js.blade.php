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


</script>
@endpush
