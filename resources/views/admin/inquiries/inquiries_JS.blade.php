<script>
    var statusUpdateRoute = $("#statusUpdateRoute").val();
    $(document).on('change','.select_action',function(){
        var current_id = $(this).data('id');
        var status =  $(this).val();
        $.ajax({
            url:statusUpdateRoute,
            type:'post',
            dataType:'json',
            data:{current_id,status},
            success:function(res){
                toastr.success(res.message);
            },
            error: function(xhr, status, error) {
                toastr.failure("Error to update status");

            }
        })
    })
</script>
