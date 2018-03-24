<?php

namespace app\modules\v1\controllers;

use Yii;
use common\models\LoginForm;
use \Firebase\JWT\JWT;

/**
 * Default controller for the `tradition` module
 */
class SiteController extends BaseController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors = array_merge_recursive($behaviors, [
            'authenticator' => [
                'optional' => [
                    'index',
                    'login'
                ]
            ]
        ]);
        return $behaviors;
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        var_dump(\Yii::$app->request->get());exit;

        echo "<pre>";var_dump(Yii::$app->request);exit;
        //var_dump(base64_decode("eyJzdHJpbmciOiJKV1QiLCJudW0iOjM0MzQzNCwibGlzdCI6WyJnZW5nIiwieGlhbiIsImt1biJdLCJ1c2VyIjp7Im5hbWUiOiJ6aG91a2FuZyIsImFnZSI6Ijk5IiwidGVsIjoiMTg2MTMzNzU2NjEifX0"));exit;
//        echo "<pre>";$jwt = JWT::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdHJpbmciOiJKV1QiLCJudW0iOjM0MzQzNCwibGlzdCI6WyJnZW5nIiwieGlhbiIsImt1biJdLCJ1c2VyIjp7Im5hbWUiOiJ6aG91a2FuZyIsImFnZSI6Ijk5IiwidGVsIjoiMTg2MTMzNzU2NjEifX0.WNWTwcAOIZixxsy6YASsNV_d9R_UhqRmqeBzKzc93Wo", "secret", array('HS256'));
//        print_r($jwt);exit;
        return ['a' => 'hello v1/site/index!'];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        }
        return;
    }
}
