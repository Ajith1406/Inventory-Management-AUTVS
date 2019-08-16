@extends('layouts')

@section('style')

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
@stop

@section('content')
                 <!-- Sidebar-->
            
                 <div class="col-lg-12 text-center">
                            <aside aria-label="sidebar" class="sidebar sidebar-right">
                                <div  class="widget w-tags">
                                    <div class="heading text-center">
                                        <h4 class="heading-title">Condtions</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>

                                    <div class="tags-wrap">
                                        @foreach($conditions as $condition)
                                        <a href="{{route('public.condition.items',['id'=>$condition->id])}}" class="w-tags-item">{{$condition->condition}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </aside>
                        </div>
@stop
@section('script')
<script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('app/js/theme-plugins.js')}}"></script>
<script src="{{asset('app/js/main.js')}}"></script>
<script src="{{asset('app/js/form-actions.js')}}"></script>

<script src="{{asset('app/js/velocity.min.js')}}"></script>
<script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/js/animation.velocity.min.js')}}"></script>
@stop