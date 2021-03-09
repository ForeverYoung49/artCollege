@extends('welcome')

@section('title','Видеоархив')

@section('content')
<div class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Видеоархив</h2>
            <p class="text-center">Видео колледжа искусств</p>
        </div>
        <div class="row projects">
            @foreach($videos as $v)
            <div class="col-sm-6 col-lg-4 item">
                <h3 class="name">
                    <a href="/videos/{{ $v->year }}">{{ $v->year }}</a>
                </h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection