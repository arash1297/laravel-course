<?php

use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify'=>true]);
Route::middleware(['auth', 'verified'])->group(function (){

    Route::get('/', function () {
        return view('welcome');
    })->middleware('throttle:testing');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admin',function(){
        return "is admin";
    })->middleware('isAdmin');

    Route::resource('/posts',PostsController::class);
});
Route::get('/session',function (Request $request){
//    session(['username'=>'ali']);
//    $request->session()->put(["name"=>"hasan"]);
//    $request->session()->forget('name');
//    $request->session()->flush();
//    $request->session()->flash('message','has post create!');
    $request->session()->reflash();
    return $request->session()->all();
//    return $request->session()->get('message');
});
Route::get('/session-test',function (Request $request){
//    session(['username'=>'ali']);
    return $request->session()->all();
});
//Route::get ('/test', 'TestController@index') ->name('test')->middleware('auth');
//Route::get('/',function (){
//    $user=Auth::user();
//    $check=Auth::check();
//    if ($check){
//        echo "hello ".$user->name;
//    }
//    else{
//        return redirect()->to("home");
//    }
//    dd($check);
//    $email="ashkan@gmail.com";
//    $password='12345678';
//    $auth=Auth::attempt(['email'=>$email,'password'=>$password]);
//    $auth=Auth::once(['email'=>$email,'password'=>$password]);
//    dd($auth);
//    Auth::loginUsingId(4);
//});
//Route::get('/test',function (){
//    $user=Auth::user();
//    $role=new \App\Models\Role();
//    $role->name='مدیر';
//    $user->roles()->save($role);
////    $user=\App\Models\User::findOrfail(2);
////    $roles=$user->roles();
////    foreach ($roles as $role){
////        $role->name;
////    }
//});
//Route::get('user/{id}/',function ($id){
//    $user=\App\Models\User::findOrFail($id);
//    foreach ($user->roles as $role){
//        echo $role->name;
//    }
//});
// new change for test git