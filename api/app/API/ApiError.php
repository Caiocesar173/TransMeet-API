<?php 

namespace App\API;


class ApiError{
	public static function ErrorMessage($message, $code){
		return [
			'data' => [
				'msg' => $message,
				'code' => $code
			]
		];
	}
}