<?php

namespace App\Http\Controllers;

use App\Models\active_users;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    //
    function getUserId($auth_token) {
        $current_user = active_users::where([['auth_token', '=', $auth_token]])->get();
        if(sizeof($current_user) > 0) {
            return $current_user[0]->user_id;
        }
        return -1;
    }
    function getAllPosts(Request $request) {
        return DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')->select('users.name', 'users.email', 'posts.*')->get();
    }
    function getMyPost(Request $request) {

    }
    function likePost(Request $request) {

    }
    function commentPost(Request $request) {
        
    }
    function createPost(Request $request) {
        if($request->auth_token != '') {
            $user_id = $this->getUserId($request->auth_token);
            $myRequest = $request->all();
            $myRequest['user_id'] = $user_id;
            post::create($myRequest);
            return 'Post has been created';
        }
    }
    function updatePost(Request $request) {

    }
}
