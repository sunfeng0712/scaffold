<?php

namespace app\filters;

use Yii;
use yii\base\ActionFilter;
use yii\helpers\ArrayHelper;

/**
 * UriTokenization是一个Uri过滤器，它将提供Uri与Token之间的互相转换
 * 它现支持JWT规范的Tokeniza，依赖JWT应用组件提供JWT与Uri的相互转换
 *
 * 示例展示：
 *
 * ```php
 * public function behaviors()
 * {
 *      return [
 *          'uriTokenization' => [
 *              'class' => UriTokenization::className(),
 *              'tokenForm' => 'JWT'
 *          ]
 *      ];
 * }
 * ```
 *
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
     * @var integer 是否正在调试，默认0，没进行调试；此参数可通过uri中传递`$this->debugParam`设置
     * 1为正在调试，但只有在`YII_ENV == dev`并且`$this->debugParam`为`1`时，才真正进入调试模式
     * 当进入调试模式时，不需要uritoken化，通过get/post方式进行参数请求即可
     */
    public $isDebugging = 0;

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        $isDebugging = Yii::$app->request->get($this->debugParam, $this->isDebugging);
        //调试模式下可以同时接受get\post两种方式的uri
        if (YII_ENV == 'dev' && $isDebugging == '1') {
            unset($_GET[$this->debugParam]);
            $bodyParams = yii\helpers\ArrayHelper::merge($_GET, $_POST);
            Yii::$app->request->setBodyParams($bodyParams);
            return true;
        }

        $uriToken = Yii::$app->request->post($this->tokenParam, '');
        if (empty($uriToken)) return true;
        switch ($this->tokenForm) {
            case 'JWT':
                $uri = $this->tokenizationWithJwt($uriToken);
                break;
            default:
                return true;
                break;
        }

        Yii::$app->request->setBodyParams($uri);
        return true;
    }

    /**
     * 这个方法遵循JWT规范解密Token；它依赖jwt应用组件，需要提前配置`salt`
     * @param $uriToken 需解密的Token
     * @return array 返回解密成功的数组
     */
    protected function tokenizationWithJwt($uriToken)
    {
        $jwt = Yii::$app->jwt;
        return ArrayHelper::toArray($jwt->decode($uriToken));
    }
}