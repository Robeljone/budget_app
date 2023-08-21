<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\JobSectionsController;
use App\Http\Controllers\BudgetAllocationsController;
use App\Http\Controllers\FinacialYearsController;
use App\Http\Controllers\NewPostController;
use App\Http\Controllers\PurchaseRequestesController;
use App\Http\Controllers\IndentRequestesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::Class,'home'])->middleware('isLoggedIn');
Route::get('/change_language/{id}',[HomeController::Class,'language_set'])->middleware('isLoggedIn');
Route::get('/home',[HomeController::Class,'home'])->middleware('isLoggedIn');
Route::get('/login',[AuthController::Class,'login'])->middleware('alreadyLoggedIn');
Route::post('/login-user',[AuthController::Class,'loginUser'])->name('login-user');
Route::get('/logout',[AuthController::Class,'logout']);
Route::get('/organizational_setting',[OrganizationsController::Class,'index'])->middleware('isLoggedIn');
Route::get('/purchase_request',[PurchaseRequestesController::Class,'index'])->middleware('isLoggedIn');
Route::get('/indent_request',[IndentRequestesController::Class,'index'])->middleware('isLoggedIn');
Route::POST('/add_organization',[OrganizationsController::Class,'add_organization'])->middleware('isLoggedIn');
Route::POST('/edit_organization/{id}',[OrganizationsController::Class,'edit_organization'])->middleware('isLoggedIn');

Route::get('/organizational_jobs',[JobSectionsController::Class,'index'])->middleware('isLoggedIn');
Route::POST('/create_job_section',[JobSectionsController::Class,'create_job_section'])->middleware('isLoggedIn');
Route::get('/financial_year',[FinacialYearsController::Class,'index'])->middleware('isLoggedIn');
Route::get('/budget_allocation',[BudgetAllocationsController::Class,'index'])->middleware('isLoggedIn');
Route::get('/user_management',[AdminController::Class,'user_management'])->middleware('isLoggedIn');
Route::POST('/add_financial_year',[FinacialYearsController::Class,'save_financial_year'])->middleware('isLoggedIn');
Route::POST('/add_budget_allocation',[BudgetAllocationsController::Class,'add_budget_allocation'])->middleware('isLoggedIn');
Route::POST('/add_organization_jobs',[JobSectionsController::Class,'add_organization_jobs'])->middleware('isLoggedIn');
Route::POST('/edit_organization_jobs/{id}',[JobSectionsController::Class,'edit_organization_jobs'])->middleware('isLoggedIn');

Route::get('/404',[HomeController::Class,'page_not_found'])->middleware('isLoggedIn');



