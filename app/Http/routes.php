<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/* METODOS PERTENECIENTES AL MAIN DE LA APP ##################################### */

Route::get('/', 'mainController@index');
Route::get('index', 'mainController@index');

/* METODOS PERTENECIENTES A LA GESTION DE LA APP ################################ */

Route::get('gestion', 'gestionController@index');

Route::get('horariosucursal', 'registroController@getHorarioSucursal');

/* METODOS DE LOGIN CON FACEBOOK ################################################ */

Route::get('facebook', 'mainController@redirectToProvider');

Route::get('facebook/callback', 'mainController@handleProviderCallback');

/* METODOS DE LOGIN POR LA APP ################################################## */

// Authentication routes...


Route::get('login', 'Auth\AuthController@getLogin')->name('login');
/*Ruta que llama a un modal para login de usuario*/
Route::get('login/modal', 'gestionController@modalLogin')->name('login.modal');
Route::get('registro', ['as' => 'register', 'uses' =>'Auth\AuthController@getRegister']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::post('login/modal', 'gestionController@modalpostLogin')->name('loginpost');
Route::get('logout', 'Auth\AuthController@getLogout');


/* METODOS DE GESTION POR LA APP ################################################ */

/* MODULO GESTION INICIO ######################################################## */

Route::get('inicio', 'gestionController@index')->name('inicio');

/* MODULO GESTION ESTABLECIMIENTO   ############################################# */
/*ruta de la vista del establecimiento */
Route::get('establecimiento', 'gestionController@getEstablecimiento')->name('establecimiento');

Route::get('modaleditestablecimiento/{id}', 'gestionController@getEditEstablecimiento');
Route::post('modaleditestablecimiento', 'gestionController@postEditEstablecimiento')->name('edit.establecimiento');

/*ruta de la vista del establecimiento del cliente */
Route::get('establecimientocliente', 'gestionController@getEstablecimientoCliente')->name('establecimientocliente');
//el alias tiene que ser diciente
//manejar misma notacion

/*modal ver detalles del establecimiento del cliente  */
Route::get('getModalEstablecimientoCliente/{id}', 'gestionController@getEstablecimientoCliente');


/*RUTA DEL POST/ DE LA GRID DE ESTABLECIMIENTO ########################################## */
Route::post('postbdestablecimiento', 'gestionController@postbdestablecimiento');

//se debe colocar el comentariado antes de la linea en la que se ejecuta el codigo
Route::get('modalestablecimiento/{id}', 'gestionController@getmodalestablecimiento');/* RUTA DEL MODAL/VER DETALLES/ DEL INFO RESTANTE DE ESTABLECIMIENTO ###########*/
Route::get('registroestablecimiento/{cliente}', 'registroController@getRegistroEstablecimiento');/* RUTA DE LA VISTA DEL REGISTRO DEL ESTABLECIMIENTO  #################*/
Route::post('registroestablecimiento', 'registroController@postRegistroEstablecimiento')->name('registroestablecimiento');/* RUTA DEL POST/ REGISTRO DEL ESTABLECIMINTO #############*/


/* MODULO GESTION CLIENTE  #####################################################  */
Route::get('cliente', 'gestionController@getCliente')->name('cliente'); /* RUTA DE LA VISTA/ DE LA GRID DE CLINTES######################################### */
Route::post('postbusuario', 'gestionController@postbusuario'); /* RUTA DEL POST/ DE LA GRID DE LOS USUARIOS############################ */
    Route::get('modalcliente/{id}', 'gestionController@getmodalcliente');/* RUTA DE MODAL / VER DETALLES/ DE LA INFO RESTANTE DE CLIENTES##### */
Route::get('clienteestablecimiento', 'registroController@getClienteEstablecimiento');/* RUTA DE LA VISTA/ DEL REGISTRO DE  LA INFO FALTANTE EN CLIENTES########### */
Route::post('clienteestablecimiento', 'registroController@postClienteEstablecimiento');/* RUTA DEL POST/ DEL REGISTRO DE LA INFO FALTANTE EN CLIENTES########################## */

/* MODULO GESTION MENU  ########################################################  */
Route::get('menu', 'gestionController@getMenu')->name('menu'); /* RUTA DE LA VISTA/ DE LA GRID DE LAS CARTAS DE LOS MENUS########################### */
Route::post('postbdmenu', 'gestionController@postbdmenu'); /* RUTA DEL POST/ DE LA GRID DE LAS CARTAS DE LOS MENUS############################ */
Route::get('registromenu', 'registroController@getRegistroMenu');/* RUTA DE LA VISTA/ DEL REGISTRO DE LOS MENUS####################### */

/* MODULO GESTION PLATOS DEL MENU  #############################################  */
Route::get('menuplato', 'gestionController@getMenuplato')->name('menuplatos');/* RUTA DE LA VISTA/ DE LA GRID DE LOS PLATOS DE LOS MENUS############################ */
Route::post('postbdmenuplato',  'gestionController@postbdmenuplato');/* RUTA DE POST/ DE LA GRID DE LOS PLATOS DE LOS MENUS############################ */


/* MODULO GESTION CATEGORIAS DEL MENU  #########################################  */
Route::get('menucategoria', 'gestionController@getMenuCategoria')->name('menucategorias'); /* RUTA DE LA VISTA/ DE LA GRID DE LAS CATEGORIAS DEL MENU############################ */
Route::post('postbdmenucategoria', 'gestionController@postbdmenucategoria');/* RUTA DE POST/ DE LA GRID DE LAS CATEGORIAS DEL MENU############################ */
Route::post('getDropDownCategoria', 'registroController@getDropDownCategoria');/* RUTA DEL POST/ DE LA LISTA DESPLEGABLE DE LAS CATEGORIAS############################ */


/* MODULO GESTION SUCURSALES DEL MENU  ##########################################  */
Route::get('menusucursal', 'gestionController@getMenuSucursal')->name('menusucursal');/* RUTA DE  LA VISTA/ DE LA GRID DE LAS  SUCURSALES DE LOS MENUS############################ */
Route::post('postbdmenusucursal', 'gestionController@postbdmenusucursal');/* RUTA DEL POST/ DE LA GRID DE LOS DE LAS SUCURSALES DE LOS MENUS############################ */


/* MODULO GESTION PLATOS  #######################################################  */
Route::get('platos', 'gestionController@getPlatos')->name('platos');/* RUTA DE LA VISTA/ DE LA GRID DE LOS PLATOS############################ */
Route::post('postbdplatos', 'gestionController@postbdplatos');/* RUTA DEL POST/ DE LA GRID DE LOS PLATOS############################ */
Route::get('modalplato', 'registroController@modalPlato');/* RUTA DEL MODAL/ DE LOS PLATOS EN EL MENU############################ */
Route::get('registroplato', 'registroController@getRegistroPlato');/* RUTA DE LA VISTA/ DEL REGISTRO DE PLATOS############################ */
Route::post('postregistroplato', 'registroController@postRegistroPlato');/* RUTA DEL POST/ DEL REGISTRO DE PLATOS############################ */

Route::get('modaleditplato/{id}', 'gestionController@getUpdateplato');
Route::post('modaleditplato', 'gestionController@postUpdateplato');


/* MODULO GESTION GALERIA  ######################################################  */
Route::get('galeria', 'gestionController@getGaleria')->name('galeria');/* RUTA DE LA VISTA/ DE LA GRID DE LA GALERIA############################ */
Route::post('postbdgaleria', 'gestionController@postbdgaleria');/* RUTA DEL POST/ DEL LA GRID DE LA GALERIA############################ */

/* MODULO GESTION PUNTUACION  ###################################################  */
Route::get('puntuacion', 'gestionController@getPuntuacion')->name('puntuacion');/* RUTA DE LA VISTA/ DEL LA GRID DE LAS PUNTUACIONES############################ */
Route::post('postbdpuntuacion', 'gestionController@postbdpuntuacion');/* RUTA DEL POST/ DE LA GRID DE LAS PUNTUACIONES ########################## */


/* MODULO GESTION SUCURSALES  ###################################################  */
Route::get('sucursal/{idEstablecimiento}', 'gestionController@getSucursal')->name('sucursal');/* RUTA DE LA VISTA/ DE LA GRID DE LAS SUCURSALES############################ */
Route::post('getDatosSucursalById', 'gestionController@getDatosSucursalById');/* RUTA DEL POST/ DE LA GRID DE LAS SUCURSALES############################ */
Route::get('sucursal/modalsucursal/{id}', 'gestionController@getModalSucursal');
//no manejar mas de dos niveles
/* RUTA DEL MODAL/VER DETALLES DE SUCURSALES############################ */
Route::get('registrosucursal/{id}', 'registroController@getRegistroSucursal');/* RUTA DE LA VISTA/ DEL REGISTRO DE LAS SUCURSALES############################ */
Route::post('procesarRegistroSucursal', 'registroController@postRegistroSucursal');/* RUTA DEL POST/ DEL REGISTRO DE LAS SUCURSALES############################ */
Route::get('sucursalcliente/{id}', 'gestionController@getSucursalCliente')->name('sucursalCliente');/* RUTA DE LA VISTA/ DE LAS SUCURSALES DE LOS CLIENTES############################ */


/* MODULO GESTION INFORMACION BASICA ############################################  */

Route::get('informacion', 'gestionController@getInformacion')->name('info');/* RUTA DE LA VISTA/  DE LA GRID DE LA INFORMACION BASICA Y COMENTARIOS############################ */
Route::post('postbdinformacion', 'gestionController@postbdinformacion');/* RUTA DEL POST/DE LA GRID DE LA INFORMACION BASICA Y COMENTARIOS############################ */

/* MODULO DE GEOLOCALIZACION ####################################################  */
Route::get('mapa','mainController@mapa');

/* MODULO FILTRADO ####################################################  */
/* Genera la vista de las sucursales que ya estan filtradas por nombre o categoria*/
Route::post('sucursales', 'mainController@SucuFiltrada');
/* Top Puntuados del Inicio*/
Route::get('/', 'mainController@topInicio');
/* Tops Puntuado Lista */
Route::get('puntuadolist','mainController@topPuntadosList');
/* Tops Puntuado Lista */
Route::get('visitadolist','mainController@topVisitadoList');
/* Tops Visitado Lista */
Route::get('edirtorlist','mainController@topEditorList');


/* METODOS DE PRUEBA ############################################################ */

Route::get('main/modal', 'mainController@getViewModal');

Route::get('main/modaltest', 'mainController@modaltest');

Route::get('main/modalformulario', 'mainController@getModalFormulario');

Route::get('main/tesProcedimiento', 'mainController@getViewProcedimientos');

Route::post('main/modalformulario', 'mainController@postMamodalFormulario');

Route::post('main/usuarioid', 'mainController@postprueba');
