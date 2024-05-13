<?php

use Banas\LakeManagement\Controllers\Lakes;
use Banas\LakeManagement\Controllers\LakeMeterings;

// API routes
Route::group(['prefix' => 'api/lakemanagement'], function () {
    Route::get('/lakes', [Lakes::class, 'ApiIndex']);
    Route::get('/lakes-meterings', [LakeMeterings::class, 'ApiIndex']);
});
