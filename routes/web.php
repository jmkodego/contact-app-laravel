<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

function getContacts()
{
    return [
        1 => ['id' => 1, 'name' => 'John Doe', 'phone' => '1234567890'],
        2 => ['id' => 2, 'name' => 'Jane Doe', 'phone' => '0987654321'],
        3 => ['id' => 3, 'name' => 'John Smith', 'phone' => '5551234556'],
    ];
}
Route::get('/', function () {

    return view('welcome');
});

Route::get('/contacts', function () {
    $companies = [
        1 => ['name' => "Company One", 'contacts' => 3],
        2 => ['name' => "Company Two", 'contacts' => 5],
    ];
    // $contacts = getContacts();
    $contacts = [];
    return view('contacts.index', compact('contacts', 'companies'));
})->name('contacts.index');

Route::get('/contacts/{id}', function ($id) {
    $contacts = getContacts();
    abort_if(!isset($contacts[$id]), 404);
    $contact = $contacts[$id];
    return view('contacts.show')->with('contact', $contact);
})->whereNumber('id')->name('contacts.show');


Route::get('/contacts/create', function () {
    return view('contacts.create');
})->name('contacts.create');

// Route::get('/companies', function () {
//     return "<h1>Companies Page</h1>";
// });


// Route::get('/companies/{name}', function ($name) {
//     return "<h1>Company {$name}</h1>";
// })->whereAlphaNumeric('name');
