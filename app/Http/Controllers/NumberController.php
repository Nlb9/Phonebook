<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Number;
use App\Models\Type;
use App\Rules\Validnumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class NumberController extends Controller
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
    public function create(Request $request)
    {
        $type_model = Type::all();
        $id = $request->route('id');
        $params = Contact::find($id);
        return View::make('number.create', ['title' => 'Добавление номера', 'params' => $params, 'types' => $type_model]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->route('id');
        $validator = Validator::make($request->all(), [
            'number' => [new Validnumber()],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        } else {
            $model = new Number;
            $model->cont_id = $id;
            $model->type_id = $_POST['type'];
            $model->number = $_POST['number'];
            $model->save();
        }
        return redirect()->route("number.read", ['id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Number $number)
    {
        $id = $request->route('id');
        $contName = Contact::where('id', $id)->pluck('name')->first();
        $number_array = Number::where("cont_id", $id)->get();
        return View::make('number.read', ['title' => 'Отображение номеров', 'contName' => $contName, 'cont_id' => $id, 'number_array' => $number_array]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Number $number)
    {
        $id = $request->route('id');
        $type_model = Type::all();
        $params = Number::find($id);
        return View::make('number.edit', ['title' => 'Изменение номера', 'params' => $params, 'types' => $type_model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Number $number)
    {
        $id = $request->route('id');
        $cont_id = Number::where('id', $id)->pluck('cont_id')->first();
        $validator = Validator::make($request->all(), [
            'number' => [new Validnumber()],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        } else {
            Number::where("ID", $id)->update(['number' => $_POST['number'], 'type_id' => $_POST['type']]);
        }
        return redirect()->route("number.read", ['id'=>$cont_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Number $number)
    {
        $id = $request->route('id');
        $cont_id = Number::where('id', $id)->pluck('cont_id')->first();
        Number::where('id', $id)->delete();
        return redirect()->route("number.read", ['id'=>$cont_id]);
    }

    /*
    public function validateNumber($number)
    {
        $pattern = '/^(\+7|8)\d{10}$/';
        if (preg_match($pattern, $number)) {
            return $number;
        }
    }
    */
}
