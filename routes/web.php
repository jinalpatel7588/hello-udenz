<?php

use App\Enums\UserType;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SiteSettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichcookies.policy
| contains the "web" middleware group. Now create something great!
|
*/
// Changed By neel
Route::get("/dentist-privacy-policy", function () {
   return View::make("dentist-privacy");
})->name('dentist.privacy');

Route::get("/environmental-and-social-responsibilities-policy", function () {
   return View::make("env");
})->name('env');

Route::get("/gdpr-terms-and-conditions", function () {
   return View::make("gdpr");
})->name('gdpr');

Route::get("/privacy-and-prolicy", function () {
   return View::make("privacy-policy");
})->name('privacy');

Route::get("/terms-conditions", function () {
   return View::make("terms-condition");
})->name('terms.condition');
Route::get("/patient-privacy-policy", function () {
   return View::make("patient-privacy");
})->name('patient.privacy.policy');

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/home', [DashboardController::class, 'Home'])->name('index');
Route::post('/apply-waiting-list', [HomeController::class, 'ApplyWaitingList'])->name('apply-waiting-list');
Route::get('/waiting-list', [HomeController::class, 'waitingList'])->name('waitingList');
Route::get('/user', [UserController::class, 'index'])->name('index');
Route::get('/privacy-policy', [SiteSettingController::class, 'privacyPolicy'])->name('privacy.policy');
// Route::get('/patient-privacy-policy', [SiteSettingController::class, 'patientPrivacyPolicy'])->name('patient.privacy.policy');
Route::get('/social-policy', [SiteSettingController::class, 'socialPolicy'])->name('social-policy');
// Route::get('/dentist-privacy-policy', [SiteSettingController::class, 'dentistPrivacyPolicy'])->name('dentist.privacy.policy');
// Route::get('/gdpr-terms-and-conditions', [SiteSettingController::class, 'GdprTermsAndConditions'])->name('terms.and.conditions');
Route::get('/terms-and-conditions', [SiteSettingController::class, 'helloTermsAndConditions'])->name('hello.terms.and.conditions');
// Route::get('/environmental-and-Social-policy', [SiteSettingController::class, 'EnvironmentalAndSocialPolicy'])->name('env.and.social.privacy');
Route::get('/cookies-policy', function () {
   return view('pages.site-settings.cookies-policy');
})->name('cookies.policy');

Auth::routes();
Route::middleware(['admin.type:' . UserType::ADMIN])->group(function () {
   Route::prefix('admin')->name('admin.')->group(function () {

      Route::prefix('users')->name('users.')->group(function () {
         Route::get('/', [UserController::class, 'index'])->name('index');
         Route::get('/add', [UserController::class, 'create'])->name('create');
         Route::post('/', [UserController::class, 'store'])->name('store');
         Route::get('/{user}', [UserController::class, 'edit'])->name('edit');
         Route::put('/{user}', [UserController::class, 'update'])->name('update');
         Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
         Route::get('login/{user}', [UserController::class, 'login'])->name('login');
         Route::patch('/{user}', [UserController::class, 'statusChange'])->name('status');
      });
   });
});

Route::prefix('user')->name('user.')->group(function () {
   // Route::middleware(['admin.type:' . UserType::USER])->group(function () {
   Route::post('socket', [UserController::class, 'saveSocketId'])->name('store.socket');
   Route::prefix('chat')->name('chat.')->group(function () {
      Route::get('/', [ChatController::class, 'index'])->name('index');
      Route::get('/details', [ChatController::class, 'messageDetails'])->name('details');
      Route::post('/create', [ChatController::class, 'createChat'])->name('create');
      Route::post('/message', [ChatController::class, 'storeMessage'])->name('message');
      Route::post('/getattachment', [ChatController::class, 'getattachment'])->name('getattachment');
      Route::get('/{chatRoomLink}', [ChatController::class, 'addChatRoom'])->name('addchatroom');
      Route::delete('/{chatRoom}', [ChatController::class, 'deleteChatRoom'])->name('destroy');
      Route::delete('/{chatRoom}/member/{user}', [ChatController::class, 'leaveChatRoom'])->name('leave');
   });
   // });


   Route::get('/edit/{user}', [ProfileController::class, 'edit'])->name('edit');
   Route::put('/update/{user}', [ProfileController::class, 'update'])->name('update');

   Route::get('/logout', [LoginController::class, 'userLogout'])->name('logout');
   Route::post('/registeruser', [LoginController::class, 'register'])->name('register');
   Route::get('/', [LoginController::class, 'userLogin'])->name('login');
});
Route::get('/uniqueemail', [LoginController::class, 'uniqueemail'])->name('uniqueemail');

Route::get('/unique-email', [HomeController::class, 'uniqueEmail'])->name('unique.email');

Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('admin.contactUs');

Route::delete('/contact-us/{contact}', [ContactUsController::class, 'destroy'])->name('admin.contactUs.destroy');


Route::get('/registerPage', function () {
   return view('registerPage');
});
Route::get('/loginPage', function () {
   return view('loginPage');
});



Route::get('/migrate', function () {
   Artisan::call('migrate');
   Artisan::call('storage:link');
   Artisan::call('db:seed');
   Artisan::call('cache:clear');
   Artisan::call('view:clear');
   Artisan::call('route:clear');
   Artisan::call('optimize:clear');
   return "Done!";
});