@extends('main')
@section('title','الصفحه غير موجوده - أرض الإسلام')
@section('description','صفحة الخطأ 404 موقع أرض الإسلام')
@section('keywords','أرض,الإسلام,تلاوات,دروس,محاضرات,فتاوي,لقاءات,برامج,إسلاميه,جديد,المواقع,الإسلاميه,موقع أرض الإسلام')
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
                        <h6>الصفحه غير موجوده</h6>
                    </div>
                    <div class="col-xs-12 content-info">
                        {{--   <h2 class="info-txt">قسم : {{$section}}</h2>
                          <h3 class="info-txt">{{$time}}</h3>
                          <h4 class="info-txt">الزيارات : {{$item->visits}}</h4>
                          <h6 class="info-txt">المؤلف : {{$item->author}}</h6>
                         <img src="{{$item->ico}}" alt="img" class="img-responsive author-img"> --}}
                    </div>
                    <hr class="col-xs-12 hr-split">
                    <div class="content col-xs-12">
                        <br/><br/>
                         <p style="font-size: large;width: 100%;text-align: center;">نأسف لذلك ولكن الصفحه المطلوبه غير موجوده</p>
                    </div>
                    <hr class="col-xs-12" id="hr-end-split">
                    <div class="col-xs-12 content-footer">
                       {{-- <a href="{{url("/$item->section")}}">شاهد أيضاُ</a>
                        <h1>المصدر : {{$item->source}}</h1> --}}
                        <h6>شارك الصفحه :</h6>
                        <div class="share-links">
                            <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-xs-12" id="right-col-wpr" >

            </div>
        </div>
    </div>
@endsection