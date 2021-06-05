<?php

namespace App\Controllers;

use App\Models\IndexModel;

class IndexController extends BaseController
{
	public function index()
	{
		return view('index');
	}

	public function getsPaises(){
		//se obtiene el modelo
		$index = new IndexModel();
		//se obtiene la variable cursos
		$curso = $this->request->getPost('curso');

		if($curso != 'null'){
			return json_encode($resultado = $index->getPaises($curso));
		}else{
			return json_encode($resultado = $index->getAllPaises());
		}

	}

	public function getCursos(){
		$index = new IndexModel();
		$resultado = $index->getCursos();

		return json_encode($resultado);
	}
}
