<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index(){
         return Form::all();
    }

    public function store(Request $request){

        Form::create($request->all());
        return $request;
    }

    public function update(Request $request){
        $form = Form::find($request->id);
        $form->update([
            'nbmen' => $request->nbmen,
            'nbwomen' => $request->nbwomen,
        ]);
        return $form;
    }
}
