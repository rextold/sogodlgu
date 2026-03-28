<!doctype html>
<html class="no-js" lang="en" ng-app="myApp">
  <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:type" content="" />
        @if(isset($announcement->title))
           <meta property="og:title" content="{{ $announcement->title }}" />
        @elseif(isset($title))
           <meta property="og:title" content="{{ $title }}" />
        @endif
        <meta property="og:description" content="" />
        @if(isset($announcement->image))
             <meta property="og:image" content="{{ Voyager::image($announcement->image) }}" />
        @endif
        
         <!-- Favicon -->
        <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
        @if($admin_favicon == '')
            <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
        @else
            <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
        @endif
        <title>{{ $title }}</title>
        <!-- <link rel="icon" href="{{ asset('images/lgu.png') }}" type="image/x-icon"> -->
        <link rel="stylesheet" href="{{ asset('bootstrap4/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/w3.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/foundation/foundation.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/foundation/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}"/>  
        <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> -->
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}"/> 
        <link rel="stylesheet" href="{{ asset('css/home/ribbon.css') }}"/> 
        <link rel="stylesheet" href="{{ asset('css/home/breadcrumbs.css') }}"/>
      
        <!-- <script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>   -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/myscript.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bootstrap4/js/bootstrap.min.js') }}"></script> 

        <script src="{{ asset('js/jquery.bootstrap.newsbox.min.js') }}" type="text/javascript"></script>       
        <link rel="stylesheet" href="{{ asset('css/style3.css') }}"/>
        <link rel="stylesheet" href="{{ asset('aos/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/card-carousel.css') }}" />
        <!-- Masthead CSS -->
        <style>
        .masthead {
            position: relative;
            padding: 1rem;
            overflow: hidden;
            border-radius: 8px;
            background: linear-gradient(-11deg, rgba(0,0,0,0.2), transparent), #ea5211;
        }
        
        /* Blurred background */
        .masthead .header-bg {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            filter: blur(9px) brightness(0.6);
            z-index: 0;
        }
        
        /* Overlay */
        .masthead .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(-11deg, rgba(0,0,0,0.2), transparent);
            z-index: 1;
        }
        
        /* Header Image */
        .masthead .header-img {
            max-width: 567px;
            height: auto;
            border-radius: 8px;
            position: relative;
            z-index: 2;
        }
        
        /* Logo */
        .masthead .logo-img {
            max-width: 181px;
            height: auto;
            position: relative;
            z-index: 2;
        }
        
        /* Clock / Date */
        .masthead .dateclock {
            position: relative;
            z-index: 2;
            display: inline-block;
            background-color: rgba(0,0,0,0.5);
            color: #fff;
            padding: 0.75rem 1.2rem;
            border-radius: 12px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.4);
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .masthead .dateclock:hover {
            background-color: rgba(0,0,0,0.7);
            transform: translateY(-2px);
        }
        .masthead .dateclock .time { display: block; font-size: 1.6rem; }
        .masthead .dateclock .date { display: block; margin-top: 2px; font-size: 1rem; color: #ffd966; }
        
        /* Responsive */
        @media (max-width: 768px) {
            .masthead .logo-img { width: 100%; margin-bottom: 0.5rem; }
            .masthead .header-img { width: 100%; margin-bottom: 0.5rem; }
            .masthead .dateclock { min-width: 100%; font-size: 1.3rem; margin-top: 0.5rem; }
            .masthead .dateclock .time { font-size: 1.4rem; }
            .masthead .dateclock .date { font-size: 0.95rem; }
        }
        </style>


        <script>
            function updateClock() {
                const now = new Date();
                const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                const date = now.toLocaleDateString(undefined, options);
                document.getElementById('clock').innerHTML = `
                    <span class="date">${date}</span>
                    <span class="time">${time}</span>
                `;
            }
            setInterval(updateClock, 1000);
            updateClock(); // initial call
        </script>
</head>

<body>
    <!-- Masthead HTML -->
    <div class="container-fluid masthead py-3">
        @if($img = App\PageHeader::where("status",2)->first())
    
            <!-- Blurred background -->
            <div class="header-bg" style="background-image: url('{{ Voyager::image($img->image) }}');"></div>
    
            <!-- Overlay -->
            <div class="overlay"></div>
    
            <!-- Header Row -->
            <div class="row align-items-center position-relative">
                <div class="col-12 col-md-10 d-flex align-items-center flex-wrap">
                    <!-- Logo on the left -->
                    <img src="{{ asset('images/logo/logo2.png') }}" class="logo-img mr-3 mb-2 mb-md-0" alt="Sogod LGU Logo">
                    <!-- Page Header Image beside logo -->
                    <img src="{{ Voyager::image($img->image) }}" class="header-img mb-2 mb-md-0" alt="Page Header">
                </div>
    
                <!-- Clock -->
                <div class="col-12 col-md-2 text-md-right mt-2 mt-md-0">
                    <div id="clock" class="dateclock text-white"></div>
                </div>
            </div>
        @endif
    </div>


<!-- <input id="tmp-link" type="hidden" data-link=""> -->
    @include('frontend.widgets._accessibility')

<!-- Start of Off Canvas -->
<div class="off-canvas-wrapper"  id="app">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

<!-- Off Canvas Menu -->
    @include('frontend.widgets._navbar-right')

<div class="off-canvas-content" data-off-canvas-content>

    @include('frontend.widgets._navbar-left')
<!-- masthead -->
<div id="masthead" class="masthead-bg masthead-div" style="">
    <div></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="logo">  
                    <!-- <img src="{{ asset('images/logo/logo.png') }}" style="width: 285px"> -->
                </div>
            </div>
        </div>
    </div>
</div>   
<!-- main -->
    <div id="main-content">
        @yield('content')
    </div>

<!-- main end -->
<style>
/* Footer Styles */
.footer {
    background-color: #001f2d; /* dark blue, professional look */
    color: #f0f0f0;
    font-family: 'Segoe UI', sans-serif;
    padding: 40px 0;
}

.footer a {
    color: #f4c542; /* Sogod gold */
    text-decoration: none;
    transition: color 0.3s;
}

.footer a:hover {
    color: #ea5211; /* Sogod orange */
}

.footer .footer-logo img {
    width: 100px;
    margin-bottom: 10px;
}

.footer .footer-section h6 {
    font-weight: 700;
    font-size: 14px;
    margin-bottom: 12px;
    color: #ffffff;
    border-bottom: 1px solid rgba(255,255,255,0.2);
    padding-bottom: 4px;
}

.footer .list-inline li, .footer .list-group-item {
    padding: 4px 0;
    font-size: 13px;
    background: transparent;
    border: none;
}

.footer .map-container iframe {
    border-radius: 12px;
    width: 100%;
    height: 180px;
    border: 0;
}

.footer .followus {
    margin-bottom: 20px;
}
</style>

<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <!-- Logo and About -->
            <div class="col-md-3 footer-section">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Sogod LGU Logo">
                </div>
                <p style="font-size: 13px;">All rights reserved | www.sogodlgu.gov.ph</p>
                <h6>About the Website</h6>
                <p style="font-size: 13px; color:#d0d0d0;">Official Website of Sogod, Southern Leyte.</p>
            </div>

            <!-- Links & Socials -->
            <div class="col-md-4 footer-section">
                <div class="followus">
                    @include('frontend.widgets._followus')
                </div>
                <h6>Useful Links</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('tourism') }}">Tourism</a></li>
                    <li class="list-group-item"><a href="#">Sogod Police Station</a></li>
                    <li class="list-group-item"><a href="#">Postal Office Sogod</a></li>
                    <li class="list-group-item"><a href="#">Southern Leyte State University</a></li>
                    <li class="list-group-item"><a href="#">RHU Sogod</a></li>
                </ul>
            </div>

            <!-- Map & Contact -->
            <div class="col-md-5 footer-section">
                <h6>Municipal Hall Location</h6>
                <div class="map-container mb-3">
                    <iframe src="https://maps.google.com/maps?q=Sogod%20southern%20leyte%20municipal%20hall&t=k&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
                <h6>Address</h6>
                <p style="font-size: 13px;">Corner Concepcion St. & Osmeè´–a Street Zone 1, Sogod, Southern Leyte</p>
                <h6>Telephone</h6>
                <p style="font-size: 13px;">(Insert numbers here)</p>
            </div>
        </div>
    </div>
</div>
<!--Standard Footer-->
<div id="gwt-standard-footer" style="margin-top: 30px"></div>

<div><a href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>
</a></div>

      </div><!-- off-canvas-content -->
    </div><!-- off-canvas-wrapper-inner -->
  </div><!-- off-canvas-wrapper -->

    <script type="text/javascript">
    (function(d, s, id) {
    var js, gjs = d.getElementById('gwt-standard-footer');

    js = d.createElement(s); js.id = id;
    js.src = "//gwhs.i.gov.ph/gwt-footer/footer.js";
    gjs.parentNode.insertBefore(js, gjs);
    }(document, 'script', 'gwt-footer-jsdk'));
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=681125882287520&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
<!--Standard Footer End-->
    <script src="{{ asset('js/angular-module/angular.min.js') }}"></script>
    <script src="{{ asset('js/angular-module/angular-sanitize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular-module/featured.js') }}"></script>

    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.min.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
      <script src="{{ asset('aos/aos.js') }}"></script>
      <script>
        AOS.init();
      </script>
   <script>
</body>
  
</html>
