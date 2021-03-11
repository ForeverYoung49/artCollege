@extends('welcome')

@section('title','Выпуск '.$year.' года')

@section('content')
    <div class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Выпускники за {{$year}} год</h2>
            </div>
                       
            @for($i=0; $i < count($departaments); $i++)
                @php
                    $check = 0;
                @endphp

                @foreach($graduates as $g)
                    @if($g->departament_id == $departaments[$i]->id)
                        @php
                            $check++;
                        @endphp
                    @endif
                @endforeach

                @if($check <> 0)

                <h3 class="name">{{ $departaments[$i]->title }}</h3>

                @endif

                @for($j=0; $j < count($specialties); $j++)

                    @php
                        $check = 0;
                    @endphp

                    @foreach($graduates as $g)
                        @if($g->specialty_id == $specialties[$j]->id)
                            @php
                                $check++;
                            @endphp
                        @endif
                    @endforeach

                    @if($departaments[$i]->id == $specialties[$j]->departament_id and $check <> 0)
                        <h4 class="name-spec">{{ $specialties[$j]->title }}</h3>
                    @endif

                    @for($l=0; $l < count($graduates); $l++)
                        @if($specialties[$j]->id == $graduates[$l]->specialty_id and $departaments[$i]->id == $graduates[$l]->departament_id )
                            <p class="name-grad">{{ $graduates[$l]->name }}</p>
                        @endif
                    @endfor

                @endfor

                @for($l=0; $l < count($graduates); $l++)

                    @if($departaments[$i]->id == $graduates[$l]->departament_id and $graduates[$l]->specialty_id == null)
                        <p class="name-grad">{{ $graduates[$l]->name }}</p>
                    @endif

                @endfor
            @endfor
            
        </div>
    </div>
@endsection