@extends('app.app')
@section('title-block')Головна @endsection
@section('content')
    <div class="spacer">
        <!--Contact Starts-->
        <div class="container contactform center">

            @if(session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="88" height="88" fill="green" class="bi bi-cart-check-fill center-block" viewBox="0 0 16 16">
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                </svg>
                <br><br>
                <div>
                    <h2>{{ session('success') }}</h2>
                </div>
            </div>
            @endif

            <h2 class="text-center  wowload fadeInUp">Якщо шукаєте інтересну дерев`яну штучку, то вам сюди!</h2>
            <div class="row wowload fadeInLeftBig">
                <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                    <select id="change-categories" class="form-control form-control-lg">
                        <option id="none">Категорії</option>
                        <?
                            $categories = DB::table('products')->select('category')->distinct()->get();
                            foreach ($categories as $categ) {
                        ?>
                        <option id="{{$categ->category}}">{{$categ->category}}</option>
                        <?
                            }
                        ?>
                    </select>
                    <br>
                    <input type="text" placeholder="Введіть будь ласка те що ви шукаєте" id="search-text">
                    <button class="btn btn-primary" id="search-button"><i class="fa fa-search"></i> Шукати</button>
                    <script>
                        var category = null;
                        let _token   = $('meta[name="csrf-token"]').attr('content');
                        $("#change-categories").change(function() {
                            category = $(this).val();
                        });
                        $(document).on("click","#search-button",function (){
                            $("#works").empty();
                            var text = $("#search-text").val();
                            $.ajax(
                                {
                                    type: "POST",
                                    url: "{{route('search-prod')}}",
                                    data:{ text:text, category:category, _token:_token },
                                    success: function(response)
                                    {
                                        if(response!="null"){
                                            $("#works").append(response);
                                        }else{
                                            $("#works").append("<h2 class=\"text-center  wowload fadeInUp animated\" style=\"visibility: visible; animation-name: fadeInUp; color: red;\">Нічого не знайдено!</h2>");
                                        }
                                    }
                                }
                            );
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!--Contact Ends-->
    <!-- prod -->
    <h2 class="text-center  wowload fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Товари:</h2>
    <div id="works"  class=" clearfix grid">
        <?
            $products = DB::table('products')->get();
            foreach ($products as $prod) {
        ?>
        <figure class="effect-oscar  wowload fadeInUp">
            @if($prod->img)
                <img src="{{asset('storage/'.$prod->img)}}" alt="img01"/>
            @else
                <img src="{{route('main')}}/images/none_image.png" alt="img01"/>
            @endif
            <figcaption>
                <h5 style="font-weight: bold">{{$prod->name}}</h5>
                <p>Ціна: {{$prod->price}} грн.<br>
                    <a href="{{asset('storage/'.$prod->img)}}" data-gallery>Глянути картинку</a></p>
                    <p><a href="{{route('prod',$prod->id)}}">Детальніше</a></p>
            </figcaption>
        </figure>
            <?
            }
            ?>
    </div>
    <br>
    <!-- prod Ends-->
@endsection
