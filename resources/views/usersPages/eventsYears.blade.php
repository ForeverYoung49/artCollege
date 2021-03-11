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
            <a href="/events/{{ $e->year }}" class="col-sm-6 col-lg-4 item">
            <div class=" years">
                <h3 class="name">
                    {{ $e->year }}
                </h3>
                <br>
                <p style="padding: 10px 30px;">
                    {!! html_entity_decode(nl2br(e(mb_strimwidth($e->description, 0, 80)))) !!}...
                </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection