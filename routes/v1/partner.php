<?php

use App\Debc\Partner\Http\Controllers\API\PartnerController;
use Illuminate\Support\Facades\Route;

Route::get('partners', [PartnerController::class, 'index']);
