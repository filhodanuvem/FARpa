<?php

namespace FARpa\Helper;

class View
{
    public static function index()
    {
      return "<div id=\"fb-root\"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : ".F_APP_ID.",
            status     : true, 
            cookie     : true,
            xfbml      : true,
            oauth      : true,
          });
          
          FB.Event.subscribe('auth.login', function(response) {
            window.location.reload();
          });
        };

        (function(d){
           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = \"//connect.facebook.net/en_US/all.js\";
           d.getElementsByTagName('head')[0].appendChild(js);
         }(document));
      </script>
      <div class=\"fb-login-button\" data='user_photos'>Login with Facebook</div>";

    }
}
