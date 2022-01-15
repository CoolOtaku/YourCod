@extends('app.app')
@section('title-block')Оформити замовлення @endsection
@section('content')
    <? $item = DB::table('products')->where('id', $id)->first();?>
    <h2 class="text-center  wowload fadeInUp">Вкажіть деякі дані для замовлення на товар: {{$item->name}}</h2>
    <div class="row grid team  wowload fadeInUpBig">
        <div class=" col-sm-3 col-xs-6">
            <figure class="effect-chico">
                @if($item->img)
                    <img src="{{asset('storage/'.$item->img)}}" alt="img01" class="img-responsive" />
                @else
                    <img src="{{route('main')}}/images/none_image.png" alt="img01" class="img-responsive"/>
                @endif
                <figcaption>
                    <p><b>{{$item->name}}</b><br>Ціна: {{$item->price}} грн.<br><br></p>
                </figcaption>
            </figure>
        </div>
        <div class="col-sm-6 wowload fadeInLeft">
            <!--Contact Starts-->
            <div class="contactform center">
               <div class="col-sm-6 col-sm-offset-3 col-xs-12">
               <form method="POST" action="{{route('buy-prod')}}">
                   @csrf
                   <input type="hidden" name="id" value="{{$item->id}}">
                    <label for="#pib">Прізвище Ім`я По батькові:</label>
                    <input type="text" name="pib" id="pib" placeholder="ПІБ">
                    <label for="#city">Місто:</label>
                    <input type="text" name="city" id="city" placeholder="Місто">
                    <label for="#adress">Адреса:</label>
                    <input type="text" name="adress" id="adress" placeholder="Адреса">
                    <label for="#tel">Телефон:</label>
                    <input id="tel" name="tel" type="tel"
                          placeholder="+380" minlength="10" maxlength="13">
                    <label for="#zip_code">Відділення нової пошти або поштовий індекс:</label>
                    <input type="text" name="zip_code" id="zip_code" placeholder="Відділення або індекс">
                    <label for="email">Електронна адреса:</label>
                    <input type="email" id="email" name="email" placeholder="Електронна адреса (не обов`язково)">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Заказати</button>
               </form>
               </div>
            </div>
            <!--Contact Ends-->
        </div>
    </div>
    <br>

@endsection
