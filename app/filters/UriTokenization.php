<?php

namespace app\filters;

use Yii;
use yii\base\ActionFilter;

/**
 * @author xiankun Geng <gengxiankun@hoolai.com>
 * @data 2017-03-23 10:56 am
 */
class UriTokenization extends ActionFilter
{
    /**
     * @var string token形式，默认使用JWT（JSON WEB TOKEN）形式的TOKEN。
     */
    public $tokenForm = 'JWT';
    /**
     * @var string the parameter name for passing the uri token
     */
    public $tokenParam = 'uri-token';
    /**
     * @var string pass whether to debug the parameter name
     */
    public $debugParam = 'is-debugging';
    /**
     * @var integer 是否正在调试，默认0，没进行调试；此参数可通过uri中传递`$this->debugParam`设置，
     * 1为正在调试，但只有在`YII_ENV == dev`并且`$this->debugParam`为`1`时，才真正进入调试模式
     * 当进入调试模式时，不需要uritoken化，通过get/post方式进行参数请求即可
     */
    public $isDebugging = 0;

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        $uriToken = Yii::$app->request->post($this->tokenParam, '');
        $isDebugging = Yii::$app->request->get($this->debugParam, $this->isDebugging);
        if (YII_ENV == 'dev' && $isDebugging == '1') {
            unset($_GET[$this->debugParam]);
            $bodyParams = array_merge_recursive($_GET, $_POST);
            Yii::$app->request->setBodyParams($bodyParams);
            return true;
        }
        switch ($this->tokenForm) {
            case 'JWT':
                return $this->tokenizationWithJwt($uriToken);
                break;
            default:
                return true;
                break;
        }
    }

    protected function tokenizationWithJwt($uriToken = null)
    {
        $jwt = Yii::$app->jwt;
        var_dump($jwt);exit;
    }
}