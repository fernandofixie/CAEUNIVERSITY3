
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\OrderController;

//Login
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/user_login', function () {
    return view('user_login');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/logout', [UserController::class, 'logout']);

// User Side
Route::middleware('checkSessionUser')->post('/user_merch', [OrderController::class, 'place_order']);
Route::middleware('checkSessionUser')->get('/user_account', [StudentController::class, 'view_account']);
Route::middleware('checkSessionUser')->get('/user_merch', [OrderController::class, 'index_product']);
Route::middleware('checkSessionUser')->get('/user_courses', [ClassController::class, 'index']);
Route::middleware('checkSessionUser')->post('/user_merch', [OrderController::class, 'place_order']);
Route::get('/user_dashboard', function () {
    return view('user_dashboard');
});
Route::get('/user_calendar', function () {
    return view('user_calendar');
});


// Admin

Route::get('/students', function () {
    return view('students');
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'add_student_form']);
Route::get('/students/edit/{id}', [StudentController::class, 'edit_student_form']);
Route::get('/students/{id}', [StudentController::class, 'student_show']);
Route::post('/students', [StudentController::class, 'add_student']);
Route::put('/students/{id}', [StudentController::class, 'edit_student']);

Route::get('/admin_account', function(){
    return view('admin_account');
});

Route::get('/admin_dashboard', function(){
    return view('admin_dashboard');
});

Route::get('/admin_messages', function(){
    return view('admin_messages');
});

Route::get('/admin_notification', function(){
    return view('admin_notification');
});

Route::get('/admin_faculty', function(){
    return view('admin_faculty');
});

Route::get('/admin_faculty', [FacultyController::class, 'index']);
Route::get('/admin_faculty/create', [FacultyController::class, 'add_faculty_form']);
Route::get('/admin_faculty/edit/{id}', [FacultyController::class, 'edit_faculty_form']);
Route::get('/admin_faculty/{id}', [FacultyController::class, 'admin_faculty_show']);
Route::post('/admin_faculty', [FacultyController::class, 'add_faculty']);
Route::put('/admin_faculty/{id}', [FacultyController::class, 'edit_faculty']);


Route::get('/admin_department', function(){
    return view('admin_department');
});

Route::middleware('checkSessionAdmin')->get('/admin_department', [ClassController::class, 'index']);


//Public
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function(){
    return view ('about');
});

Route::get('/message_ceo', function(){
    return view ('message_ceo');
});
Route::get('/merch', function(){
    return view ('merch');
});
Route::get('/enroll', function(){
    return view ('enroll');
});
Route::get('/inquire', function(){
    return view ('inquire');
});

Route::get('/cs', function(){
    return view ('cs');
});


