@extends('main')
@section('title',$item->title.' - أرض الإسلام')
@section('description',$item->description.'موقع أرض الإسلام')
@section('keywords','أرض,الإسلام,تلاوات,دروس,محاضرات,فتاوي,لقاءات,برامج,إسلاميه,جديد,المواقع,الإسلاميه,'.$item->keywords.',موقع أرض الإسلام')
@section('home-link', '/')
@section('quran-link', 'https://www.islamland.net/recitation')
@section('lesson-link', 'https://www.islamland.net/lesson')
@section('fatawa-link', 'https://www.islamland.net/fatwa')
@section('article-link', '#')
@section('music-link', 'https://www.islamland.net/music')
@section('video-link', 'https://www.islamland.net/video')
@section('tweet-link', '#')
@section('book-link', '#')
@section('styles')
 	<link rel="stylesheet" type="text/css" href="/content/styles/styles.css">
    <link rel="stylesheet" type="text/css" href="/content/styles/styles - xs.css">
    <link rel="stylesheet" type="text/css" href="/content/styles/styles - sm.css">
    <link rel="stylesheet" type="text/css" href="/content/styles/styles - md.css">
    <link rel="stylesheet" type="text/css" href="/content/styles/styles - lg.css">
@endsection
@section('content')
	<!--  content start -->
	<div class="container-fluid">
		<div class="row secound">
			<div class="col-lg-9 col-xl-9 col-md-9 col-sm-9 col-xs-12" id="content-wpr">
				<div class="content-wpr col-xs-12">
					<div class="col-xs-12 shape-head">
						<h6>{{$item->title}}</h6>
					</div>
					<div class="col-xs-12 content-info">
						<h2 class="info-txt">قسم : {{$section}}</h2>
						<h3 class="info-txt">{{$time}}</h3>
						<h4 class="info-txt">الزيارات : {{$item->visits}}</h4>
						<h6 class="info-txt">المؤلف : {{$item->author}}</h6>						
						<img src="{{$item->ico}}" alt="img" class="img-responsive author-img">
					</div>
					<hr class="col-xs-12 hr-split">
					<div class="content col-xs-12">
							{!!$item->content!!}			
					</div>
					<hr class="col-xs-12" id="hr-end-split">
					<div class="col-xs-12 content-footer">
						<a href="{{url("/$item->section")}}">شاهد أيضاُ</a>
						<h1>المصدر : {{$item->source}}</h1>
					{{--	<h6>شارك الصفحه :</h6> --}}
						<div class="share-links">
							{{--<a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>--}}
                           {{-- <a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a> --}}
				        </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-xs-12" id="right-col-wpr" >
				<div class="col-xs-12 right-col">
					<div class="col-xs-12 view-now">
					<div class="col-xs-12 shape-head">
						<h6>يشاهد الأن</h6>
					</div>
					<div class="views-counter">
						<h6 class="col-xs-5">عدد الزوار {{$sitecounter['ip']}}</h6>
						<h5 class="col-xs-7 text-center">عدد المشاهدات {{$sitecounter['hits']}}</h5>
					</div>
						<div id="h-space-view-now" class="col-lg-12 col-xs-12"></div>
						@php
						$i=0;
						@endphp
					@foreach ($viewnow as $now_item)
						@php
						$i++;
						@endphp
					<a href="{{$now_item->link}}">
					<div class="col-xs-12 new-adds-content view-now-content content-view-block">
						<h2>{{$now_item->title}}</h2>
						 <br/>						
						<h4 class="visits hidden-sm">الزيارات : {{$now_item->visits}}</h4>
					</div>
					</a>
						@if($i>=3)
						@break
						@endif
					 @endforeach
					<a href="{{$viewnow->last()->link}}" class="hidden-sm">
					<div class="col-xs-12 new-adds-content view-now-content content-view-block hidden-sm">
						<h2>{{$viewnow->last()->title}}</h2>
						 <br/>						
						<h4 class="visits hidden-sm">الزيارات : {{$viewnow->last()->visits}}</h4>
					</div>
					</a>
				</div>
				</div>
			</div>
		</div>
	</div>		
@endsection