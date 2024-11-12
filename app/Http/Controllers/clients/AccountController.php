<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index() {
        /**
         * 
         */
        return view('clients.auth.index');
    }
    public function update(Request $request, string $id) {
        dd($request->input(), $id);
        if($request->method('PUT')) {

        }
    }
}
