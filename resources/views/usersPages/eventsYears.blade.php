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
            <div class=" years">
            <a href="/events/{{ $e->year }}" class="col-sm-6 col-lg-4 item">
                <h3 class="name">
                    {{ $e->year }}
                </h3>
                <br>
                <div style="padding: 10px 40px;">
                    {!! html_entity_decode(mb_strimwidth($e->description, 0, 70)) !!}...
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection