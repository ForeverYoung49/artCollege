@extends('welcome')

@section('title','События за '.$year.' год')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Важные события</h2>
                <p class="text-center">События за {{ $year }} год колледжа искусств</p>
            </div>
            <div class="row projects">
                @foreach($events as $e)
                <div class="col-12 item">
                    <p>{!! html_entity_decode(nl2br(e($e->description))) !!}</p>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection