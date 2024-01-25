@php
$siteInfo = siteInfo();
@endphp
<section class="buy-now-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="buy-now-wrap">
                    <div class="buy-now-left">
                        <img src="{{asset($siteInfo?$siteInfo->image2:'frontend/assets/images/buy-left.png')}}" alt="Buy Now Image" />
                        <div class="buy-now-inner">
                            <h2>{{ $siteInfo?$siteInfo->title:'WE MADE YOUR EVERYDAY FASHION BETTER!'}}</h2>
                            <p>{{ $siteInfo?$siteInfo->subtitle:'Best E commerce'}}</p>
                            <a href="{{route('product-list')}}" class="cmn-btn buy-now">Buy Now!</a>
                        </div>
                    </div>
                    <div class="buy-now-right">
                        <img src="{{asset($siteInfo?$siteInfo->image1:'frontend/assets/images/buy-right.png')}}" alt="Buy Now Image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
