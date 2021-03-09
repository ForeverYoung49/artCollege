@extends('welcome')

@section('title','Главная страница')

@section('content')
<div class="projects-clean">
    <div class="container">
        <!-- <div class="intro">
            <h2 class="text-center">Название категории</h2>
            <p class="text-center">Описание категории</p>
        </div> -->
        <div class="row projects">
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="assets/img/desk.jpg">
                <h3 class="name">Выпускники</h3>
                <p class="description">Выпускники колледжа искусств</p>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="assets/img/building.jpg">
                <h3 class="name">Почетные преподаватели</h3>
                <p class="description">Педагоги колледжа искусств<br><br></p>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="assets/img/loft.jpg">
                <h3 class="name">Важные события</h3>
                <p class="description">События колледжа искусств<br><br></p>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="assets/img/minibus.jpeg">
                <h3 class="name">Директора</h3>
                <p class="description">Директора колледжа искусств<br><br></p>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="assets/img/minibus.jpeg">
                <h3 class="name">Видеоматериалы</h3>
                <p class="description">Видеоархив<br><br></p>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="assets/img/minibus.jpeg">
                <h3 class="name">Заслуженные работники культуры</h3>
                <p class="description">Работники культуры колледжа искусств<br><br></p>
            </div>
        </div>
    </div>
</div>
@endsection