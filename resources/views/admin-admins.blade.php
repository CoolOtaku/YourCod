@extends('app.admin-cap')
@section('title-block')Адміністратори @endsection
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
        <h1 class="h2">Адміністратори</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.register') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                    Зареєструвати нового адміністратора</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Аватар</th>
            <th scope="col">Ім'я</th>
            <th scope="col">Електронна адреса</th>
            <th scope="col">Створено</th>
            <th scope="col">Оновлено</th>
            <th scope="col">Дія</th>
        </tr>
        </thead>
        <tbody>
        <?
        $users = DB::table('users')->get();
        foreach ($users as $user) {
        ?>
        <tr class="table-dark">
            <th scope="row">{{$user->id}}</th>
            <td>
                @if($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" style="float: left" width="100px">
                @else
                    <img src="{{route('main')}}/images/admin.png" width="100px"/>
                @endif
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>
                @if(Auth::user()->email!="ericspz531@gmail.com"&&$user->email=="ericspz531@gmail.com")
                @else
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Зробити дію
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditAdmin" data-bs-whatever="{{json_encode($user)}}">Редагувати</a></li>
                        @if($user->email!="ericspz531@gmail.com")
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#DeleteModal" name="{{$user->name}}" id="{{$user->id}}">Видалити</a></li>
                        @endif
                    </ul>
                @endif
            </td>
        </tr>
        <?
        }
        ?>
        </tbody>
    </table>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="EditAdmin" tabindex="-1" aria-labelledby="EditAdmin-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditAdmin-title">Редагування даних адміністратора</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('admin.edit-admin')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3">
                            <label class="form-label" for="avatar">Аватар:</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Ім`я:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Електронна адреса:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <h6>Зміна пароля:</h6>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Новий пароль:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Підтвердіть пароль:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" value="{{old('password_confirmation')}}">
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
        var exampleModal = document.getElementById('EditAdmin')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            var mydata = JSON.parse(recipient);

            var id = exampleModal.querySelector('#id')
            var modalTitle = exampleModal.querySelector('.modal-title')
            var name = exampleModal.querySelector('#name')
            var email = exampleModal.querySelector('#email')

            id.value = mydata.id
            modalTitle.textContent = 'Редагування даних адміністратора: ' + mydata.name
            name.value = mydata.name
            email.value = mydata.email
        })
    </script>
    <!-- End Edit Modal-->
    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModal-title">Видалення адміністратора</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ви дійсно хочете зробити це ?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('admin.delete-admin')}}" enctype="multipart/form-data">
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
            modalTitle.textContent = 'Видалення адміністратора: ' + name
        })
    </script>
    <!-- End Delete Modal -->
@endsection
