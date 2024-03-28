<?php

	namespace App\Http\Controllers;

	class SalutoController extends Controller
	{
		public function salutaNome($nome)
		{
			return "Ciao, $nome!";
		}
	}
