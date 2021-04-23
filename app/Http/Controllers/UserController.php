<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCommentRequest;

class UserController extends Controller
{
    /**
     * Get Details and Comments by User
     *
     * @param  Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $userId = null )
    {
        $userId = $request->input('id', $userId);
        
        if (!$userId) {
            die('User ID not found');
        }

        if ( !$user = User::find($userId) ) {
            die('User not found with id :' . $userId);
        }

        return view('welcome', compact('user'));
    }
}
