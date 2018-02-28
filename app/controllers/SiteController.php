<?php
namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\rest\Controller;

class SiteController extends Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionIndex()
    {
        return ['code' => '200', 'data' => 'Hello World!'];
    }
}
