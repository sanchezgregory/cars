<?php


use Cars\Models\Car;
use Cars\Models\Feature;
use Illuminate\Support\Facades\Request;

Route::get('/features', function(){

    $car = Car::first();

    $features = Feature::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();

    return view('components/features', compact('features', 'car'));
})->name('features');

Route::post('/features', function() {

    $features = Request::get('features');

    Feature::addNewFeatures($features);

    $car = Car::first();

    $car->saveFeatures($features);

    return redirect()->to('features');
});