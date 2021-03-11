@extends('welcome')

@section('title','Панель администратора')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Выпускники</h2>
                <p class="text-center">Просмотр всех выпускников, их редактирование, удаление и добавление</p>
            </div>
            <div class="row projects">
                <table>
                    <div class="container-fluid d-flex justify-content-end">
                        <div title="Добавить новое отделение" data-toggle="collapse" href="#addGrad" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-align: right">
                            <span class="btn btn-success">Добавить</span>
                        </div>
                    </div>
                    <tr>
                        <th>Год</th>
                        <th>Отделение</th>
                        <th>Специальность</th>
                        <th>ФИО</th>
                    </tr>
                    <tr class="collapse" id="addGrad">
                        <form action="/ap/add_graduates" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <input type="text" name="year" id="year" size="4" require>
                            </td>
                            <td>
                                <select name="dep_id" id="dep_id" required>
                                    @foreach($departaments as $d)
                                        <option value="{{ $d->id }}">{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="spec_id" id="spec_id" required>
                                    @foreach($specialties as $s)
                                        <option value="{{ $s->id }}">{{ $s->title }}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <textarea name="name" id="name" style="width: 100%" required></textarea>
                            </td>
                            <td class="buttons">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @foreach($graduates as $g)
                    <tr>
                        <td>{{ $g->year }}</td>
                        <td>{{ $g->dep_title }}</td>
                        <td>{{ $g->spec_title }}</td>
                        <td>{{ $g->name }}</td>
                        <td class="buttons">
                            <form action="/ap/delete_graduates" method="post">
                            @csrf
                                <input type="text" name="id" id="id" value="{{ $g->id }}" hidden>
                                <button type="submit" class="btn btn-danger" title="Удалить">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <br>
                                <br>
                            </form>
                            <button class="btn btn-warning" data-toggle="collapse" href="#editGrad{{$g->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" title="Редактировать" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="collapse" id="editGrad{{$g->id}}">
                        <form action="/ap/edit_graduates" method="post">
                        @csrf
                            <td>
                                <input type="text" name="year" size="4" id="year" value="{{ $g->year }}">
                            </td>
                            <td>
                                <select name="dep_id" id="dep_id" required>
                                    @foreach($departaments as $d)
                                        <option value="{{ $d->id }}" @if($d->id==$s->dep_id) selected @endif>{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="spec_id" id="spec_id" required>
                                    @foreach($specialties as $s)
                                        <option value="{{ $s->id }}" @if($s->id==$g->spec_id) selected @endif>{{ $s->title }}</option>
                                    @endforeach
                                    <option value="" @if(null == $g->spec_id) selected @endif></option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="id" id="id" value="{{ $g->id }}" hidden>
                                <textarea name="name"  id="name" style="width: 100%" required>{{$g->name}}</textarea>
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