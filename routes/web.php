<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\IntakeController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    // Doctors and Nurses only
    Route::middleware('role:doctor,nurse')->group(function () {
        Route::get('patients/female-adults', [PatientController::class, 'listFemaleAdults'])->name('patients.listFemaleAdults');
        Route::get('patients/male-infants', [PatientController::class, 'listMaleInfants'])->name('patients.listMaleInfants');
        Route::resource('patients', PatientController::class);
        Route::resource('intakes', IntakeController::class)->except(['show', 'edit', 'update']);
    });

    // Store Manager only
    Route::middleware('role:store_manager,doctor,nurse')->group(function () {
        Route::resource('medicines', MedicineController::class);
    });
    
});



require __DIR__.'/auth.php';
