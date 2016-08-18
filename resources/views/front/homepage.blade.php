@extends('front.layout')

@section('nav')

@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullscreenbanner">
            <ul>
                <li data-transition="boxslide" data-slotamount="7" >
                    <img src="{{asset('images/slider_background.jpg')}}">
                 <!--   <div class="tp-caption tp-fade fadeout "
                         data-x="center"
                         data-hoffset="0"
                         data-y="center"
                         data-voffset="0"
                         data-speed="500"
                         data-start="2000"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="500"
                    >
                        <div class="tp-layer-inner-rotation rs-wave" data-speed="8" data-angle="180" data-radius="25" data-origin="50% 50%">
                            <img src="{{asset('images/dot52.png')}}" />
                        </div>
                    </div>
                    <div class="tp-caption tp-fade"
                         data-x="center"
                         data-hoffset="0"
                         data-y="center"
                         data-voffset="200"
                         data-speed="500"
                         data-start="3000"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                    >
                        <div class="tp-layer-inner-rotation rs-pendulum"
                             data-easing="Linear.easeNone"
                             data-startdeg="0"
                             data-enddeg="360"
                             data-speed="7"
                             data-origin="50% 50%"
                        >
                            <img src="{{asset('images/dot_vector2.png')}}" alt="" >
                        </div>
                    </div> -->

                    <div class="tp-caption sft rs-parallaxlevel-0 start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="center"
                         data-voffset="133"
                         data-speed="800"
                         data-start="1200"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                    >
                        <img src="http://cdn.thefoxwp.com/wp-content/uploads/2014/11/top_text2.png" alt="" data-ww="272" data-hh="13">
                    </div>

                    <div class="tp-caption tp-fade rs-parallaxlevel-0 start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="center"
                         data-voffset="197"
                         data-speed="750"
                         data-start="1500"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                    >
                        <img src="http://cdn.thefoxwp.com/wp-content/uploads/2014/11/crea_text2.png" alt="" data-ww="770" data-hh="73">
                    </div>

                    <div class="tp-caption sfb rs-parallaxlevel-0 start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="center"
                         data-voffset="264"
                         data-speed="800"
                         data-start="1900"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                    >
                        <img src="http://cdn.thefoxwp.com/wp-content/uploads/2014/11/bottom_text2.png" alt="" data-ww="461" data-hh="19">
                    </div>
                </li>
            </ul>
        </div>
    </div>
@stop