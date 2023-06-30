@extends('main')

@section('title', 'Контакты')
<style>
    .single-contact-info {
        margin-bottom: 40px;
    }
</style>
@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Контакты</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="index.html">Главная</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb_item active">Контакты</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
        <!-- shopping-cart-area start -->
        <div class="contact-area ptb-100" style="margin: 60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-map-wrapper">
                            <div class="contact-map mb-40">
                                <iframe src="https://yandex.kz/map-widget/v1/?z=12&ol=biz&oid=222707117511" width="400" height="400" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-wrapper">
                            <div class="contact-title">
                                <h4 style="margin: 40px 0;">Контакты г. Алматы</h4>
                            </div>
                            <div class="contact-info">
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><strong>Адрес: </strong>Казахстан, Алматы ул.Есенберлина 155</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-text">
                                        <p><strong>Email:</strong> <a href="mailto:info@ecofire.kz">info@ecofire.kz</a></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-text">
                                        <p><strong>Мобильный: </strong>
                                        <p><a href="tel:+77014827448">+7 701 482 7448</a></p>
                                        <p><a href="tel:+77074554150">+7 707 455 4150</a></p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="contact-area ptb-100" style="margin: 60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-map-wrapper">
                            <div class="contact-map mb-40">
                            <div id="map" style="width:400px; height:400px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-wrapper">
                            <div class="contact-title">
                                <h4 style="margin: 40px 0;">Контакты г. Актау</h4>
                            </div>
                            <div class="contact-info">
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><strong>Адрес: </strong>Казахстан, Актау 15мкр жк Оазис студия мебели VERNO</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-text">
                                        <p><strong>Email:</strong> <a href="mailto:l.berdnikova191085@gmail.com">l.berdnikova191085@gmail.com</a></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-text">
                                        <p><strong>Мобильный: </strong>
                                        <p><a href="tel:+77774217718">+7777 421 77 18</a></p>
                                                      
                                            <a href="https://wa.me/77774217718?text=Здравствуйте%20интересует%20ваш%20Биокамин"><img class="icon-whatsapp" src="https://static.whatsapp.net/rsrc.php/yz/r/lOol7j-zq4u.svg"><br>WhatsApp</a>   
                                         
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- 2gis map -->
        <!-- <script type="text/javascript">
            var map;

            DG.then(function () {
                map = DG.map('map', {
                    center: [43.669429, 51.133702],
                    zoom: 16
                });

                DG.marker([43.669429, 51.133702]).addTo(map).bindPopup('Вы кликнули по мне!');
            });
        </script> -->
   <!--end 2gis map -->     

        <script data-b24-form="inline/3/qopnby" data-skip-moving="true">
(function(w,d,u){
var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
})(window,document,'https://cdn-ru.bitrix24.ru/b20732200/crm/form/loader_3.js');
</script>

@endsection
