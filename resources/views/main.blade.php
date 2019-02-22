<!DOCTYPE html>
<html dir="rtl" lang="ar" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="@yield('description')" />
<meta name="google-site-verification" content="Ls_faZdG4q61_E-h1MdKrv5bXa74k4hK4L3B0PJbWXs" />
<title>@yield('title')</title>
<meta name="keywords" content="@yield('keywords')">
<meta name="author" content="أرض الإسلام">
<meta property="og:title" content="@yield('title')" />
<meta property="og:type" content="website" />
<meta property="og:url" content="@yield('pref_link')" />
<meta property="og:image" content="https://www.islamland.net/main/images/logo.png" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:creator" content="@">
<meta name="twitter:title" content="@yield('title')">
<meta name="twitter:description" content="@yield('description')">
<meta name="twitter:image" content="https://www.islamland.net/main/images/logo.png">
    <!-- styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.islamland.net/main/styles/css/font-awesome.min.css">
@yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="canonical" href="@yield('pref_link')" />
    <link rel="icon" type="image/x-icon" href="https://www.islamland.net/favicon.ico" />
    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "أرض الإسلام",
  "url": "https://www.islamland.net/",
  "logo": "https://www.islamland.net/main/images/logo.png",
  "sameAs": [
    "https://www.facebook.com/islamland.net/"
  ]
}
</script>
    <script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "WebSite",
   "name": "أرض الإسلام",
   "url": "https://www.islamland.net/"
   }
}

</script>
</head>
<body>
<!-- header start -->
<div class="header">
    <div class="container-fluid">
        <div class="row header-elements">

            <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12 hidden-xs logo">
                <a href="https://www.islamland.net"><img src="https://www.islamland.net/main/images/logo.png" alt="شعار أرض الإسلام" class="logo-img img-responsive"></a>
            </div>

            <div class="hidden-xs hidden-md hidden-sm col-lg-1 space"></div>
            <div class="test col-lg-4 col-md-5 col-sm-5 col-xs-12 hidden-xs"></div>
            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 hidden-xs hidden-sm hidden-md hidden-lg hidden-xl">

            </div>

            <div class="hidden-xs hidden-md hidden-sm col-lg-1 space"></div>

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 hidden-xs slinks-xs ">
                <a href="#"><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></a>
            {{--    <a href="#"><i class="fa fa-youtube-square fa-4x" aria-hidden="true"></i></a>  --}}
                <a href="https://www.islamland.net/feed"><i class="fa fa-rss-square fa-4x" aria-hidden="true"></i></a>
            </div>

        </div>
    </div>
    <!-- navbar xs Start -->
    <nav class="navbar navbar-default navbar-fixed-top hidden-xl hidden-lg hidden-sm hidden-md">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-xs" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          <img src="https://www.islamland.net/main/images/logo-xs.png" alt="img" class="img-responsive">
                <div class="slinks-xs">
                    <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                 {{--   <a href="#"><i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i></a>  --}}
                    <a href="https://www.islamland.net/feed"><i class="fa fa-rss-square fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="nav-xs">
                <ul class="nav navbar-nav navbar-right" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                    <li class="home" itemprop="name"><a href="@yield('home-link')" itemprop="url">الرئيسيه<span class="sr-only">(current)</span></a></li>
                    <li itemprop="name"><a href="@yield('quran-link')" itemprop="url">قران</a></li>
                    <li itemprop="name"><a href="@yield('lesson-link')" itemprop="url">دروس</a></li>
                    <li itemprop="name"><a href="@yield('fatawa-link')" itemprop="url">فتاوي</a></li>
                    <li itemprop="name"><a href="@yield('video-link')" itemprop="url">فيديوهات</a></li>
                    <li itemprop="name"><a href="@yield('live-link')" itemprop="url">بث مباشر</a></li>

                </ul>
                {!! Form::open(array('method' => 'GET', 'action' => 'search_controller@Search','class'=>'navbar-form navbar-left')) !!}
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="البحث عن ...">
                    </div>
                    <button type="submit" class="btn btn-default">إبحث</button>
                {!! Form::close() !!}
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- navbar xs End -->
    <!-- nav bar start -->
    <nav class="navbar navbar-default hidden-xs">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#siteNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-collapse" id="siteNavbar">
                <ul class="nav navbar-nav navbar-right" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                    <li class="home" itemprop="name"><a href="@yield('home-link')" itemprop="url">الرئيسيه<span class="sr-only">(current)</span></a></li>
                    <li itemprop="name"><a href="@yield('quran-link')" itemprop="url">قران</a></li>
                    <li itemprop="name"><a href="@yield('lesson-link')" itemprop="url">دروس</a></li>
                    <li itemprop="name"><a href="@yield('fatawa-link')" itemprop="url">فتاوي</a></li>
                    <li itemprop="name"><a href="@yield('video-link')" itemprop="url">فيديوهات</a></li>
                    <li itemprop="name"><a href="@yield('live-link')" itemprop="url">بث مباشر</a></li>
                    <!--search box inside nav bar-->

                    {!! Form::open(array('method' => 'GET', 'action' => 'search_controller@Search')) !!}
                        <input type="text" placeholder="البحث عن ..." style="margin:2px;position: absolute;left: 50px;" name="search">
                        <button type="submit" class="btn btn-default" style="margin-top:2px;position: absolute;left: 6px;height: 26px;padding: 0 5px 0 5px;">إبحث</button>
                    {!! Form::close() !!}
                    <!-- End search box inside nav bar-->
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!-- nav bar End -->

<!-- nav bar fixed start -->
<div id="nav-anmiate" style="display:none;">
<nav class="navbar navbar-default navbar-fixed-top hidden-xs"style="margin-top: 0 !important;	border-bottom-style: solid !important;	border-bottom-color: #3498DB !important;	border-bottom-width: 3px !important;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#siteNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-collapse" id="siteNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="home"><a href="@yield('home-link')">الرئيسيه<span class="sr-only">(current)</span></a></li>
                <li><a href="@yield('quran-link')">قران</a></li>
                <li><a href="@yield('lesson-link')">دروس</a></li>
                <li><a href="@yield('fatawa-link')">فتاوي</a></li>
                <li><a href="@yield('video-link')">فيديوهات</a></li>
                <li><a href="@yield('live-link')">بث مباشر</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>
<!-- nav bar fixed End -->
<!-- header End -->

@yield('content')
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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 h-page-space"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 footer hidden-xs">
            <p class="col-xs-6" id="left-footer">جميع الحقوق محفوظه لدي مصادر المحتوي</p>
            <p class="col-xs-6">حقوق التصميم والتطوير : موقع أرض الإسلام</p>
        </div>
        <div class="col-xs-12 footer hidden-xl hidden-lg hidden-md hidden-sm show-xs">
            <p class="col-xs-12">تطوير : موقع أرض الإسلام</p>
        </div>
    </div>
</div>
<!-- Start of Google analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-84315376-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- END of Google analytics -->
<!-- Histats.com  START  (aync)-->
{{--
<script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.start', '1,3643190,4,0,0,0,00010000']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
        var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
        hs.src = ('//s10.histats.com/js15_as.js');
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3643190&101" alt="free hit counter" border="0"></a></noscript>
--}}
<!-- Histats.com  END  -->
<!-- chat for the site -->
{{--
<script>
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/57d962b03bec6867d94654c2/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script>var win = window,
            docEl = document.documentElement,
            $nav = document.getElementById('nav-anmiate');

    win.onscroll = function(){
        var sTop = (this.pageYOffset || docEl.scrollTop)  - (docEl.clientTop || 0);
        $nav.style.display =  sTop > 115 ? "block":"none" ;
    };</script>
<!-- Scripts for the site -->
<script src="main/styles/js/main.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{--add this plugin--}}
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-588e4e3469846764"></script>
</body>
</html>