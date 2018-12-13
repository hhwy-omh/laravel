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

Route::get('/', 'BlogController@index')->name('index');
Route::get('/home', 'BlogController@home')->name('home');
Route::get('/Products_List', 'ProductController@Products_List')->name('Products_List');
Route::get('/Brand_Manage', 'ProductController@Brand_Manage')->name('Brand_Manage');
Route::post('/Brand_Manage_update', 'ProductController@Brand_Manage_update')->name('Brand_Manage_update');
Route::get('/Brand_Manage_delete', 'ProductController@Brand_Manage_delete')->name('Brand_Manage_delete');
Route::get('/Brand_Manage_up1', 'ProductController@Brand_Manage_up1')->name('Brand_Manage_up1');
Route::get('/Brand_Manage_up2', 'ProductController@Brand_Manage_up2')->name('Brand_Manage_up2');
Route::get('/Category_Manage', 'ProductController@Category_Manage')->name('Category_Manage');
Route::get('/Category_Manage_up', 'ProductController@Category_Manage_up')->name('Category_Manage_up');
Route::post('/Category_Manage_update', 'ProductController@Category_Manage_update')->name('Category_Manage_update');
Route::get('/Category_Manage_in', 'ProductController@Category_Manage_in')->name('Category_Manage_in');
Route::post('/Category_Manage_insert', 'ProductController@Category_Manage_insert')->name('Category_Manage_insert');
Route::get('/Category_Manage_delete', 'ProductController@Category_Manage_delete')->name('Category_Manage_delete');
Route::get('/advertising', 'BlogController@advertising')->name('advertising');
Route::get('/Sort_ads', 'BlogController@Sort_ads')->name('Sort_ads');
Route::get('/transaction', 'BlogController@transaction')->name('transaction');
Route::get('/Order_Chart', 'BlogController@Order_Chart')->name('Order_Chart');
Route::get('/Orderform', 'BlogController@Orderform')->name('Orderform');
Route::get('/Amounts', 'BlogController@Amounts')->name('Amounts');
Route::get('/Add_Brand', 'ProductController@Add_Brand')->name('Add_Brand');
Route::get('/Order_handling', 'BlogController@Order_handling')->name('Order_handling');
Route::get('/Refund', 'BlogController@Refund')->name('Refund');
Route::get('/Cover_management', 'BlogController@Cover_management')->name('Cover_management');
Route::get('/payment_method', 'BlogController@payment_method')->name('payment_method');
Route::get('/Payment_Configure', 'BlogController@Payment_Configure')->name('Payment_Configure');
Route::get('/user_list', 'BlogController@user_list')->name('user_list');
Route::get('/member_Grading', 'BlogController@member_Grading')->name('member_Grading');
Route::get('/integration', 'BlogController@integration')->name('integration');
Route::get('/Shop_list', 'BlogController@Shop_list')->name('Shop_list');
Route::get('/Shops_Audit', 'BlogController@Shops_Audit')->name('Shops_Audit');
Route::get('/Guestbook', 'BlogController@Guestbook')->name('Guestbook');
Route::get('/Feedback', 'BlogController@Feedback')->name('Feedback');
Route::get('/article_list', 'BlogController@article_list')->name('article_list');
Route::get('/article_Sort', 'BlogController@article_Sort')->name('article_Sort');
Route::get('/Systems', 'BlogController@Systems')->name('Systems');
Route::get('/System_section', 'BlogController@System_section')->name('System_section');
Route::get('/System_Logs', 'BlogController@System_Logs')->name('System_Logs');
Route::get('/admin_Competence', 'RbacController@admin_Competence')->name('admin_Competence');
Route::get('/admin_Competence_i', 'RbacController@admin_Competence_i')->name('admin_Competence_i');
Route::post('/admin_Competence_in', 'RbacController@admin_Competence_in')->name('admin_Competence_in');
Route::get('/Competence', 'RbacController@Competence')->name('Competence');
Route::get('/Competence_up', 'RbacController@Competence_up')->name('Competence_up');
Route::post('/Competence_update', 'RbacController@Competence_update')->name('Competence_update');
Route::post('/Competence_post', 'RbacController@Competence_post')->name('Competence_post');
Route::get('/rbac_admin', 'RbacController@rbac_admin')->name('rbac_admin');
Route::get('/administrator', 'RbacController@administrator')->name('administrator');
Route::get('/administrator_update', 'RbacController@administrator_update')->name('administrator_update');
Route::get('/administrator_delete', 'RbacController@administrator_delete')->name('administrator_delete');
Route::post('/administrator_insert', 'RbacController@administrator_insert')->name('administrator_insert');
Route::get('/admin_info', 'RbacController@admin_info')->name('admin_info');
Route::post('/admin_info_up', 'RbacController@admin_info_up')->name('admin_info_up');
Route::post('/admin_info_post', 'RbacController@admin_info_post')->name('admin_info_post');
Route::get('/login', 'RegistController@login')->name('login');
Route::post('/login_in', 'RegistController@login_in')->name('login_in');
Route::get('/logout', 'RegistController@logout')->name('logout');
Route::get('/emil', 'RegistController@emil')->name('emil');
Route::get('/emil_in', 'RegistController@emil_in')->name('emil_in');
Route::get('/register', 'RegistController@register')->name('register');
Route::post('/register_get', 'RegistController@register_get')->name('register_get');
Route::get('/register_name', 'RegistController@register_name')->name('register_name');
Route::get('/picture_add', 'ProductController@picture_add')->name('picture_add');
Route::post('/picture_add_insert', 'ProductController@picture_add_insert')->name('picture_add_insert');
Route::get('/article', 'BlogController@article')->name('article');
Route::get('/product_category_add', 'ProductController@product_category_add')->name('product_category_add');
Route::get('/ajax_index_cat', 'ProductController@ajax_index_cat')->name('ajax_index_cat');
Route::get('/member_add', 'ProductController@member_add')->name('member_add');
Route::post('/Add_Brand_insert', 'ProductController@Add_Brand_insert')->name('Add_Brand_insert');
Route::get('/Add_Attribute', 'ProductController@Add_Attribute')->name('Add_Attribute');
