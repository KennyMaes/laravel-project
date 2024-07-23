<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getOverview() {
        $users = User::all();
        $currentUser = Auth::user();
        return view('user.user-overview', ['users' => $users, 'currentUser' => $currentUser]);
    }

    public function getProfile($id) {
        $user = User::find($id);
        $currentUser = Auth::user();
        return view('user.user-profile', ['user' => $user, 'currentUser' => $currentUser]);
    }

    public function toggleAdmin($id) {
        $user = User::find($id);
        $user['is_admin'] = !$user['is_admin'];
        $user->save();

        return redirect('/users');
    }
}
