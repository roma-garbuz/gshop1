<?php

namespace app\controllers\admin;

use gshop\base\Controller;
use app\models\AppModel;
use gshop\App;

class AppController extends Controller
{
    public $layout = "admin";
    public function __construct($route)
    {
        new AppModel();
        parent::__construct($route);

    }
}