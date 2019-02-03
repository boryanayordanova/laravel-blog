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

/*1*//*
Route::get('/', function () {
return view('welcome');
});
 */

/*2*//*
Route::get('/', function () {
return view('welcome', [
'name' => 'Bori',
]);
});
 */

/*3*//*
Route::get('/', function () {
return view('welcome')->with('name', 'Bori');
});
 */

/*4*//*
Route::get('/', function () {
$name = "Bori";
return view('welcome', ["name" => $name]);
});
 */

/*5*//*
Route::get('/', function () {
$name = "Bori";
return view('welcome', compact("name"));
});*/

/*6 static array list*//*
Route::get('/', function () {
$tasksArray = [
'task 1 from array',
'task 2 from array',
'task 3 from array',
];
return view('welcome', compact("tasksArray"));
});*/

/*7 reading from DB*//*
Route::get('/', function () {
$tasks = DB::table('tasks')->get();
return $tasks; //returns a json on the browser
});*/

/*7.1 reading from DB*/
//http://localhost:8000/tasks/2
/*
Route::get('/tasks/{task}', function ($id) {
$tasks = DB::table('tasks')->find($id);
dd($tasks);
return view('welcome', compact("tasks"));
});*/

/*7.2 reading from DB*//*
//http://localhost:8000/tasks/
Route::get('/tasks', function () {
//$tasks = DB::table('tasks')->latest()->get();

//when we have already an app/Task.php file
$tasks = Task::all();
return view('tasks.index', compact("tasks"));
});*/

/*7.3 reading from DB*//*
//http://localhost:8000/tasks/2
Route::get('/tasks/{task}', function ($id) {
//$task = DB::table('tasks')->find($id);

//when we have already an app/Task.php file
$task = Task::find($id);
return view('tasks.show', compact("task"));
});*/

/* move this to the App\Providers\AppServiceProvider.php -> the register function
App::bind('App\Billing\Stripe', function () {

return new \App\Billing\Stripe(config('services.stripe.secret')); //from config/services
});

$stripe = resolve('App\Billing\Stripe');

dd($stripe);
 */
// we cant use php artisan on the console when dd is active
//dd(resolve('App\Billing\Stripe'));

Route::get('about', function () {
	return view('about');
});

//add this instead of 7.2 and 7.3
Route::get("/tasks", "TasksController@index");
Route::get("/tasks/{task}", "TasksController@show");
Route::get("/posts", "PostController@index");
Route::get("/posts/{post}", "PostController@show");
Route::get("/", "Post2Controller@index")->name("home");
Route::get("/posts2/create", "Post2Controller@create");
Route::get("/posts2/{post}", "Post2Controller@show");
Route::get("/register", "RegistrationController@create");
Route::get("/login", "SessionController@create")->name("login");
Route::get("/logout", "SessionController@destroy");
Route::get("/posts2/tags/{tag}", "TagsController@index");

Route::post("/posts2", "Post2Controller@store");
Route::post("/posts2/{post}/comments", "CommentsController@store");
Route::post("/register", "RegistrationController@store");
Route::post("/login", "SessionController@store");
