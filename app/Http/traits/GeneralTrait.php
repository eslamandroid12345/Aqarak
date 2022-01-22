<?php

namespace App\Http\traits;

trait GeneralTrait
{



    public function returnSuccessMessage($code,$message){

        return response()->json([

            'status' => true,
            'code' => $code,
            'message' => $message,

        ]);
    }

    public function returnData($meesage,$key,$value){

        return response()->json([

            'status' => true,
            'message' => $meesage,
            $key => $value


        ]);
    }


    public function returnDataError($meesage,$Error){

        return response()->json([

            'status' => false,
            'message' => $meesage,
            'Error' => $Error

        ]);
    }




}
