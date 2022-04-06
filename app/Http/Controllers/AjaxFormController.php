<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxFormController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tasks.task5');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|confirmed|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $users = [
            ['id' => 1, 'name' => 'User1', 'email' => 'user1@localhost.com'],
            ['id' => 2, 'name' => 'User2', 'email' => 'user2@localhost.com'],
            ['id' => 3, 'name' => 'User3', 'email' => 'user3@localhost.com'],
            ['id' => 4, 'name' => 'User4', 'email' => 'user4@localhost.com'],
            ['id' => 5, 'name' => 'User5', 'email' => 'user5@localhost.com'],
        ];

        if ($duplicateKey = array_search($request->input('email'), array_column($users, 'email'))) {
            Log::channel('single')
                ->info('почтовый адрес '. $request->input('email') .' уже занят');

            return response()->json(['email' => 'Этот почтовый адрес уже занят, выберите другой'], 422);
        } else {
            return response()->json(['success' => 'Вы успешно зарегистрировались']);
        }


    }
}
