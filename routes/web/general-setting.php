<?php

use App\Debc\GeneralSetting\Http\Controllers\GeneralSettingController;

Route::group([
    'prefix' => 'settings',
    'as' => 'setting.'
], function () {
    Route::post('banner',[GeneralSettingController::class, 'banner'])->name('banner');
});
