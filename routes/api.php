<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/***********************
 * ROTAS ABERTAS
 **********************/
Route::group([
    'namespace'  => '\App\Http\Controllers\Geral'
], function ($router) {
    Route::post('geral/consultacep', 'ConsultaController@cep');
	Route::get('geral/institucional/listar/{categoria}', 'InstitucionalController@index');
	Route::get('geral/institucional/detalhes/{id}', 'InstitucionalController@show');
	Route::get('geral/institucional/categorias', 'InstitucionalController@categorias');
	Route::get('geral/institucional/categorias/{id}', 'InstitucionalController@categoria');
	Route::post('geral/faleconosco', 'ContatoController@faleconosco');
	Route::get('geral/parceiros', 'ParceirosController@index');
	Route::get('geral/banner', 'BannerController@index');
	Route::resource(
	    'geral/blog',
	    'BlogController',
	    ['only' => ['index', 'show']]
	);
	Route::resource(
	    'geral/plano',
	    'PlanoController',
	    ['only' => ['index', 'show']]
	);

	Route::get('geral/professor', 'ProfessorController@index');
	Route::get('geral/professor/horarios/{professor}', 'ProfessorController@horarios');
	// Entrar na aula
	Route::post('geral/aula', 'AulaController@store');

	/***********************
	 * ROTAS IMAGEM PÚBLICA
	 **********************/
	Route::get('geral/arquivo/{arq_id}/baixar', 'ArquivoController@baixar');
	Route::get('geral/arquivo/{arq_id}/ver', 'ArquivoController@ver');
	Route::get('geral/arquivo/{arq_id}/dados', 'ArquivoController@dados');
});

/***********************
 * ROTAS PROFESSOR
 **********************/
Route::group([
    'namespace'  => '\App\Http\Controllers\Professor'
], function ($router) {
	// Login
	Route::post('professor/login', 'OnboardingController@login');
    Route::group(['middleware' => ['user.auth:professor'], 'prefix' => 'professor'], function() {
    	// Registro Evolutivo
		Route::resource(
		    'aluno',
		    'AlunoController',
		    ['only' => ['index', 'show']]
		);
    });
});

/***********************
 * ROTAS ALUNO
 **********************/
Route::group([
    'namespace'  => '\App\Http\Controllers\Aluno'
], function ($router) {
	// Login
    Route::post('aluno/login', 'OnboardingController@login');
    Route::post('aluno/cadastro', 'OnboardingController@store');
    Route::group(['middleware' => ['user.auth:aluno'], 'prefix' => 'aluno'], function() {
    	// Exibir Perfil
    	Route::get('perfil', 'DadosController@show');
    	// Atualizar Perfil
    	Route::put('perfil', 'DadosController@update');
    	// Horários
    	Route::get('horarios', 'AulaController@horarios');
    	// Mensalidade
    	Route::get('mensalidade', 'MensalidadeController@mensalidade');
    	// Pagamento
    	Route::post('pagamento', 'MensalidadeController@store');
    	// Registro Evolutivo
		Route::resource(
		    'registroevolutivo',
		    'RegistroEvolutivoController',
		    ['only' => ['index', 'store']]
		);
		// Entrar na aula
    	Route::post('aula', 'AulaController@store');
    });
});