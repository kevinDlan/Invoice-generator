<?php

use Illuminate\Support\Facades\Route;
use App\Models\Projet;

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

Route::get('/', function () 
{
    $projets = Projet::latest()->take(3)->get();
    return view('features.home.index',['projets' => $projets]);
})->name('home');

Route::get('/a-propos', function () {
    return view('features.home.about_us');
})->name('about-us');

Route::get('/nos-projets', function () 
{
    $projets = Projet::orderBy('created_at', 'desc')->paginate(2);
    return view('features.home.projects',['projets' => $projets]);
})->name('ours.projects');

Route::get('/services', function () {
    return view('features.home.services');
})->name('services');

Route::get('/contact', function () {
    return view('features.home.contact_us');
})->name('contact-us');

Route::get('/services-videophone', function(){
    return view("features.home.service-videophonie");
})->name('service.videophone');

Route::get('/services-alarme', function () {
    return view("features.home.service-alarme");
})->name('service.alarme');

Route::get('/services-interphone', function () {
    return view("features.home.service-interphone");
})->name('service.interphone');

Route::get("/invoice-preview/{invoice}",[App\Http\Controllers\InvoiceController::class, "previewInvoice"])->name('invoice.preview');
Route::get("/invoice-generate/{invoice}",[App\Http\Controllers\InvoiceController::class,"getPDF"])->name("pdf.view");

Route::post("/store-invoice-and-send",[App\Http\Controllers\InvoiceController::class,"storeAndSendMail"])->name("invoice.store-send");
Route::get("/send-invoice-mail/{invoice}",[App\Http\Controllers\InvoiceController::class, "sendInvoice"])->name("send.invoice");


Route::resources(
    [
        'newletter' => App\Http\Controllers\NewsletterController::class,
        'projects' => App\Http\Controllers\ProjetController::class,
        'clients' => App\Http\Controllers\ClientController::class,
        'invoices'=> App\Http\Controllers\InvoiceController::class,
        'comments' => App\Http\Controllers\CommentController::class,
        'contacts'=> App\Http\Controllers\ContactUsController::class,
        'settings'=> App\Http\Controllers\SettingsController::class,
    ]
);

Auth::routes();
Route::get('/dashboard',[ App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('con');
