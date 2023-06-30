<!doctype html>
<html class="no-js" lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Биокамины в Казахстане Ecofire - по выгодным ценам </title>
	<meta name="description" content="Биокамин купить казахстан">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="yandex-verification" content="68a5715533f3af55" />

	

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/plugins.css">
	<link rel="stylesheet" href="../style.css">
	<!-- <link rel="stylesheet" href="../css/lightbox.min.css"> -->
	<link rel="shortcut icon" href="/images/logo/logo.png">

	<link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}" type="text/css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="../css/custom.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-183287261-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-183287261-1');
</script>

	<script src="../js/lightbox.min.js"></script>
	<!-- Modernizer js -->
	<script src="../js/vendor/modernizr-3.5.0.min.js"></script>
	<style>
		.logo img {
			width: 147px;
			height: 80px;
			object-fit: scale-down;
		}
	</style>
</head>
<body>
<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
	

	    @include('partials.nav')

	    @yield('content')
		
	    @include('partials.footer')
	</div>

	<!-- chat -->
<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16928414/crm/site_button/loader_1_weva4k.js');
</script>
<!-- end chat -->

<!-- whatsApp -->
<div class="nav-bottom">      
	<div class="popup-whatsapp fadeIn">           
		<!-- <div class="content-whatsapp -top"></div> -->
       
<button>               
</div>
<a href="https://wa.me/77074554150?text=Здравствуйте%20интересует%20ваш%20Биокамин"><img class="icon-whatsapp" src="https://static.whatsapp.net/rsrc.php/yz/r/lOol7j-zq4u.svg"><br>WhatsApp</a>   
</button>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       
</div>
<!-- end whatsApp -->
	


			<!-- JS Files -->
	<script src="../js/vendor/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/plugins.js"></script>
	<script src="{{asset('js/active.js')}}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>
		var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
  }
};

$(function () {
  var Loader = {
      $button: $('.shot__byselect')
  }

  Loader.$button.on('change', function (e) {
      e.preventDefault();

      var _categor = getUrlParameter('category');
var _sort = this.value;

      /*$.ajax({
          method: 'GET',
          //url: window.location.pathname + '?category='+_categor+'&sort='+_sort,
url: '/backend/api?category=' +_categor + '&sort='+_sort,
          success: function (response) {
              //console.log(response);
  $('#select-res').html(response);

          }
      })*/

$('#select-res').load('?category='+_categor +'&sort='+_sort + ' #select-res');
$('#select-result').load('?category='+_categor +'&sort='+_sort + ' #select-result');
// window.location.href = '?category=' + _categor + '&sort=' + _sort;

  });
});
	</script>

<!-- <script src="../js/snowfall.js"></script>
<script type="text/javascript">
//    $(document).snowfall();
   $(document).snowfall({image :"/images/snow3.png", minSize: 10, maxSize:20});
</script> -->

<script>
(function(d, s, id) {
		var js, kjs;
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://kaspi.kz/kaspibutton/widget/ks-wi_ext.js';
		kjs = document.getElementsByTagName(s)[0]
		kjs.parentNode.insertBefore(js, kjs);
	}(document, 'script', 'KS-Widget'));
</script>
<script>
    setTimeout(function () {
        document.getElementById('dynamic').innerHTML = '<div class="ks-widget" data-template="button" data-merchant-sku="ВБТ-900" data-merchant-code="9813024" data-city="750000000" ></div>'
    // you should run this method to recheck buttons in DOM:
    ksWidgetInitializer.reinit()
    }, 1000);
</script>
    
</body>
</html>
