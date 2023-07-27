<?php

namespace App\Http\Controllers\Api\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
     /**
     * return success response method of details.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'status'  => 200,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response method of details
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($errorMessages = [], $code = 200)
    {
        $response = [
            'status' => 400,
            'message' => $errorMessages,
        ];


        return response()->json($response, $code);
    }
}
