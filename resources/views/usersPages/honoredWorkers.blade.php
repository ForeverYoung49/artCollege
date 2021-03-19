@extends('welcome')

@section('title','Заслуженные работники культуры')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Заслуженные работники культуры</h2>
                <p class="text-center">Заслуженные работники культуры колледжа искусств</p>
            </div>
            <div class="row projects">
                @foreach($honoredWorkers as $h)
                <div class="col-sm-6 col-lg-4 item">
                    @if($h->image <> null)
                        <img class="img-fluid" src="assets/img/honored_workers/{{ $h->image }}" style="height: 300px;">
                    @endif
                    <h3 class="name">{{ $h->name }}</h3>
                    <p class="description">{{ $h->description }}</p>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection