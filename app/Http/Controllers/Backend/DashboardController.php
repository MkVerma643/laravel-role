<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $user;
    public $regularUser;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            $this->regularUser = Auth::guard('user')->user();
            return $next($request);
        });
    }


    public function index()
    {
        $user = $this->user;
        $regularUser = $this->regularUser;

        if (!$user || !$user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }
        if (!$regularUser || !$regularUser->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        $total_roles = count(Role::select('id')->get());
        $total_users = count(User::select('id')->get());
        $total_admins = count(Admin::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());
        return view('backend.pages.dashboard.index', compact('total_users', 'total_admins', 'total_roles', 'total_permissions'));
    }
}
