@extends('app.app')
@section('title-block')Сторінка із товаром @endsection
@section('content')
    <? $item = DB::table('products')->where('id', $id)->first();?>
    <br>
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
            <h4>{{$item->name}}</h4>
            <p>Ціна: {{$item->price}} грн.</p>
            <p>{{$item->description}}</p>
            <div class="scroll animated fadeInUp"><a href="{{route('order-prod',$item->id)}}" class="btn btn-default"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>  Купити</a></div>
        </div>
    </div>
    <br>

@endsection
