<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('lang/home', 'App\Http\Controllers\LangController@index');
Route::get('lang/change', 'App\Http\Controllers\LangController@change')->name('changeLang');



Route::get('/', 'App\Http\Controllers\Home@index')->name('dashboard');

Route::get('mainmenu', function () {
    return view('includes/menu-main');
});

Route::get('menu-colors', function () {
    return view('includes/menu-colors');
});

// Route::get('menufooter', 'App\Http\Controllers\Home@footer')->name('footer');
Route::get('menufooter', function () {
    return view('includes/menu-footer');
})->name('footer');




//Clear all caches
 Route::get('/cache/1', function() {
     \Artisan::call('route:cache');
     return 'Routes cache cleared';
 });
  Route::get('/cache/2', function() {
     \Artisan::call('config:cache');
     return 'Config cache cleared';
 });
  Route::get('/cache/3', function() {
     \Artisan::call('cache:clear');
     return 'Application cache cleared';
 });
  Route::get('/cache/4', function() {
     \Artisan::call('view:clear');
     return 'View cache cleared';
 });
 Route::get('/cache/5', function() {
     \Artisan::call('optimize:clear');
     return 'optimizer  cache cleared';
 });



//version routes
Route::get('versions', 'App\Http\Controllers\Admin\VersionController@home')->name('versions.home');

Route::get('pks', 'App\Http\Controllers\Home@pks')->name('pks');
Route::post('pksstore', 'App\Http\Controllers\Home@pksstore')->name('pks.store');
Route::get('pks/listregisterresp', 'App\Http\Controllers\AjaxController@listregisterresppks')->name('pks.registerresp.list');
Route::get('pks/listkaryavibhag', 'App\Http\Controllers\AjaxController@listkaryavibhag')->name('pks.karyavibhag.list');

Route::get('ssv', 'App\Http\Controllers\SsvController@index')->name('ssv.home');
Route::get('ssv/register', 'App\Http\Controllers\SsvController@register')->name('ssv.register');
Route::post('ssv/registerstore', 'App\Http\Controllers\SsvController@registerstore')->name('ssv.register.api');
Route::any('ssv/checkstatus', 'App\Http\Controllers\SsvController@checkstatus')->name('ssv.checkstatus');

Route::get('ssv/report/download','App\Http\Controllers\AdminController@exportssv')->name('excel.download.ssv');
Route::get('ssv/report', 'App\Http\Controllers\Reportssv@vibhag')->name('vibhag.dashboard.ssv');

Route::get('ssv/report/kdp', 'App\Http\Controllers\Reportssv@kdpdashboard')->name('kdp.dashboard.ssv');
Route::get('ssv/report/vibhag/all', 'App\Http\Controllers\Reportssv@vibhagdashboardall')->name('vibhag.dashboard.all.ssv');

Route::post('ssv/report/vibhaglist', 'App\Http\Controllers\Reportssv@vibhaglist')->name('vibhag.dashboard.list.ssv');
Route::get('ssv/report/vibhaglistall', 'App\Http\Controllers\Reportssv@vibhaglistall')->name('vibhag.dashboard.listall.ssv');
Route::post('ssv/report/bhag', 'App\Http\Controllers\Reportssv@bhag')->name('bhag.dashboard.ssv');
Route::post('ssv/report/bhaglistall', 'App\Http\Controllers\Reportssv@bhaglistall')->name('bhag.dashboard.listall.ssv');
Route::post('ssv/report/nagar', 'App\Http\Controllers\Reportssv@nagar')->name('nagar.dashboard.ssv');
Route::post('ssv/report/nagarlistall', 'App\Http\Controllers\Reportssv@nagarlistall')->name('nagar.dashboard.listall.ssv');
Route::post('ssv/report/mandala', 'App\Http\Controllers\Reportssv@mandala')->name('mandala.dashboard.ssv');

Route::get('ssv/report/vibhags', 'App\Http\Controllers\Reportssv@vibhagdashboard')->name('vibhags.dashboard.ssv');
Route::get('ssv/report/bhags', 'App\Http\Controllers\Reportssv@bhagdashboard')->name('bhags.dashboard.ssv');
Route::get('ssv/report/nagars', 'App\Http\Controllers\Reportssv@nagardashboard')->name('nagars.dashboard.ssv');


Route::get('ssv/report/vibhags/{id}', 'App\Http\Controllers\Reportssv@vibhagdashboardids')->name('vibhags.dashboard.id.ssv');
Route::get('ssv/report/bhags/{id}', 'App\Http\Controllers\Reportssv@bhagdashboardids')->name('bhags.dashboard.id.ssv');
Route::get('ssv/report/nagars/{id}', 'App\Http\Controllers\Reportssv@nagardashboardids')->name('nagars.dashboard.id.ssv');

Route::post('ssv/report/bhagnagar', 'App\Http\Controllers\Reportssv@bhagnagar')->name('bhagnagar.dashboard.ssv');
Route::post('ssv/report/vibhagbhag', 'App\Http\Controllers\Reportssv@vibhagbhag')->name('vibhagbhag.list.ssv');

Route::post('ssv/report/vibhagmandala', 'App\Http\Controllers\Reportssv@vibhagmandala')->name('vibhagmandala.dashboard.ssv');

Route::post('ssv/report/vibhagnagarlist', 'App\Http\Controllers\Reportssv@vibhagnagarlist')->name('vibhagnagar.list.ssv');

Route::get('ssv/report/export/vibhag/{id}', 'App\Http\Controllers\Reportssv@ssvexportvibhag')->name('ssv.export.vibhag');
Route::get('ssv/report/export/bhag/{id}', 'App\Http\Controllers\Reportssv@ssvexportbhag')->name('ssv.export.bhag');
Route::get('ssv/report/export/nagar/{id}', 'App\Http\Controllers\Reportssv@ssvexportnagar')->name('ssv.export.nagar');




Route::get('listregistercategoryssv', 'App\Http\Controllers\AjaxController@listregistercategoryssv')->name('registercategory.list.ssv');
Route::post('listregistersubcategoryssv', 'App\Http\Controllers\AjaxController@listregistersubcategoryssv')->name('registersubcategory.list.ssv');
Route::get('listregisterrespssv', 'App\Http\Controllers\AjaxController@listregisterrespssv')->name('registerresp.list.ssv');
Route::post('listregisterrespsubssv', 'App\Http\Controllers\AjaxController@listregisterrespsubssv')->name('registerrespsub.list.ssv');



Route::get('home', 'App\Http\Controllers\Home@index')->name('home');
Route::get('register', 'App\Http\Controllers\Home@register')->name('register');
Route::post('registerstore', 'App\Http\Controllers\Home@registerstore')->name('register.api');


Route::get('listvarga', 'App\Http\Controllers\AjaxController@listvarga')->name('varga.list');

Route::any('listallareas', 'App\Http\Controllers\AjaxController@listallareas')->name('area.list');
Route::any('listallupavasathi', 'App\Http\Controllers\AjaxController@listallupavasathi')->name('upavasathi.list');
Route::any('listalltaluk', 'App\Http\Controllers\AjaxController@listalltaluk')->name('taluk.list');
Route::any('listalldistrict', 'App\Http\Controllers\AjaxController@listalldistrict')->name('district.list');
Route::any('listallcity', 'App\Http\Controllers\AjaxController@listallcity')->name('city.list');

Route::get('listintrarea', 'App\Http\Controllers\AjaxController@listintrarea')->name('intrarea.list');
Route::get('listjag', 'App\Http\Controllers\AjaxController@listjag')->name('jag.list');



Route::get('listregistercategory', 'App\Http\Controllers\AjaxController@listregistercategory')->name('registercategory.list');
Route::post('listregistersubcategory', 'App\Http\Controllers\AjaxController@listregistersubcategory')->name('registersubcategory.list');
Route::get('listregisterresp', 'App\Http\Controllers\AjaxController@listregisterresp')->name('registerresp.list');
Route::post('listregisterrespsub', 'App\Http\Controllers\AjaxController@listregisterrespsub')->name('registerrespsub.list');

Route::any('checkstatus', 'App\Http\Controllers\Home@checkstatus')->name('checkstatus');
Route::post('verifymobile', 'App\Http\Controllers\Home@verifymobile')->name('verifymobile');

Route::get('listresources', 'App\Http\Controllers\Home@listresources')->name('resources.list');

Route::post('listareasearch', 'App\Http\Controllers\AjaxController@listareasearch')->name('area.search');

Route::get('report', 'App\Http\Controllers\Report@vibhag')->name('vibhag.dashboard');

Route::get('report/kdp', 'App\Http\Controllers\Report@kdpdashboard')->name('kdp.dashboard');
Route::get('report/vibhag/all', 'App\Http\Controllers\Report@vibhagdashboardall')->name('vibhag.dashboard.all');

Route::post('report/vibhaglist', 'App\Http\Controllers\Report@vibhaglist')->name('vibhag.dashboard.list');
Route::get('report/vibhaglistall', 'App\Http\Controllers\Report@vibhaglistall')->name('vibhag.dashboard.listall');
Route::post('report/bhag', 'App\Http\Controllers\Report@bhag')->name('bhag.dashboard');
Route::post('report/bhaglistall', 'App\Http\Controllers\Report@bhaglistall')->name('bhag.dashboard.listall');
Route::post('report/nagar', 'App\Http\Controllers\Report@nagar')->name('nagar.dashboard');
Route::post('report/nagarlistall', 'App\Http\Controllers\Report@nagarlistall')->name('nagar.dashboard.listall');
Route::post('report/mandala', 'App\Http\Controllers\Report@mandala')->name('mandala.dashboard');

Route::get('report/vibhags', 'App\Http\Controllers\Report@vibhagdashboard')->name('vibhags.dashboard');
Route::get('report/bhags', 'App\Http\Controllers\Report@bhagdashboard')->name('bhags.dashboard');
Route::get('report/nagars', 'App\Http\Controllers\Report@nagardashboard')->name('nagars.dashboard');


Route::get('report/vibhags/{id}', 'App\Http\Controllers\Report@vibhagdashboardids')->name('vibhags.dashboard.id');
Route::get('report/bhags/{id}', 'App\Http\Controllers\Report@bhagdashboardids')->name('bhags.dashboard.id');
Route::get('report/nagars/{id}', 'App\Http\Controllers\Report@nagardashboardids')->name('nagars.dashboard.id');

Route::post('report/bhagnagar', 'App\Http\Controllers\Report@bhagnagar')->name('bhagnagar.dashboard');
Route::post('report/vibhagbhag', 'App\Http\Controllers\Report@vibhagbhag')->name('vibhagbhag.list');

Route::post('report/vibhagmandala', 'App\Http\Controllers\Report@vibhagmandala')->name('vibhagmandala.dashboard');

Route::post('report/vibhagnagarlist', 'App\Http\Controllers\Report@vibhagnagarlist')->name('vibhagnagar.list');

Route::get('login', 'App\Http\Controllers\Home@loginind')->name('login');
Route::post('loginindex', 'App\Http\Controllers\Home@login')->name('login.api');

Route::get('forgotpassword', 'App\Http\Controllers\Home@forgotpassword')->name('forgot-password');
Route::post('forgotpasswordstore', 'App\Http\Controllers\Home@forgotpasswordstore')->name('forgot-password.api');
Route::post('confirmpasswordstore', 'App\Http\Controllers\Home@confirmpasswordstore')->name('confirm-password');
Route::get('newtickets', 'App\Http\Controllers\Home@newtickets')->name('newtickets');
Route::get('mytickets', 'App\Http\Controllers\Home@mytickets')->name('mytickets');
Route::post('newticketsstore', 'App\Http\Controllers\Home@newticketsstore')->name('newtickets.api');
Route::get('transformations', 'App\Http\Controllers\Home@transformations')->name('transformations');
Route::get('logout', 'App\Http\Controllers\Home@logout')->name('logout');

Route::any('category', 'App\Http\Controllers\Home@category')->name('category');

// Route::get('subcategory', 'App\Http\Controllers\Home@subcategory')->name('subcategory');

Route::get('subcategory', 'App\Http\Controllers\Home@subcategory')->name('subcategory');

Route::post('subcategoryajax', 'App\Http\Controllers\AjaxController@category')->name('subcategoryAjax');

Route::get('maintanence', 'App\Http\Controllers\Home@maintanence')->name('maintanence');
Route::get('joinus', 'App\Http\Controllers\Home@joinus')->name('join_us');
Route::get('media', 'App\Http\Controllers\Home@media')->name('media');
Route::get('transformation', 'App\Http\Controllers\Home@transformation')->name('transformation');


//Admin 

Route::get('admin/login','App\Http\Controllers\Admin\Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('admin/login', 'App\Http\Controllers\Admin\Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('admin/logout', 'App\Http\Controllers\Admin\Auth\AdminAuthController@logout')->name('adminLogout');



//Vibhag 

Route::get('vibhag/login','App\Http\Controllers\Vibhag\Auth\AdminAuthController@getLogin')->name('vibhag.adminLogin');
Route::post('vibhag/login', 'App\Http\Controllers\Vibhag\Auth\AdminAuthController@postLogin')->name('vibhag.adminLoginPost');
Route::get('vibhag/logout', 'App\Http\Controllers\Vibhag\Auth\AdminAuthController@logout')->name('vibhag.adminLogout');


//Vibhag-ssv

Route::get('vibhagssv/login', function () {
    return redirect()->route('vibhag.adminLogin');
})->name('vibhagssv.adminLogin');
Route::post('vibhagssv/login', function () {
    return redirect()->route('vibhag.adminLogin');
})->name('vibhagssv.adminLoginPost');
Route::get('vibhagssv/logout', function () {
    return redirect()->route('vibhag.adminLogout');
})->name('vibhagssv.adminLogout');


Route::group(['middleware' => 'adminsession'], function () {
    
Route::group(['prefix' => 'admin'], function () {

    Route::get('edit_profile','App\Http\Controllers\Admin\AdminController@edit_profile')->name('adminprofile.edit');
    Route::put('edit_profile/update/{id}','App\Http\Controllers\Admin\AdminController@update_profile')->name('adminprofile.update');

    Route::get('dashboard','App\Http\Controllers\Admin\AdminController@dashboard')->name('admindashboard'); 
    Route::get('dashboard/vibhaglist','App\Http\Controllers\Admin\AdminController@vibhaglist')->name('vibhag.list'); 
    Route::get('dashboard/excel/download','App\Http\Controllers\Admin\AdminController@export')->name('excel.download');
    Route::get('dashboard/excel/admindownloadssv','App\Http\Controllers\Admin\AdminController@adminexportssv')->name('adminexcel.download.ssv');
    Route::get('dashboard/excel/admindownloadpks','App\Http\Controllers\Admin\AdminController@adminexportpks')->name('adminexcel.download.pks');
    Route::get('dashboard/vasathiall/download','App\Http\Controllers\Admin\AdminController@vasathiallreport')->name('vasathiall.download'); 
    Route::get('dashboard/career','App\Http\Controllers\Admin\AdminController@careerreport')->name('report.career');
    Route::get('dashboard/javb','App\Http\Controllers\Admin\AdminController@javbreport')->name('report.javb'); 

    Route::get('news','App\Http\Controllers\Admin\AdminController@managenews')->name('adminnews');
    Route::get('news/add','App\Http\Controllers\Admin\AdminController@addnews')->name('adminnews.add');
    Route::post('news/store','App\Http\Controllers\Admin\AdminController@news')->name('admin.news.store');
    Route::get('news/edit/{id}','App\Http\Controllers\Admin\AdminController@editnews')->name('admin.news.edit');
    Route::put('news/update/{id}','App\Http\Controllers\Admin\AdminController@updatenews')->name('admin.news.update');
    Route::get('news/delete/{id}','App\Http\Controllers\Admin\AdminController@deletenews')->name('admin.news.delete');
    Route::get('news/view/{id}','App\Http\Controllers\Admin\AdminController@viewnews')->name('admin.news.view');

    Route::get('banner','App\Http\Controllers\Admin\BannerController@managebanner')->name('adminbanner');
    Route::get('banner/add','App\Http\Controllers\Admin\BannerController@addbanner')->name('adminbanner.add');
    Route::post('banner/store','App\Http\Controllers\Admin\BannerController@banner')->name('admin.banner.store');
    Route::get('banner/edit/{id}','App\Http\Controllers\Admin\BannerController@editbanner')->name('admin.banner.edit');
    Route::put('banner/update/{id}','App\Http\Controllers\Admin\BannerController@updatebanner')->name('admin.banner.update');
    Route::get('banner/delete/{id}','App\Http\Controllers\Admin\BannerController@deletebanner')->name('admin.banner.delete');
    Route::get('banner/view/{id}','App\Http\Controllers\Admin\BannerController@viewbanner')->name('admin.banner.view');


    Route::get('updates','App\Http\Controllers\Admin\BupdatesController@manageupdates')->name('adminupdates');
    Route::get('updates/add','App\Http\Controllers\Admin\BupdatesController@addupdates')->name('adminupdates.add');
    Route::post('updates/store','App\Http\Controllers\Admin\BupdatesController@updates')->name('admin.updates.store');
    Route::get('updates/edit/{id}','App\Http\Controllers\Admin\BupdatesController@editupdates')->name('admin.updates.edit');
    Route::put('updates/update/{id}','App\Http\Controllers\Admin\BupdatesController@updateupdates')->name('admin.updates.update');
    Route::get('updates/delete/{id}','App\Http\Controllers\Admin\BupdatesController@deleteupdates')->name('admin.updates.delete');
    Route::get('updates/view/{id}','App\Http\Controllers\Admin\BupdatesController@viewupdates')->name('admin.updates.view');

    Route::get('activities','App\Http\Controllers\Admin\ActivitiesController@manageactivities')->name('adminactivities');
    Route::get('activities/add','App\Http\Controllers\Admin\ActivitiesController@addactivities')->name('adminactivities.add');
    Route::post('activities/store','App\Http\Controllers\Admin\ActivitiesController@activities')->name('admin.activities.store');
    Route::get('activities/edit/{id}','App\Http\Controllers\Admin\ActivitiesController@editactivities')->name('admin.activities.edit');
    Route::put('activities/update/{id}','App\Http\Controllers\Admin\ActivitiesController@updateactivities')->name('admin.activities.update');
    Route::get('activities/delete/{id}','App\Http\Controllers\Admin\ActivitiesController@deleteactivities')->name('admin.activities.delete');
    Route::get('activities/view/{id}','App\Http\Controllers\Admin\ActivitiesController@viewactivities')->name('admin.activities.view');

    Route::get('about','App\Http\Controllers\Admin\AboutController@manageabout')->name('adminabout');
    Route::get('about/add','App\Http\Controllers\Admin\AboutController@addabout')->name('adminabout.add');
    Route::post('about/store','App\Http\Controllers\Admin\AboutController@about')->name('admin.about.store');
    Route::get('about/edit/{id}','App\Http\Controllers\Admin\AboutController@editabout')->name('admin.about.edit');
    Route::put('about/update/{id}','App\Http\Controllers\Admin\AboutController@updateabout')->name('admin.about.update');
    Route::get('about/delete/{id}','App\Http\Controllers\Admin\AboutController@deleteabout')->name('admin.about.delete');
    Route::get('about/view/{id}','App\Http\Controllers\Admin\AboutController@viewabout')->name('admin.about.view');

    Route::get('content','App\Http\Controllers\Admin\ContentController@managecontent')->name('admincontent');
    Route::get('content/add','App\Http\Controllers\Admin\ContentController@addcontent')->name('admincontent.add');
    Route::post('content/store','App\Http\Controllers\Admin\ContentController@content')->name('admin.content.store');
    Route::get('content/edit/{id}','App\Http\Controllers\Admin\ContentController@editcontent')->name('admin.content.edit');
    Route::put('content/update/{id}','App\Http\Controllers\Admin\ContentController@updatecontent')->name('admin.content.update');
    Route::get('content/delete/{id}','App\Http\Controllers\Admin\ContentController@deletecontent')->name('admin.content.delete');
    Route::get('content/view/{id}','App\Http\Controllers\Admin\ContentController@viewcontent')->name('admin.content.view');

    Route::get('services','App\Http\Controllers\Admin\ServicesController@manageservices')->name('adminservices');
    Route::get('services/add','App\Http\Controllers\Admin\ServicesController@addservices')->name('adminservices.add');
    Route::post('services/store','App\Http\Controllers\Admin\ServicesController@services')->name('admin.services.store');
    Route::get('services/edit/{id}','App\Http\Controllers\Admin\ServicesController@editservices')->name('admin.services.edit');
    Route::put('services/update/{id}','App\Http\Controllers\Admin\ServicesController@updateservices')->name('admin.services.update');
    Route::get('services/delete/{id}','App\Http\Controllers\Admin\ServicesController@deleteservices')->name('admin.services.delete');
    Route::get('services/view/{id}','App\Http\Controllers\Admin\ServicesController@viewservices')->name('admin.services.view');
    Route::get('resourcelist','App\Http\Controllers\Admin\ServicesController@resourcelist')->name('resourcelist');
    
    
    
    

    Route::get('scheme','App\Http\Controllers\Admin\SchemeController@managescheme')->name('adminscheme');
    Route::get('scheme/add','App\Http\Controllers\Admin\SchemeController@addscheme')->name('adminscheme.add');
    Route::post('scheme/store','App\Http\Controllers\Admin\SchemeController@scheme')->name('admin.scheme.store');
    Route::get('scheme/edit/{id}','App\Http\Controllers\Admin\SchemeController@editscheme')->name('admin.scheme.edit');
    Route::put('scheme/update/{id}','App\Http\Controllers\Admin\SchemeController@updatescheme')->name('admin.scheme.update');
    Route::get('scheme/delete/{id}','App\Http\Controllers\Admin\SchemeController@deletescheme')->name('admin.scheme.delete');
    Route::get('scheme/view/{id}','App\Http\Controllers\Admin\SchemeController@viewscheme')->name('admin.scheme.view');

    Route::get('events','App\Http\Controllers\Admin\EventsController@manageevents')->name('adminevents');
    Route::get('events/add','App\Http\Controllers\Admin\EventsController@addevents')->name('adminevents.add');
    Route::post('events/store','App\Http\Controllers\Admin\EventsController@events')->name('admin.events.store');
    Route::get('events/edit/{id}','App\Http\Controllers\Admin\EventsController@editevents')->name('admin.events.edit');
    Route::put('events/update/{id}','App\Http\Controllers\Admin\EventsController@updateevents')->name('admin.events.update');
    Route::get('events/delete/{id}','App\Http\Controllers\Admin\EventsController@deleteevents')->name('admin.events.delete');
    Route::get('events/view/{id}','App\Http\Controllers\Admin\EventsController@viewevents')->name('admin.events.view');
    
    
    
    
    Route::get('report','App\Http\Controllers\Admin\ServicesController@managereports')->name('report');
    Route::get('report/vibhag/{id}','App\Http\Controllers\Admin\AdminController@vibhagexport')->name('report.vibhag.export.id');
    
    Route::get('report/ssv','App\Http\Controllers\Admin\SsvController@managereports')->name('report.ssv');
    // Route::get('dashboard/excel/download/ssv','App\Http\Controllers\AdminController@exportssv')->name('excel.download.ssv');
    Route::get('report/pks','App\Http\Controllers\Admin\PksController@managereports')->name('report.pks');
    
    
    Route::get('versions','App\Http\Controllers\Admin\VersionController@manageversions')->name('adminversions');
    Route::get('versions/add','App\Http\Controllers\Admin\VersionController@addversions')->name('adminversions.add');
    Route::post('versions/store','App\Http\Controllers\Admin\VersionController@versions')->name('admin.versions.store');
    Route::get('versions/edit/{id}','App\Http\Controllers\Admin\VersionController@editversions')->name('admin.versions.edit');
    Route::put('versions/update/{id}','App\Http\Controllers\Admin\VersionController@updateversions')->name('admin.versions.update');
    Route::get('versions/delete/{id}','App\Http\Controllers\Admin\VersionController@deleteversions')->name('admin.versions.delete');
    Route::get('versions/view/{id}','App\Http\Controllers\Admin\VersionController@viewversions')->name('admin.versions.view');
    
    
    
//Clear all caches
 Route::get('/cache/1', function() {
     \Artisan::call('route:cache');
     return 'Routes cache cleared';
 });
  Route::get('/cache/2', function() {
     \Artisan::call('config:cache');
     return 'Config cache cleared';
 });
  Route::get('/cache/3', function() {
     \Artisan::call('cache:clear');
     return 'Application cache cleared';
 });
  Route::get('/cache/4', function() {
     \Artisan::call('view:clear');
     return 'View cache cleared';
 });
 Route::get('/cache/5', function() {
     \Artisan::call('optimize:clear');
     return 'optimizer  cache cleared';
 });


});






Route::group(['prefix' => 'vibhag'], function () {

    Route::get('edit_profile','App\Http\Controllers\Vibhag\AdminController@edit_profile')->name('vibhag.adminprofile.edit');
    Route::put('edit_profile/update/{id}','App\Http\Controllers\Vibhag\AdminController@update_profile')->name('vibhag.adminprofile.update');

    Route::get('dashboard','App\Http\Controllers\Vibhag\AdminController@dashboard')->name('vibhag.admindashboard'); 
    Route::get('dashboard/ssv','App\Http\Controllers\Vibhag\AdminController@ssvdashboard')->name('ssv.admindashboard'); 
    Route::get('dashboard/pks','App\Http\Controllers\Vibhag\AdminController@pksdashboard')->name('pks.admindashboard'); 
    Route::get('dashboard/vibhaglist','App\Http\Controllers\Vibhag\AdminController@vibhaglist')->name('vibhag.vibhag.list'); 
    Route::get('dashboard/excel/downloadvibhagtest','App\Http\Controllers\Vibhag\AdminController@export')->name('vibhag.excel.download.test');
    Route::get('dashboard/excel/downloadvibhagssv/{id}','App\Http\Controllers\Vibhag\AdminController@exportssv')->name('vibhag.excel.download.ssv');
    Route::get('dashboard/excel/downloadvibhagpks/{id}','App\Http\Controllers\Vibhag\AdminController@exportpks')->name('vibhag.excel.download.pks');
    Route::get('dashboard/vasathiall/download','App\Http\Controllers\Vibhag\AdminController@vasathiallreport')->name('vibhag.vasathiall.download'); 
    Route::get('dashboard/career','App\Http\Controllers\Vibhag\AdminController@careerreport')->name('vibhag.report.career');
    Route::get('dashboard/javb','App\Http\Controllers\Vibhag\AdminController@javbreport')->name('vibhag.report.javb'); 
    
    
    Route::get('report','App\Http\Controllers\Vibhag\ServicesController@managereports')->name('vibhag.report');
    Route::get('report/vibhag/{id}','App\Http\Controllers\Vibhag\AdminController@vibhagexport')->name('vibhag.report.vibhag.export.id');
    
    Route::get('report/ssv','App\Http\Controllers\Vibhag\SsvController@managereports')->name('vibhag.report.ssv');
    Route::get('report/pks','App\Http\Controllers\Vibhag\PksController@managereports')->name('vibhag.report.pks');
    
    


});








});
