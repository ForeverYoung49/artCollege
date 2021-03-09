<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departaments;
use App\Models\Directors;
use App\Models\Events;
use App\Models\Graduates;
use App\Models\HonoredWorkers;
use App\Models\Specialties;
use App\Models\Teachers;

class adminPanel extends Controller
{

    public function showAP(){
        $check = '';
    	return view('adminPanel.main', compact('check'));
    }

    /////////////////////////////////////////
    //Раздел директоров
    /////////////////////////////////////////

    public function showDirectors(){
    	$check = '';
        $directors = Directors::all();
    	return view('adminPanel.directors', ['directors' => $directors]);
    }

    public function addDirectors(Request $request){
    	if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = $request->name;
            $name = (string)$name.'.jpg';
            $image->move(public_path().'/assets/img/directors',$name);
            Directors::create([
	    		'name' => $request->name,
	    		'description' => $request->description,
	    		'image' => $name
    		]);
        }
    	return redirect('/ap/directors');
    }

    public function editDirectors(Request $request){
        if ($request->hasFile('image')){
            $teacher = Directors::where('id','=',$request->id)->get();
            $image = $request->file('image');
            $name = $request->name;
            $name = (string)$name.'.jpg';
            $image->move(public_path().'/assets/img/directors',$name);
            Directors::where('id','=',$request->id)->update(['image'=>$name]);
        }
        Directors::where('id','=',$request->id)->update(['name'=>$request->name, 'description'=>$request->description]);
    	return redirect('/ap/directors');
    }

    public function deleteDirectors(Request $request){
        Directors::where('id','=',$request->id)->delete();
        return redirect('/ap/directors');
    }

    /////////////////////////////////////////
    //Раздел почетных преподавателей 
    /////////////////////////////////////////

    public function showTeacher(){
    	$teachers = Teachers::all();
    	return view('adminPanel.teachers', ['teachers'=>$teachers]);
    }

    public function editTeacher(Request $request){
        if ($request->hasFile('image')){
            $teacher = Teachers::where('id','=',$request->id)->get();
            $image = $request->file('image');
            $name = $request->name;
            $name = (string)$name.'.jpg';
            $image->move(public_path().'/assets/img/Teachers',$name);
            Teachers::where('id','=',$request->id)->update(['image'=>$name]);
        }
        Teachers::where('id','=',$request->id)->update(['name'=>$request->name, 'description'=>$request->description]);
    	return redirect('/ap/teachers');
    }

    public function deleteTeacher(Request $request){
        Teachers::where('id','=',$request->id)->delete();
        return redirect('/ap/teachers');
    }

    public function addTeacher(Request $request){
    	if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = $request->name;
            $name = (string)$name.'.jpg';
            $image->move(public_path().'/assets/img/Teachers',$name);
            Teachers::create([
	    		'name' => $request->name,
	    		'description' => $request->description,
	    		'image' => $name
    		]);
        }
    	return redirect('/ap/teachers');
    }

    /////////////////////////////////////////
    //Раздел видео
    /////////////////////////////////////////

    public function showAddVideo(){
    	$check = '';
    	return view('adminPanel.addVideos', compact('check'));
    }

    public function addVideo(Request $request){
    	if ($request->hasFile('video')){
            $image = $request->file('video');
            $name = $request->name;
            $name = (string)$name.'.mp4';
            $image->move(public_path().'/assets/videos',$name);
            $name = '/assets/videos'.$name;
            Videos::create([
	    		'video' => $name,
	    		'description' => $request->description,
	    		'year' => $request->year
    		]);
        }
        else {
            Videos::create([
	    		'video' => $request->video,
	    		'description' => $request->description,
	    		'year' => $request->year
    		]); 
        }
    	return redirect()->action('adminPanel@showAP');
    }

    /////////////////////////////////////////
    //Раздел важных событий
    /////////////////////////////////////////

    public function showEvents(){
        $check = '';
        $events = Events::all();
    	return view('adminPanel.Events', ['events' => $events]);
    }

    public function showEditEvents($id){
        $check = '';
        $event = Events::where('id','=',$id)->first();
    	return view('adminPanel.editEvents', ['event' => $event]);
    }

    public function editEvent(Request $request, $id){
        Events::where('id','=',$id)->update(['year'=>$request->year, 'description'=>$request->description]);
    	return redirect('/ap/events');
    }

    public function addEvent(Request $request){
        dd($request);
        Events::create([
            'year' => $request->year,
            'description' => $request->description            
        ]);
        return redirect('/ap/events');
    }

    public function deleteEvent(Request $request){
        Events::where('id','=',$request->id)->delete();
        return redirect('/ap/events');
    }

    /////////////////////////////////////////
    //Раздел заслуженных работников культуры 
    /////////////////////////////////////////

    public function showHonoredWorkers(){
        $honoredWorkers = HonoredWorkers::all();
    	return view('adminPanel.honoredWorkers', ['honoredWorkers' => $honoredWorkers]);
    }

    public function editHonoredWorkers(Request $request){
        HonoredWorkers::where('id','=',$request->id)->update(['name'=>$request->name, 'description'=>$request->description]);
    	return redirect('/ap/honored_workers');
    }

    public function addHonoredWorkers(Request $request){
        HonoredWorkers::create([
            'name' => $request->name,
            'description' => $request->description            
        ]);
        return redirect('/ap/honored_workers');
    }

    public function deleteHonoredWorkers(Request $request){
        HonoredWorkers::where('id','=',$request->id)->delete();
        return redirect('/ap/honored_workers');
    }

    /////////////////////////////////////////
    //Раздел отделений
    /////////////////////////////////////////

    public function showDepartaments(){
        $check = '';
        $departaments = Departaments::all();
    	return view('adminPanel.departaments', ['departaments' => $departaments]);
    }

    public function addDepartaments(Request $request){
        Departaments::create([
            'title' => $request->title         
        ]);
        return redirect('/ap/departaments');
    }

    public function editDepartaments(Request $request){
        Departaments::where('id','=',$request->id)->update(['title'=>$request->title]);
    	return redirect('/ap/departaments');
    }

    public function deleteDepartaments(Request $request){
        Departaments::where('id','=',$request->id)->delete();
        return redirect('/ap/departaments');
    }

    /////////////////////////////////////////
    //Раздел специальностей
    /////////////////////////////////////////

    public function showSpecialties(){
        $check = '';
        $departaments = Departaments::all();
        $specialties = Specialties::select('specialties.id','specialties.title','departaments.id as dep_id','departaments.title as dep_title')
            ->join('departaments','specialties.departament_id','=','departaments.id')
            ->get();
    	return view('adminPanel.specialties', ['specialties' => $specialties, 'departaments' => $departaments]);
    }

    public function addSpecialties(Request $request){
        Specialties::create([
            'title' => $request->title,
            'departament_id' => $request->dep_id        
        ]);
        return redirect('/ap/specialties');
    }

    public function editSpecialties(Request $request){
        Specialties::where('id','=',$request->id)->update(['title' => $request->title, 'departament_id' => $request->dep_id]);
    	return redirect('/ap/specialties');
    }

    public function deleteSpecialties(Request $request){
        Specialties::where('id','=',$request->id)->delete();
        return redirect('/ap/specialties');
    }

    /////////////////////////////////////////
    //Раздел выпускников
    /////////////////////////////////////////

    public function showGraduates(){
        $check = '';
        $departaments = Departaments::all();
        $specialties = Specialties::all();
        $graduates = Graduates::select('departaments.title as dep_title','specialties.title as spec_title','graduates.name','graduates.id','specialties.id as spec_id','departaments.id as dep_id','graduates.year')
            ->join('departaments','graduates.departament_id','=','departaments.id')
            ->leftJoin('specialties','graduates.specialty_id','=','specialties.id')
            ->get();
    	return view('adminPanel.graduates', ['specialties' => $specialties, 'departaments' => $departaments, 'graduates' => $graduates]);
    }

    public function addGraduates(Request $request){
        if ($request->spec_id <> null) {
            Graduates::create([
                'year' => $request->year,
                'name' => $request->name,
                'departament_id' => $request->dep_id,
                'specialty_id' => $request->spec_id
            ]);
        } 
        else {
            Graduates::create([
                'year' => $request->year,
                'name' => $request->name,
                'departament_id' => $request->dep_id
            ]);
        }
        return redirect('/ap/graduates');
    }

    public function editGraduates(Request $request){
        Graduates::where('id','=',$request->id)->update(['name' => $request->name, 'departament_id' => $request->dep_id, 'year' => $request->year]);
        if ($request->spec_id <> null) {
            Graduates::where('id','=',$request->id)->update(['specialty_id' => $request->spec_id]);
        }
        else {
            Graduates::where('id','=',$request->id)->update(['specialty_id' => null]);
        }
    	return redirect('/ap/graduates');
    }

    public function deleteGraduates(Request $request){
        Graduates::where('id','=',$request->id)->delete();
        return redirect('/ap/graduates');
    }

}
