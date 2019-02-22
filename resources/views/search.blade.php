@extends('main')
@section('title',$section_ar.' - أرض الإسلام')
@section('description', 'أرض الإسلام مشروع يهدف إلي توفير وقت المستخدم من خلال تقديم محتوي متجدد علي مدار الساعه من المواقع الدينيه المشهوره يحتوي الموقع علي جديد التلاوات والدروس والمحاضرات و جديد البرامج الدينيه')
@section('keywords', 'أرض,الإسلام,تلاوات,دروس,محاضرات,فتاوي,لقاءات,برامج,إسلاميه,جديد,المواقع,الإسلاميه')
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
 	<link rel="stylesheet" type="text/css" href="/section/styles/styles.css">
    <link rel="stylesheet" type="text/css" href="/section/styles/styles - xs.css">
    <link rel="stylesheet" type="text/css" href="/section/styles/styles - sm.css">
    <link rel="stylesheet" type="text/css" href="/section/styles/styles - md.css">
    <link rel="stylesheet" type="text/css" href="/section/styles/styles - lg.css">
@endsection
@section('content')
	@php
		use Carbon\Carbon;
        Carbon::setLocale('ar');
	@endphp
	<!--  content page start -->
	<div class="container-fluid">
		<div class="row secound">
			<div class="col-lg-9 col-xl-9 col-md-9 col-sm-9 col-xs-12" id="content-wpr">
			<div class="page-content">
					<div class="page-content-head">
						<h6>{{$section_ar}}</h6>
					</div>
				@if($items->count()!=0)
				@foreach($items as $item)
				<a href="{{$item->link}}">
					<div class="col-xs-12 page-item-block">
						<div class="page-content-item">
							<h1 class="col-lg-12">{{$item->title}}</h1>
							<h2 class="col-lg-5">{{$item->source}}</h2>
							<h3 class="col-lg-4 time">{{$item->created_at->diffForHumans()}}</h3>
							<h4 class="col-lg-2 visits">المشاهدات {{$item->visits}}</h4>
							<div class="ico-item-content">
								<img src="{{$item->ico}}" alt="img" class="img-responsive">
							</div>
						</div>
					</div>
				</a>
				@endforeach
					@elseif($items->count()==0)
					<div style="text-align: center;">
						<p>لا توجد نتائج</p>
					<div/>
				@endif
							<div class="col-xs-12 page-content-footer">
							<h5 id="counter-content">
							</h5>
							</div>
						</div>
				@if($items->count()!=0)
				{{ $items->links() }}
					@endif
			</div>
			<div class="col-xs-12 hidden-xl hidden-lg hidden-md hidden-sm h-page-space"></div>
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