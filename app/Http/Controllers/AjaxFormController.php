<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxFormController extends Controller
{
    public function create()
    {
        return view('tasks.task5');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        return response()->json(['success'=>'Запись успешно удалена']);
    }
}
