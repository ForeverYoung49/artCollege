@extends('welcome')

@section('title','Редактирование')

@section('content')
@if(Auth::user())
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Редактирование</h2>
            </div>
            <form action="/ap/edit_event/{{$event->id}}" method="post">
            @csrf
                <div class="row projects">
                
                    <div class="col-2">
                        <p style="font-size: 24px">Год:</p>
                        <input type="text" name="year" id="year" size="4" value="{{ $event->year }}">
                    </div>
                    <div class="col-7">
                        <p style="font-size: 24px">Текст:</p>
                        <textarea style="witdht: 100%" name="description" id="editor">{!! html_entity_decode(nl2br(e($event->description))) !!}</textarea>
                    </div>
                    <div class="col-2">
                        <p style="font-size: 24px">Вернуться:</p>
                        <a href="/ap/events" class="btn btn-danger">
                            <i class="fas fa-undo-alt"></i>
                        </a>
                    </div>
                    <div class="col-1">
                        <p style="font-size: 24px">Изменить:</p>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@else
    <h1>Данный раздел доступен только администратору</h1>
@endif
@endsection