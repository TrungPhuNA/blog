<?php

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

/**
 *  THUC HANH
 */

Route::get("company","CompanyController@index")->name("index");
Route::get("company/{id}","CompanyController@getEdit")->name("getEdit");
/**
 *
 *
 */



// get data
Route::get("crawdata", function() {
    
  
   for($i = 51 ; $i <= 54 ; $i++)
   {
        $html = file_get_html('https://mywork.com.vn/cong-ty/trang/'.$i.'#list_job');
        $tags = $html->find('#list-companies tr');
        {
            foreach ($tags as $tag)
            {
                $getTag[] = [
                    'name'       => $tag->children(0)->children(1)->children(0)->plaintext,
                    'slug'         => $tag->children(0)->children(1)->children(0)->title,
                    'logo'        => $tag->children(0)->children(0)->children(0)->src,
                    'address'       => $tag->children(1)->plaintext,
                    'staff'     => $tag->children(2)->plaintext,
                    'url'          => $tag->children(0)->children(0)->href
                ];  
                // csrf_field();
                // DB::table("company")->insert($getTag);
            }  
        }
   }
 
   

});

//Test session
Route::get("session",function() {
    if(Session::exists("data"))
    {
        echo Session::get("data");
    }
    else 
    {
        Session::put("data","Trung Phu NA");

    }
    // xoa sesstion 
    // session()->forget('key');
    // session()->flush();

});

// Route::get('user/profile', 'UserController@showProfile')->name('profile');
// Route::get("test", function () {
//     return " OK ";
// });

// Route::get('user/{id}', function ($id) {
//     return 'User '.$id;
// });

// Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     //
//     return "OK";
// });

// // tham so co the co hoac khong  {?}
// Route::get('user/{name?}', function ($name = null) {

//     return "ten ban la " .$name;
// });

// // rang buoc dieu kien
// Route::get('user/{name}', function ($name) {
//     //
// })->where('name', '[A-Za-z]+');

// Route::get('user/{id}', function ($id) {
//     //
// })->where('id', '[0-9]+');

// Route::get('user/{id}/{name}', function ($id, $name) {
//     //
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

// // dinh nghia lai url  => route("profile")
// Route::get('user/profile', 'UserController@showProfile')->name('profile');


// nhom route
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second Middleware
//     });

//     Route::get('user/profile', function () {
//         // Uses first & second Middleware
//     });
// });

// Route::prefix('admin')->group(function () {
//     Route::get('users', function () {
//         // Matches The "/admin/users" URL
//     });
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
