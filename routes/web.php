<?php

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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/* PUBLIC ROUTES */
Route::get('/', 'PublicController@index')->name('public');
Route::post('ticket/create', 'TicketController@create')->name('ticket.create');

/* ADMIN ROUTES */
Route::get('admin', 'AdminController@index')->name('admin')->middleware('auth');;
Route::get('admin/ticket/edit/{id}', 'TicketController@edit')->name('ticket.edit')->middleware('auth');
Route::post('ticket/update', 'TicketController@update')->name('ticket.update')->middleware('auth');
Route::post('ticket/lock', 'TicketController@lock')->name('ticket.lock')->middleware('auth');
