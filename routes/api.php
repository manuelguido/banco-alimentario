<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API de autenticación
|--------------------------------------------------------------------------
*/
// Login
Route::post('/login', 'AuthController@login'); // Works
// Logout
Route::post('/logout', 'AuthController@logout')->middleware('auth:api'); // Works

/*
|--------------------------------------------------------------------------
| API de registro
|--------------------------------------------------------------------------
*/
// Registrar donante
Route::post('/register/giver', 'RegisterController@registerGiver'); // ??

/*
|--------------------------------------------------------------------------
| API de autenticación con Google
|--------------------------------------------------------------------------
*/
// Autorización
// Route::get('/authorize/google', 'SocialAuthController@redirectToProvider')->name('api.social.redirect'); // Funciona
// Ruta de callback
// Route::get('/authorize/google/callback', 'SocialAuthController@handleProviderCallback')->name('api.social.callback'); // Funciona

/*
|--------------------------------------------------------------------------
| API de barrios
|--------------------------------------------------------------------------
*/
// Validar si un email esta disponible
Route::get('/email/check-availability', 'EmailController@emailAvailable'); // Funciona

/*
|--------------------------------------------------------------------------
| API de barrios
|--------------------------------------------------------------------------
*/
// Barrios
Route::get('/neighborhood/index', 'NeighborhoodController@neighborhoodIndex'); // Funciona

/*
|--------------------------------------------------------------------------
| API de tipos de documentos
|--------------------------------------------------------------------------
*/
// Tipos de documentos
Route::get('/document-type/index', 'DocumentTypeController@index'); // Funciona

/*
|--------------------------------------------------------------------------
| API de unidades de medida
|--------------------------------------------------------------------------
*/
// Tipos de documentos
Route::get('/unit-of-measurement/index', 'UnitOfMeasurementController@index'); // Funciona

/*
|--------------------------------------------------------------------------
| API de categorías
|--------------------------------------------------------------------------
*/
// Categorías
Route::get('/category/index', 'CategoryController@index'); // Funciona

/*
|--------------------------------------------------------------------------
| API de tipos de productos
|--------------------------------------------------------------------------
*/
// Categorías
Route::get('/category-type/index', 'CategoryTypeController@index'); // Funciona

/*
|--------------------------------------------------------------------------
| API de usuario
|--------------------------------------------------------------------------
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
  	return $request->user();
});

Route::prefix('/user')->middleware('auth:api')->group(function() {
	// Corroborar que el usuario este autenticado
	Route::prefix('/authenticated')->group(function() {
		// Corroborar que sea un usuario en el sistema
		Route::get('/', 'AuthController@userIsAuthenticated'); // Works
		// Corroborar que el usuario sea donante
		Route::get('/giver', 'AuthController@userIsGiver'); // ?
		// Corroborar que el usuario sea empleado
		Route::get('/employee', 'AuthController@userIsEmployee'); // ?
		// Corroborar que el usuario sea administrador
		Route::get('/admin', 'AuthController@userIsAdmin'); // ?
	});
	// Obtener información de usuario
	Route::get('/data', 'UserController@data'); // ?
	// Get user and it's routes
	Route::post('/update', 'UserController@update'); // ?
	// Get user and it's routes
	Route::post('/password/update', 'UserController@updatePassword'); // ?

	// Administrador Routes
	Route::prefix('/')->middleware('role:Administrador')->group(function() {
		// Update user
		Route::get('/index', 'UserController@index'); // ?
		// Update user
		Route::get('/index_formatted', 'UserController@indexFormatted'); // ?
		// Update user password
		Route::post('/update/approve', 'UserController@approveUpdate'); // ?
		// Delete user
		Route::post('/delete', 'UserController@delete'); // ?
	});
});

/*
|--------------------------------------------------------------------------
| API de donantes
|--------------------------------------------------------------------------
*/
Route::prefix('/giver')->middleware('auth:api')->group(function() { //, 'role:Donante'
	// Donaciones
	Route::prefix('/donation')->group(function() {
		// Crear una nueva donación
		Route::post('/create', 'DonationController@create'); // ??
		// Editar donación
		Route::post('/update', 'DonationController@update'); // ??
		// Pendientes endientes
		Route::get('/pending/dataset', 'GiverController@pendingDonations'); // ??
		// Terminadas
		Route::get('/finished/dataset', 'GiverController@finishedDonations'); // ??
		// Rechazadas
		Route::get('/rejected/dataset', 'GiverController@rejectedDonations'); // ??
		// Items
		Route::prefix('/item')->group(function() {
			// Agregar
			Route::post('/add', 'DonationController@addItem'); // Works
			// Modificar
			Route::post('/update', 'DonationController@updateItem'); // ??
			// Eliminar
			Route::post('/delete', 'DonationController@deleteItem'); // Works
			// Items de la donación
			Route::get('/current/index', 'DonationController@currentItems'); // Works
			// Items de la donación en dataset
			Route::get('/current/index/dataset', 'DonationController@currentItemsDataset'); // Works
    	});
  	});
});
