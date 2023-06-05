<!doctype html>
<html lang="en">
<head>
  <meta name="google-site-verification" content="{{setting('site.google-site-verification')}}" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="{{setting('site.description')}}">
  <meta name="keywords" content="{{ setting('site.keywords')}}">
  <meta name="author" content="Difraxion">
  <meta name="robots" content="all">
  <meta name="geo.region" content="MX-GUA">
  <meta name="geo.placename" content="México">
  <meta name="DC.title" content="{{setting('site.title')}}">
  <meta property="og:image:alt" content="{{setting('site.title')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta property="og:type" content="website">
  <meta property="og:title" content="{{setting('site.title')}}">
  <meta property="og:description" content="{{setting('site.description')}}">
  <meta property="og:image" content="{{asset('storage/' . setting('site.logo'))}}">
  <meta property="og:image:alt" content="{{setting('site.title')}}">
  <meta property="og:site_name" content="{{setting('site.nombre')}}">
  <meta property="og:url" content="{{setting('site.url')}}">
  <meta name="twitter:title" content="{{setting('site.title')}}">
  <meta name="twitter:description" content="{{setting('site.description')}}">
  <meta name="twitter:image" content="{{asset('storage/' . setting('site.logo'))}}">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright (c) 2017">
  @include('partials.assets')
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('images/favicon.png')}}'/>
  <title> {{setting('site.title')}} - @yield('title') {{ setting('site.keywords')}}</title>
  <!--
  Este sitio ha sido desarrollado por Difraxion Group.
  Tel. +52 01 (477) 198 09 65
  E-mail: ventas@reed.com.mx
  www.difraxion.com
  León, Guanajuato
-->
<!-- analytics de google -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{setting('site.google_analytics_tracking_id')}}"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', '{{setting('site.google_analytics_tracking_id')}}');
</script>
<!-- GetButton.io widget -->
<script type="text/javascript">
(function () {
  var options = {
    facebook: "{{setting('site.facebookid')}}", // Facebook page ID
    whatsapp: "{{setting('site.whatsapp')}}", // WhatsApp number
    call_to_action: "", // Call to action
    button_color: "#FF318E", // Color of button
    position: "right", // Position may be 'right' or 'left'
    order: "facebook,whatsapp", // Order of buttons
  };
  var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
  s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
  var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
</script>
<!-- /GetButton.io widget -->
<script src="http://maps.google.com/maps/api/js"></script>
<script src="{{asset('js/gmaps.js')}}"></script>
</head>
<body>
  <div id="app">
    @yield('content')
    <footer>
      @include('partials.footer')
    </footer>
  </div>
  @include('partials.scripts')

  <!-- This is the modal -->
  <div id="modal-search" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <form class="uk-search uk-search-large">
        <span uk-search-icon></span>
        <input class="uk-search-input" type="search" placeholder="Buscar...">
      </form>
    </div>
  </div>
</body>
</html>
