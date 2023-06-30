@extends('main')

@section('title', 'Спасибо')


@section('content')

   <div class="thank-you-section" style="height: 500px; text-align: center; margin-top: 120px;">
       <h1>Спасибо за заказ</h1>
       <p>Ожидайте звонка в течении 30 минут</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" style="all:unset;" class="button btn btn-button checkout-btn">На Главную</a>
       </div>
   </div>




@endsection
