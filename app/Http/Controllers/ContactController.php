<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    protected function getContacts()
    {
        return [
            1 => ['id' => 1, 'name' => 'John Doe', 'phone' => '1234567890'],
            2 => ['id' => 2, 'name' => 'Jane Doe', 'phone' => '0987654321'],
            3 => ['id' => 3, 'name' => 'John Smith', 'phone' => '5551234556'],
        ];
    }

    public function index()
    {
        $companies = [
            1 => ['name' => "Company One", 'contacts' => 3],
            2 => ['name' => "Company Two", 'contacts' => 5],
        ];
        $contacts = $this->getContacts();
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        $contacts = $this->getContacts();
        abort_if(!isset($contacts[$id]), 404);
        $contact = $contacts[$id];
        return view('contacts.show')->with('contact', $contact);
    }
}