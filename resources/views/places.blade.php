@extends('layouts')

@section('style')
    <link rel="stylesheet" type="text/css" href="app/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="app/css/crumina-fonts.css">
    <link rel="stylesheet" type="text/css" href="app/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="app/css/grid.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
@stop
@section('content')
    <div class="container">
        <div class="content-wrapper">
            <div class="heading text-center">
                <h4 class="heading-title">Places</h4>
                <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                </div>
            </div>
                            
                    <main class="main">
                    <div class="container">
                        <div class="row">
                                    <div class="case-item-wrap">
                                        @foreach($places as $place)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb">
                                                    <img src="{{$place->picture}}" alt="{{$place->place_name}}">
                                                </div>
                                                <h6 class="case-item__title"><a href="{{route('public.place.items',['id'=>$place->id])}}">{{$place->place_name}}</a></h6>
                                            </div>
                                        </div>
                                        @endforeach
                                    <div>
                        </div>
                    </div>

                        <!-- End Post Details -->
                                             
                    
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
                                        <a href="#" class="w-tags-item">{{$condition->condition}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </aside>
                        </div>

                        <!-- End Sidebar-->

                    </main>
                
            
             
        </div>
    </div>
@stop

@section('script')
<script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('app/js/theme-plugins.js')}}"></script>
<script src="{{asset('app/js/main.js')}}"></script>
<script src="{{asset('app/js/main.js')}}"></script>

<script src="{{asset('app/js/velocity.min.js')}}"></script>
<script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/js/animation.velocity.min.js')}}"></script>
@stop