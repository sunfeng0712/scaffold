# RESTful API

## 快速入门
Yii 提供了一整套用来简化实现 RESTful 风格的 Web Service 服务的 API。 特别是，Yii 支持以下关于 RESTful 风格的 API：[http://www.yiichina.com/doc/guide/2.0/rest-quick-start](http://www.yiichina.com/doc/guide/2.0/rest-quick-start)
##  Coding Style
### 统一RestController父类
	use yii\rest\Controller;
	class UserController extends ActiveController
	{
	...
### JSON格式回返
	class UserController extends ActiveController
	{
		public function behaviors()
		{
		        $behaviors = parent::behaviors();
		        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
		        return $behaviors;
		}
	...
### 更多
…

## 授权认证
TODO