<?php

use Illuminate\Support\Str;
use Carbon\Carbon;
/**
*
*/
class HelperData
{

	public static function testHelper()
	{
		$data = "hai, i'll help you";

		return $data;
	}

	public static function getDataUser($nik="",$get,$id="")
	{
		if ($get == "all") {
			$dataUser = DB::table("m_user")
					->where("m_user.id",$nik)
						->first();
		} else {
			$dataUser = DB::table("m_user")
					->where("m_user.id",$nik)
						->get();
		}
		$response = "";
		foreach ($dataUser as $tmp) {
			if ($get == "all") {
				$response = $dataUser;
			} else if ($get == "fullname") {
				$response = $tmp->user;
			}  else {
				$response = "";
			}
		}
		return $response;
	}

	public static function getCategoryName($id="")
	{
		$data = DB::table("m_categories as mc")->select('mc.name')
					->where("mc.id",$id)
						->get();
		$response = "";
		foreach ($data as $tmp) {
			$response = $tmp->name;
		}
		return $response;
	}

	public static function getDay($language = 'IND',$date)
	{
		$d = date('D', strtotime($date));
		switch ($language) {
			case 'IND':
				switch ($d) {
					case 'Mon':
						$newDay = 'Senin';
						break;
					case 'Tue':
						$newDay = 'Selasa';
						break;
					case 'Wed':
						$newDay = 'Rabu';
						break;
					case 'Thu':
						$newDay = 'Kamis';
						break;
					case 'Fri':
						$newDay = 'Jumat';
						break;
					case 'Sat':
						$newDay = 'Sabtu';
						break;
					case 'Sun':
						$newDay = 'Minggu';
						break;

					default:
						break;
				}
				break;

			case 'ENG':
				switch ($d) {
					case 'Mon':
						$newDay = 'Monday';
						break;
					case 'Tue':
						$newDay = 'Tuesday';
						break;
					case 'Wed':
						$newDay = 'Wednesday';
						break;
					case 'Thu':
						$newDay = 'Thursday';
						break;
					case 'Fri':
						$newDay = 'Friday';
						break;
					case 'Sat':
						$newDay = 'Saturday';
						break;
					case 'Sun':
						$newDay = 'Sunday';
						break;

					default:
						break;
				}
				break;
			default:
				break;
		}
		return $newDay;
	}

	public static function getMonthName($language = 'IND',$date,$type="month")
	{
		$day = date('d',strtotime($date));
		$year = date('Y',strtotime($date));
		$newDate = date('M',strtotime($date));
		switch ($language) {
			case 'IND':
				switch ($newDate) {
					case 'Jan':
						$date = 'Januari';
						break;
					case 'Feb':
						$date = 'Februari';
						break;
					case 'Mar':
						$date = 'Maret';
						break;
					case 'Apr':
						$date = 'April';
						break;
					case 'May':
						$date = 'Mei';
						break;
					case 'Jun':
						$date = 'Juni';
						break;
					case 'Jul':
						$date = 'Juli';
						break;
					case 'Aug':
						$date = 'Agustus';
						break;
					case 'Sep':
						$date = 'September';
						break;
					case 'Oct':
						$date = 'Oktober';
						break;
					case 'Nov':
						$date = 'November';
						break;
					case 'Dec':
						$date = 'Desember';
						break;
					default:
						$date = 'Unknown';
						break;
				}
				break;
			case 'ENG':
				switch ($newDate) {
					case 'Jan':
						$date = 'January';
						break;
					case 'Feb':
						$date = 'February';
						break;
					case 'Mar':
						$date = 'March';
						break;
					case 'Apr':
						$date = 'April';
						break;
					case 'May':
						$date = 'May';
						break;
					case 'Jun':
						$date = 'June';
						break;
					case 'Jul':
						$date = 'July';
						break;
					case 'Aug':
						$date = 'August';
						break;
					case 'Sep':
						$date = 'September';
						break;
					case 'Oct':
						$date = 'October';
						break;
					case 'Nov':
						$date = 'November';
						break;
					case 'Dec':
						$date = 'December';
						break;
					default:
						$date = 'Unknown';
						break;
				}
				break;
			default:
				break;
		}
		if($type == 'full') {
			return $day.' '.$date.' '.$year;
		} else if($type == 'xday') {
				return $date.' '.$year;
		} else {
			return $date;
		}
	}

	

}
?>
