@extends('welcome')

@section('title','Панель администратора')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Почетные преподаватели</h2>
                <p class="text-center">Просмотр всех почетных преподавателей, их редактирование, удаление и добавление</p>
            </div>
            <div class="row projects">
                <table>
                    <div class="container-fluid d-flex justify-content-end">
                        <div title="Добавить нового преподавателя" colspan="3" data-toggle="collapse" href="#addTeacher" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-align: right">
                            <span class="btn btn-success">Добавить</span>
                        </div>
                    </div>
                    <tr>
                        <th>Фото</th>
                        <th>ФИО</th>
                        <th>Описание</th>
                        <th></th>
                    </tr>
                    <tr class="collapse" id="addTeacher">
                        <form action="/ap/add_teacher" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <input type="file" accept="image/*" name="image" id="image" required>
                            </td>
                            <td>
                                <input type="text" name="name" id="name" required>
                            </td>
                            <td>
                                <textarea name="description" id="description" style="width: 100%;" required></textarea>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @foreach($teachers as $t)
                    <tr>
                        <td><img src="/assets/img/teachers/{{ $t->image }}" width="200" alt=""></td>
                        <td>{{ $t->name }}</td>
                        <td>{{ $t->description }}</td>
                        <td>
                            <form action="/ap/delete_teacher" method="post">
                            @csrf
                                <input type="text" name="id" id="id" value="{{ $t->id }}" hidden>
                                <button type="submit" class="btn btn-danger" title="Удалить">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <br>
                                <br>
                            </form>
                            <button class="btn btn-warning" data-toggle="collapse" href="#editTeacher{{$t->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" title="Редактировать" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="collapse" id="editTeacher{{$t->id}}">
                        <form action="/ap/edit_teacher" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <input type="text" name="id" id="id" value="{{ $t->id }}" hidden>
                                <input type="file" accept="image/*" name="image" id="image">
                            </td>
                            <td>
                                <textarea name="name"  id="name" required>{{$t->name}}</textarea>
                            </td>
                            <td>
                                <textarea name="description" id="description" style="width: 100%; min-height:100px;" required>{{$t->description}}</textarea>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection