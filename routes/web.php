<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\CategroryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     //return view('home');
// });

Route::get('/unicode', function () {
    $user = new User();
    $allUser = $user::all();
    dd($allUser);
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/hello', function () {
    return "hello world!";
});

Route::get('/hello/{name}', function ($name) {
    return "hello world! $name";
});

Route::get('/form', function () {
    return view("form");
});

// Route::post('/submit-form', function () {
//     return "submit-form phuong thuc post!";
// });

// Route::delete('/submit-form', function () {
//     return "submit-form phuong thuc delete!";
// });

// Route::match(['get','post'], "/submit-form", function () {
//     return $_SERVER['REQUEST_METHOD'];
// });

// chi can dua path
Route::any("/submit-form", function (Request $request) { /// cach lay me thod
    return $request->method();
});

Route::prefix("/web")->group(function () {

    Route::get(
        "/product",
        function () {
            return 'danh sach san pham!';
        }
    );

    Route::get(
        "/user",
        function () {
            return "danh sach nguoi dung!";
        }
    );


    Route::prefix("/dashboard")->group(
        function () {
            // http://localhost:8080/api/dashboard/ban-hay-lam-day-2364726
            Route::get(
                "/{slug?}-{id?}",
                function ($slug = null, $id = null) {
                    $conten = "day la noi dung";
                    $conten .= "<br>slug = " . $slug;
                    $conten .= "<br>va id = " . $id;
                    return $conten;
                }
            )->where(
                    [
                        'slug' => '[a-z-]+',
                        // viet bieu thuc chinh quy de lay du lieu dung
                        'id' => '[0-9]+'
                    ]
                );

            Route::get(
                "/A",
                function () {
                        return 'A dashboard';
                    }
            );
            Route::get(
                "/B",
                function () {
                        return 'B dashboard';
                    }
            );
        }
    );

    //http://localhost:8080/api/categrory/edit/1

    Route::prefix('/categrory')->group(
        function () {
            // Route::get("/", [CategroryController::class, 'index']);
    
            //[->name("categrory.index")] tu dong tao url ngoai view
            Route::get("/", [CategroryController::class, 'index'])->name("categrory.index");

            Route::get("/edit", [CategroryController::class, 'edit']);

            Route::get("/edit/{id}", [CategroryController::class, 'getCategrory']);

            Route::post("/update", [CategroryController::class, 'updateCategrory'])->name("categrory.update");
        }
    );

});

//resource cucng cap san 1 template
Route::middleware('middleware.auth.api')->prefix("/admin")->group(function () {
    Route::resource("/home",HomeController::class);
    Route::get("/dashboard",[DashboardController::class,'index']);
});