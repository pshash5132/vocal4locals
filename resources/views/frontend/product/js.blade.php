<script>
    var variants = {!!json_encode($product->variants->toArray())!!};
    $(".variantBTN").click(function(){

        var variantId = $(this).data('id');
        var variant = variants.find(function (variant) {
            return variant.id === variantId;
        });

        $('.selectedVariant').val(variantId);
        $('.regularPrice').html(currency+variant.price);
        $('.offerPrice').html(currency+variant.offer_price);
        $('.discount').html(variant.discount_percent);
        $('.addToCart').attr('data-variantId',variantId);
        // $.ajax({
        //     type:'POST',
        //     url:"{{route('getVariantDetail')}}",
        //     data:{variantId:variantId},
        //     success:function(res){
        //         if(res.status ==1 ){
        //             $('.selectedVariant').val(res.data.id);
        //             $('.regularPrice').html(currency+res.data.price);
        //             $('.offerPrice').html(currency+res.data.offer_price);
        //             $('.discount').html(res.data.discountPercent);
        //             $('.addToCart').attr('data-variantId',res.data.id);
        //         }
        //     }
        // })
    })


</script>