@extends('welcome')

@section('title','Почетные преподаватели')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Почетные преподаватели колледжа</h2>
                <p class="text-center">Почетные преподаватели колледжа искусств</p>
            </div>
            <div class="row projects">
                @foreach($teachers as $t)
                <div class="col-sm-6 col-lg-4 item"><img class="img-fluid" src="assets/img/teachers/{{ $t->image }}" style="height: 300px;">
                    <h3 class="name">{{ $t->name }}</h3>
                    <p class="description">{{ $t->description }}</p>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection