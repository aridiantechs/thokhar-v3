@inject('request', 'Illuminate\Http\Request')

<footer class="position-relative" id="footer-main">
        <div class="footer footer-dark bg-dark">
           
            <div class="container">
             
                <!-- <hr class="divider divider-fade divider-dark my-4"> -->
                <div class="row pb-4 pt-3">
                    
                    <div class="col-md-6 d-none d-lg-block">
                        <ul class="nav mt-3 mt-md-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact', locale()) }}">
                                    {{ trans('lang.site_menu.contact') }}
                                </a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="{{ route('legal', locale()) }}">
                                    {{ trans('lang.site_menu.legal') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about', locale()) }}">
                                    {{ trans('lang.site_menu.about_us') }}
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('/', locale()) }}">
                                    {{ trans('lang.home') }}
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="copyright text-sm  text-lg-{{ $alignreverse }} text-center">
                            <a href="#" class="" target="_blank">Thokhor.com</a> © {{ date('Y') }} .جميع الحقوق محفوظة
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </footer>
    
</footer>
