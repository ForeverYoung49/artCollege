@extends('welcome')

@section('title','Выпускники')

@section('content')
<div class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Наши выпускники</h2>
            <p class="text-center">В списках выпускников, составленных по данным "Книги учета бланков и выдачи дипломов", возможны информационные неточности в связи с плохим состоянием первоисточника. Исправления и уточнения отправляйте по адресу <b>aomu@list.ru</b>  Благодарим за помощь.</p>
        </div>
        <br>
        <div class="row projects">
            @foreach($years as $y)
            <a href="/graduates/{{ $y->year }}" class="col-sm-6 col-lg-4 item years d-flex align-items-center justify-content-center" style="padding: 0;">
                <h3 class="name" style="margin: 20px;">
                    {{ $y->year }}
                </h3>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection