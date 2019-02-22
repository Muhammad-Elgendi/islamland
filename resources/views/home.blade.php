@extends('main')
@section('description', 'أرض الإسلام يقدم جديد المواقع الإسلاميه بما فيها من تلاوات و دروس و محاضرات و فتاوي و لقاءات و برامج إسلاميه')
@section('title', 'أرض الإسلام')
@section('keywords', 'أرض,الإسلام,تلاوات,دروس,محاضرات,فتاوي,لقاءات,برامج,إسلاميه,جديد,المواقع,الإسلاميه')
@section('home-link', '/')
@section('pref_link', 'https://www.islamland.net')
@section('quran-link', '#quran-sec')
@section('lesson-link', '#lesson-sec')
@section('fatawa-link', '#fatawa-sec')
@section('live-link', '#music-sec')
@section('video-link', '#')
@section('styles')
    <link rel="stylesheet" type="text/css" href="main/styles/styles.css">
    <link rel="stylesheet" type="text/css" href="main/styles/styles - xs.css">
    <link rel="stylesheet" type="text/css" href="main/styles/styles - sm.css">
    <link rel="stylesheet" type="text/css" href="main/styles/styles - md.css">
    <link rel="stylesheet" type="text/css" href="main/styles/styles - lg.css">
@endsection
@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('ar');
    @endphp
    <div class="breaking-news" style="height: 30px;background-color: #E3E3E3;width: 100%;margin: 15px 0 15px 0;overflow: hidden;
    white-space: nowrap;">
        <h1 style="width: 80px;height: 100%;background-color: #3498DB;color: #FFFFFF;font-size: 12pt;text-align: center;line-height: 30px;margin: 0;float:right;">أرض الإسلام</h1>
        <marquee style="width:calc(100% - 80px);float: left;line-height: 30px;overflow: hidden;
    white-space: nowrap; " behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();">
            <h2 style="margin: 0;font-size: 12pt;float: right;line-height: 30px;">قران</h2>
            <p style="margin:0 2px 0 2px;float: right;">و</p>
            <h3 style="margin: 0;font-size: 12pt;line-height: 30px;float: right;">تلاوات</h3>
            <p style="margin:0 2px 0 2px;float: right;">:</p>
            @foreach($breaking_recitations as $recitation)
                <a href="{{$recitation->link}}">{{$recitation->title}}</a>
            @endforeach
            <h4 style="margin: 0;font-size: 12pt;line-height: 30px;float: right;">دروس</h4>
            <p style="margin:0 2px 0 2px;float: right;">:</p>
            @foreach($breaking_lessons as $lesson)
                <a href="{{$lesson->link}}">{{$lesson->title}}</a>
            @endforeach
            <h5 style="margin: 0;font-size: 12pt;line-height: 30px;float: right;">فتاوي</h5>
            <p style="margin:0 2px 0 2px;float: right;">:</p>
            @foreach($breaking_fatawas as $fatawa)
                <a href="{{$fatawa->link}}">{{$fatawa->title}}</a>
            @endforeach
            <h6 style="margin: 0;font-size: 12pt;line-height: 30px;float: right;">فيديوهات</h6>
            <p style="margin:0 2px 0 2px;float: right;">:</p>
            @foreach($breaking_videos as $video)
                <a href="{{$video->link}}">{{$video->title}}</a>
            @endforeach
        </marquee>
    </div>
<!--  Slider and video gallary start -->
<div class="container-fluid">
    <div class="row secound">
        <div class="col-lg-5 col-xl-5 col-md-6 col-sm-6 col-xs-12 slider">

            <div class="col-lg-8 col-xl-8 col-md-8 col-sm-8 right-col">
                <div class="col-xs-12 shape-head">
                    <div class="carousel slider-Carousel" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            @foreach($sliders as $slider)
                            @if($slider->id==$sliders->first()->id)
                            <div class="item active">                            
                            @else
                            <div class="item">                            
                            @endif                            
                                <p>{{$slider->title}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 slider-content">
                    <div class="carousel slide slider-Carousel" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            @foreach($sliders as $slider)
                            @if($slider->id==$sliders->first()->id)
                            <div class="item active">                            
                            @else
                            <div class="item">                            
                            @endif
                                @php
                                $error=array('<div class=','\'','col-xs-8','<p style=','text-align: justify;line-height: 2;','>','::');
                                $content=str_replace($error,'',$slider->content);
                                @endphp
                                @if(strlen($content)>=720)
                                    @php
                                    $short=substr($content, 0, 718);
                                    @endphp
                                @else
                                    @php
                                        $short=$content;
                                    @endphp
                                @endif
                                    <p style="font-size: 15px;"> {{ $short }} </p> ... <a href='{{$slider->link}}' target="_blank" title='بقية المقال'>المزيد</a>

                            </div>
                            @endforeach
                        </div>
                    </div>

                    <a class="control-slider-xs hidden-xl hidden-lg hidden-md hidden-sm left carousel-control" href=".slider-Carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="control-slider-xs hidden-xl hidden-lg hidden-md hidden-sm  right carousel-control" href=".slider-Carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>


                </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xs-12 left-col">
                <div class="col-xs-12 hidden-xs img-responsive slider-img">
                    <div  class="carousel slider-Carousel" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            @foreach($sliders as $slider)
                            @if($slider->id==$sliders->first()->id)
                            <div class="item active">                            
                            @else
                            <div class="item">                            
                            @endif                            
                                <img src="{{$slider->f_img}}" alt="img" class="img-responsive" style="width: 100%;" >
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 slider-control hidden-xs">
                    <a class="left carousel-control" href=".slider-Carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href=".slider-Carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-xl-5 col-md-6 col-sm-6 col-xs-12 col-xl-pull-1 col-lg-pull-1 video-gallary">
            <div class="shape-head">
                <p>جديد الفيديوهات</p>
                <div class="video-control">
                    <a class="left carousel-control" href=".video-Carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href=".video-Carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="video-gallary-body">
                <div class="carousel slide video-Carousel" data-ride="carousel" data-interval="false" data-pause="hover">
                    <div class="carousel-inner" role="listbox">
                        @php
                        $intial=0;
                        $vidcount=0;
                        @endphp
                        @foreach($videos_g as $video)
                          @php
                          if($intial==0){
                          echo'<div class="item active">';
                          $intial++;
                          }
                          elseif($vidcount==3||$vidcount==6){
                           echo'<div class="item">';
                          }
                          if($vidcount==0){
                            echo'<div class="item-video col-lg-4 col-md-4 col-sm-4">';
                          }
                          else{
                            echo'<div class="item-video col-lg-4 col-md-4 col-sm-4 hidden-xs">';
                          }
                          @endphp
                          <iframe width="100%" height="100%" src="{{$video->link}}" frameborder="0" allowfullscreen></iframe>
                                </div>
                          @php
                          $vidcount++;
                          if($vidcount==3||$vidcount==6||$vidcount==9){
                          echo'</div>';
                          }
                          @endphp
                        @endforeach
                       </div>
                </div>
            </div>
        </div><!-- /.video-gallary -->

    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<!--  Slider and video gallary End -->

<!--  view-now and new-adds start -->
<div class="container-fluid">
    <div class="row secound">
        <div class="col-lg-5 col-xl-5 col-md-6 col-sm-6 col-xs-12 new-adds">
            <div class="shape-head">
                <p>جديد الإضافات</p>
            </div>

            <div class="col-sm-12 hidden-xl hidden-lg hidden-md show-sm show-xs" id="list-two">
                <div class="two-tabs-new">
                    <ul class="nav nav-tabs new-adds-tab" id="two-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#quran" aria-controls="quran" role="tab" data-toggle="tab">قران</a></li>
                        <li role="presentation"><a href="#lessons" aria-controls="lessons" role="tab" data-toggle="tab">دروس</a></li>
                        <li role="presentation"><a href="#fatawa" aria-controls="fatawa" role="tab" data-toggle="tab">فتاوي</a></li>
                        <li role="presentation"><a href="#articles" aria-controls="articles" role="tab" data-toggle="tab">مقالات</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 hidden-xl hidden-lg hidden-md hidden-sm show-xs" id="list-two">
                <div class="two-tabs-new">
                    <ul class="nav nav-tabs new-adds-tab" id="two-tabs" role="tablist">
                        <li role="presentation"><a href="#quran" aria-controls="quran" role="tab" data-toggle="tab">أناشيد</a></li>
                        <li role="presentation"><a href="#lessons" aria-controls="lessons" role="tab" data-toggle="tab">كتب</a></li>
                        <li role="presentation"><a href="#fatawa" aria-controls="fatawa" role="tab" data-toggle="tab">تغريدات</a></li>
                        <li role="presentation"><a href="#articles" aria-controls="articles" role="tab" data-toggle="tab">فيديو</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs" id="list-one">
                <div class="one-tabs-new">
                    <ul class="nav nav-tabs new-adds-tab" role="tablist">
                        <li role="presentation"><a href="#anasheed" aria-controls="anasheed" role="tab" data-toggle="tab">أناشيد</a></li>
                        <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">فيديوهات</a></li>
                        <li role="presentation"><a href="#tweets" aria-controls="tweets" role="tab" data-toggle="tab">تغريدات</a></li>
                        <li role="presentation"><a href="#books" aria-controls="books" role="tab" data-toggle="tab">كتب</a></li>
                    </ul>
                </div></div>
            <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 hidden-sm hidden-xs" id="list-two">
                <div class="two-tabs-new">
                    <ul class="nav nav-tabs new-adds-tab" id="two-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#quran" aria-controls="quran" role="tab" data-toggle="tab">قران</a></li>
                        <li role="presentation"><a href="#lessons" aria-controls="lessons" role="tab" data-toggle="tab">دروس</a></li>
                        <li role="presentation"><a href="#fatawa" aria-controls="fatawa" role="tab" data-toggle="tab">فتاوي</a></li>
                        <li role="presentation"><a href="#articles" aria-controls="articles" role="tab" data-toggle="tab">مقالات</a></li>
                    </ul>
                </div></div>
            <div class="col-md-10 col-lg-10 col-sm-9 col-xs-12" id="list-two">
                <div class="two-tabs-new">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="quran">                       
                        @foreach($recitations as $recitation)
                        @if($recitations->first()->id==$recitation->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$recitation->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$recitation->title}}</p>
                                    <br/>

                                    <p class="time-new-adds">{{$recitation->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach
                            
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="lessons">

                        @foreach($lessons as $lesson)
                        @if($lessons->first()->id==$lesson->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$lesson->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$lesson->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$lesson->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="fatawa">

                        @foreach($fatawas as $fatawa)
                        @if($fatawas->first()->id==$fatawa->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$fatawa->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$fatawa->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$fatawa->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="articles">

                        @foreach($articles as $article)
                        @if($articles->first()->id==$article->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$article->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$article->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$article->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach
                           
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="anasheed">

                            @foreach($music as $song)
                        @if($music->first()->id==$song->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$song->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$song->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$song->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="videos">

                            @foreach($videos as $video)
                        @if($videos->first()->id==$video->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$video->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$video->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$video->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tweets">

                        @foreach($tweets as $tweet)
                        @if($tweets->first()->id==$tweet->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$tweet->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$tweet->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$tweet->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach  

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="books">

                            @foreach($books as $book)
                        @if($books->first()->id==$book->id)
                        @php
                        $count=1
                        @endphp
                        @else
                        @php
                        $count++
                        @endphp
                        @endif
                        @if($count>3)
                        @break
                        @endif
                        <a href="{{$book->link}}">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 new-adds-content">
                                    <p>{{$book->title}}</p>
                                    <br/>
                                    <p class="time-new-adds">{{$book->created_at->diffForHumans()}}</p>
                                </div>
                            </a>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.new-adds -->
        <div class="col-lg-6 col-xl-5 col-md-6 col-sm-6 col-xs-12 hidden-xs col-xl-pull-1 col-lg-pull-1 view-now">
            <div class="shape-head">
                <p>يشاهد الأن</p>
            </div>
            <div class="views-counter">
                <p class="col-xs-6">عدد الزوار {{$sitecounter['ip']}}</p>
                <p class="col-xs-6">عدد المشاهدات {{$sitecounter['hits']}}</p>
            </div>
            <div id="h-space-view-now" class="col-lg-12 col-xs-12"></div>
            @foreach($viewnow as $item)
            <a href="{{$item->link}}">
                <div class="col-xs-12 new-adds-content view-now-content content-view-block" id="content-view-block">
                    <p>{{$item->title}}</p>
                    <br/>
                    <p  class="time">{{$item->created_at->diffForHumans()}}</p>
                    <p class="visits">الزيارات :{{$item->visits}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
{{--indecator--}}
                    <div id="quran-sec"></div>
<!--  view-now and video new-adds End -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 h-page-space"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;padding: 0;">
            {{--<div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;background:url('https://www.islamland.net/main/images/tanbeeh-f.jpg')repeat-y;padding: 0;">--}}
            {{--  <p style="text-align: center;line-height: 612px;">قريبا ...</p> --}}
           {{-- <a href="https://billing.time4vps.eu/?affid=1309"><img src="https://www.islamland.net/ico/Time4VPSban.png" width="160" height="600" border="0" title="Time4VPS.EU" alt="Time4VPS.EU - VPS hosting in Europe" /></a>--}}
        </div>

        <div class="col-lg-8 col-sm-10 col-xs-12" id="page-content">
            <div class="page-content">
                <div class="page-content-head">
                    <p>قران</p>
                </div>


                <div class="carousel slide quran-Carousel" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">

                        <div class="item active">
                        @foreach($recitations as $recitation)
                            <a href="{{$recitation->link}}">
                                <div class="col-xs-12 page-item-block">
                                    <div class="page-content-item">
                                        <p class="col-lg-12">{{$recitation->title}}</p>
                                        <p class="col-lg-5">{{$recitation->author}}</p>
                                        <p class="col-lg-4 time">{{$recitation->created_at->diffForHumans()}}</p>
                                        <p class="col-lg-2 visits">الزيارات : {{$recitation->visits}}</p>
                                        <div class="ico-item-content">
                                        @if(isset($recitation->ico))
                                            <img src="{{$recitation->ico}}" alt="img" class="img-responsive">
                                        @else
                                            <img src="{{$recitation->source_ico}}" alt="img" class="img-responsive">
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;padding: 0;">
            {{--<div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;background:url('https://www.islamland.net/main/images/tanbeeh-f.jpg')repeat-y;padding: 0;">--}}
            {{--  <p style="text-align: center;line-height: 612px;">قريبا ...</p> --}}
            {{--  <a href="https://billing.time4vps.eu/?affid=1309"><img src="https://www.islamland.net/ico/Time4VPSban.png" width="160" height="600" border="0" title="Time4VPS.EU" alt="Time4VPS.EU - VPS hosting in Europe" /></a>--}}
        </div>

    </div>
</div>
 {{--indecator--}}
<div id="lesson-sec"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 h-page-space"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;padding: 0;">
            {{--<div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;background:url('https://www.islamland.net/main/images/tanbeeh-f.jpg')repeat-y;padding: 0;">--}}
            {{--  <p style="text-align: center;line-height: 612px;">قريبا ...</p> --}}
            {{--    <a href="https://billing.time4vps.eu/?affid=1309"><img src="https://www.islamland.net/ico/Time4VPSban.png" width="160" height="600" border="0" title="Time4VPS.EU" alt="Time4VPS.EU - VPS hosting in Europe" /></a>--}}
          </div>
          <div class="col-lg-8 col-sm-10 col-xs-12" id="page-content">
              <div class="page-content">
                  <div class="page-content-head">
                      <p>دروس</p>
                  </div>


                  <div class="carousel slide quran-Carousel" data-ride="carousel" data-interval="false">
                      <div class="carousel-inner" role="listbox">

                          <div class="item active">
                          @foreach($lessons as $lesson)
                              <a href="{{$lesson->link}}">
                                  <div class="col-xs-12 page-item-block">
                                      <div class="page-content-item">
                                          <p class="col-lg-12">{{$lesson->title}}</p>
                                          <p class="col-lg-5">{{$lesson->author}}</p>
                                          <p class="col-lg-4 time">{{$lesson->created_at->diffForHumans()}}</p>
                                          <p class="col-lg-2 visits">الزيارات : {{$lesson->visits}}</p>
                                          <div class="ico-item-content">
                                          @if(isset($lesson->ico))
                                              <img src="{{$lesson->ico}}" alt="img" class="img-responsive">
                                          @else
                                              <img src="{{$lesson->source_ico}}" alt="img" class="img-responsive">
                                          @endif
                                          </div>
                                      </div>
                                  </div>
                              </a>
                              @endforeach
                        </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;padding: 0;">
              {{--<div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;background:url('https://www.islamland.net/main/images/tanbeeh-f.jpg')repeat-y;padding: 0;">--}}
            {{--  <p style="text-align: center;line-height: 612px;">قريبا ...</p> --}}
              {{--   <a href="https://billing.time4vps.eu/?affid=1309"><img src="https://www.islamland.net/ico/Time4VPSban.png" width="160" height="600" border="0" title="Time4VPS.EU" alt="Time4VPS.EU - VPS hosting in Europe" /></a>--}}
           </div>

       </div>
   </div>

   {{--indecator--}}
 <div id="fatawa-sec"></div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 h-page-space"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;padding: 0;">
            {{--<div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;background:url('https://www.islamland.net/main/images/tanbeeh-f.jpg')repeat-y;padding: 0;">--}}
            {{--  <p style="text-align: center;line-height: 612px;">قريبا ...</p> --}}
            {{-- <a href="https://billing.time4vps.eu/?affid=1309"><img src="https://www.islamland.net/ico/Time4VPSban.png" width="160" height="600" border="0" title="Time4VPS.EU" alt="Time4VPS.EU - VPS hosting in Europe" /></a>--}}
       </div>
       <div class="col-lg-8 col-sm-10 col-xs-12" id="page-content">
           <div class="page-content">
               <div class="page-content-head">
                   <p>فتاوي</p>
               </div>


               <div class="carousel slide quran-Carousel" data-ride="carousel" data-interval="false">
                   <div class="carousel-inner" role="listbox">

                       <div class="item active">
                       @foreach($fatawas as $fatawa)
                           <a href="{{$fatawa->link}}">
                               <div class="col-xs-12 page-item-block">
                                   <div class="page-content-item">
                                       <p class="col-lg-12">{{$fatawa->title}}</p>
                                       <p class="col-lg-5">{{$fatawa->author}}</p>
                                       <p class="col-lg-4 time">{{$fatawa->created_at->diffForHumans()}}</p>
                                       <p class="col-lg-2 visits">الزيارات : {{$fatawa->visits}}</p>
                                       <div class="ico-item-content">
                                       @if(isset($fatawa->ico))
                                           <img src="{{$fatawa->ico}}" alt="img" class="img-responsive">
                                       @else
                                           <img src="{{$fatawa->source_ico}}" alt="img" class="img-responsive">
                                       @endif
                                       </div>
                                   </div>
                               </div>
                           </a>
                           @endforeach
                     </div>
                 </div>
               </div>
           </div>
       </div>

       <div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;padding: 0;">
           {{--<div class="col-xs-2 hidden-sm hidden-xs tanbeeh-f" style="height: 612px;	width: 160px;background:url('https://www.islamland.net/main/images/tanbeeh-f.jpg')repeat-y;padding: 0;">--}}
            {{--  <p style="text-align: center;line-height: 612px;">قريبا ...</p> --}}
           {{--<a href="https://billing.time4vps.eu/?affid=1309"><img src="https://www.islamland.net/ico/Time4VPSban.png" width="160" height="600" border="0" title="Time4VPS.EU" alt="Time4VPS.EU - VPS hosting in Europe" /></a>--}}
        </div>

    </div>
</div>

{{--indecator--}}

<div id="music-sec"></div>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 h-page-space"></div>
</div>
</div>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 h-page-space"></div>
</div>
</div>

@endsection