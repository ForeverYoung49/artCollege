<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Подключение моделей таблиц БД
use App\Models\Departaments;
use App\Models\Directors;
use App\Models\Events;
use App\Models\Graduates;
use App\Models\HonoredWorkers;
use App\Models\Specialties;
use App\Models\Teachers;
use App\Models\Videos;
use Validator;
use Paginate;

class UsersPages extends Controller
{

    public function index(){
        return view('usersPages.index');
    }

    //вывод директоров
    public function directors(){ 
        //запрос к БД
        $directors = Directors::paginate(10);
        return view('usersPages.directors',['directors'=>$directors]);
    }
    //вывод заслуженных работников культуры
    public function honoredWorkers(){ 
        $honoredWorkers = HonoredWorkers::paginate(10);
        return view('usersPages.honoredWorkers',['honoredWorkers'=>$honoredWorkers]);
    }
    //вывод почетных преподавателей
    public function teachers(){ 
        $teachers = Teachers::paginate(10);
        return view('usersPages.teachers',['teachers'=>$teachers]);
    }
    
    //события годы
    public function eventsYears(){ 
        $events = Events::select('year')->groupBy('year')->get();
        return view('usersPages.eventsYears',['events'=>$events]);
    }

    //вывод событий
    public function events($year){ 
        $events = Events::where('year','=',$year)->paginate(10);
        return view('usersPages.events',['events'=>$events, 'year'=>$year]);
    }

    //видеоархив годы
    public function videosYears(){ 
        $videos = Videos::select('year')->groupBy('year')->get();
        return view('usersPages.videosYears',['videos'=>$videos]);
    }

    //видеоархив
    public function videos($year){ 
        $videos = Videos::where('year','=',$year)->paginate(10);
        return view('usersPages.videos',['videos'=>$videos, 'year'=>$year]);
    }

    //вывод годов выпуска
    public function yearsGraduates(){
        //получение имеющихся годов выпуска
        $years = Graduates::select('year')->groupBy('year')->get();
        return view('usersPages.graduatesYears',['years'=>$years]);
    }
    //вывод определенного года выпуска
    public function showGraduates($year){
        $graduates = Graduates::select('*')->where('year',$year)->get();
        $graduatesSpecNull = Graduates::select('*')->where('year',$year)->where('specialty_id',null)->get();
        $departaments = Departaments::select('*')->get();
        $specialties = Specialties::select('*')->get();
        return view('usersPages.graduates',['graduates'=>$graduates,'departaments'=>$departaments,'specialties'=>$specialties,'year'=>$year]);
    }
}