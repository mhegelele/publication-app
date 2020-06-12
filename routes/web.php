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

Route::post("/search-query","PageController@search");
Route::get("/","PageController@loadHome");
Route::get("/home2","PageController@loadHome");
Route::get("test","ManageController@loadHome");
// Route::get("/","PageController@loadHome");
// Route::post('login', [ 'as' => 'login', 'uses' => 'PageController@loadLogin']);
Route::get("/login","PageController@loadLogin");
Route::get("/logout","RegisterController@logout");
Route::get("/register","PageController@loadRegister");
Route::post("/reg_account","RegisterController@userRegistration");
Route::post("/login","RegisterController@login");

Route::get("/add-publication","PageController@uploadPublication");
Route::get("/addpublication","PageController@uploadPublication");

Route::get("/management","PageController@management");
Route::get("/profile","PageController@reports");


Route::post("/approve","PublicationController@approve");

Route::post("/add-publication","PublicationController@addPublication");
Route::post("/add-publication","DataCommunication@addPublication");
Route::post("/addpublication","DataCommunication@addPublication");


Route::post("/publish","DataCommunication@approvePublication");
Route::post("/search","PageController@search");


//view publication by ID
Route::get("/publication/{id}","PageController@viewPublication");
Route::get("/uploaded-publication","PageController@viewonePublication");
Route::get("/center/{id}","PageController@viewPublicationByCenter");

Route::get("/adminpublication/{id}","PageController@viewadminPublication");


//approve publications by ids
Route::get("/publications/{id}","ManageController@approve");
Route::post("/approve","PublicationController@approve");

Route::get("/file","PageController@viewFile");
Route::post("/publicationlist_datatable","PageController@dataTableList");
Route::get("/ajax/{malaria}","AjaxController@index");

Route::get('management', 'PageController@management');



//Search by year
Route::get("/tryreport/{id}","ReportController@Searchreport");
Route::get("/yearreport/{year}","ReportController@Yearreport");
Route::get('pdfyear/{year}',array('as'=>'pdfyear','uses'=>'ReportController@pdfyear'));

Route::get('/chart', 'GoogleGraph@chart');

// Route::get('publications/index','PublicationController@index');
Route::resource('users','UserController');
//Auth::routes();
 Auth::routes();
 
 //after
 Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/reportview","CenterController@index");
// Route::get("/pdfreport", [ "as" => 'printpdf', 'uses' => 'PdfController@index']);

Route::get('/pdfreport', 'PdfController@index');
 // Route::get('pdf', 'NotesController@pdf');

// Route::get("/pdfreport","PdfController@index");
Route::get('/manage',"PublicationController@index");

//approved publications 
Route::get('/approved',"PublicationController@approvedpub");

Route::get('/viewpub',"PublicationController@viewpub1");


Route::get('pdf','ReportController@generatePDF');



//DATE RAGE REPORT
Route::get('/date_range', 'ReportController@index');
Route::post('/date_range/fetch_data', 'ReportController@fetch_data')->name('daterange.fetch_data');

//PFD REPORT TRY
Route::get('pdfview',array('as'=>'pdfview','uses'=>'ReportController@pdfview'));

Route::get('pdfviews',array('as'=>'pdfviews','uses'=>'CenterController@index'));






