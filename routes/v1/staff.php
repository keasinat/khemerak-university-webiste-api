<?php

use App\Debc\Staff\Http\Controllers\API\StaffController;

Route::get('/staffs', [StaffController::class, 'index']);
