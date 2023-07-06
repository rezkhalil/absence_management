<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProfController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\MatiereController;
use App\Http\Controllers\Admin\EtudiantController;
use App\Http\Controllers\Admin\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/home', [HomeController::class,'index'])->name('home');


Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function() {

    Route::get('/', [IndexController::class,'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::get('/historique-absence',[IndexController::class,'historiqueAbsence'])->name('absence.historiqueabsence');



    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::group(['prefix' => 'teacher'], function () {
        Route::get('/addTeacher',[ProfController::class,'addProf'])->name('add.prof');
        Route::get('showAll',[ProfController::class,'showAllProf'])->name('show.all.prof');
        Route::post('/saveProf',[ProfController::class,'save'])->name('save.prof');
        Route::get('/edit/{id}',[ProfController::class,'editprof'])->name('edit.prof');
        Route::put('/update/{id}',[ProfController::class,'updateprof'])->name('update.prof');
        Route::delete('/delete/{id}',[ProfController::class,'deleteprof'])->name('delete.prof');
    });
    Route::group(['prefix' => 'student'], function () {
        Route::get('/addStudent',[EtudiantController::class,'addStudent'])->name('add.student');
        Route::get('/showAll',[EtudiantController::class,'showAllStudent'])->name('show.all.student');
        Route::post('/saveStudent',[EtudiantController::class,'saveStudent'])->name('save.student');
        Route::get('edit/{id}',[EtudiantController::class,'editStudent'])->name('edit.student');
        Route::put('update',[EtudiantController::class,'updateStudent'])->name('update.student');
        Route::delete('delete/{id}',[EtudiantController::class,'deleteStudent'])->name('delete.student');

    });
    Route::group(['prefix' => 'matiere'], function () {
        Route::get('/addMatiere',[MatiereController::class,'addMatiere'])->name('add.matiere');
        Route::get('/showAll',[MatiereController::class,'showAllMatiere'])->name('show.all.matiere');
        Route::post('/saveMatiere',[MatiereController::class,'saveMatiere'])->name('save.matiere');
        Route::get('edit/{id}',[MatiereController::class,'editMatiere'])->name('edit.matiere');
        Route::put('update',[MatiereController::class,'updateMatiere'])->name('update.matiere');
        Route::delete('delete/{id}',[MatiereController::class,'deleteMatiere'])->name('delete.matiere');

    });
});
    Route::view('/Etudiant','Etudiant.EspaceEtudiant');
    Route::view('/Administration','administration.administration');


Route::middleware(['auth','role:prof'])->name('prof.')->prefix('prof')->group(function()
 {
    Route::get('/',[App\Http\Controllers\Prof\ProfController::class,'index'])->name('home.prof');
    Route::get('/create-seance',[App\Http\Controllers\Prof\ProfController::class,'createSeance'])->name('create.seance');
    Route::post('/save-seance',[App\Http\Controllers\Prof\ProfController::class,'saveSeance'])->name('save.seance');
    Route::get('/list-seance',[App\Http\Controllers\Prof\ProfController::class,'listSeance'])->name('list.seance');
    // Routes : Noter Absence
    Route::get('/noterabsence/{id}',[App\Http\Controllers\Prof\ProfController::class,'PageNoteAbsence'])->name('pageAbsence');
    Route::post('/save-absence',[App\Http\Controllers\Prof\ProfController::class,'saveAbsence'])->name('save.absence');
    // historique d'absence
    Route::get('/historique-absence',[App\Http\Controllers\Prof\ProfController::class,'historiqueAbsence'])->name('historique.absence');
});
Route::middleware(['auth','role:etudiant'])->name('etudiant.')->prefix('etudiant')->group(function()
 {
    Route::get('/',[EtudiantController::class,'index'])->name('home.etudiant');

    Route::get('/historique-absence',[EtudiantController::class,'historiqueAbsence'])->name('historique.absence');
});

require __DIR__.'/auth.php';
