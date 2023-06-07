<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\NewPostController;
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
Route::get('/home',[HomeController::Class,'home'])->middleware('isLoggedIn');
Route::get('/login',[AuthController::Class,'login'])->middleware('alreadyLoggedIn');
Route::post('/login-user',[AuthController::Class,'loginUser'])->name('login-user');
Route::get('/logout',[AuthController::Class,'logout']);
Route::get('/myprofile',[HomeController::Class,'myprofile'])->middleware('isLoggedIn');
Route::post('/add_profile_social',[HomeController::Class,'add_profile_social'])->middleware('isLoggedIn');
Route::get('/changepass',[HomeController::Class,'changepass'])->middleware('isLoggedIn');
Route::post('/up_profile_social',[HomeController::Class,'up_profile_social'])->middleware('isLoggedIn');
Route::get('/leaders_type',[AdminController::Class,'leaders_type'])->middleware('isAdmin');
Route::get('/404',[HomeController::Class,'page_not_found'])->middleware('isLoggedIn');

Route::post('/lead_filter',[AdminController::Class,'lead_filter'])->middleware('isAdmin');
Route::post('/add_lead_social',[AdminController::Class,'add_lead_social'])->middleware('isAdmin');
Route::post('/add_lead',[AdminController::Class,'add_lead'])->middleware('isAdmin');
Route::post('/add_lead_type',[AdminController::Class,'add_lead_type'])->middleware('isAdmin');
Route::get('/leaders_profile',[AdminController::Class,'leaders_profile'])->middleware('isAdmin');
Route::get('/org_profile',[AdminController::Class,'org_profile'])->middleware('isAdmin');
Route::get('/account_detail/{id}',[AdminController::Class,'account_detail'])->middleware('isAdmin');
Route::get('/leader_social_mideas/{id}',[AdminController::Class,'leader_social_mideas'])->middleware('isAdmin');

Route::get('/social_media',[SocialMediaController::Class,'social_media'])->middleware('isAdmin');
Route::get('/social_media_property',[SocialMediaController::Class,'social_media_property'])->middleware('isAdmin');
Route::post('/add_social_media',[SocialMediaController::Class,'add_social_media'])->middleware('isAdmin');
Route::post('/add_social_media_property',[SocialMediaController::Class,'add_social_media_property'])->middleware('isAdmin');
Route::post('/add_account',[HomeController::Class,'add_account'])->middleware('isLoggedIn');
Route::GET('/get_social_media_property/{id}',[SocialMediaController::Class,'get_social_media_property'])->middleware('isAdmin');

Route::get('/organization',[OrganizationController::Class,'index'])->middleware('isAdmin');
Route::post('/organization_new',[OrganizationController::Class,'create'])->middleware('isAdmin');
Route::post('/organization_edit',[OrganizationController::Class,'edit_org'])->middleware('isAdmin');

Route::get('/new_post',[NewPostController::Class,'index'])->middleware('isAdmin');
Route::get('/edit_post/{id}',[NewPostController::Class,'edit_post'])->middleware('isAdmin');
Route::post('/post_new',[NewPostController::Class,'post_new'])->middleware('isAdmin');
