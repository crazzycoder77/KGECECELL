$(window).on('load', function() {
    // executes when complete page is fully loaded, including all frames, objects and images
    $('#cnt1').css('display','none');
    $('body').css('background','white');
    $('#cnt2').addClass('show');

    
    function msg(m) {
        console.log(m);
    }

    msg('all loaded');

    //mobile view navbar
    function toggleClassMenu() {
        myMenu.classList.add("menu--animatable");
        if (!myMenu.classList.contains("menu--visible")) {
            myMenu.classList.add("menu--visible");
        } else {
            myMenu.classList.remove('menu--visible');
        }
    }

    function OnTransitionEnd() {
        myMenu.classList.remove("menu--animatable");
    }

    var myMenu = document.querySelector(".menu");
    var oppMenu = document.querySelector(".menu-icon");
    myMenu.addEventListener("transitionend", OnTransitionEnd, false);
    oppMenu.addEventListener("click", toggleClassMenu, false);
    myMenu.addEventListener("click", toggleClassMenu, false);

    //mobile view navbar ends


    //animation jquery on nav bar
    if ($(window).width() > 850) {
        $(window).scroll(function() {
            var h = $(this).scrollTop();
            if (h > 100) {
                $('.header').addClass('header-scroll');
                $('.main-nav1').addClass('main-nav1-scroll');
                $('.main-icon').addClass('main-icon-scroll');
            } else {
                $('.header').removeClass('header-scroll');
                $('.main-nav1').removeClass('main-nav1-scroll');
                $('.main-icon').removeClass('main-icon-scroll');
            }
        });
    }

    //back to top
    // ===== Scroll to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() { // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 500);
    });


    $('#btnn').on('click',function(){
        if($('#likes').hasClass('opened')){
            $('#likes').removeClass('opened');
            $('#likes').css('transform','translateX(-60px)');
            $('#a2').removeClass('fa-chevron-left');
            $('#a2').addClass('fa-chevron-right');
        }
        else{
            $('#likes').addClass('opened');
            $('#likes').css('transform','translateX(0px)');
            $('#a2').addClass('fa-chevron-left');
            $('#a2').removeClass('fa-chevron-right');
        }
        if($('#a2').hasClass('fa-chevron-right')){
            $('#a2').removeClass('sp1');
            $('#a2').addClass('sp2');

        }else{
            $('#a2').addClass('sp1');
            $('#a2').removeClass('sp2');

        }
    });


});