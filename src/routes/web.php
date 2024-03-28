<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\SalutoController;

	Route::get(
		'benvenuto',
		fn() => "Benvenuto nell'applicazione laravel!"
	);

	Route::get(
		'saluto/{nome}',
		[SalutoController::class, 'salutaNome']
	);