<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersPages;
use App\Http\Controllers\adminPanel;

//Пользовательские страницы
Route::get('/', [UsersPages::class, 'index'])->name('index');
Route::get('/directors', [UsersPages::class, 'directors'])->name('directors');
Route::get('/teachers', [UsersPages::class, 'teachers'])->name('teachers');
Route::get('/honored_workers', [UsersPages::class, 'honoredWorkers'])->name('honoredWorkers');
Route::get('/videos', [UsersPages::class, 'videosYears'])->name('videosYears');
Route::get('/videos/{year}', [UsersPages::class, 'videos'])->name('videos');
Route::get('/events', [UsersPages::class, 'eventsYears'])->name('eventsYears');
Route::get('/events/{year}', [UsersPages::class, 'events'])->name('events');
Route::get('/graduates', [UsersPages::class, 'yearsGraduates'])->name('yearsGraduates');
Route::get('/graduates/{year}', [UsersPages::class, 'showGraduates'])->name('showGraduates');


//Панель админа

//Пути преподавателей
Route::get('/ap/teachers', [adminPanel::class, 'showTeacher'])->name('showTeacher');
Route::post('/ap/delete_teacher', [adminPanel::class, 'deleteTeacher'])->name('deleteTeacher');
Route::post('/ap/edit_teacher', [adminPanel::class, 'editTeacher'])->name('editTeacher');
Route::post('/ap/add_teacher', [adminPanel::class, 'addTeacher'])->name('addTeacher');
//Пути директоров
Route::get('/ap/directors', [adminPanel::class, 'showDirectors'])->name('showDirectors');
Route::post('/ap/delete_directors', [adminPanel::class, 'deleteDirectors'])->name('deleteDirectors');
Route::post('/ap/edit_directors', [adminPanel::class, 'editDirectors'])->name('editDirectors');
Route::post('/ap/add_directors', [adminPanel::class, 'addDirectors'])->name('addTDirectors');
//Пути заслуженных работников культуры
Route::get('/ap/honored_workers', [adminPanel::class, 'showHonoredWorkers'])->name('showHonoredWorkers');
Route::post('/ap/delete_honored_workers', [adminPanel::class, 'deleteHonoredWorkers'])->name('deleteHonoredWorkers');
Route::post('/ap/edit_honored_workers', [adminPanel::class, 'editHonoredWorkers'])->name('editHonoredWorkers');
Route::post('/ap/add_honored_workers', [adminPanel::class, 'addHonoredWorkers'])->name('addHonoredWorkers');
//Пути событий
Route::get('/ap/events', [adminPanel::class, 'showEvents'])->name('showEvents');
Route::get('/ap/edit_event/{id}', [adminPanel::class, 'showEditEvents'])->name('showEditEvents');
Route::post('/ap/delete_events', [adminPanel::class, 'deleteEvent'])->name('deleteEvent');
Route::post('/ap/edit_event/{id}', [adminPanel::class, 'editEvent'])->name('editEvent');
Route::post('/ap/add_event', [adminPanel::class, 'addEvent'])->name('addEvent');
//Пути отделений
Route::get('/ap/departaments', [adminPanel::class, 'showDepartaments'])->name('showDepartaments');
Route::post('/ap/delete_departaments', [adminPanel::class, 'deleteDepartaments'])->name('deleteDepartaments');
Route::post('/ap/edit_departaments', [adminPanel::class, 'editDepartaments'])->name('editDepartaments');
Route::post('/ap/add_departaments', [adminPanel::class, 'addDepartaments'])->name('addDepartaments');
//Пути специальностей
Route::get('/ap/specialties', [adminPanel::class, 'showSpecialties'])->name('showSpecialties');
Route::post('/ap/delete_specialties', [adminPanel::class, 'deleteSpecialties'])->name('deleteSpecialties');
Route::post('/ap/edit_specialties', [adminPanel::class, 'editSpecialties'])->name('editSpecialties');
Route::post('/ap/add_specialties', [adminPanel::class, 'addSpecialties'])->name('addSpecialties');
//Пути выпускников
Route::get('/ap/graduates', [adminPanel::class, 'showGraduates'])->name('showGraduates');
Route::post('/ap/delete_graduates', [adminPanel::class, 'deleteGraduates'])->name('deleteGraduates');
Route::post('/ap/edit_graduates', [adminPanel::class, 'editGraduates'])->name('editGraduates');
Route::post('/ap/add_graduates', [adminPanel::class, 'addGraduates'])->name('addGraduates');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
