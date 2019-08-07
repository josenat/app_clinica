<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function dateFormat($value, $origen, $format) 
    {
    	if ($origen == 'DD-MM-YYYY' && $format == 'YYYY-MM-DD') {
			$date    = str_replace('/', '-', $value );
			$newDate = date("Y-m-d", strtotime($date));
    	}

    	if ($origen == 'YYYY-MM-DD' && $format == 'DD-MM-YYYY') {
			$date    = str_replace('/', '-', $value );
			$newDate = date("d-m-Y", strtotime($date));			
    	}

    	return $newDate;   	
	}

    public function changeKey($array, $old_key, $new_key) 
    { 
        if (!array_key_exists($old_key, $array)) {
            
            return $array;
        }
        $keys = array_keys($array); 
        $keys[array_search($old_key, $keys)] = $new_key; 
        
        return array_combine($keys, $array); 
    }    
     
}

