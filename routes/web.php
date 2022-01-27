<?php

Auth::routes();
Route::get('email/verify/{id}', 'Auth\VerificationUserController@verify')->name('verificationUser.verify');
Route::get('email/resend', 'Auth\VerificationUserController@resend')->name('verificationUser.resend');
Route::get('email/pemilik/verify/{id}', 'Auth\VerificationOwnerController@verify')->name('verificationOwner.verify');


Route::get('/','WelcomeController@index')->name('/');
Route::post('/keranjang/{alat}','KeranjangController@store')->name('keranjang.tambah');
Route::post('/keranjang/hapus/{keranjang}','KeranjangController@destroy')->name('keranjang.hapus');
Route::get('/keranjang','KeranjangController@show')->name('keranjang.tampil');
Route::post('/keranjang','KeranjangController@checkout')->name('keranjang.checkout');
Route::get('/pemesanan','PembayaranController@index')->name('pemesanan');

Route::post('/pembayaran','PembayaranController@proses')->name('pembayaran');
Route::get('/data-pembayaran', 'PembayaranController@show')->name('data.pembayaran');
Route::post('/bukti/pembayaran/{transaksi}','PembayaranController@update')->name('bukti.pembayaran');
Route::get('/kontak', 'WelcomeController@contact')->name('kontak');
Route::get('/semua', 'WelcomeController@showAll')->name('semua');
Route::get('/alat/detail/{id}/{slug}', 'WelcomeController@show')->name('alat.detail');
Route::get('/edit/profil', 'UserController@show')->name('edit.profile');
Route::post('/edit/profil', 'UserController@update')->name('update.profile');
Route::patch('/edit/profil', 'UserController@resetPassword')->name('update.password');

Route::get('/member/daftar', 'UserController@member_daftar')->name('member.daftar');
Route::post('/member/daftar', 'UserController@member_update')->name('member.update');



Route::get('/kategori/{slug}', 'WelcomeController@category')->name('kategori');

Route::group(['prefix' => '/admin'], function(){
  Route::get('/login','Admin\LoginController@showLoginFrom')->name('admin.login');
  Route::post('/login','Admin\LoginController@login')->name('admin.get.login');
  Route::post('/logout','Admin\LoginController@logoutAdmin')->name('admin.logout');
  Route::get('/beranda','Admin\AdminController@index')->name('admin.beranda');
  Route::get('/penyewa','Admin\PenyewaController@index')->name('admin.penyewa');
  Route::get('/pemilik','Admin\PemilikController@index')->name('admin.pemilik');
  Route::get('/alat','Admin\AlatController@alat')->name('admin.alat');

  Route::get('/alat/tambah','Admin\AlatController@create')->name('admin.alat.tambah');
  Route::post('/alat/tambah','Admin\AlatController@store')->name('admin.alat.simpan');
  Route::get('/alat/edit/{id}/{slug}','Admin\AlatController@edit')->name('admin.alat.edit');
  Route::patch('/alat/edit/{alat}','Admin\AlatController@update')->name('admin.alat.update');
  Route::post('/alat/hapus/{alat}','Admin\AlatController@destroy')->name('admin.alat.hapus');

  Route::get('/paketan','Admin\AlatController@paket')->name('admin.paket');

  Route::get('/paket/tambah','Admin\AlatController@create_paket')->name('admin.paket.tambah');
  Route::post('/paket/tambah','Admin\AlatController@store_paket')->name('admin.paket.simpan');
  Route::get('/paket/edit/{id}/{slug}','Admin\AlatController@edit_paket')->name('admin.paket.edit');
  Route::patch('/paket/edit/{alat}','Admin\AlatController@update_paket')->name('admin.paket.update');
  Route::post('/paket/hapus/{alat}','Admin\AlatController@destroy_paket')->name('admin.paket.hapus');

  Route::get('/pemesanan','Admin\PemesananController@index')->name('admin.pemesanan');
  Route::get('/kategori','Admin\KategoriController@index')->name('admin.kategori');
  Route::post('/kategori','Admin\KategoriController@store')->name('admin.kategori.simpan');
  Route::patch('/kategori/{kategori}','Admin\KategoriController@update')->name('admin.kategori.edit');
  Route::post('/kategori/{kategori}','Admin\KategoriController@destroy')->name('admin.kategori.hapus');
  Route::post('/pemesanan/{transaksi}','Admin\PemesananController@update')->name('admin.bukti.pemesanan');
  Route::post('/pengembalian/{transaksi}','Admin\PemesananController@pengembalian')->name('admin.bukti.pengembalian');

  Route::get('/toko','Admin\AdminController@toko')->name('admin.toko');
  Route::get('/toko/edit','Admin\AdminController@toko_edit')->name('admin.toko.edit');
  Route::patch('/toko/edit','Admin\AdminController@update')->name('admin.toko.update');

});


Route::group(['prefix' => '/'], function(){
  Route::get('/beranda','Pemilik\PemilikController@index')->name('pemilik.beranda');
  Route::get('/profil','Pemilik\PemilikController@show')->name('pemilik.profil');
  Route::patch('/profile','Pemilik\PemilikController@update')->name('pemilik.profil.update');
  Route::post('/profile','Pemilik\PemilikController@resetPassword')->name('pemilik.password.update');
  Route::get('/toko','Pemilik\TokoController@index')->name('pemilik.toko');
  Route::get('/toko/tambah','Pemilik\TokoController@create')->name('pemilik.toko.tambah');
  Route::post('/toko/tambah','Pemilik\TokoController@store')->name('pemilik.toko.simpan');
  Route::get('/toko/edit','Pemilik\TokoController@edit')->name('pemilik.toko.edit');
  Route::patch('/toko/edit','Pemilik\TokoController@update')->name('pemilik.toko.update');
  Route::get('/alat','Pemilik\AlatController@index')->name('pemilik.alat');
  Route::get('/alat/tambah','Pemilik\AlatController@create')->name('pemilik.alat.tambah');
  Route::post('/alat/tambah','Pemilik\AlatController@store')->name('pemilik.alat.simpan');
  Route::get('/alat/edit/{id}/{slug}','Pemilik\AlatController@edit')->name('pemilik.alat.edit');
  Route::patch('/alat/edit/{alat}','Pemilik\AlatController@update')->name('pemilik.alat.update');
  Route::post('/alat/hapus/{alat}','Pemilik\AlatController@destroy')->name('pemilik.alat.hapus');
  Route::get('/paket','Pemilik\PaketController@index')->name('pemilik.paket');
  Route::get('/paket/tambah','Pemilik\PaketController@create')->name('pemilik.paket.tambah');
  Route::post('/paket/tambah','Pemilik\PaketController@store')->name('pemilik.paket.simpan');
  Route::get('/paket/edit/{id}/{slug}','Pemilik\PaketController@edit')->name('pemilik.paket.edit');
  Route::patch('/paket/edit/{alat}','Pemilik\PaketController@update')->name('pemilik.paket.update');
  Route::post('/paket/hapus/{alat}','Pemilik\PaketController@destroy')->name('pemilik.paket.hapus');
  Route::get('/data-pemesanan','Pemilik\PemesananController@index')->name('pemilik.pemesanan');
});
