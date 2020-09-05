<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;
use DB;

class HomeController extends Controller{

	public function index(Request $request){

		return view('admin.dashboard');
	}


	public function NeoStats(Request $request){

		return view('admin.neo_sates');
	}


	public function NeoStatsResult(Request $request){

		$validate = $this->validate($request, [
			'StartDate' => 'required',
			'EndDate' 	=> 'required',
		]);

		$StartDate 	= $request->input('StartDate');
		$EndDate 	= $request->input('EndDate');
		
  		$url 		= 'https://api.nasa.gov/neo/rest/v1/feed?start_date='.$StartDate.'&end_date='.$EndDate.'&api_key=CYXD5LpqcguGKoTXW6xOueWCJQbOLOBtiCW8Jded';


	    $ch 		= curl_init();
	    $headers 	= array();
	    $headers[] 	= "Content-Type: application/json";
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    $result 	= curl_exec($ch);
	    $results 	= json_decode($result, TRUE);
	    curl_close($ch);

	    $truncateTbl = DB::table('neo_feed')->truncate();
		
		
		
		if(isset($results['error_message'])){
		
			$request->session()->flash('alert-error', 'Enter Only 7 Days Date Range...!');
			return redirect('/Home/NeoStats');
		
		}else{
	   
			foreach ($results['near_earth_objects'] as $dataGet) {
				foreach ($dataGet as $data) {

					$id 		= $data['id'];
					$closeDate 	= $data['close_approach_data'][0]['close_approach_date'];
					$speed 		= $data['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'];
					$distance 	= $data['close_approach_data'][0]['miss_distance']['kilometers'];
					$diameter 	= $data['estimated_diameter']['kilometers']['estimated_diameter_max'];
					

					$size = $diameter;

					$data = array(
						'asteroid_id' 	=> $id,
						"speed" 		=> $speed,
						"distance" 		=> $distance,
						"size" 			=> $size,
						"close_date" 	=> $closeDate,
					);

					$saveData = DB::table('neo_feed')->insert($data);
					
					
					 

				}
				
				
				
			}
		
		}
        
        $NeoData = DB::table('neo_feed')->get();
        
        $array['neo_feed_list'] = json_decode(json_encode($NeoData), true);
        
        $GetSpeed = DB::select("SELECT MAX(speed) as speed, asteroid_id FROM neo_feed");
        
        $array['speed_list'] = json_decode(json_encode($GetSpeed), true);
        
        $GetDistance = DB::select("SELECT MIN(distance) as distance, asteroid_id FROM neo_feed");
        
        $array['distance_list'] = json_decode(json_encode($GetDistance), true);
        
        $GetSize = DB::select("SELECT MAX(size) as size, asteroid_id FROM neo_feed");
        
        $array['size_list'] = json_decode(json_encode($GetSize), true);
        
        $GetTot = DB::select("SELECT COUNT(id) as tblID FROM neo_feed GROUP BY close_date");
        
        $array['tot_list'] = json_decode(json_encode($GetTot), true);
        
        $GetDate = DB::select("SELECT COUNT(id) as tebCount, close_date FROM neo_feed GROUP BY close_date");
        
        $array['date_list'] = json_decode(json_encode($GetDate), true);
        
            

		return view('admin.neo_sates_result', $array);


	}

}
