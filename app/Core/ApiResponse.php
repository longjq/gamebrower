<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/11
 * Time: 14:06
 */

namespace App\Core;


use Illuminate\Http\Response as HttpReponse;

class ApiResponse
{
    private $rsp;
    public function __construct(HttpReponse $response)
    {
        $this->rsp = $response;
    }

    public function encode()
    {
        // decode
        $des3 = new DES3(Keys::getAppKey(),Keys::getIV());
        $rs = $des3->encrypt($this->rsp->getContent());
        if($rs === false){
            return ['status'=>false,'msg'=>'encode is error!'];
        }
        A::setResponseContent($rs);
        return ['status'=>true];
    }
}