<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($id) {
        return User::find($id);
    }
    public function index() {
        return User::all();
    }
    public function update(Request $request, $id) {
        return User::find($id)->update($request->all());
    }
    public function store(Request $request) {
        return User::create($request->all());
    }
    public function destroy($id) {
        return User::find($id)->delete();
    }
}