<?php

	use Illuminate\Support\Facades\Route;

	Route::get(
		'/benvenuto',
		fn() => "Benvenuto nell'applicazione laravel!"
	);
