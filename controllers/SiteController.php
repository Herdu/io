<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    public $bodyClass = 'site-controller';

    /**
     * @inheritdoc
    */

    public function behaviors(){

        $guestActions = ['index','contact', 'gallery', 'admin', 'about'];

        $loggedActions = $guestActions +
            [
                ['logout']
            ];

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => $guestActions,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => $loggedActions,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['error'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAbout(){
        return $this->render('about');
    }

    public function actionContact(){
        return $this->render('contact');
    }

    public function actionError(){
        return $this->render('error');
    }

    public function actionAdmin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {
            Yii::$app->getSession()->addFlash('success', 'Pomyślnie zalogowano');
            return $this->redirect(['site/index']);
        }
        return $this->render('admin', [
            'model' => $loginForm,
        ]);
    }
}
