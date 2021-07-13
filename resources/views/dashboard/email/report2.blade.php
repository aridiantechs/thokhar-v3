
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Georgia, Times, serif;width: 100%;background-color: #ffffff;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse;">

    <table width="600" height="150" border="0" cellpadding="0" cellspacing="0" align="center" class="border-lr deviceWidth" bgcolor="#ffffff" style="border-collapse: collapse;border-left: 1px solid #dadada;border-right: 1px solid #dadada;">
      <tr>
        <td align="center">
         <img src="{{ asset('backend_assets/site_assets/images/logo/20210604_113542am_20200320_101631am_dokhor.png') }}" style="margin: auto;border: none;display: block;">
         <h3 id="banner-txt" style="margin: 20px;color: #000000;padding: 15px 32px 0px 32px;font-family: arial;font-size: 13px;text-align: center;">{{ trans('lang.frontend.slider_heading') }}</h3>
         
        </td>
      </tr>
      <tr>
        <td align="center">
          
            <table style="border-collapse: collapse;">
              <tbody>
                <tr>
                  <td>
                    <a href="{{ route('download', ['q'=&gt; $data['public_id'], 'en']) }}" class="btn-left btn f-left btn-big btn-gradient btn-rad35 btn-primary with-arrow stick_to_bottom" style="left: 15px;text-decoration: none;">
                      <span class="d-inline-block p-0-1 download-btn" style="padding: 15px;background: #0ac0d8;color: #fff;text-decoration: none;width: 170px;">Download report in English</span>
                    </a>
                  </td>
                  <td>
                    <a href="{{ route('download', ['q'=&gt; $data['public_id'], 'ar']) }}" class="btn-right btn f-right btn-big btn-gradient btn-rad35 btn-primary with-arrow stick_to_bottom" style="right: 15px;text-decoration: none;">
                      <span class="d-inline-block p-0-1 download-btn" style="padding: 15px;background: #0ac0d8;color: #fff;text-decoration: none;width: 170px;">حمل التقرير بالعربي</span>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>

        </td>
      </tr>

    </table>

  </table>
  <br>
  <br>
</body>
