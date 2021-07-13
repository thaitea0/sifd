<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', 'Controller@login');
Route::post('/regis', 'Controller@regis');
Route::get('/actlogin', 'Controller@actlog');




Route::get('/staf', 'CoStaf@home');
Route::post('/staf:upd={id}', 'CoStaf@updstaf');

Route::get('/datadusun', 'CoStaf@dtadsn');
Route::post('/add_dusun', 'CoStaf@adddusun');
Route::post('/dusun:upd={id}', 'CoStaf@upddusun');
Route::get('/dusun:del={id}', 'CoStaf@deldusun');

Route::get('/dusun:rw={id}', 'CoStaf@dtarw');
Route::post('/add_rw', 'CoStaf@addrw');
Route::post('/rw:upd={id}', 'CoStaf@updrw');
Route::get('/rw:del={id}', 'CoStaf@delrw');

Route::get('/rt:rw={id}', 'CoStaf@dtart');
Route::post('/add_rt', 'CoStaf@addrt');
Route::post('/rt:upd={id}', 'CoStaf@updrt');
Route::get('/rt:del={id}', 'CoStaf@delrt');

Route::get('/dusun/{id}','CoStaf@merkAjax');
Route::get('/rw/{id}','CoStaf@rtAjax');

Route::get('/datastaf', 'CoStaf@dtastaf');
Route::get('/datakades', 'CoStaf@dtakades');
Route::get('/dataketrw', 'CoStaf@dtaketrw');
Route::get('/dataketrt', 'CoStaf@dtaketrt');
Route::get('/datawarga', 'CoStaf@dtawarga');

Route::get('/datawarga:ed={id}', 'CoStaf@edwarga');

Route::post('/add_pengguna', 'CoStaf@addpeng');
// Route::get('/pengguna:edit={id}', 'CoStaf@edpeng');
Route::post('/pengguna:upd={id}', 'CoStaf@updpeng');
Route::get('/pengguna:del={id}', 'CoStaf@delpeng');

Route::get('/datakatberita', 'CoStaf@dtakat');
Route::post('/add_kategori', 'CoStaf@addkat');
Route::post('/katber:upd={id}', 'CoStaf@updkat');
Route::get('/katber:del={id}', 'CoStaf@delkat');

Route::get('/databeritastaf', 'CoStaf@dtaber');

Route::get('/beritastaf:kat={id}', 'CoStaf@berita');
Route::get('/beritastaf:chat={id}', 'CoStaf@diskusi');




Route::get('/kades', 'CoKades@home');
Route::post('/kades:upd={id}', 'CoKades@updkades');

Route::get('/kdatakatberita', 'CoKades@dtakat');
Route::get('/databeritakades', 'CoKades@dtaber');
Route::get('/beritakades:kat={id}', 'CoKades@berita');
Route::get('/beritakades:chat={id}', 'CoKades@diskusi');

Route::get('/statistikwarga', 'CoKades@statwar');
Route::get('/statistiktberita', 'CoKades@statkat');





Route::get('/ketuarw', 'CoRT@home');
Route::post('/karw:upd={id}', 'CoRT@updkarw');

Route::get('/databeritart', 'CoRT@dtaber');
Route::post('/add_beritart', 'CoRT@addber');
Route::post('/beritart:upd={id}', 'CoRT@updber');
Route::get('/beritart:del={id}', 'CoRT@delber');

Route::get('/beritart:kat={id}', 'CoRT@berita');
Route::get('/beritart:chat={id}', 'CoRT@diskusi');
Route::post('/add_komenrt', 'CoRT@komen');
Route::get('/komenrt:del={id}', 'CoRT@delkomen');
Route::get('/komen:akt={id}', 'CoRT@aktkomen');
Route::get('/komen:non={id}', 'CoRT@nonkomen');





Route::get('/ketuarw', 'CoRW@home');
Route::post('/karw:upd={id}', 'CoRW@updkarw');

Route::get('/databeritarw', 'CoRW@dtaber');
Route::post('/add_beritarw', 'CoRW@addber');
Route::post('/beritarw:upd={id}', 'CoRW@updber');
Route::get('/beritarw:del={id}', 'CoRW@delber');

Route::get('/beritarw:kat={id}', 'CoRW@berita');
Route::get('/beritarw:chat={id}', 'CoRW@diskusi');
Route::post('/add_komenrw', 'CoRW@komen');
Route::get('/komenrw:del={id}', 'CoRW@delkomen');
Route::get('/komenrw:akt={id}', 'CoRW@aktkomen');
Route::get('/komenrw:non={id}', 'CoRW@nonkomen');





Route::get('/ketuart', 'CoRT@home');
Route::post('/kart:upd={id}', 'CoRT@updkart');

Route::get('/databeritart', 'CoRT@dtaber');
Route::post('/add_beritart', 'CoRT@addber');
Route::post('/beritart:upd={id}', 'CoRT@updber');
Route::get('/beritart:del={id}', 'CoRT@delber');

Route::get('/beritart:kat={id}', 'CoRT@berita');
Route::get('/beritart:chat={id}', 'CoRT@diskusi');
Route::post('/add_komenrt', 'CoRT@komen');
Route::get('/komenrt:del={id}', 'CoRT@delkomen');
Route::get('/komenrt:akt={id}', 'CoRT@aktkomen');
Route::get('/komenrt:non={id}', 'CoRT@nonkomen');





Route::get('/warga', 'CoWarga@home');
Route::post('/war:upd={id}', 'CoWarga@updwar');

Route::get('/databerita', 'CoWarga@dtaber');
Route::post('/add_berita', 'CoWarga@addber');
Route::post('/berita:upd={id}', 'CoWarga@updber');
Route::get('/berita:del={id}', 'CoWarga@delber');

Route::get('/berita:kat={id}', 'CoWarga@berita');
Route::get('/berita:chat={id}', 'CoWarga@diskusi');
Route::post('/add_komen', 'CoWarga@komen');
Route::get('/komen:del={id}', 'CoWarga@delkomen');

Route::get('/logout', 'Controller@logout');
