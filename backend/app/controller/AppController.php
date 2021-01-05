<?php

/**
* 
*/
class AppController 
{

	public static $type_vehicle = array("1"=>"Automóvel", "2"=>"Motos e Triciclos", "3"=>"Caminhões e Máquinas", "4"=>"Vans e Ônibus", "5"=>"Náutica");

	public static $price_vehicle = array("1"=>"R$0 - R$5.000", "2"=>"R$5.000 - R$20.000", "3"=>"R$20.000 - R$50.000", "4"=>"R$50.000 - R$150.000", "5"=>"R$150.000 - R$500.000");


	
	public static function ConverteData($data){ // De BR para MYSQL


		$data_final   = explode("/", $data);

		$result       = $data_final[2] . '-' . $data_final[1] . '-' . $data_final[0];
		return $result;
	}

	public static function ConverteDataMy($data){ // De MySQL para BR


		$data_final   = explode("-", $data);

		$result       = $data_final[2] . '/' . $data_final[1] . '/' . $data_final[0];
		return $result;
	}

	public function VerificaVazio($data){ // Verifica Vazio


		if(!empty($data))
		{
			return $data;
		}	
		else
		{
			return '';
		}	
	}

	public static function convertCurrency($num){

		$r = 0;
    
    	if(strpos($num, ","))
    	{
    		$i  = explode(",", $num);
    
    		$n1 = str_replace(".", "", $i[0]);
    
    		$r  = $n1 . '.' . end($i);
    	}
    	else
    	{
    		$r = $num;
    	}
    
    	return $r;
	}

	public static function getDatetimeBr($datetime){

		$date = new DateTime($datetime);
		return $date->format('d/m/Y H:i:s');
	}

	public static function getDatetimeBrTwo($datetime){

		$date = new DateTime($datetime);
		return $date->format('d/m/Y');

	}

	public static function doMessageSuccess($message, $url, $app){

		$app->flash('success', $message);
		$app->flashKeep();
		$app->redirect($url);
	}

	public static function doMessageError($message, $url, $app){

		$app->flash('danger', $message);
		$app->flashKeep();
		$app->redirect($url);
	}



}

?>