@extends('welcome')

@section('title','Панель администратора')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Специальности</h2>
                <p class="text-center">Просмотр всех специальностей, их редактирование, удаление и добавление</p>
            </div>
            <div class="row projects">
                <table>
                    <div class="container-fluid d-flex justify-content-end">
                        <div title="Добавить новое отделение" data-toggle="collapse" href="#addSpec" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-align: right">
                            <span class="btn btn-success">Добавить</span>
                        </div>
                    </div>
                    <tr>
                        <th>Отделение</th>
                        <th>Специальность</th>
                    </tr>
                    <tr class="collapse" id="addSpec">
                        <form action="/ap/add_specialties" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <select name="dep_id" id="dep_id" required>
                                    @foreach($departaments as $d)
                                        <option value="{{ $d->id }}">{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <textarea name="title" id="title" style="width: 100%" required></textarea>
                            </td>
                            <td class="buttons">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @foreach($specialties as $s)
                    <tr>
                        <td>{{ $s->dep_title }}</td>
                        <td>{{ $s->title }}</td>
                        <td class="buttons">
                            <form action="/ap/delete_specialties" method="post">
                            @csrf
                                <input type="text" name="id" id="id" value="{{ $s->id }}" hidden>
                                <button type="submit" class="btn btn-danger" title="Удалить">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <br>
                                <br>
                            </form>
                            <button class="btn btn-warning" data-toggle="collapse" href="#editSpec{{$s->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" title="Редактировать" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="collapse" id="editSpec{{$s->id}}">
                        <form action="/ap/edit_specialties" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <select name="dep_id" id="dep_id" required>
                                    @foreach($departaments as $d)
                                        <option value="{{ $d->id }}" @if($d->id==$s->dep_id) selected @endif>{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="id" id="id" value="{{ $s->id }}" hidden>
                                <textarea name="title"  id="title" style="width: 100%" required>{{$s->title}}</textarea>
                            </td>
                            <td class="buttons">
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