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

use App\Task;
use App\Category;
use App\User;
use App\Item;
use App\UserItem;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('login');
});

Route::get('/tasks/{category}', function($category) {
    $tasks = Task::where('category','=',$category)->orderBy('created_at', 'asc')->get();
    $categories = Category::get();
    $user = User::first();

    return view('tasks', [
        'tasks' => $tasks,
        'categories' => $categories,
        'category'=> $category,
        'user'=> $user
    ]);
});

//to display all tasks
Route::get('/tasks', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    $categories = Category::get();
    $user = User::first();

    return view('tasks', [
        'tasks' => $tasks,
        'categories' => $categories,
        'user'=> $user
    ]);
});

//to display all items
Route::get('/items', function(){
    $items = Item::orderBy('price', 'asc')->get();
    $categories = Category::get();
    $user = User::first();

    return view('items', [
        'items' => $items,
        'categories' => $categories,
        'user'=> $user
    ]);
});

//to buy item
Route::post('/buyitem/{id}', function($id, Request $request) {
    $item = Item::where('id', '=', $id)->first();
    $user = User::where('id', '=', $request->user)->first();
    
    if ($user->coins < $item->price){
        return redirect('/items');
    }
    else{
        $user->coins = $user->coins - $item->price;
        $user->save();

        $item->status = 1;
        $item->save();

        $useritem = new UserItem;
        $useritem->userid = $user->id;
        $useritem->itemid = $item->id;
        $useritem->value = $item->imgvalue;
        $useritem->save();

        return redirect('/items');
    }

});

//change profile
Route::post('/changeprofile/{id}', function($id, Request $request) {
    $item = Item::where('id', '=', $id)->first();
    $user = User::where('id', '=', $request->user)->first();
    
    $user->picture = $item->imgvalue;
    $user->save();

    return redirect('/items');
});

//to add a new task
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->category = $request->category;
    $task->description = $request->description;
    $task->date = $request->date;
    $task->time = $request->time;
    $task->save();

    return redirect('/tasks/'.$task->category);
});

//to add category
Route::post('/category', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
    }

    $category = new Category;
    $category->name = $request->name;
    // $category->user_id = $request->user_id;
    $category->save();

    return redirect('/tasks');
});

//delete a category
Route::delete('/category/{id}', function ($id) {
    $category = Category::where('id', '=', $id)->first()->name;
    Category::where('id', '=', $id)->first()->delete();
    Task::where('category', '=', $category)->update(['category' => ""]);

    return redirect('/tasks');
});

//delete a task
Route::delete('/task/{id}', function ($id, Request $request) {
    Task::findOrFail($id)->delete();

    $category = $request->category;

    if ($category == "Home"){
        return redirect('/tasks');
    }
    else{
        return redirect('/tasks/'.$category);
    }
});

//edit a task
Route::patch('/task/{id}', function ($id, Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
    }

    $task = Task::where('id', '=', $id)->first();
    $task->name = $request->name;
    $task->description = $request->description;
    $task->date = $request->date;
    $task->time = $request->time;
    $task->save();
    $category = $request->category;

    if ($category == "Home"){
        return redirect('/tasks');
    }
    else{
        return redirect('/tasks/'.$category);
    }
});

//finish a task
Route::post('/taskfinish/{id}', function($id, Request $request){
    $task = Task::where('id', '=', $id)->first();
    $task->status = 1;
    $task->save();
    
    
    $user = User::first();
    $user->coins = $user->coins + 15;
    $user->save();

    $category = $request->category;

    if ($category == "Home"){
        return redirect('/tasks');
    }
    else{
        return redirect('/tasks/'.$category);
    }
});