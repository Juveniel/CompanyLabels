$(document).ready(function() {
    $('.fullscreenbanner').revolution({
        delay:9000,
        startwidth:1920,
        startheight:500,
        hideThumbs:200,

        thumbWidth:100,
        thumbHeight:50,
        thumbAmount:2,

        navigationType:"bullet",
        navigationArrows:"solo",
        navigationStyle:"round",

        touchenabled:"on",
        onHoverStop:"on",

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        parallax:"mouse",
        parallaxBgFreeze:"off",
        parallaxLevels:[5,10,15,20,25,30,35,40,45,50],
        parallaxDisableOnMobile:"on",

        keyboardNavigation:"off",

        navigationHAlign:"center",
        navigationVAlign:"bottom",
        navigationHOffset:0,
        navigationVOffset:20,

        soloArrowLeftHalign:"left",
        soloArrowLeftValign:"center",
        soloArrowLeftHOffset:20,
        soloArrowLeftVOffset:0,

        soloArrowRightHalign:"right",
        soloArrowRightValign:"center",
        soloArrowRightHOffset:20,
        soloArrowRightVOffset:0,

        shadow:0,
        fullWidth:"off",
        fullScreen:"on",

        spinner:"spinner0",

        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,

        shuffle:"off",


        forceFullWidth:"off",
        fullScreenAlignForce:"on",
        minFullScreenHeight:"",

        hideThumbsOnMobile:"off",
        hideNavDelayOnMobile:1500,
        hideBulletsOnMobile:"off",
        hideArrowsOnMobile:"off",
        hideThumbsUnderResolution:0,

        fullScreenOffsetContainer: "",
        fullScreenOffset: "",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        startWithSlide:0

    });




});