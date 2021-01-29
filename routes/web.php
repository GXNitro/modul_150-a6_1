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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

/**
 * Display All Subjects
 */
Route::get('/subjects', function () {

    $subjects = \App\Subjects::orderBy('created_at', 'asc')->get();

    return view('subjects', [
        'subjects' => $subjects,
    ]);

    return view('subjects');
});

/**
 * Add A New Subject
 */
Route::post('/subjects', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'subjects' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/subjects')
            ->withInput()
            ->withErrors($validator);
    }

    $subjects = new \App\Subjects;
    $subjects->subjectname = $request->subjects;
    $subjects->save();

    return redirect('/subjects');
});

/**
 * Delete An Existing Subject
 */
Route::delete('/subjects/{id}', function ($id) {
    \App\Subjects::findOrFail($id)->delete();

    return redirect('/subjects');
});


/**
 * Display All Tasks
 */
Route::get('/homework', function () {

    $homework = \App\Homework::orderBy('created_at', 'asc')->get();
    $subjects = \App\Subjects::orderBy('created_at', 'asc')->get();

    return view('homework', [
        'homework' => $homework,
        'subjects' => $subjects,
    ]);

    return view('homework');
    return view('subjects');
});

/**
 * Add A New Task
 */
Route::post('/homework', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'task' => 'required|max:255',
        'subject' => 'required',
        'date' => '',
    ]);

    if ($validator->fails()) {
        return redirect('/homework')
            ->withInput()
            ->withErrors($validator);
    }

    $homework = new \App\Homework;
    $homework->subject = $request->subject;
    $homework->task = $request->task;
    $homework->date = $request->date;
    $homework->save();

    return redirect('/homework');
});

/**
 * Delete An Existing Task
 */
Route::delete('/homework/{id}', function ($id) {
    \App\Homework::findOrFail($id)->delete();

    return redirect('/homework');
});
