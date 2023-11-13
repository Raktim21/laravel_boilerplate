<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request){

        $total_admin   = User::where('is_admin', 1)->count();
        $total_student = User::where('is_admin', 0)->count();
        
        return view('admin.index', compact('total_admin', 'total_student'));
    }
}
