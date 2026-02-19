<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admincontroller;

use App\Http\Controllers\HomeController;
// Route::get('/', function () {
//     return view('home.index');
// });

route::get('/',[Admincontroller::class,'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// need to fo admin controller and create a function called index*

route::get('/home', [Admincontroller::class, 'index'])->name('home')->middleware('auth');

route::get('/create_room',[Admincontroller::class,'create_room'])->middleware('auth');

route::post('/add_room',[Admincontroller::class,'add_room'])->middleware('auth');

route::get('/view_room',[Admincontroller::class,'view_room'])->middleware('auth');

route::get('/room_delete/{id} ',[Admincontroller::class,'room_delete'])->middleware('auth');

// this is from view update button

route::get('/room_update/{id} ',[Admincontroller::class,'room_update'])->middleware('auth');

// This is from update page

route::post('/edit_room/{id} ',[Admincontroller::class,'edit_room'])->middleware('auth');

// different controller for room details
route::get('/room_details/{id} ',[HomeController::class,'room_details']);

// route::post('/add_booking/{id} ',[HomeController::class,'add_booking']); 

// protect booking
route::post('/add_booking/{id}', [HomeController::class,'add_booking'])->middleware('auth');


// -----Bookings-----
// route::get('/summary',[Admincontroller::class,'summary']);

route::get('/bookings ',[Admincontroller::class,'bookings'])->middleware('auth');

route::get('/delete_booking/{id}',[Admincontroller::class,'delete_booking'])->middleware('auth');

route::get('/approve_book/{id}',[Admincontroller::class,'approve_book'])->middleware('auth');

route::get('/reject_book/{id}',[Admincontroller::class,'reject_book'])->middleware('auth');

// ------Gallary -----

route::get('/view_gallary',[Admincontroller::class,'view_gallary'])->middleware('auth');

route::post('/upload_gallary',[Admincontroller::class,'upload_gallary'])->middleware('auth');

route::get('/delete_gallary/{id}',[Admincontroller::class,'delete_gallary'])->middleware('auth');

// ------contact------

route::post('/contact',[HomeController::class,'contact']);

//-----messages------

route::get('/all_messages',[Admincontroller::class,'all_messages'])->middleware('auth');

route::get('/send_mail/{id}',[Admincontroller::class,'send_mail'])->middleware('auth');

route::post('/mail/{id}',[Admincontroller::class,'mail'])->middleware('auth');


// making url in hearder get the view
route::get('/our_rooms',[HomeController::class,'our_rooms']);

route::get('/hotel_gallery',[HomeController::class,'hotel_gallery']);

// route::get('/contact_us',[HomeController::class,'contact_us']);

route::get('/about',[HomeController::class,'about']);

route::get('/delete_message/{id}',[Admincontroller::class,'delete_message'])->middleware('auth');

//summary

route::get('/dashboard', [Admincontroller::class, 'dashboard'])->middleware(['auth']);


route::get('/my_bookings',[HomeController::class,'my_bookings'])->middleware('auth');

// User payment page + upload slip (PromptPay QR)
route::get('/pay_booking/{id}', [HomeController::class, 'pay_booking'])->middleware('auth');
route::post('/upload_slip/{id}', [HomeController::class, 'upload_slip'])->middleware('auth');

// from admin check paid or not
route::get('/mark_paid/{id}', [Admincontroller::class, 'mark_paid'])->middleware(['auth']);











