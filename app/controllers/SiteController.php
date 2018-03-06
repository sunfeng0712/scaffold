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

    public function actionTiggerSentry()
    {
        //捕获错误
        $sentryClient = new \Raven_Client('http://abe11dfc600c432aa798dc1ebcab13ef:2cd01fbda76a44398eed471fe286c3be@10.10.10.14:9000/2');
        $error_handler = new \Raven_ErrorHandler($sentryClient);
        $error_handler->registerExceptionHandler();
        $error_handler->registerErrorHandler();
        $error_handler->registerShutdownFunction();
//        $sentryClient->captureMessage("这里发生了一个错误");
        $ex = $this->raven_cli_test("command name", array("foo" => "bar"));
        $event_id = $sentryClient->captureException($ex);
        echo "-> event ID: $event_id\n";
        $last_error = $sentryClient->getLastError();
        var_dump($last_error);exit;

        return ['code' => '200', 'data' => 'Hello Sentry!'];
    }

    function raven_cli_test($command, $args)
    {
        // Do something silly
        try {
            throw new \Exception('This is a test exception sent from the Raven CLI2.');
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}
