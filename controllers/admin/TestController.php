<?php

namespace app\controllers\admin;
 
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Location;
 
class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'admin';
        $locations = (new Location())->getAll();

        if (!Yii::$app->user->isGuest) {
            return $this->render('index', array('locations' => $locations));
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index', array('locations' => $locations));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);            
    }
}