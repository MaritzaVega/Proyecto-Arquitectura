<?
/*Session donde ira todas las rutas del sistema de ventas americo*/

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

Route::get('/', function () {
    return view('welcome');
    //return "Hola probando laravel";
});


