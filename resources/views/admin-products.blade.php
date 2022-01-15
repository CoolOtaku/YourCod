@extends('app.admin-cap')
@section('title-block')Товари @endsection
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
        <h1 class="h2">Товари</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#AddModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                    Додати новий товар</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Картинка</th>
            <th scope="col">Назва</th>
            <th scope="col">Ціна (грн)</th>
            <th scope="col">Опис</th>
            <th scope="col">Категорія</th>
            <th scope="col">Дія</th>
        </tr>
        </thead>
        <tbody>
        <?
            $products = DB::table('products')->get();
            foreach ($products as $prod) {
        ?>
        <tr class="table-dark">
            <th scope="row">{{$prod->id}}</th>
            <td>
                @if($prod->img)
                    <img src="{{asset('storage/'.$prod->img)}}" width="100px">
                @else
                    <img src="{{route('main')}}/images/none_image.png" width="100px"/>
                @endif
            </td>
            <td>{{$prod->name}}</td>
            <td>{{$prod->price}}</td>
            <td>{{$prod->description}}</td>
            <td>{{$prod->category}}</td>
            <td>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Зробити дію
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditProd" data-bs-whatever="{{json_encode($prod)}}">Редагувати</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#DeleteModal" name="{{$prod->name}}" id="{{$prod->id}}">Видалити</a></li>
                </ul>
            </td>
        </tr>
        <?
            }
        ?>
        </tbody>
    </table>
    </div>
    <!-- Add Modal-->
    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddModal-title">Новий товар</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('admin.add-new-prod')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="img">Картинка:</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Назва товару:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="col-form-label">Ціна товару:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="col-form-label">Категорія товару:</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Опис:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                            <button type="submit" class="btn btn-primary">Додати</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Modal-->
    <!-- Edit Modal-->
    <div class="modal fade" id="EditProd" tabindex="-1" aria-labelledby="EditProd-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditProd-title">Редагувати товар</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('admin.edit-prod')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3">
                            <label class="form-label" for="img">Картинка:</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Назва товару:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="col-form-label">Ціна товару:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="col-form-label">Категорія товару:</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Опис:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var exampleModal = document.getElementById('EditProd')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            var mydata = JSON.parse(recipient);

            var id = exampleModal.querySelector('#id')
            var modalTitle = exampleModal.querySelector('.modal-title')
            var name = exampleModal.querySelector('#name')
            var price = exampleModal.querySelector('#price')
            var category = exampleModal.querySelector('#category')
            var description = exampleModal.querySelector('#description')

            id.value = mydata.id
            modalTitle.textContent = 'Редагування товару: ' + mydata.name
            name.value = mydata.name
            price.value = mydata.price
            category.value = mydata.category
            description.value = mydata.description
        })
    </script>
    <!-- End Edit Modal-->
    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModal-title">Видалення товару</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ви дійсно хочете видалити цей товар ?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('admin.delete-prod')}}" enctype="multipart/form-data">
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
            var name = button.getAttribute('name')
            var idElement = deleteModal.querySelector('#id')
            idElement.value = id
            var modalTitle = deleteModal.querySelector('.modal-title')
            modalTitle.textContent = 'Видалення товару: ' + name
        })
    </script>
    <!-- End Delete Modal -->
@endsection
