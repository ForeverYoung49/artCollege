@extends('welcome')

@section('title','Видеоархив')

@section('content')
<div class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Видеоархив</h2>
            <p class="text-center">Видео колледжа искусств</p>
        </div>
        <br>
        <div class="row projects">
            @foreach($videos as $v)
            <div class="col-sm-6 col-lg-4 item years d-flex align-items-center justify-content-center" style="padding: 0;">
                <h3 class="name" style="margin: 50px;">
                    <a href="/videos/{{ $v->year }}">{{ $v->year }}</a>
                </h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection