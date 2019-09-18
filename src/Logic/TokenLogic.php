<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019-09-07
 * Time: 11:13
 */

namespace JoseChan\App\Api\Logic;


use JoseChan\App\DataSet\Models\App;
use JoseChan\Base\Api\Logic\Logic;

class TokenLogic extends Logic
{

    public function get($app_id, $app_secret)
    {

        $app_model = new App();
        /**
         * @var App|\Illuminate\Database\Eloquent\Collection|static[]|static|null $app
         */
        $app = $app_model->find($app_id);

        if(!$app || !$app->exists)
        {
            throw new \Exception("应用不存在",1000);
        }
        
        if($app->app_secret != $app_secret){
            throw new \Exception("应用密钥不正确",1001);
        }

        return ['token' => $app->initToken()];
    }
}