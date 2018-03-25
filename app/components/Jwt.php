<?php

namespace app\components;

use yii\base\Component;
use \Firebase\JWT\JWT as FJWT;

class Jwt extends Component
{
    public $sercet;

    public $algorithms = [
        'HS256'
    ];

    public function decode($jwt)
    {
        return FJWT::decode($jwt, $this->sercet, $this->algorithms);
    }
}