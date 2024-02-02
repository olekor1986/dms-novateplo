<?php

use Illuminate\Support\Facades\Route;

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

/**  Admin Routes */
Route::group(['prefix' => 'admin'], function () {

    /**  Admin Main */
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main');

    /**  Admin Roles */
    Route::group(['prefix' => 'staffs'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\StaffController::class, 'index'])->name('admin.staff.index');
        Route::get('/create', [\App\Http\Controllers\Admin\StaffController::class, 'create'])->name('admin.staff.create');
        Route::get('/{staff}', [\App\Http\Controllers\Admin\StaffController::class, 'show'])->name('admin.staff.show');
        Route::post('/', [\App\Http\Controllers\Admin\StaffController::class, 'store'])->name('admin.staff.store');
        Route::get('/{staff}/edit', [\App\Http\Controllers\Admin\StaffController::class, 'edit'])->name('admin.staff.edit');
        Route::patch('/{staff}', [\App\Http\Controllers\Admin\StaffController::class, 'update'])->name('admin.staff.update');
        Route::delete('/{staff}', [\App\Http\Controllers\Admin\StaffController::class, 'destroy'])->name('admin.staff.delete');
    });

    /**  Admin Staff */
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create', [\App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.role.create');
        Route::get('/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'show'])->name('admin.role.show');
        Route::post('/', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/{role}/edit', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.role.edit');
        Route::patch('/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');
        Route::delete('/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.delete');
    });

    /**  Admin Users */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
        Route::get('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.user.show');
        Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.delete');
    });

    /**  Admin Sources */
    Route::group(['prefix' => 'sources'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Source\SourceController::class, 'index'])->name('admin.source.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Source\SourceController::class, 'create'])->name('admin.source.create');
        Route::get('/{source}', [\App\Http\Controllers\Admin\Source\SourceController::class, 'show'])->name('admin.source.show');
        Route::post('/', [\App\Http\Controllers\Admin\Source\SourceController::class, 'store'])->name('admin.source.store');
        Route::get('/{source}/edit', [\App\Http\Controllers\Admin\Source\SourceController::class, 'edit'])->name('admin.source.edit');
        Route::patch('/{source}', [\App\Http\Controllers\Admin\Source\SourceController::class, 'update'])->name('admin.source.update');
        Route::delete('/{source}', [\App\Http\Controllers\Admin\Source\SourceController::class, 'destroy'])->name('admin.source.delete');
    });

    /**  Admin Sources Type */
    Route::group(['prefix' => 'source_types'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'index'])->name('admin.source_type.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'create'])->name('admin.source_type.create');
        Route::get('/{source_type}', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'show'])->name('admin.source_type.show');
        Route::post('/', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'store'])->name('admin.source_type.store');
        Route::get('/{source_type}/edit', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'edit'])->name('admin.source_type.edit');
        Route::patch('/{source_type}', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'update'])->name('admin.source_type.update');
        Route::delete('/{source_type}', [\App\Http\Controllers\Admin\Source\SourceTypeController::class, 'destroy'])->name('admin.source_type.delete');
    });


    /**  Admin City Districts */
    Route::group(['prefix' => 'city_districts'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'index'])->name('admin.city_district.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'create'])->name('admin.city_district.create');
        Route::get('/{city_district}', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'show'])->name('admin.city_district.show');
        Route::post('/', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'store'])->name('admin.city_district.store');
        Route::get('/{city_district}/edit', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'edit'])->name('admin.city_district.edit');
        Route::patch('/{city_district}', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'update'])->name('admin.city_district.update');
        Route::delete('/{city_district}', [\App\Http\Controllers\Admin\Source\CityDistrictController::class, 'destroy'])->name('admin.city_district.delete');
    });

    /**  Admin Boilers */
    Route::group(['prefix' => 'boilers'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'index'])->name('admin.boiler.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'create'])->name('admin.boiler.create');
        Route::get('/{boiler}', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'show'])->name('admin.boiler.show');
        Route::post('/', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'store'])->name('admin.boiler.store');
        Route::get('/{boiler}/edit', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'edit'])->name('admin.boiler.edit');
        Route::patch('/{boiler}', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'update'])->name('admin.boiler.update');
        Route::delete('/{boiler}', [\App\Http\Controllers\Admin\Boiler\BoilerController::class, 'destroy'])->name('admin.boiler.delete');
    });

    /**  Admin Boiler Fuel */
    Route::group(['prefix' => 'boiler_fuels'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'index'])->name('admin.boiler_fuel.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'create'])->name('admin.boiler_fuel.create');
        Route::get('/{boiler_fuel}', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'show'])->name('admin.boiler_fuel.show');
        Route::post('/', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'store'])->name('admin.boiler_fuel.store');
        Route::get('/{boiler_fuel}/edit', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'edit'])->name('admin.boiler_fuel.edit');
        Route::patch('/{boiler_fuel}', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'update'])->name('admin.boiler_fuel.update');
        Route::delete('/{boiler_fuel}', [\App\Http\Controllers\Admin\Boiler\BoilerFuelController::class, 'destroy'])->name('admin.boiler_fuel.delete');
    });

    /**  Admin Burner Type */
    Route::group(['prefix' => 'burner_types'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'index'])->name('admin.burner_type.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'create'])->name('admin.burner_type.create');
        Route::get('/{burner_type}', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'show'])->name('admin.burner_type.show');
        Route::post('/', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'store'])->name('admin.burner_type.store');
        Route::get('/{burner_type}/edit', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'edit'])->name('admin.burner_type.edit');
        Route::patch('/{burner_type}', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'update'])->name('admin.burner_type.update');
        Route::delete('/{burner_type}', [\App\Http\Controllers\Admin\Boiler\BurnerTypeController::class, 'destroy'])->name('admin.burner_type.delete');
    });

    /**  Admin Pumps */
    Route::group(['prefix' => 'pumps'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'index'])->name('admin.pump.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'create'])->name('admin.pump.create');
        Route::get('/{pump}', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'show'])->name('admin.pump.show');
        Route::post('/', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'store'])->name('admin.pump.store');
        Route::get('/{pump}/edit', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'edit'])->name('admin.pump.edit');
        Route::patch('/{pump}', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'update'])->name('admin.pump.update');
        Route::delete('/{pump}', [\App\Http\Controllers\Admin\Pump\PumpController::class, 'destroy'])->name('admin.pump.delete');
    });

    /**  Admin Pump Type */
    Route::group(['prefix' => 'pump_types'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'index'])->name('admin.pump_type.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'create'])->name('admin.pump_type.create');
        Route::get('/{pump_type}', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'show'])->name('admin.pump_type.show');
        Route::post('/', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'store'])->name('admin.pump_type.store');
        Route::get('/{pump_type}/edit', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'edit'])->name('admin.pump_type.edit');
        Route::patch('/{pump_type}', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'update'])->name('admin.pump_type.update');
        Route::delete('/{pump_type}', [\App\Http\Controllers\Admin\Pump\PumpTypeController::class, 'destroy'])->name('admin.pump_type.delete');
    });

    /**  Admin Mechanical Seal */
    Route::group(['prefix' => 'mechanical_seals'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'index'])->name('admin.mechanical_seal.index');
        Route::get('/create', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'create'])->name('admin.mechanical_seal.create');
        Route::get('/{mechanical_seal}', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'show'])->name('admin.mechanical_seal.show');
        Route::post('/', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'store'])->name('admin.mechanical_seal.store');
        Route::get('/{mechanical_seal}/edit', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'edit'])->name('admin.mechanical_seal.edit');
        Route::patch('/{mechanical_seal}', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'update'])->name('admin.mechanical_seal.update');
        Route::delete('/{mechanical_seal}', [\App\Http\Controllers\Admin\SparePart\MechanicalSealController::class, 'destroy'])->name('admin.mechanical_seal.delete');
    });

    /**  Admin Bearing */
    Route::group(['prefix' => 'bearings'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'index'])->name('admin.bearing.index');
        Route::get('/create', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'create'])->name('admin.bearing.create');
        Route::get('/{bearing}', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'show'])->name('admin.bearing.show');
        Route::post('/', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'store'])->name('admin.bearing.store');
        Route::get('/{bearing}/edit', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'edit'])->name('admin.bearing.edit');
        Route::patch('/{bearing}', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'update'])->name('admin.bearing.update');
        Route::delete('/{bearing}', [\App\Http\Controllers\Admin\SparePart\BearingController::class, 'destroy'])->name('admin.bearing.delete');
    });
});
