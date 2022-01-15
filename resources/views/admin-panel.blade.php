@extends('app.admin-cap')
@section('title-block')Адмін панель @endsection
@section('content')

    @if(session('success'))
        <div class="alert alert-success mt-5">
            {{ session('success') }}
        </div>
    @endif

    <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand"><div class=""></div></div>
        <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Замовлення</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">id товару</th>
                <th scope="col">ПІБ Клієнта</th>
                <th scope="col">Місто</th>
                <th scope="col">Адреса</th>
                <th scope="col">Телефон</th>
                <th scope="col">Відділення нової пошти або поштовий індекс</th>
                <th scope="col">Електронна адреса</th>
                <th scope="col">Дата замовлення</th>
                <th scope="col">Дія</th>
            </tr>
            </thead>
            <tbody>
            <?
                $orders = DB::table('orders')->get();
                foreach ($orders as $order) {
            ?>
            <tr @if($order->mark==1) class="table-info" @else class="table-dark" @endif>
                <th scope="row">{{$order->id}}</th>
                <td><a href="{{route('prod',$order->prod_id)}}" target="_blank">{{$order->prod_id}}</a></td>
                <td>{{$order->pib}}</td>
                <td>{{$order->city}}</td>
                <td>{{$order->adress}}</td>
                <td>{{$order->tel}}</td>
                <td>{{$order->zip_code}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Зробити дію
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#MarkExecuting" id="{{$order->id}}">Позначити як в процесі виконання</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditProd">Позначити як виконане</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#DeleteModal" id="{{$order->id}}">Скасувати замовлення</a></li>
                    </ul>
                </td>
            </tr>
            <?
                }
            ?>
            </tbody>
        </table>
    </div>
    <!-- MarkExecuting Modal -->
    <div class="modal fade" id="MarkExecuting" tabindex="-1" aria-labelledby="MarkExecuting-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MarkExecuting-title">Позначити замовлення по id: як в процесі виконання</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ви дійсно хочете зробити це ?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('admin.mark-execution-order')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відмінити</button>
                        <button type="submit" class="btn btn-primary">Позначити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var MarkExecutingModal = document.getElementById('MarkExecuting')
        MarkExecutingModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var id = button.getAttribute('id')
            var idElement = MarkExecutingModal.querySelector('#id')
            idElement.value = id
            var modalTitle = MarkExecutingModal.querySelector('.modal-title')
            modalTitle.textContent = 'Позначити замовлення по id: '+id+' як в процесі виконання'
        })
    </script>
    <!-- End MarkExecuting Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModal-title">Видалення замовлення по id</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ви дійсно хочете зробити це ?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('admin.delete-order')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відмінити</button>
                        <button type="submit" class="btn btn-primary">Видалити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var deleteModal = document.getElementById('DeleteModal')
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var id = button.getAttribute('id')
            var idElement = deleteModal.querySelector('#id')
            idElement.value = id
            var modalTitle = deleteModal.querySelector('.modal-title')
            modalTitle.textContent = 'Видалення замовлення по id: ' + id
        })
    </script>
    <!-- End Delete Modal -->
@endsection
