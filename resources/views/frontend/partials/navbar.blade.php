@inject('request', 'Illuminate\Http\Request')




<style type="text/css">
{{-- {{ ($request->segment(1) == 'ar') ? '.slicknav_menu { text-align: right !important}' : '' }} --}}

</style>
{{-- <div class="header-area ">
    <div id="sticky-header" class="main-header-area">
        <div class="container-fluid p-2">
            <div class="row align-items-center no-gutters">
                <div class="col-xl-5 col-lg-6 {{ ($request->segment(5) == 'ar') ? 'order-md-3' : '' }}">
                    <div class="main-menu  d-none d-lg-block">
                        <nav>
                            <ul id="navigation" class="{{ ($request->segment(1) == 'ar') ? 'rtl_structure text-right' : '' }}">
                                
                                <li>
                                    <a class="{{ ($request->segment(2) == 'contact') ? 'active' : '' }}" href="{{ route('contact', app()->getLocale()) }}">{{ trans('lang.site_menu.contact') }}</a>
                                </li>

                                <li>
                                    <a class="{{ ($request->segment(2) == 'about') ? 'active' : '' }}" href="{{ route('about', app()->getLocale()) }}">{{ trans('lang.site_menu.about_us') }}</a>
                                </li>

                                <li>
                                    <a class="{{ ($request->segment(2) == 'legal') ? 'active' : '' }}" href="{{ route('legal', app()->getLocale()) }}">{{ trans('lang.site_menu.legal') }}</a>
                                </li>

                                @auth
                                  @if (auth()->user()->two_factor_code)
                                    
                                  @else
                                    <li class="auth_resp">
                                      <a class="login_link" href="{{ route('home', app()->getLocale()) }}">{{ trans('lang.dashboard.dashboard') }}</a>
                                    </li>

                                    <li class="auth_resp">
                                      <a class="login_link" href="{{ route('logout', app()->getLocale()) }}"
                                      onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                   
                                        {{ trans('lang.logout') }}
                                      </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                      @csrf
                                    </form>
                                  @endif
                                @else
                                    
                                  <li class="auth_resp">
                                      <a class="{{ ($request->segment(2) == 'login') ? 'active' : '' }}" href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.login') }}</a>
                                  </li>
                                @endauth

                                @switch($request->segment(1))
                                    @case('ar')
                                        @foreach (config('app.available_locales') as $locale)
                                          <a class="button_primary lang_btn auth_resp text-white"
                                             style="margin-bottom: 10px;" 
                                             href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                              @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                              
                                          </a>
                                          @break
                                        @endforeach
                                    @break    
                                    @case('en')
                                        @foreach (config('app.available_locales') as $key => $locale)
                                            @if($key == 1)
                                              <a class="button_primary lang_btn auth_resp text-white"
                                                 style="margin-bottom: 10px;" 
                                                 href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                                  @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>
                                                  {{ trans('lang.language') }}
                                                  
                                              </a>
                                            @endif
                                        @endforeach
                                    @break    
                                    @default
                                        {{ $request->segment(1) }}
                                    @break
                                @endswitch
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 {{ ($request->segment(5) == 'ar') ? 'order-md-2' : '' }}">
                    <div class="logo-img">
                        <a href="{{ route('/', app()->getLocale()) }}">
                            <img
                                class="logo__img img-responsive"
                                src="{{ althraa_logo() }}"
                                alt="Althraa Logo"
                              />
                        </a>
                    </div>
                </div>
                <div 
                    class="col-xl-5 col-lg-4 d-none d-lg-block {{ ($request->segment(5) == 'ar') ? 'order-md-1 rtl_structure_left' : '' }}" 
                    style="{{ ($request->segment(5) == 'ar') ? 'display: flex !important' : '' }}"
                    >
                    <div class="book_room">
                        
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                @if (auth()->user()->two_factor_code)
                                    <a class="login_link" href="{{ route('verify.index', app()->getLocale()) }}">
                                        {{ trans('lang.frontend.verify') }}
                                    </a>
                                @else
                                    <a class="login_link" href="{{ route('home', app()->getLocale()) }}">{{ trans('lang.dashboard.dashboard') }}</a>


                                    <a class="login_link" href="{{ route('logout', app()->getLocale()) }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                   
                                      {{ trans('lang.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                      @csrf
                                    </form>
                                @endif
                                  
                                @else
                                    <a class="login_link" href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.login') }}</a>
                                @endauth

                                
                                
                            </div>
                        @endif
                        @switch($request->segment(1))
                            @case('ar')
                                @foreach (config('app.available_locales') as $locale)
                                  <a class="button_primary lang_btn"
                                     href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                      @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                      
                                  </a>
                                  @break
                                @endforeach
                            @break    
                            @case('en')
                                @foreach (config('app.available_locales') as $key => $locale)
                                    @if($key == 1)
                                      <a class="button_primary lang_btn"
                                         href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                          @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>
                                          {{ trans('lang.language') }}
                                      </a>
                                    @endif
                                @endforeach
                            @break    
                            @default
                                {{ $request->segment(1) }}
                            @break
                        @endswitch
                        
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <!-- Brand -->
       
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

             <ul class="nav nav-social-icons">
                
                <li class="nav-item">
                    <a class="nav-link instagram-a" href="#" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link facebook-a" href="#" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link snapchat-a" href="#" target="_blank">
                        <i class="fab fa-snapchat"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link twitter-a" href="#" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    @switch($request->segment(1))
                      @case('ar')
                          @foreach (config('app.available_locales') as $locale)
                            <a class="nav-link facebook-a"
                               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                
                            </a>
                            @break
                          @endforeach
                      @break    
                      @case('en')
                          @foreach (config('app.available_locales') as $key => $locale)
                              @if($key == 1)
                                <a class="nav-link facebook-a"
                                   href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                    @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>
                                    {{ trans('lang.language') }}
                                </a>
                              @endif
                          @endforeach
                      @break    
                      @default
                          {{ $request->segment(1) }}
                      @break
                    @endswitch
                </li>
               
            </ul>

            <ul class="navbar-nav mt-lg-0 ml-auto " style="direction: rtl;">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" >عن الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about', app()->getLocale()) }}" role="button" >عن ذخر</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('legal', app()->getLocale()) }}" role="button" >الإفصاح القانوني</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact', app()->getLocale()) }}" role="button" >اتصل بنا</a>
                </li>
            </ul>
             
            <!-- Mobile button -->
            <div class="d-lg-none text-center">
                <a href="#" class="btn btn-primary btn-block btn-sm btn-warning">EN</a>
            </div>

        </div>


         <a class="navbar-brand ml-5" href="{{ route('/', app()->getLocale()) }}">

            <img alt="Image placeholder" src="{{ althraa_logo() }}" id="navbar-logo">
        </a>

    </div>
</nav>




<div class="modal fade modal-new" id="modal-nav" tabindex="-1" role="dialog" aria-labelledby="modal__2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-new text-center">
          <div class="modal-content-new">
              <div class="div">
                  <div class="row mb-5">
                      <div class="col-6 d-flex align-items-center">
                          <div class="d-flex align-items-center">
                              <a href="#" data-dismiss="modal">
                                  <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="01BAEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x color__2 w-30px"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                  </span>
                              </a>

                              <ul class="nav nav-social-icons nav-modal-icons mt-0 ml-3">
                                  <li class="nav-item">
                                      <a class="nav-link" href="#" target="_blank">
                                          EN
                                      </a>
                                  </li>
                                  
                              </ul>

                          </div>
                      </div>
                      <div class="col-6 d-flex align-items-center justify-content-end">
                            <a class="navbar-brand ml-5" href="{{ route('/', app()->getLocale()) }}">

                                  <img alt="Image placeholder" src="{{ althraa_logo() }}" class="img img-fluid" id="navbar-logo">
                              </a>

                      </div>
                  </div>
              </div>  
         
              <ul class="navbar-nav mt-lg-0 modal-nav ml-auto " style="direction: rtl;">
                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="#" role="button" >الرئيسية      </a>
                  </li>
                  <li class="nav-item">
                      
                      <a class="nav-link nav-link-modal" href="{{ route('about', app()->getLocale()) }}" role="button" >عن ذخر</a>
                      
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('legal', app()->getLocale()) }}" role="button" >الإفصاح القانوني</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('contact', app()->getLocale()) }}" role="button" >اتصل بنا</a>
                  </li>
              </ul>

              <div class="text-center mt-0 mt-md-5">
                  <button type="button" class=" btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary text-center mt-3">
                      <span class="d-inline-block font-arabic">ابدأ الآن بدون مقابل</span>
                  </button>
              </div>


              <div class="m-auto">
                  <ul class="nav nav-social-icons nav-modal-icons">
                      <li class="nav-item">
                          <a class="nav-link instagram-a" href="#" target="_blank">
                              <i class="fab fa-instagram"></i>
                          </a>
                      </li>
                       <li class="nav-item">
                          <a class="nav-link facebook-a" href="#" target="_blank">
                              <i class="fab fa-facebook-f"></i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link snapchat-a" href="#" target="_blank">
                              <i class="fab fa-snapchat"></i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link twitter-a" href="#" target="_blank">
                              <i class="fab fa-twitter"></i>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>