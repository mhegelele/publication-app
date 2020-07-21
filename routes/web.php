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
Route::get("/login","PageController@loadLogin");
Route::get("/logout","RegisterController@logout");
Route::get("/register","PageController@loadRegister");
Route::post("/reg_account","RegisterController@userRegistration");
Route::post("/login","RegisterController@login");




Route::get("/management","PageController@management");
Route::get("/profile","PageController@reports");


Route::post("/approve","PublicationController@approve");

//Add publication route 
Route::post("/add-publication","PublicationController@addPublication");
Route::post("/add-publications","PublicationController@addPublication");
Route::get("/add-publication","PageController@uploadPublication");

Route::post("/addpublication","DataCommunication@addPublication");
Route::get("/addpublication","PageController@uploadPublications");

Route::post("/publish","DataCommunication@approvePublication");
Route::post("/search","PageController@search");


//view publication by ID
Route::get("/publication/{id}","PageController@viewPublication");

Route::get("/authors/{au_id}","PublicationController@viewAuthor");
Route::get("/author/{au_id}","PublicationController@showauthor");
//Author setting
Route::post("/addauthors","PublicationController@AddAuthor");
Route::get("/addauthor/{p_id}","PublicationController@AuthorAdd");
//Route::post("/addadminauthor","PublicationController@AddAuthor");
Route::get("/addadminauthor/{p_id}","PublicationController@AuthorAdmin");


Route::get("/uppublication/{id}","PageController@upPublication");
Route::get("/uploaded-publication","PageController@viewonePublication");
Route::post("/editauthor","PublicationController@Editauthor");

Route::get("/center/{id}","PageController@viewPublicationByCenter");

Route::get("/adminpublication/{id}","PageController@viewadminPublication");


//approve publications by ids
Route::get("/publications/{id}","ManageController@approve");
Route::get("/uploadedpublication/{id}","ManageController@approveone");



Route::post("/approve","PublicationController@approve");
Route::post("/deletepublication","PublicationController@trash");


Route::post("/uploadedpublication","PublicationController@approveone");

Route::get("/file","PageController@viewFile");
Route::post("/publicationlist_datatable","PageController@dataTableList");
Route::get("/ajax/{malaria}","AjaxController@index");

//Report....................................
Route::get("/reportview","ReportController@overallreport");


//Search by year
Route::get("/tryreport/{id}","ReportController@Searchreport");
Route::get("/yearreport/{year}","ReportController@Yearreport");
Route::get('/yearpdf',array('as'=>'pdfyear','uses'=>'ReportController@Yearreport'));


Route::get('/yearPDF/{pub_year}', 'ReportController@yearPDF');

Route::get('/centrePDF/{centre}', 'ReportController@centrePDF');

Route::get('/chart', 'GoogleGraph@chart');

// Route::get('publications/index','PublicationController@index');
Route::resource('users','UserController');
//Auth::routes();
 Auth::routes();
 
 //after
 Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/reportview","ReportController@overallreport");
// Route::get("/pdfreport", [ "as" => 'printpdf', 'uses' => 'PdfController@index']);

Route::get('/pdfreport', 'PdfController@index');
Route::get('/manage',"PublicationController@index");

//approved publications 
Route::get('/approved',"PublicationController@approvedpub");

Route::get('/viewpub',"PublicationController@viewpub1");


Route::get('pdf','ReportController@pdfgenerate');



//DATE RAGE REPORT
Route::get('/date_range', 'ReportController@index');
Route::post('/date_range/fetch_data', 'ReportController@fetch_data')->name('daterange.fetch_data');

//PFD REPORT TRY
Route::get('pdfview',array('as'=>'pdfview','uses'=>'ReportController@pdfview'));

Route::get('pdfviews',array('as'=>'pdfviews','uses'=>'ReportController@pdfgenerate'));



//Test add publication

Route::get("/testpublication","PublicationController@testPublication");
Route::post("testpublication","PublicationController@createPublication");


// Setting......................................
Route::get("setting","PublicationController@settingPublication");
//Edit centre
Route::get("/centres/{id}","PublicationController@EditSetting");
Route::post("/editcentre","PublicationController@editcentre");

//Edit publication type
Route::get("/types/{id}","PublicationController@EditType");
Route::post("/edit-type","PublicationController@editTypes");

//Edit research area
Route::get("/areas/{id}","PublicationController@EditArea");
Route::post("/edit-areas","PublicationController@editAreas");

//Add research area/ Centre/ publication type
Route::post("/add-centre","PublicationController@AddCentre");
Route::post("/add-area","PublicationController@AddArea");
Route::post("/add-type","PublicationController@AddType");
//End of Setting........................

//trash...........................................
Route::get('/trash',"PublicationController@ShowTrash");
Route::get("/trashs/{id}","PublicationController@ViewTrash");
Route::post("/trash","PublicationController@EditTrash");
// End of trash........................

//addtest

Route::post("/addpubl","PublicationController@addPubl");
//Route::post("/add-publication","DataCommunication@addPublication");
Route::get("/addpubl","PublicationController@uploadPubl");
