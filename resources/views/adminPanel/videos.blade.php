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
                        <div title="Добавить нового преподавателя" colspan="3" data-toggle="collapse" href="#addVideo" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-align: right">
                            <span class="btn btn-success">Добавить</span>
                        </div>
                    </div>
                    <tr>
                        <th>Фото</th>
                        <th>ФИО</th>
                        <th>Описание</th>
                        <th></th>
                    </tr>
                    <tr class="collapse" id="addVideo">
                        <form action="/ap/add_videos" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <input type="text" name="year" id="year" size="4">
                            </td>
                            <td>
                                <input type="file" accept="video/*" name="video" id="video">
                                <br>
                                <input type="text" name="videoYT" id="videoYT">
                            </td>
                            <td>
                                <textarea name="description" id="description" style="width: 100%;" required></textarea>
                            </td>
                            <td class="buttons">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @foreach($videos as $v)
                    <tr>
                        <td>{{ $v->year }}</td>
                        <td>
                            @if(strpos($v->video, 'youtube.com') <> false)
                            <iframe src="{{ $v->video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                            <video controls draggable="false" preload="metadata">
                                <source src="/assets/video/{{ $v->video }}" type='video/mp4'>
                            </video>
                            @endif
                        </td>
                        <td>{{ $v->description }}</td>
                        <td class="buttons">
                            <form action="/ap/delete_videos" method="post">
                            @csrf
                                <input type="text" name="id" id="id" value="{{ $v->id }}" hidden>
                                <button type="submit" class="btn btn-danger" title="Удалить">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <br>
                                <br>
                            </form>
                            <button class="btn btn-warning" data-toggle="collapse" href="#editVideo{{$v->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" title="Редактировать" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="collapse" id="editVideo{{$v->id}}">
                        <form action="/ap/edit_videos" method="post" enctype="multipart/form-data">
                        @csrf
                            <td>
                                <input type="text" name="year" id="year" size="4" value="{{$v->year}}">
                            </td>
                            <td>
                                <input type="file" accept="video/*" name="video" id="video">
                                <br>
                                <input type="text" name="videoYT" id="videoYT">
                            </td>
                            <td>
                                <textarea name="description" id="description" style="width: 100%;" required>{{ $v->description }}</textarea>
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