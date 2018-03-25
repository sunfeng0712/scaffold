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
        return ['hello v1/site/index!'];
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
