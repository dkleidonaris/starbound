<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\SupporterTypeController;
use App\Http\Controllers\ContactMessageController;

Route::get('teams', [TeamController::class, 'index']);

Route::get('members', [TeamMemberController::class, 'index']);
Route::get('members/count', [TeamMemberController::class, 'count']);

Route::get('departments', [DepartmentController::class, 'index']);

Route::get('supporter-types', [SupporterTypeController::class, 'index']);

Route::get('supporters', [SupporterController::class, 'index']);
Route::get('supporters/count', [SupporterController::class, 'count']);

Route::get('milestones', [MilestoneController::class, 'index']);

Route::get('events', [EventController::class, 'index']);

Route::post('contact-messages', [ContactMessageController::class, 'store']);

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);

Route::post('login', [AuthController::class, 'login']);
