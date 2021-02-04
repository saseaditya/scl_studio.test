<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Redirect;
use Session;
use file;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use DataTables;

class AdminController extends Controller
{
    public function viewCategory(Request $request, $id = null)
    {
    	$viewPage = "application.admin.category.index";
		$page	= ["Home","Category"];
		$data = DB::table('m_categories');
			if($id){
				// $data = $data->where('id_user',$id)->get();
				// return response()->json($data);
				$prosesUpdate = DB::table('m_categories')
						->where('id',$id)
							->update([
								'is_delete' => 1
								]);
				return redirect()->back()->with('message', 'Delete Successfully')->with('message_status', 'success');
			}					
			$data = $data->where('is_delete',0);
			$data = $data->get();

		return view($viewPage,array(
			'pageNow' 	 	=> $page,
			'dataCategory' 	 	=> $data,
			'menuActive' 	=> "daftarcategory"
		));
    }

    public function actionCUCategory(Request $request, $id = null)
    {
    	$txtNama = $request->txtNama;
		if($id){
			$dataUpdate = [
				"name" => $txtNama,
				"last_edit" => date('Y-m-d H:i:s'),
			];

			$prosesUpdate = DB::table('m_categories')
						->where('id',$id)
							->update($dataUpdate);
			$msg = "Update ";
		}else{
			$dataUpdate = [
				"name" => $txtNama,
				"created_date" => date('Y-m-d H:i:s'),
				"is_delete" => 0,
			];

			$prosesUpdate = DB::table('m_categories')
							->insert($dataUpdate);
			$msg = "Insert ";
		}

		if($prosesUpdate){
			return redirect()->back()->with('message', $msg.'Successfully')->with('message_status', 'success');
		}else{
			return redirect()->back()->with('message', $msg.'Failed')->with('message_status', 'danger');
		}
    }

    public function viewArticles(Request $request, $id = null)
    {
    	$viewPage = "application.admin.articles.index";
		$page	= ["Home","Articles"];
		$data = DB::table('t_articles');
			if($id){
				$prosesUpdate = DB::table('t_articles')
						->where('id',$id)
							->update([
								'is_delete' => 1
								]);
				return redirect()->back()->with('message', 'Delete Successfully')->with('message_status', 'success');
			}					
			$data = $data->where('is_delete',0);
			$data = $data->get();

		$dataCategory = DB::table('m_categories')			
							->where('is_delete',0)
								->get();	


		return view($viewPage,array(
			'pageNow' 	 	=> $page,
			'dataArticles' 	=> $data,
			'dataCategory'  => $dataCategory,
			'menuActive' 	=> "daftararticles"
		));
    }

    public function actionCUArticles(Request $request, $id = null)
    {
    	$txtTitle = $request->txtTitle;
		$slctCategory = $request->slctCategory;
		$hdDesc = $request->hdDesc;
		$hdContent = $request->hdContent;
		if($id){
			$dataUpdate = [
				"category_id" => $slctCategory,
				"title" => $txtTitle,
				"description" => $hdDesc,
				"content" => $hdContent,
				"last_edit" => date('Y-m-d H:i:s'),
			];

			$prosesUpdate = DB::table('t_articles')
						->where('id',$id)
							->update($dataUpdate);
			$msg = "Update ";
		}else{
			$dataUpdate = [
				"category_id" => $slctCategory,
				"title" => $txtTitle,
				"description" => $hdDesc,
				"content" => $hdContent,
				"is_delete" => 0,
				"created_date" => date('Y-m-d H:i:s'),
			];

			$prosesUpdate = DB::table('t_articles')
							->insert($dataUpdate);
			$msg = "Insert ";
		}

		if($prosesUpdate){
			return redirect()->back()->with('message', $msg.'Successfully')->with('message_status', 'success');
		}else{
			return redirect()->back()->with('message', $msg.'Failed')->with('message_status', 'danger');
		}
    }
}
