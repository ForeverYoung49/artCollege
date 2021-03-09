@extends('welcome')

@section('title','Важные события')

@section('content')
<div class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Важные события</h2>
            <p class="text-center">Важные события колледжа искусств</p>
        </div>
        <div class="row projects">
            @foreach($events as $e)
            <div class="col-sm-6 col-lg-4 item">
                <h3 class="name">
                    <a href="/events/{{ $e->year }}">{{ $e->year }}</a>
                </h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection