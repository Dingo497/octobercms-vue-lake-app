<?php

use Banas\LakeManagement\Controllers\Lakes;

// API routes
Route::group(['prefix' => 'api/lakemanagement'], function () {
    Route::get('/lakes', [Lakes::class, 'ApiIndex']);
});
