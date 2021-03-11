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
            <div class="col-sm-6 col-lg-4 years item">
            <a href="/events/{{ $e->year }}" class="">
                <h3 class="name">
                    {{ $e->year }}
                </h3>
                <br>
                <div style="padding: 10px 40px;">
                    {!! mb_strimwidth(html_entity_decode($e->description), 0, 70) !!}</strong></p></i>...
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection