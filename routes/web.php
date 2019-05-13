<?php

Route::get('/','front\indexController@index')->name('index');

Route::get('/kitap/detay/{selflink}','front\kitap\indexController@index')->name('kitap.detay');



Route::group(['namespace' => 'admin','prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('/','indexController@index')->name('index');
        Route::group(['namespace'=>'yayinevi','prefix' => 'yayinevi','as'=>'yayinevi.'], function () {
            Route::get('/','indexController@index')->name('index');
            Route::get('/ekle','indexController@create')->name('create');
            Route::post('/ekle','indexController@store')->name('create.post');
            Route::get('/duzenle/{id}','indexController@edit')->name('edit');
            Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
            Route::get('/sil/{id}','indexController@delete')->name('delete');
        });
        Route::group(['namespace'=>'yazar','prefix' => 'yazar','as'=>'yazar.'], function () {
            Route::get('/','indexController@index')->name('index');
            Route::get('/ekle','indexController@create')->name('create');
            Route::post('/ekle','indexController@store')->name('create.post');
            Route::get('/duzenle/{id}','indexController@edit')->name('edit');
            Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
            Route::get('/sil/{id}','indexController@delete')->name('delete');
        });
        Route::group(['namespace'=>'kitap','prefix' => 'kitap','as'=>'kitap.'], function () {
            Route::get('/','indexController@index')->name('index');
            Route::get('/ekle','indexController@create')->name('create');
            Route::post('/ekle','indexController@store')->name('create.post');
            Route::get('/duzenle/{id}','indexController@edit')->name('edit');
            Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
            Route::get('/sil/{id}','indexController@delete')->name('delete');
        });
        Route::group(['namespace'=>'kategori','prefix' => 'kategori','as'=>'kategori.'], function () {
            Route::get('/','indexController@index')->name('index');
            Route::get('/ekle','indexController@create')->name('create');
            Route::post('/ekle','indexController@store')->name('create.post');
            Route::get('/duzenle/{id}','indexController@edit')->name('edit');
            Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
            Route::get('/sil/{id}','indexController@delete')->name('delete');
        });
        Route::group(['namespace'=>'slider','prefix' => 'slider','as'=>'slider.'], function () {
            Route::get('/','indexController@index')->name('index');
            Route::get('/ekle','indexController@create')->name('create');
            Route::post('/ekle','indexController@store')->name('create.post');
            Route::get('/duzenle/{id}','indexController@edit')->name('edit');
            Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
            Route::get('/sil/{id}','indexController@delete')->name('delete');
        });
});





 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');