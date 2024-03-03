<?php

use App\Debc\Partner\Http\Controllers\API\PartnerController;

Route::get('partners', [PartnerController::class, 'index']);