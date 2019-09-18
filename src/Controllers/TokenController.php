<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019-09-04
 * Time: 18:28
 */

namespace JoseChan\App\Api\Controllers;


use JoseChan\App\Api\Logic\TokenLogic;
use JoseChan\Base\Api\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    public function getToken(Request $request)
    {
        $data = $request->query->all();
        $this->validate($data,[
            "app_id" => "required",
            "app_secret" => "required|string"
        ]);
        
        return $this->response(TokenLogic::getInstance()->get($data['app_id'], $data['app_secret']));
    }
}