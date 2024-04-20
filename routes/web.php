<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerEventController;
use App\Http\Controllers\PageCategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

    // Home page
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/single_page/{event}', [HomeController::class, 'eventShow'])->name('events.eventShow');
    Route::get('/organizer_page/{userId}', [OrganizerEventController::class, 'index'])->name('organizer.page');
    
    // find event pages
    Route::get('/find-event', [HomeController::class,'findEvent']);
    Route::get('/filter',[SearchController::class,'index']);
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // Contact page
    Route::view('/contact', 'contact');
    
    // About page
    Route::view('/about', 'about');

    // create event page
    Route::view('/create-event', 'create-event');

    // single pages
    Route::get('/business', [PageCategoryController::class, 'business']);
    Route::get('/social', [PageCategoryController::class, 'social']);
    Route::get('/cultural', [PageCategoryController::class, 'cultural']);
    Route::get('/entertainment', [PageCategoryController::class, 'entertainment']);
    Route::get('/sporting', [PageCategoryController::class, 'sporting']);
    Route::get('/educational', [PageCategoryController::class, 'educational']);
    Route::get('/gaming', [PageCategoryController::class, 'gaming']);
    
Route::middleware('guest_user')->group(function () {
    // authentication
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::get('/register', [AuthController::class, 'create'])->name('register.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Password reset routes
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});
    
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('users',UserController::class);
    Route::resource('categories',CategoryController::class);
    Route::get('/statistique',[StaticController::class, 'statisTotal']);
    Route::put("/changePublishedStatus/{event}",[EventController::class,"publicEvent"])->name("changePublishedStatus");
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');  
});

Route::group(['middleware' => ['auth', 'role:organizer']], function() {
    Route::get('/static-reservation',[StaticController::class, 'reservationStatique']);
    Route::get('/events/{eventId}/reservations', [ReservationController::class, 'index'])->name('events.reservations.index');
    Route::put('reservation/{reservation}/update-status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
});

Route::middleware('auth')->group(function () {
    Route::resource('events',EventController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/profile','dashbord.profile');
    Route::post('/events/{eventId}/reserve', [ReservationController::class, 'reservation'])->name('events.reserve');
    Route::get('/user/{userId}/reservations', [TicketController::class, 'showReservations'])->name('user.reservations');
    Route::get('/user/{userId}/reservation/{reservationId}', [TicketController::class, 'userReservations'])->name('user.reservation.details');
    Route::post('/generate-pdf/{userId}/{reservationId}', [PDFController::class, 'index'])->name('generate.pdf');
    Route::post('/download-pdf/{userId}/{reservationId}', [PDFController::class, 'download'])->name('download.pdf');
    Route::match(['get', 'post'],'/events/{reservationId}/payment', [PaymentController::class, 'payment'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'payment_success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'payment_cancel'])->name('payment.cancel');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});
 