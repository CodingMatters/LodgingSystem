<?php


Route::group(['middleware' => ['auth:api'], "namespace" => "Api"], function () {
    Route::post('/branches/all', "ShowAll")->name('api.branches.all');
});
