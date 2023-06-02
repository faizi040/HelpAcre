<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\AuthenticationRedirect;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/AuthenticationRedirect', [AuthenticationRedirect::class, 'Authentication'])->middleware('verified');

// user routes
// user routes
Route::get('/', [MainController::class, 'index']);
Route::group(['middleware' => 'auth'], function () {


    Route::get('/about', [MainController::class, 'about']);
    Route::get('/project', [MainController::class, 'project']);
    Route::get('/event', [MainController::class, 'event']);
    Route::get('/gallery', [MainController::class, 'gallery']);
    Route::get('/contact', [MainController::class, 'contact']);
    Route::get('/success',[MainController::class,'success']);
    Route::post('/make/paymnet/{id}',[MainController::class,'payonline'])->name('payonline');
    Route::get('/project-detail/{id}',[MainController::class,'projectDetail']);
   

    // stripe controller routes
    // stripe controller routes
    Route::post('/donate/{amount}/{projectId}',[StripeController::class,'makePayment']);
    
    //contact crud routes
    Route::post('/AddComment', [MessageController::class, 'AddComment']);
    Route::get('/comment', [MessageController::class, 'comment']);
    Route::get('/CommentDelete/{id}', [MessageController::class, 'DeleteComment']);

    //image crud routes
    //image crud routes
    Route::get('/image', [ImageController::class, 'image']);
    Route::post('/AddImage', [ImageController::class, 'AddImage']);
    Route::get('/editImage/{id}', [ImageController::class, 'editImage']);
    Route::post('/updateImage/{id}', [ImageController::class, 'updateImage']);
    Route::get('/deleteImage/{id}', [ImageController::class, 'deleteImage']);

    
    // Event Crud routes
    // Event Crud routes
    Route::get('/AdminEvent',[EventController::class,'AdminEvent'])->name('AdminEvent');
    Route::post('/AddEvent',[EventController::class,'AddEvent'])->name('AddEvent');
    Route::get('/EditEvent/{id}', [EventController::class, 'EditEvent']);
    Route::post('/UpdateEvent/{id}', [EventController::class, 'UpdateEvent']);
    Route::get('/DeleteEvent/{id}',[EventController::class,'DeleteEvent']);
    
    //Project Crud routes
    //Project Crud routes
    Route::get('/AdminProject',[ProjectController::class,'index'])->name('AdminProject');
    Route::post('/AddProject',[ProjectController::class,'AddProject'])->name('AddProject');
    Route::get('/EditProject/{project}',[ProjectController::class,'EditProject'])->name('EditProject');
    Route::post('/UpdateProject/{project}', [ProjectController::class, 'UpdateProject'])->name('UpdateProject');
    Route::get('/DeleteProject/{project}',[ProjectController::class,'DeleteProject'])->name('DeleteProject');
    
    //Team Crud routes
    //Team Crud routes
    Route::get('/team',[TeamController::class,'index'])->name('Team');
    Route::post('/AddMember',[TeamController::class,'AddMember'])->name('AddMember');
    Route::get('/EditMember/{team}',[TeamController::class,'EditMember'])->name('EditMember');
    Route::post('/UpdateMember/{team}', [TeamController::class, 'UpdateMember'])->name('UpdateMember');
    Route::get('/DeleteMember/{team}',[TeamController::class,'DeleteMember'])->name('DeleteMember');


    // admin routes
    // admin routes

    Route::get('/dash', [AdminController::class, 'dash'])->name('admin.dash');
    Route::get('/dash/role/{user}',[AdminController::class,'role'])->name('admin.role');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
