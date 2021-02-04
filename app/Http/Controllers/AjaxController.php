<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Redirect;
use Session;
use file;

class AjaxController extends Controller
{

    public function login(Request $request)
    {
        $user = @$_POST['user'];
		$pass = @$_POST['pass'];

		$cekUsers = DB::table('m_user')
  			->where('m_user.user', $user)
  			->where('m_user.pass', $pass)
  			   ->get();

		if(count($cekUsers) > 0) {
			foreach($cekUsers as $users)
			{
				$data = array("response" => $users->user);
				return response()->json($data);
			}
		} else {
			echo "Failed";
		}
    }

    public function actionCUCategory(Request $request, $name = null)
    {
    	$txtNama = @$_POST['name'];
		if($name){
			$dataUpdate = [
				"name" => $txtNama,
				"last_edit" => date('Y-m-d H:i:s'),
			];

			$prosesUpdate = DB::table('m_categories')
						// ->where('id',$id)
						->where('name',$name)
						->where('is_delete',0)
							->update($dataUpdate);
			$data = array("response" => "Update Successfully");
		}else{
			$dataUpdate = [
				"name" => $txtNama,
				"created_date" => date('Y-m-d H:i:s'),
				"is_delete" => 0,
			];

			$prosesUpdate = DB::table('m_categories')
							->insert($dataUpdate);
			$data = array("response" => "Insert Successfully");
		}

		if($prosesUpdate){
			return response()->json($data);
		}else{
			return response()->json(array("response" => "Failed"));
		}
    }

    public function DeleteCategory(Request $request)
    {
    	$txtNama = @$_POST['name'];
		$dataUpdate = [
			"is_delete" => 1,
		];

		$prosesDelete = DB::table('m_categories')
					->where('name',$txtNama)
					->where('is_delete',0)
						->update($dataUpdate);
		$data = array("response" => "Delete Successfully");

		if($prosesDelete){
			return response()->json($data);
		}else{
			return response()->json(array("response" => "Failed"));
		}
    }

    public function actionCUArticle(Request $request, $name = null)
    {
    	$txtTitle 		 = @$_POST['title'];
		$slctCategory	 = @$_POST['category'];
		$hdDesc			 = @$_POST['desc'];
		$hdContent		 = @$_POST['content'];

		$idCategory =  DB::table('m_categories')
  			->where('name', $slctCategory)
  			   ->first();

		if($name){
			$dataUpdate = [
				"category_id" => $idCategory->id,
				"title" => $txtTitle,
				"description" => $hdDesc,
				"content" => $hdContent,
				"last_edit" => date('Y-m-d H:i:s'),
			];

			$prosesUpdate = DB::table('t_articles')
						->where('title',$name)
							->update($dataUpdate);
			$data = array("response" => "Update Successfully");
		}else{
			$dataUpdate = [
				"category_id" => $idCategory->id,
				"title" => $txtTitle,
				"description" => $hdDesc,
				"content" => $hdContent,
				"is_delete" => 0,
				"created_date" => date('Y-m-d H:i:s'),
			];

			$prosesUpdate = DB::table('t_articles')
							->insert($dataUpdate);
			$data = array("response" => "Insert Successfully");
		}

		if($prosesUpdate){
			return response()->json($data);
		}else{
			return response()->json(array("response" => "Failed"));
		}
    }

    public function DeleteArticle(Request $request)
    {
    	$txtNama = @$_POST['title'];
		$dataUpdate = [
			"is_delete" => 1,
		];

		$prosesDelete = DB::table('t_articles')
					->where('title',$txtNama)
					->where('is_delete',0)
						->update($dataUpdate);
		$data = array("response" => "Delete Successfully");

		if($prosesDelete){
			return response()->json($data);
		}else{
			return response()->json(array("response" => "Failed"));
		}
    }
}
