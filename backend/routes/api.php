<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// COURSES
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

// LESSONS
Route::get('/lessons/{id}', [LessonController::class, 'show']);

Route::get('/quizzes/{id}', [QuizController::class, 'show']);
Route::post('/quizzes/{id}/submit', [QuizController::class, 'submit']);


use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;

Route::middleware('auth:api')->prefix('instructor')->group(function () {
    Route::get('/courses', [InstructorCourseController::class, 'index']);
    Route::post('/courses', [InstructorCourseController::class, 'store']);
    Route::put('/courses/{id}', [InstructorCourseController::class, 'update']);
    Route::delete('/courses/{id}', [InstructorCourseController::class, 'destroy']);
});
