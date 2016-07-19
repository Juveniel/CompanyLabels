@extends('front.layout')

@section('content')

    <div class="fullwidthbanner-container">
        <div class="fullscreenbanner">
            <ul>
                <li data-transition="boxslide" data-slotamount="7" >
                    <img src="{{asset('images/slider_background.jpg')}}">
                    <div class="tp-caption tp-fade fadeout "
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
                    </div>
                </li>
               <!-- <li data-transition="boxslide" data-slotamount="7" data-link="http://www.google.de">
                    <img src="{{asset('images/slider_21.jpg')}}">
                    <div class="caption sft big_white"  data-x="400" data-y="100" data-speed="700" data-start="1700" data-easing="easeOutBack">KICKSTART YOUR WEBSITE</div>
                    <div class="caption sfb big_orange"  data-x="400" data-y="142" data-speed="500" data-start="1900" data-easing="easeOutBack">WITH SLIDER REVOLUTION!</div>
                    <div class="caption lfr medium_grey"  data-x="510" data-y="210" data-speed="300" data-start="2000">UNLIMITED TRANSITIONS</div>
                </li> -->
                ...
            </ul>
        </div>
    </div>
@stop