$(function () {
    $('.carousel').carousel();
    $('#demo').on('slide.bs.carousel', function (e) {
      $(".cc").slideUp(100);
    });
    $('#demo').on('slid.bs.carousel', function (e) {
        // console.log(e.to);
        // switch(e.to)
        // {
        //     case 0:
        //         $("#ch1").animate(function(){
        //             "opacity","0"
        //         },900);

        //         break;
        //     case 1:
        //         $("#ch2").animate(800);
        //         console.log("b");
        //         break;
        //     case 3:
        //         $("#ch3").animate(800);
        //         break;
      $(".cc").slideDown(700);
        
        }
        );

        // jQuery("#gallery").unitegallery({
        //     gallery_theme: "tiles",
        //      tiles_type: "nested"						
        // });



var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});


$(".amm").append('+');

      });

