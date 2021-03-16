@extends('welcome')

@section('title','Видео за '.$year.' год')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Видеоархив</h2>
                <p class="text-center">Видеоархив за {{ $year }} год колледжа искусств</p>
            </div>
            <div class="row projects videos">
                @foreach($videos as $v)
                <div class="col-sm-12 col-lg-6 item">
                    <h3>{{ $v->description }}</h3>
                        @if(strpos($v->video, 'youtube.com') <> false)
                            <iframe src="{{ $v->video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <video controls draggable="false" preload="metadata" width="300">
                                <source src="/assets/video/{{ $v->video }}" type='video/mp4'>
                            </video>
                        @endif                
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection