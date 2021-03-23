@inject('request', 'Illuminate\Http\Request')




<style type="text/css">
/* {{ ($request->segment(1) == 'ar') ? '.slicknav_menu { text-align: right !important}' : '' }} */

</style>



<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <!-- Brand -->
       
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <a class="navbar-brand ml-5" href="{{ route('/', locale()) }}">
            <img alt="Image placeholder" src="{{ althraa_logo() }}" id="navbar-logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            

            <ul class="navbar-nav mt-lg-0 {!! ($request->segment(1) == 'ar') ? 'ml' : 'mr' !!}-auto " style="direction: {{ $align3letter }};">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/', locale()) }}" role="button" >{{ trans('lang.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about', locale()) }}" role="button" >{{ trans('lang.site_menu.about_us') }}</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('legal', locale()) }}" role="button" >{{ trans('lang.site_menu.legal') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact', locale()) }}" role="button" >{{ trans('lang.site_menu.contact') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('career.index', locale()) }}" role="button" >{{ trans('lang.site_menu.careers') }}</a>
                </li>
                @auth
                    @if (auth()->user()->two_factor_code)
                    
                    @else
                    {{-- <li class="auth_resp">
                        <a class="login_link" href="{{ route('home', locale()) }}">{{ trans('lang.dashboard.dashboard') }}</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout', locale()) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    
                        {{ trans('lang.logout') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout', locale()) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                @else
                    
                    <li class="nav-item">
                        <a class="nav-link {{ ($request->segment(2) == 'login') ? 'active' : '' }}" href="{{ route('login', locale()) }}">{{ trans('lang.login') }}</a>
                    </li>
                @endauth
            </ul>
            <ul class="nav nav-social-icons">
                
                {{-- <li class="nav-item">
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
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link twitter-a" href="https://twitter.com/thokhor1" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    @switch($request->segment(1))
                      @case('ar')
                          @foreach (config('app.available_locales') as $locale)
                            <a class="nav-link facebook-a"
                               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (locale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                
                            </a>
                            @break
                          @endforeach
                      @break    
                      @case('en')
                          @foreach (config('app.available_locales') as $key => $locale)
                              @if($key == 1)
                                <a class="nav-link facebook-a"
                                   href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                    @if (locale() == $locale) style="font-weight: bold;" @endif>
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
             
            <!-- Mobile button -->
            <div class="d-lg-none text-center">
                <a href="#" class="btn btn-primary btn-block btn-sm btn-warning">EN</a>
            </div>

        </div>


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



                                    @switch($request->segment(1))
                                      @case('ar')
                                          @foreach (config('app.available_locales') as $locale)
                                            <a class="nav-link"
                                               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                                @if (locale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                                
                                            </a>
                                            @break
                                          @endforeach
                                      @break    
                                      @case('en')
                                          @foreach (config('app.available_locales') as $key => $locale)
                                              @if($key == 1)
                                                <a class="nav-link"
                                                   href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                                    @if (locale() == $locale) style="font-weight: bold;" @endif>
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

                          </div>
                      </div>
                      <div class="col-6 d-flex align-items-center justify-content-end">
                            <a class="navbar-brand ml-5" href="{{ route('/', locale()) }}">

                                  <img alt="Image placeholder" src="{{ althraa_logo() }}" class="img img-fluid" id="navbar-logo">
                              </a>

                      </div>
                  </div>
              </div>  
         
              <ul class="navbar-nav mt-lg-0 modal-nav ml-auto " style="direction: rtl;">
                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('/', locale()) }}" role="button" >{{ trans('lang.home') }}</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('about', locale()) }}" role="button" >{{ trans('lang.site_menu.about_us') }}</a>                      
                  </li>

                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('legal', locale()) }}" role="button" >{{ trans('lang.site_menu.legal') }}</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('contact', locale()) }}" role="button" >{{ trans('lang.site_menu.contact') }}</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link nav-link-modal" href="{{ route('career.index', locale()) }}" role="button" >{{ trans('lang.site_menu.careers') }}</a>
                  </li>
              </ul>

              <div class="text-center mt-0 mt-md-5">
                  <button type="button" class=" btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary text-center mt-3">
                      <span class="d-inline-block font-arabic">{{ trans('lang.Start Now') }}</span>
                  </button>
              </div>


              <div class="m-auto">
                  <ul class="nav nav-social-icons nav-modal-icons">
                      {{-- <li class="nav-item">
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
                      </li> --}}
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