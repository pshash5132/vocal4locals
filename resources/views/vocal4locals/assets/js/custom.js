// (() => {
//     // Specify the deadline date
//     const deadlineDate = new Date('July 20, 2023 23:59:59').getTime();
    
//     // Cache all countdown boxes into consts
//     const countdownDays = document.querySelector('.countdown__days .number');
//     const countdownHours= document.querySelector('.countdown__hours .number');
//     const countdownMinutes= document.querySelector('.countdown__minutes .number');
//     const countdownSeconds= document.querySelector('.countdown__seconds .number');
  
//     // Update the count down every 1 second (1000 milliseconds)
//     setInterval(() => {    
//       // Get current date and time
//       const currentDate = new Date().getTime();
  
//       // Calculate the distance between current date and time and the deadline date and time
//       const distance = deadlineDate - currentDate;
  
//       // Calculations the data for remaining days, hours, minutes and seconds
//       const days = Math.floor(distance / (1000 * 60 * 60 * 24));
//       const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//       const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//       const seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
//       // Insert the result data into individual countdown boxes
//       countdownDays.innerHTML = days;
//       countdownHours.innerHTML = hours;
//       countdownMinutes.innerHTML = minutes;
//       countdownSeconds.innerHTML = seconds;
//     }, 1000);
//   })();


// wow js
new WOW().init();

// toggle password hide-show
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// our-services-slider
$('.our-services-slider').owlCarousel({
  loop:true,
  margin: 10,
  nav:false,
  autoplay:true,
  dots: false,
  autoplayTimeout:5000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      420:{
          items:3
      },
      576:{
          items:4
      },
      767:{
          items:5.5
      },
      991:{
          items:6.5
      },
      1200:{
        items:7.5
      }
  }
});

// latest-offers-slider
$('.latest-offers-slider').owlCarousel({
    loop:true,
    margin: 20,
    nav:false,
    autoplay:true,
    dots: false,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        1000:{
            items:2.5
        }
    }
});


// top-products-slider
$('.top-products-slider').owlCarousel({
    loop:true,
    margin: 10,
    nav:false,
    autoplay:true,
    dots: false,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        1000:{
            items:4.5
        }
    }
});


// top-products-slider
$('.similar-products-slider').owlCarousel({
    loop:true,
    margin: 10,
    nav:false,
    autoplay:true,
    dots: false,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        1000:{
            items:4.5
        }
    }
});

// banner-slider
$('.banner-slider').owlCarousel({
    loop:true,
    margin: 10,
    nav:false,
    stagePadding: 67,
    autoplay:true,
    dots: true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            stagePadding: 0,
        },
        767:{
            items:1
        },
        1000:{
            items:1
        }
    }
});


$('.inquiry-slider').owlCarousel({
  loop:true,
  margin: 10,
  nav:false,
  stagePadding: 0,
  autoplay:true,
  dots: true,
  autoplayTimeout:5000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1,
          stagePadding: 0
      },
      767:{
          items:1
      },
      1000:{
          items:1.1
      }
  }
});




// add quality
$(document).ready(function(){
	$('.add_qty').on('click', function(ev) {
		$currObj = $(ev.currentTarget);
		var currQCount = getCurrQCount($currObj);
			currQCount++;
			updateData($currObj, currQCount);
	 });

	 $('.remove_qty').on('click', function(ev) {
		$currObj = $(ev.currentTarget);
		var currQCount = getCurrQCount($currObj);

			currQCount--;
			updateData($currObj, currQCount);

	 });


	function getCurrQCount($currObj){
		return $currObj.siblings(".input_qty").val();
	}

	function updateData($currObj, currQCount){
		$currObj.siblings(".input_qty").val(currQCount);

		var $parentObj = $currObj.closest(".item-row");
		var itemPrice = $parentObj.find(".item_price").attr("data-price");
		var itemCost = Number(itemPrice) * currQCount;
		$parentObj.find(".item-cost-val").text(itemCost);

		var subTotal = getSubTotal();
		var vatAmount = getVatAmount();
		var totalCost = subTotal + vatAmount;
		$("#subtotal").text(subTotal);
		$("#total_vat").text(vatAmount);
		$("#total_cost").text(totalCost);
	}

	function getSubTotal(){
		var subTotal = 0;
		$(".item-cost-val").each(function() {
			subTotal+= Number($(this).text());
		});
		return subTotal;
	}

	function getVatAmount(){
		var vatPercentage = 0.2;
		return vatPercentage * getSubTotal();
	}

});



$(document).ready(function() {
  
    // variables 
    var toTop = $('.to-top');
    // logic
    toTop.on('click', function() {
      $('html, body').animate({
        scrollTop: $('html, body').offset().top,
      });
    });
  
});



//	window.addEventListener("resize", function() {
//		"use strict"; window.location.reload(); 
//	});


document.addEventListener("DOMContentLoaded", function(){
        

    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element){
        element.addEventListener('click', function (e) {
          e.stopPropagation();
        });
    })



    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                      // hide every submenu as well
                      everysubmenu.style.display = 'none';
                  });
            })
        });
        
        document.querySelectorAll('.dropdown-menu a').forEach(function(element){
            element.addEventListener('click', function (e) {
    
                  let nextEl = this.nextElementSibling;
                  if(nextEl && nextEl.classList.contains('submenu')) {	
                      // prevent opening link if link needs to open dropdown
                      e.preventDefault();
                      console.log(nextEl);
                      if(nextEl.style.display == 'block'){
                          nextEl.style.display = 'none';
                      } else {
                          nextEl.style.display = 'block';
                      }

                  }
            });
        })
    }
    // end if innerWidth

}); 
// DOMContentLoaded  end



var app = new Vue({
    name: 'Vue Price Range',
    el: '#app',
    data: {
      
       min: 40,
        max: 1000,
        minValue: 40,
        maxValue: 600,
        step: 5,
        totalSteps: 0,
        percentPerStep: 1,
        trackWidth: null,
        isDragging: false,
        pos: {
          curTrack: null
        }
      
    },
  
    methods: {
      moveTrack(track, ev){
        
        let percentInPx = this.getPercentInPx();
        
        let trackX = Math.round(this.$refs._vpcTrack.getBoundingClientRect().left);
        let clientX = ev.clientX;
        let moveDiff = clientX-trackX;
  
        let moveInPct = moveDiff / percentInPx
        // console.log(moveInPct)
  
        if(moveInPct<1 || moveInPct>100) return;
        let value = ( Math.round(moveInPct / this.percentPerStep) * this.step ) + this.min;
        if(track==='track1'){
          if(value >= (this.maxValue - this.step)) return;
          this.minValue = value;
        }
  
        if(track==='track2'){
          if(value <= (this.minValue + this.step)) return;
          this.maxValue = value;
        }
        
        this.$refs[track].style.left = moveInPct + '%';
        this.setTrackHightlight()
              
      },
      mousedown(ev, track){
  
        if(this.isDragging) return;
        this.isDragging = true;
        this.pos.curTrack = track;
      },
  
      touchstart(ev, track){
        this.mousedown(ev, track)
      },
  
      mouseup(ev, track){
        if(!this.isDragging) return;
        this.isDragging = false
      },
  
      touchend(ev, track){
        this.mouseup(ev, track)
      },
  
      mousemove(ev, track){
        if(!this.isDragging) return;      
        this.moveTrack(track, ev)
      },
  
      touchmove(ev, track){
        this.mousemove(ev.changedTouches[0], track)
      },
  
      valueToPercent(value){
        return ((value - this.min) / this.step) * this.percentPerStep
      },
  
      setTrackHightlight(){
        this.$refs.trackHighlight.style.left = this.valueToPercent(this.minValue) + '%'
        this.$refs.trackHighlight.style.width = (this.valueToPercent(this.maxValue) - this.valueToPercent(this.minValue)) + '%'
      },
  
      getPercentInPx(){
        let trackWidth = this.$refs._vpcTrack.offsetWidth;
        let oneStepInPx = trackWidth / this.totalSteps;
        // 1 percent in px
        let percentInPx = oneStepInPx / this.percentPerStep;
        
        return percentInPx;
      },
  
      setClickMove(ev){
        let track1Left = this.$refs.track1.getBoundingClientRect().left;
        let track2Left = this.$refs.track2.getBoundingClientRect().left;
        // console.log('track1Left', track1Left)
        if(ev.clientX < track1Left){
          this.moveTrack('track1', ev)
        }else if((ev.clientX - track1Left) < (track2Left - ev.clientX) ){
          this.moveTrack('track1', ev)
        }else{
          this.moveTrack('track2', ev)
        }
      }
    },
  
    mounted() {
      // calc per step value
      this.totalSteps = (this.max - this.min) / this.step;
  
      // percent the track button to be moved on each step
      this.percentPerStep = 100 / this.totalSteps;
      // console.log('percentPerStep', this.percentPerStep)
  
      // set track1 initilal
      document.querySelector('.track1').style.left = this.valueToPercent(this.minValue) + '%'
      // track2 initial position
      document.querySelector('.track2').style.left = this.valueToPercent(this.maxValue) + '%'
      // set initila track highlight
      this.setTrackHightlight()
  
      var self = this;
  
      ['mouseup', 'mousemove'].forEach( type => {
        document.body.addEventListener(type, (ev) => {
          // ev.preventDefault();
          if(self.isDragging && self.pos.curTrack){
            self[type](ev, self.pos.curTrack)
          }
        })
      });
  
      ['mousedown', 'mouseup', 'mousemove', 'touchstart', 'touchmove', 'touchend'].forEach( type => {
        document.querySelector('.track1').addEventListener(type, (ev) => {
          ev.stopPropagation();
          self[type](ev, 'track1')
        })
  
        document.querySelector('.track2').addEventListener(type, (ev) => {
          ev.stopPropagation();
          self[type](ev, 'track2')
        })
      })
  
      // on track clik
      // determine direction based on click proximity
      // determine percent to move based on track.clientX - click.clientX
      document.querySelector('.track').addEventListener('click', function(ev) {
        ev.stopPropagation();
        self.setClickMove(ev)
        
      })
  
      document.querySelector('.track-highlight').addEventListener('click', function(ev) {
        ev.stopPropagation();
        self.setClickMove(ev)
        
      })
    }
  })








  /* product left start */
	if($(".product-left").length){
		var productSlider = new Swiper('.product-slider', {
			spaceBetween: 0,
			centeredSlides: false,
			loop:true,
			direction: 'horizontal',
			loopedSlides: 5,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			resizeObserver:true,
		});
		var productThumbs = new Swiper('.product-thumbs', {
			spaceBetween: 0,
			centeredSlides: true,
			loop: true,
			slideToClickedSlide: true,
			direction: 'horizontal',
			slidesPerView: 5,
			loopedSlides: 5,
		});
		productSlider.controller.control = productThumbs;
		productThumbs.controller.control = productSlider;
		
	


	}
	/* 	product left end */






