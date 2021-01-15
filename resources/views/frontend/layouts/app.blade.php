@inject('request', 'Illuminate\Http\Request')

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.partials.header')
    @yield('styles')
    @if ($request->segment(1) == 'ar')
    <style type="text/css">
        body{direction:rtl;}
    </style>
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css"> --}}
    @endif
    <style type="text/css">
    	.button{
    		padding: 1.0rem 3.3rem !important;
    	    border: none !important;
    	}
        @if ($request->segment(1) == 'ar')
            body{
                direction: rtl !important;
            }
            
            .LIST__UL li:before {
                right: -42px !important;
                left: 0px !important;
            }
        @else
            body{
                direction: ltr !important;
            }

            .LIST__UL li:before {
                right: 0px !important;
                left: -42px !important;
            }
        @endif

        
    </style>
</head>
<body>

    <div class="header-bg">
        <div class="header-top-bg"></div>
        <div class="header-bottom-bg">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1920.216" height="835.843" viewBox="0 0 1920.216 835.843">
              <defs>
                <linearGradient id="linear-gradient" x1="0.5" y1="0.3" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                  <stop offset="0" stop-color="#ecfbff"/>
                  <stop offset="1" stop-color="#fff"/>
                </linearGradient>
              </defs>
              <g id="Group_335" data-name="Group 335" transform="translate(1888 1197) rotate(180)">
                <path id="Path_335" data-name="Path 335" d="M1618.441,961.657H815.052a42.989,42.989,0,0,1,22.9-12.16,27.242,27.242,0,0,1,8.745-1.448,27.654,27.654,0,0,1,15.732,5.009,44.915,44.915,0,0,1,10.165,6.9c6.461-10.419,16.948-17.2,28.795-17.191a30.449,30.449,0,0,1,8.645,1.259c4.023-17.764,17.876-30.862,34.331-30.848,10.417.015,19.774,5.269,26.263,13.629,1.914-3.932,5.531-6.583,9.692-6.583a10.05,10.05,0,0,1,6.519,2.477c3.184-15.309,12.332-27.888,24.4-34.178a37.612,37.612,0,0,1,35.123,0c11.852,6.184,20.874,18.422,24.208,33.36a10.5,10.5,0,0,1,8.339-4.4c4.364,0,8.135,2.932,9.967,7.2,6.358-7.038,14.936-11.355,24.389-11.342,11.655.015,21.974,6.591,28.44,16.736a49.02,49.02,0,0,1,23.479-6.031c.509.014,1.011.021,1.507.042,1.855-8.234,8.25-14.315,15.882-14.315a13.629,13.629,0,0,1,1.94.147,62.694,62.694,0,0,1,17.194-21.4,49.229,49.229,0,0,1,62.083,0,62.07,62.07,0,0,1,15.936,18.975,13.364,13.364,0,0,1,10.847-5.961,12.551,12.551,0,0,1,7.406,2.477,91.268,91.268,0,0,1,2.55-15.49c.084-.323.161-.644.252-.952,8.632-32.311,34.439-55.748,64.921-55.72a59.034,59.034,0,0,1,23.556,4.926c19.761,8.563,35.176,27.544,41.378,51.235a19.314,19.314,0,0,1,10.194-2.939c7.686,0,14.439,4.625,18.354,11.615,10.094-11.706,24-18.947,39.354-18.94,24.8.028,45.79,18.94,53.058,45.092a54.154,54.154,0,0,1,11.009-1.154c24.363,0,45.465,16.246,55.835,39.972" transform="translate(269.08 -441.634)" fill="#ecfbff"/>
                <path id="Path_336" data-name="Path 336" d="M10.784,967.716H1156a65.116,65.116,0,0,0-32.641-14.831,44.822,44.822,0,0,0-12.467-1.767,44.137,44.137,0,0,0-22.425,6.11,65.532,65.532,0,0,0-14.491,8.414,50.569,50.569,0,0,0-53.367-19.43,50.577,50.577,0,0,0-86.376-21,15.865,15.865,0,0,0-23.108-5.008,61.719,61.719,0,0,0-34.79-41.686,61.685,61.685,0,0,0-50.066,0A61.724,61.724,0,0,0,791.76,919.2a15.869,15.869,0,0,0-26.095,3.413,50.528,50.528,0,0,0-75.307,6.58,79.332,79.332,0,0,0-33.469-7.356c-.724.017-1.442.025-2.15.051a23.42,23.42,0,0,0-22.64-17.459,22.6,22.6,0,0,0-2.764.18,80.106,80.106,0,0,0-24.508-26.1,79.566,79.566,0,0,0-88.5,0,80.079,80.079,0,0,0-22.715,23.142,20.034,20.034,0,0,0-26.019-4.249,96.6,96.6,0,0,0-3.635-18.893c-.119-.392-.231-.785-.359-1.16a96.879,96.879,0,0,0-185.106.538,31.249,31.249,0,0,0-40.7,10.581,79.562,79.562,0,0,0-131.73,31.9,89.2,89.2,0,0,0-95.284,47.343" transform="translate(-43 -448.24)" fill="#ecfbff"/>
                <rect id="Rectangle_420" data-name="Rectangle 420" width="1920" height="681" transform="translate(-32 516)" fill="url(#linear-gradient)"/>
              </g>
            </svg>
        </div>
    </div>

    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
   


    @include('frontend.partials.navbar')

    @yield('content')

    @include('frontend.partials.footer_content')

    @include('frontend.partials.footer')

    @yield('scripts')


</body>
</html>