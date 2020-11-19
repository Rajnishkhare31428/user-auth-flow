<?php

namespace App\Http\Controllers;

use App\Models\active_users;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    public function register(Request $request) {
        try {
            $validated_data = $request->validate([
                'name' => 'required|max:60',
                'email' => 'required|email:rfc',
                'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'gender' => 'required',
                'contact' => 'required',
                'confirm_password' => 'required|same:password'
            ]);            
        }
        catch(Exception $e) {
            return [
                'status' => 'validation_failed',
                'message' => 'Registration failed',
                'error_message' => $e
            ];
        }

        try {
            $new_user = User::create($request->all());
            if($new_user)return [
                'status' => 'registration_ok',
                'message' => 'Registration was successful',
            ];            
        }
        catch (Exception $e){
            return [
                'status' => 'registration_failed',
                'message' => 'Registration failed',
                'error_message' => $e
            ];
        }


    }
    public function destroy($id) {
        return User::find($id)->delete();
    }
    public function getActiveUsers() {
        return active_users::all();
    }
    public function login(Request $request) {
        $active_user =  User::where([['email', '=', $request->email], ['password', '=', $request->password]])->get();
        if (sizeof($active_user) > 0) {
            $current_user = active_users::create([
                'user_id' => $active_user[0]->id,
                'auth_token' => Str::random(60),
                'status' => 'active',
                'device_type' => 'default'
            ]);
            return [
                'auth_token' => $current_user->auth_token,
                'status' => 'login_ok',
                'message' => 'Authentication made successfully'
            ];    
        }
        return [
            'auth_token' => null,
            'status' => 'login_failed',
            'message' => 'Bad credentials, maybe such user dont exist'
        ];
        
    }
}
