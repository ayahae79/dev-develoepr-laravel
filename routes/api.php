<?php
use App\Http\Controllers\Api\CrmCustomerApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
  Route::post('/customers', [CrmCustomerApiController::class, 'store']);
});
