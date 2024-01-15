<!-- latest-offers-section -->
<section class="latest-offers-section">
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <h2>Latest Offers</h2>
           </div>
       </div>
   </div>
   <div class="owl-carousel owl-theme latest-offers-slider">
    @foreach ($offers as $offer)

    @endforeach
       <div class="item">
           <div class="latest-offers-wrap">
               <a href="{{route('product-list',['offer'=>$offer->slug])}}">
                   <img src="{{asset($offer->image)}}" alt="{{$offer->slug}}" />
               </a>
           </div>
       </div>
       {{-- <div class="item">
           <div class="latest-offers-wrap">
               <a href="#">
                   <img src="{{asset('frontend')}}/assets/images/headphones.png" alt="Headphones" />
               </a>
           </div>
       </div>
       <div class="item">
           <div class="latest-offers-wrap">
               <a href="#">
                   <img src="{{asset('frontend')}}/assets/images/mobile.png" alt="Mobile" />
               </a>
           </div>
       </div> --}}
   </div>
</section>
