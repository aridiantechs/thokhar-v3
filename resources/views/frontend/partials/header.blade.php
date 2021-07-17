<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Webpixels">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>
	    @isset($title)
	        {{ $title }} {{ ' | ' }}
	    @endif
	    {{ althraa_site_title() }}
	</title>
    <!-- Preloader -->
    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                document.querySelector('body').classList.add('loaded');
            }, 300);
        });
    </script>
    {{-- favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ althraa_favicon() }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" integrity="sha512-c93ifPoTvMdEJH/rKIcBx//AL1znq9+4/RmMGafI/vnTFe/dKwnn1uoeszE2zJBQTS1Ck5CqSBE+34ng2PthJg==" crossorigin="anonymous" />
    
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- <link href="//db.onlinewebfonts.com/c/7668f634eb4865a48f04d52ea3fb9b27?family=NeoSansArabic-Medium" rel="stylesheet" type="text/css"/> -->
    <!-- Quick CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/quick-website.css') }}" id="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/custom.css') }}" id="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/responsive.css') }}" id="stylesheet">