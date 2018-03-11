<?php

namespace app\controllers;

use yii\rest\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        //使用JSON格式响应请求
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions() {}
}