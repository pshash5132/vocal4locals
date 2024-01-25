<script>
    $('#change-password').validate({
            rules: {
                current_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                }
            },
            messages: {
                current_password: {
                    required: 'Please enter your current password.'
                },
                new_password: {
                    required: 'Please enter a new password.',
                    minlength: 'Password must be at least 8 characters.'
                },
                confirm_password: {
                    required: 'Please confirm your new password.',
                    equalTo: 'Passwords do not match.'
                }
            }
        });
    $('.removeWishlist').click(function(){
        let removeUrl = $(this).data('url');
        $.ajax({
            type:'GET',
            url:removeUrl,
            success:function(res){
                if(res.status ==1 ){
                   toastr.success(res.message);
                   window.location.reload();
                }else{
                   toastr.error(res.message);

                }
            }
        })
    })

    $('.send-review').click(function(){
        var orderId = $(this).data('id');
        $("#order_id").val(orderId);
        $.ajax({
            type:'GET',
            data:{orderId},
            url:"{{route('user.order_products')}}",
            dataType:'html',
            success:function(res){
                $("#review_product_name").html(res)
            }
        })
    })
    $('.deleteAddress').click(function(){
        let deleteurl = $(this).data('url');
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:'DELETE',
                            url:deleteurl,
                            success:function(res){
                                if (res.status == '1') {
                                    Swal.fire(
                                        'Deleted!',
                                        res.message
                                    )
                                    window.location.reload();
                                }else if(res.status == '0'){
                                    Swal.fire(
                                        'Not Deleted!',
                                        res.message
                                    )
                                }
                            }
                        })
                    }
                })
    })
</script>
