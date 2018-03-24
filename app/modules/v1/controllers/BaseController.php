<?php

namespace app\modules\v1\controllers;

use app\filters\UriTokenization;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;

class BaseController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //ContentNegotiator支持响应内容格式处理和语言处理
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        //fixme
        $behaviors['uriTokenization'] = [
            'class' => UriTokenization::className(),
            'tokenForm' => 'JWT',
            'except' => [
                #'index'
            ],
        ];
        //支持认证列表
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                QueryParamAuth::className(),
            ]
        ];
        return $behaviors;
    }
}