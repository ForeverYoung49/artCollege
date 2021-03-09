@extends('welcome')

@section('title','Панель администратора')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Важные события</h2>
                <p class="text-center">Просмотр всех событий, их редактирование, удаление и добавление</p>
            </div>
            <div class="row projects">
                <table>
                    <div class="container-fluid d-flex justify-content-end">
                        <div title="Добавить нового преподавателя" colspan="3" data-toggle="collapse" href="#addEvent" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-align: right">
                            <span class="btn btn-success">Добавить</span>
                        </div>
                    </div>
                    <tr>
                        <th>Год</th>
                        <th>Описание</th>
                        <th></th>
                    </tr>
                    <tr class="collapse" id="addEvent">
                        <form action="/ap/add_event" method="post">
                        @csrf
                            <td>
                                <input type="text" name="year" id="year" size="4" required>
                            </td>
                            <td>
                                <textarea name="description" id="description" require></textarea>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @foreach($events as $e)
                    <tr>
                        <td>{{ $e->year }}</td>
                        <td>{!! html_entity_decode(nl2br(e($e->description))) !!}</td>
                        <td class="buttons">
                            <form action="/ap/delete_events" method="post">
                            @csrf
                                <input type="text" name="id" id="id" value="{{ $e->id }}" hidden>
                                <button type="submit" class="btn btn-danger" title="Удалить это событие">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <br>
                                <br>
                                <a href="/ap/edit_event/{{$e->id}}" class="btn btn-warning" title="Изменить это событие">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection