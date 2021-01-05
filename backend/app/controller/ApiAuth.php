<?php

Class ApiAuth{
	
	public static function login($app){

		if($app->request->isPost())
		{
			$json          = file_get_contents('php://input');
			$data          = json_decode($json, TRUE);

			$email          = $data['email'];
			$password       = $data['password'];

			$response       = array();

			$password_crypt = md5($password);

			$db       = User::whereRaw(" email = '" . $email . "' AND password = '" . $password_crypt . "'  ")->first();

			if(empty($db))
			{
				$response = array('status'=>0, 'message'=>'E-mail e/ou Senha incorretos!');
			}

			if(!empty($db))
			{
				$token  = md5(time() . uniqid() . $db['id'] . $db['hash']);
				$now    = date('Y-m-d H:i');
				$expire = date('Y-m-d H:i',strtotime('+12 hour',strtotime($now)));

				// Registra o Token do Usuário
				$db_auth            = new Token; 
				$db_auth->user_id   = $db['id']; 
				$db_auth->token     = $token; 
				$db_auth->expire    = $expire; 
				$db_auth->save();

				// Busca os Dados para retorno
				$data     = array(
					'name'    => $db['name'],
					'email'   => $db['email'],
					'token'   => $token
				);

				$response = array('status' => 1, 'message'=>'Login realizado com sucesso!', 'response'=>$data);
			}

			echo json_encode($response);
		}
	}

	public static function getInfoToken($token){

		$db_token  = Token::whereRaw(" token = '" . $token . "' ")->first();
		if(!empty($db_token)){
			$user = User::find($db_token['user_id']);
			return $user;
		}

		return '';
	}

}