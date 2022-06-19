<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

const MODELS_PATH = "App\Models\\";
const SCOUT_MODELS = [
    "User",
    "Advertisement",
    "Tag",
];

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('scout:import_all', function () {
    foreach(SCOUT_MODELS as $model_name){
        Artisan::call('scout:import',["model" => MODELS_PATH.$model_name]);
    }
})->purpose('Import All "SCOUT_MODELS" to Scout Database');

Artisan::command('scout:flush_all', function () {
    foreach(SCOUT_MODELS as $model_name){
        Artisan::call('scout:flush',["model" => MODELS_PATH.$model_name]);
    }
})->purpose('Flushes All "SCOUT_MODELS" from Scout Database');

Artisan::command('scout:refresh', function () {
    Artisan::call('scout:flush_all');
    Artisan::call('scout:import_all');
})->purpose('Flushes All "SCOUT_MODELS" from Scout Database then Import them');