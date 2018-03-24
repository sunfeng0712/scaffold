<?php

namespace app\modules\v1\controllers;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends BaseController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors = array_merge_recursive($behaviors, [
            'authenticator' => [
                'optional' => [
                    'index'
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
        var_dump(\Yii::$app->request->post());exit;
        return ['hello tradition!'];
    }
}
