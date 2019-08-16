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
Route::get('/items/download', [
    'uses'=> 'FrontEndController@excel',
    'as'=> 'allitems.download'
]);


########################################

Route::get('/',[
    'uses'  =>'FrontEndController@index',
    'as'    =>  '/'
]);
Route::get('qr-code', function () {
    return QrCode::size(500)->generate('Welcome to kerneldev.com!');
});
Route::get('/items',[
    'uses'  =>'FrontEndController@item',
    'as'    =>  'public.allitems'
]);
Route::get('/categories',[
    'uses'  =>'FrontEndController@category',
    'as'    =>  'public.categories'
]);
Route::get('/conditions',[
    'uses'  =>'FrontEndController@condition',
    'as'    =>  'public.conditions'
]);
Route::get('/places',[
    'uses'  =>'FrontEndController@place',
    'as'    =>  'public.places'
]);
Route::get('/category/{id}',[
    'uses'  =>'FrontEndController@cate_items',
    'as'    =>  'public.category.items'
]);
Route::get('/place/{id}',[
    'uses'  =>'FrontEndController@place_items',
    'as'    =>  'public.place.items'
]);
Route::get('/condition/{id}',[
    'uses'  =>'FrontEndController@condition_items',
    'as'    =>  'public.condition.items'
]);
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('/home', [
        'uses'=> 'HomeController@index',
        'as' => 'admin.home']);
    ###############ITEMS###############################################
        Route::get('/item',[
        'uses'  =>  'ItemsController@index',
        'as'    =>  'admin.items'
    ]);
    Route::get('/item/create',[
        'uses'  =>  'ItemsController@create',
        'as'    =>  'admin.item.create'
    ]);
    Route::post('/item/store',[
        'uses'  =>  'ItemsController@store',
        'as'    =>  'admin.item.store'
    ]);
    Route::get('/item/edit/{id}',[
        'uses'  =>  'ItemsController@edit',
        'as'    =>  'admin.item.edit'
    ]);
    Route::get('/item/delete/{id}',[
        'uses'  =>  'ItemsController@destroy',
        'as'    =>  'admin.item.delete'
    ]);
    Route::post('/item/update/{id}',[
        'uses'  =>  'ItemsController@update',
        'as'    =>  'admin.item.update'
    ]);
    Route::get('/item/excel/',[
        'uses'  =>  'ItemsController@excel',
        'as'    =>  'admin.items.excel'
    ]);

    ###########CATEGORY################################################
    Route::get('/category',[
        'uses'  =>  'CategoriesController@index',
        'as'    =>  'admin.categories'
    ]);
    Route::get('/category/create',[
        'uses'  =>  'CategoriesController@create',
        'as'    =>  'admin.category.create'
    ]);
    Route::post('/category/store',[
        'uses'  =>  'CategoriesController@store',
        'as'    =>  'admin.category.store'
    ]);
    Route::get('/category/edit/{id}',[
        'uses'  =>  'CategoriesController@edit',
        'as'    =>  'admin.category.edit'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'  =>  'CategoriesController@destroy',
        'as'    =>  'admin.category.delete'
    ]);
    Route::post('/category/update/{id}',[
        'uses'  =>  'CategoriesController@update',
        'as'    =>  'admin.category.update'
    ]);
    ##############PLACES#############################
    Route::get('/place',[
        'uses'  =>  'PlacesController@index',
        'as'    =>  'admin.places'
    ]);
    Route::get('/place/create',[
        'uses'  =>  'PlacesController@create',
        'as'    =>  'admin.place.create'
    ]);
    Route::post('/place/store',[
        'uses'  =>  'PlacesController@store',
        'as'    =>  'admin.place.store'
    ]);
    Route::get('/place/delete/{id}',[
        'uses'  =>  'PlacesController@destroy',
        'as'    =>  'admin.place.delete'
    ]);
    Route::get('/place/edit/{id}',[
        'uses'  =>  'PlacesController@edit',
        'as'    =>  'admin.place.edit'
    ]);
    Route::post('/place/update/{id}',[
        'uses'  =>  'PlacesController@update',
        'as'    =>  'admin.place.update'
    ]);
    ###############CONDITIONS#################
    Route::get('/condition',[
        'uses'  =>  'ConditionsController@index',
        'as'    =>  'admin.conditions'
    ]);
    Route::get('/condition/create',[
        'uses'  =>  'ConditionsController@create',
        'as'    =>  'admin.condition.create'
    ]);
    Route::post('/condition/store',[
        'uses'  =>  'ConditionsController@store',
        'as'    =>  'admin.condition.store'
    ]);
    Route::get('/condition/edit/{id}',[
        'uses'  =>  'ConditionsController@edit',
        'as'    =>  'admin.condition.edit'
    ]);
    Route::get('/condition/delete/{id}',[
        'uses'  =>  'ConditionsController@destroy',
        'as'    =>  'admin.condition.delete'
    ]);
    Route::post('/condition/update/{id}',[
        'uses'  =>  'ConditionsController@update',
        'as'    =>  'admin.condition.update'
    ]);
});

