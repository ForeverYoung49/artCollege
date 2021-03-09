@extends('welcome')

@section('title','Директора')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Директора</h2>
                <p class="text-center">Директора колледжа искусств</p>
            </div>
            <div class="row projects">
                @foreach($directors as $d)
                <div class="col-sm-6 col-lg-4 item"><img class="img-fluid" src="assets/img/directors/{{ $d->image }}" style="height: 300px;">
                    <h3 class="name">{{ $d->name }}</h3>
                    <p class="description">{{ $d->description }}</p>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection