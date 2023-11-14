<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'classrooms'=> ClassroomController::class,
    'students' => StudentController::class,
    'lectures'=> LectureController::class,
    'curriculums'=> CurriculumController::class,
]);
