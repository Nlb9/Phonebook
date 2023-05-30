<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TypeController extends Controller
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
        return View::make('type.create', ['title' => 'Создание контакта']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $model = new Type;
            $model->type = $_POST['type'];
            $model->save();
        }
        return redirect()->route('type.read');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $type_array = Type::all();
        return View::make('type.read', ['title' => 'Отображение контакта', 'type_array' => $type_array]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Type $type)
    {
        $id = $request->route('id');
        $model = Type::find($id);
        return View::make('type.edit', ['title' => 'Обновление контакта', 'params' => $model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = $request->route('id');
            Type::where("id", $id)->update(['type' => $_POST['type']]);
        }
        return redirect()->route('type.read');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Type $type)
    {
        $id = $request->route('id');
        $model = Type::where('id', $id);
        if ($model) {
            $model->delete();
        }
        return redirect()->route('type.read');
    }
}
