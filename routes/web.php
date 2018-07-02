<?php

// 生成验证码图片
Route::get('/captcha', 'CaptchaController@captcha')->name('captcha');


//// 必须登录才能访问的组
//Route::middleware('login')->group(function(){

    // 显示添加日志表单
    Route::get('/blog', 'BlogController@add')->name('blog.add');
    // 处理表单的路由
    Route::post('/blog', 'BlogController@doadd')->name('blog.doadd');
    // 日志列表
    Route::get('/myblogs', 'BlogController@list')->name('blog.list');
    // 显示错误页面
    Route::view('/error', 'error')->name('error');
    Route::get('/blog/delete/{id}', 'BlogController@delete')->name('blog.delete');
    // 显示修改日志表单
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    // 处理表单的路由
    Route::post('/blog/edit/{id}', 'BlogController@doedit')->name('blog.doedit');
    // 退出
    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/face', 'FaceController@index')->name('face');

    Route::get('/password', 'PasswordController@index')->name('password');
    Route::post('/dopass', 'PasswordController@doindex')->name('dopass');

    // 点赞
    Route::get('/ding/{blog_id}', 'BlogController@ding')->name('ding');

    // 评论
    Route::post('/comment', 'CommentController@doadd')->name('comment.doadd');


//});


// 显示表单
Route::get('/regist', 'RegistController@regist')->name('regist');
// 处理表单
Route::post('/regist', 'RegistController@doregist')->name('doregist');


// 显示表单
Route::get('/login', 'LoginController@login')->name('login');
// 处理表单
Route::post('/login', 'LoginController@dologin')->name('dologin');


Route::get('/', 'IndexController@index')->name('index');

// 日志详情页
Route::get('/blog/{id}', 'IndexController@blog')->name('blog.content');


Route::get('/space/{id?}', 'SpaceController@index')->name('space');

Route::get('/testsms','TestController@testsms');

Route::get('/sendmobilecode', 'RegistController@sendmobilecode')->name('ajax-send-modbile-code');

Route::get('/ajax/newblogs', 'IndexController@ajaxnewblogs')->name('ajax.newblogs');

Route::post('/test','TestController@index');
Route::view('/test','test.test');




Route::get('/comment/{blog_id}','CommentController@index')->name('comment.index');



