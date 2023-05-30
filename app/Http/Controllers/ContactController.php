<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('contact.create', ['title' => 'Создание контакта']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $birthday = Carbon::createFromFormat('d.m.Y', $_POST['birthday']);
            $model = new Contact;
            $model->NAME = $_POST['name'];
            $model->birthday = $birthday;
            $model->user_id = 1 /*$_SESSION['user_id']*/;
            $model->save();
        }
        return redirect()->route("contact.read");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //$contact_array = Contact::where('user_id', $_SESSION['user_id'])->get();
        $contact_array = Contact::all();
        return View::make('contact.read', ['title' => 'Отображение контакта', 'contact_array' => $contact_array]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Contact $contact)
    {
        $id = $request->route('id');
        $model = Contact::find($id);
        return View::make('contact.edit', ['title' => 'Обновление контакта', 'params' => $model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = $request->route('id');
            $birthday = Carbon::createFromFormat('d.m.Y', $_POST['birthday']);
            Contact::where("ID", $id)->update(['NAME' => $_POST['name'], 'birthday' => $birthday]);
        }
        return redirect()->route("contact.read");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Contact $contact)
    {
        $id = $request->route('id');
        $model = Contact::where('id', $id);
        if ($model) {
            $model->delete();
        }
        return redirect()->route("contact.read");
    }
}
