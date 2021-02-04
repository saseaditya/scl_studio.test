<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Input;
use Redirect;
use Session;
use Alert;
use HelperData;

class LoginController extends Controller
{
    public function viewLogin()
	{
		if(!session('id_user')){
  			return view("application.login");
		}else{
      		return redirect()->route('viewDashboard');
			// echo "Login Success";
		}
	}

    public function prosesLogin(Request $request)
	{
		$user = @$_GET['user'];
		$pass = @$_GET['pass'];

		$cekUsers = DB::table('m_user')
  			->where('m_user.user', $user)
  			->where('m_user.pass', $pass)
  			   ->get();

		if(count($cekUsers) > 0) {
			foreach($cekUsers as $users)
			{
				session()->put('id_user',$users->id);
				session()->put('name',$users->user);
				$data = array("fullname" => $users->user);
				return response()->json($data);
			}
		} else {
			echo "Failed";
		}
	}

	public function prosesLogout()
	{

		if(session('id_user')) {
			session()->forget('id_user');
			return redirect('/');
		} else {
			echo 'Unkwon Session';
			return redirect('/');
		}
	}
}
