<?php

Route::get('/', [
    'uses'  =>  'FrontController@index',
    'as'    =>  '/'
]);

Route::get('/about-us', [
    'uses'  =>  'FrontController@about',
    'as'    =>  'about'
]);

Route::get('/sample-post', [
    'uses'  =>  'FrontController@sample',
    'as'    =>  'sample'
]);

Route::get('/contact', [
    'uses'  =>  'FrontController@contact',
    'as'    =>  'contact'
]);

Route::get('/category-blog/{id}', [
    'uses'  =>  'FrontController@categoryBlog',
    'as'    =>  'category-blog'
]);

Route::get('/blog-details/{id}/{name}', [
    'uses'  =>  'FrontController@detailsBlog',
    'as'    =>  'blog-details'
]);



Route::get('/visitor/add-visitor', [
    'uses'  =>  'VisitorController@addVisitor',
    'as'    =>  'add-visitor'
]);

Route::post('/visitor/new-visitor', [
    'uses'  =>  'VisitorController@newVisitor',
    'as'    =>  'new-visitor'
]);

Route::get('/visitor/visitor-logout', [
    'uses'  =>  'VisitorController@visitorLogout',
    'as'    =>  'visitor-logout'
]);

Route::get('/visitor/visitor-login', [
    'uses'  =>  'VisitorController@visitorLogin',
    'as'    =>  'visitor-login',
    'middleware'    =>  'visitor'
]);


Route::post('/visitor/visitor-login', [
    'uses'  =>  'VisitorController@visitorLoginCheck',
    'as'    =>  'visitor-login-check'
]);

Route::post('/comment/new-comment', [
    'uses'  =>  'CommentController@newComment',
    'as'    =>  'new-comment'
]);


Route::get('/email/ajax-email-check/{email}', [
   'uses'   =>  'VisitorController@emilCheck',
    'as'    =>  'ajax-email-check'
]);



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware'=> ['admin']], function () {

    Route::get('/category/add-category', [
        'uses'  => 'CategoryController@index',
        'as'    => 'add-category',
    ]);

    Route::post('/category/new-category', [
        'uses'  =>  'CategoryController@newCategory',
        'as'    =>  'new-category',
        'middlware' => ['asdasd', 'asdas', 'asdasd'],
    ]);

    Route::get('/category/manage-category', [
        'uses'  =>  'CategoryController@manageCategory',
        'as'    =>  'manage-category'
    ]);

    Route::get('/category/edit-category/{id}', [
        'uses'  =>  'CategoryController@editCategory',
        'as'    =>  'edit-category'
    ]);


    Route::post('/category/update-category', [
        'uses'  =>  'CategoryController@updateCategory',
        'as'    =>  'update-category'
    ]);

    Route::get('/category/delete-category/{id}', [
        'uses'  =>  'CategoryController@deleteCategory',
        'as'    =>  'delete-category'
    ]);


    Route::get('/blog/add-blog', [
        'uses'  =>  'BlogController@index',
        'as'    =>  'add-blog',
    ]);

    Route::post('/blog/new-blog', [
        'uses'  =>  'BlogController@newBlog',
        'as'    =>  'new-blog'
    ]);

    Route::get('/blog/manage-blog', [
        'uses'  =>  'BlogController@manageBlog',
        'as'    =>  'manage-blog',
    ]);

    Route::get('/blog/view-blog/{id}', [
        'uses'  =>  'BlogController@viewBlog',
        'as'    =>  'view-blog'
    ]);


    Route::get('/blog/edit-blog/{id}', [
        'uses'  =>  'BlogController@editBlog',
        'as'    =>  'edit-blog'
    ]);

    Route::post('/blog/update-blog', [
        'uses'  =>  'BlogController@updateBlog',
        'as'    =>  'update-blog'
    ]);

    Route::get('/blog/delete-blog/{id}', [
        'uses'  =>  'BlogController@deleteBlog',
        'as'    =>  'delete-blog'
    ]);



});

