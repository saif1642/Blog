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
Route::get('/test', function () {
    dd(App\Post::find(6)->Category()->get());
});


Route::get('/',[
    'uses' => 'FrontendController@index',
    'as'  => 'index'
]);
Route::get('/post/{slug}',[
    'uses' => 'FrontendController@singlePost',
    'as'  => 'post.single'
]);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as'  => 'home'
    ]);
    
    
    Route::get('/post/create',[
        'uses' => 'PostController@create',
        'as'  => 'post.create'
    ]);
    
    Route::post('/post/store',[
        'uses' => 'PostController@store',
        'as'  => 'post.store'
    ]);
    Route::get('/posts',[
        'uses' => 'PostController@index',
        'as'  => 'posts'
    ]);
    Route::get('/post/delete/{id}',[
        'uses' => 'PostController@destroy',
        'as'  => 'post.delete'
    ]);
    Route::get('/post/trashed',[
        'uses' => 'PostController@trashed',
        'as'  => 'post.trashed'
    ]);
    Route::get('/post/kill/{id}',[
        'uses' => 'PostController@kill',
        'as'  => 'post.kill'
    ]);
    Route::get('/post/restore/{id}',[
        'uses' => 'PostController@restore',
        'as'  => 'post.restore'
    ]);
    Route::get('/post/edit/{id}',[
        'uses' => 'PostController@edit',
        'as'  => 'post.edit'
    ]);
    Route::post('/post/update/{id}',[
        'uses' => 'PostController@update',
        'as'  => 'post.update'
    ]);


    Route::get('/tag/create',[
        'uses' => 'TagsController@create',
        'as'  => 'tag.create'
    ]);
    Route::post('/tag/store',[
        'uses' => 'TagsController@store',
        'as'  => 'tag.store'
    ]);
    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as'  => 'tags'
    ]);
    Route::get('/tag/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as'  => 'tag.edit'
    ]);
    Route::post('/tag/update/{id}',[
        'uses' => 'TagsController@update',
        'as'  => 'tag.update'
    ]);
    Route::get('/tag/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as'  => 'tag.delete'
    ]);
    
    




    Route::get('/category/create',[
        'uses' => 'CategoryController@create',
        'as'  => 'category.create'
    ]);

    Route::post('/category/store',[
        'uses' => 'CategoryController@store',
        'as'  => 'category.store'
    ]);

    Route::get('/categories',[
        'uses' => 'CategoryController@index',
        'as'  => 'categories'
    ]);
    Route::get('/category/edit/{id}',[
        'uses' => 'CategoryController@edit',
        'as'  => 'category.edit'
    ]);
    Route::post('/category/update/{id}',[
        'uses' => 'CategoryController@update',
        'as'  => 'category.update'
    ]);
    Route::get('/category/delete/{id}',[
        'uses' => 'CategoryController@destroy',
        'as'  => 'category.delete'
    ]);

    
    Route::get('/users',[
        'uses' => 'UserController@index',
        'as'  => 'users'
    ]);
    Route::get('/user/create',[
        'uses' => 'UserController@create',
        'as'  => 'user.create'
    ]);
    Route::post('/user/store',[
        'uses' => 'UserController@store',
        'as'  => 'user.store'
    ]);
    Route::get('/user/admin/{id}',[
        'uses' => 'UserController@admin',
        'as'  => 'user.admin'
    ]);
    Route::get('/user/notadmin/{id}',[
        'uses' => 'UserController@notadmin',
        'as'  => 'user.notadmin'
    ]);
    Route::get('/user/delete/{id}',[
        'uses' => 'UserController@destroy',
        'as'  => 'user.delete'
    ]);
    Route::get('/user/profile/create',[
        'uses' => 'ProfileController@index',
        'as'  => 'user.profile.create'
    ]);
    Route::post('/user/profile/update',[
        'uses' => 'ProfileController@update',
        'as'  => 'user.profile.update'
    ]);

    Route::get('/setting/create',[
        'uses' => 'SettingController@index',
        'as'  => 'setting.create'
    ]);

    Route::post('/setting/update',[
        'uses' => 'SettingController@update',
        'as'  => 'setting.update'
    ]);



    

});



