<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($message, $data = [] , $code = 200)
    {
        
        $response = [
            'success' => true,
            'data' => $data,
            'message' => __($message),
        ];

        return response()->json($response,$code);   
    }

    public function sendError($message, $data = [] ,$code = 400)
    {
        $response = [
            'success' => false,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }
}
