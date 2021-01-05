<?php

Class ApiPoint{

	public static function find($app){
		if($app->request->isPost()){

			$json          = file_get_contents('php://input');
			$data          = json_decode($json, TRUE);

			$token                     = $data['token'];
			$id                        = $data['id'];

			$user                      = ApiAuth::getInfoToken($token);

			if(empty($user)){
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}

			$response = Point::select('id','user_id', 'point', 'date', 'created_at')->whereRaw(" id = " . $id . " AND user_id = " . $user['id'])->orderBy('date','asc')->first();

			if(!empty($response)){	
				$response = array('status'=>1,'response'=>$response);
				echo json_encode($response);
				exit;
			}
			else{
				$response = array('status'=>0,'response'=>'', 'error'=>'Nenhum registro encontrado.');
				echo json_encode($response);
				exit;
			}
		}
	}

	public static function list($app){
		if($app->request->isPost()){

			$json          = file_get_contents('php://input');
			$data          = json_decode($json, TRUE);

			$token                     = $data['token'];

			$user                      = ApiAuth::getInfoToken($token);

			if(empty($user)){
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}

			// Reports
			$reportGamesPlayed  = self::reportGamesPlayed($user['id']);
			$reportScoredSeason = self::reportScoredSeason($user['id']);
			$reportLowestScore  = self::reportLowestScore($user['id']);
			$reportHighestScore = self::reportHighestScore($user['id']);
			$reportMediaScore   = self::reportMediaScore($user['id']);

			$response = Point::select('id','user_id', 'point', 'date', 'created_at')->whereRaw(" user_id = " . $user['id'])->orderBy('date','asc')->get()->toArray();

			if(!empty($response)){	

				$item_end    = end($response);

				$dt_start    = AppController::getDatetimeBrTwo($response[0]['date']);
				$dt_end      = AppController::getDatetimeBrTwo($item_end['date']);

				$list_report = array(
					'games_played'  => $reportGamesPlayed,
					'scored_played' => $reportScoredSeason,
					'lowest_score'  => $reportLowestScore,
					'highest_score' => $reportHighestScore,
					'media_score'   => $reportMediaScore,
					'dt_start'      => $dt_start,
					'dt_end'        => $dt_end
				);
				$data_info = array('report'=>$list_report, 'points'=>$response);

				$response = array('status'=>1,'response'=>$data_info);
				echo json_encode($response);
				exit;
			}
			else{
				$response = array('status'=>0,'response'=>'', 'error'=>'Nenhum registro encontrado.');
				echo json_encode($response);
				exit;
			}
		}
	}
	
	public static function create($app){

		if($app->request->isPost()){

			$json          = file_get_contents('php://input');
			$data          = json_decode($json, TRUE);

			$date                      = $data['date'];
			$point                     = $data['point'];
			$token                     = $data['token'];

			$user                      = ApiAuth::getInfoToken($token);

			if(empty($user)){
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}
			
			$hash                      = md5(uniqid() . time() . $date . $point);
			
			$db                        = new Point;
			$db->date                  = $date;
			$db->point                 = $point;
			$db->user_id               = $user['id'];
			$db->hash                  = $hash;

			if($db->save()){
				$response = array('status'=>1,'response'=>$hash);
				echo json_encode($response);
				exit;
			}
			else{
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}

		}
	}

	public static function update($app){

		if($app->request->isPost()){

			$json          = file_get_contents('php://input');
			$data          = json_decode($json, TRUE);

			$date                      = $data['date'];
			$id                        = $data['id'];
			$point                     = $data['point'];
			$token                     = $data['token'];

			$user                      = ApiAuth::getInfoToken($token);

			if(empty($user)){
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}
			
			$db                        = Point::whereRaw(" id = '" . $id . "' AND user_id = " . $user['id'])->first();
			$db->date                  = $date;
			$db->point                 = $point;

			if($db->save()){
				$response = array('status'=>1,'response'=>'');
				echo json_encode($response);
				exit;
			}
			else{
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}

		}
	}

	public static function delete($app){

		if($app->request->isPost()){

			$json          = file_get_contents('php://input');
			$data          = json_decode($json, TRUE);

			$id                        = $data['id'];
			$token                     = $data['token'];

			$user                      = ApiAuth::getInfoToken($token);

			if(empty($user)){
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}
			
			$db                        = Point::whereRaw(" id = '" . $id . "' AND user_id = " . $user['id'])->first();

			if($db->delete()){
				$response = array('status'=>1,'response'=>'');
				echo json_encode($response);
				exit;
			}
			else{
				$response = array('status'=>0,'response'=>'', 'message'=>'Houve um problema no servidor. Tente novamente mais tarde!');
				echo json_encode($response);
				exit;
			}

		}
	}

	public static function reportGamesPlayed($user){

		if(!empty($user)){
			$db = Point::select(" count(*) ")->whereRaw(" user_id = " . $user)->count();
			return $db;
		}
	}

	public static function reportScoredSeason($user){

		if(!empty($user)){
			$db = Point::whereRaw(" user_id = " . $user)->sum('point');
			return $db;
		}
	}

	public static function reportHighestScore($user){

		if(!empty($user)){
			$db = Point::whereRaw(" user_id = " . $user)->max('point');
			return $db;
		}
	}

	public static function reportLowestScore($user){

		if(!empty($user)){
			$db = Point::whereRaw(" user_id = " . $user)->min('point');
			return $db;
		}
	}

	public static function reportMediaScore($user){

		if(!empty($user)){
			$db = Point::whereRaw(" user_id = " . $user)->avg('point');
			return $db;
		}
	}
}