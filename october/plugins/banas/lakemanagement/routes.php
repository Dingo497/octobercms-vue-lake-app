<?php

use Banas\LakeManagement\Controllers\Lakes;

Route::options('/{any}', function() {
    $headers = [
         //'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
         'Access-Control-Allow-Headers'=> 'X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    return \Response::make('You are connected to the API', 200, $headers);
 })->where('any', '.*');

// API routes
Route::group(['prefix' => 'api/lakemanagement'], function () {
    Route::get('/lakes', [Lakes::class, 'index']);
});

// TODO potom spravit rychly fetch priamo vo view vo vuejs a ak to pojde tak commit 
// TODO potom prerobit na resources tie api tahania na backende
// TODO potom spravit strukturu api vo vuejs a tak natiahnut data a commit
// TODO vytvorit branch ako feature/lakes-table a spravit komponent pre zobrazenie tabulky jazier a ich dat a commity davat smysluplne
