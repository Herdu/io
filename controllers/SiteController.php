<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Furniture;
use yii\data\ActiveDataProvider;
use app\models\FurnitureFilterForm;
use yii\web\NotFoundHttpException;
use app\models\MessageTitle;
use app\models\Message;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    public $bodyClass = 'site-controller';

    /**
     * @inheritdoc
    */

    public function behaviors(){

        $guestActions = ['index','contact', 'admin', 'services', 'gallery', 'view'];

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

        $filterForm = new FurnitureFilterForm();
        $query = Furniture::find();
        $request = Yii::$app->request;

        if($filterForm->load($request->get())){
            $filterForm->buildQuery($query);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Furniture::find(),
            'sort' =>false,
        ]);

        $dataProvider->pagination->pageSize=5;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'filterForm' => $filterForm,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionServices(){
        return $this->render('services');
    }

    public function actionContact(){
        $model = new Message();


        if ($model->load(Yii::$app->request->post()) && $model->validate()){
                if($model->save()) {
                    \Yii::$app->getSession()->setFlash('success', 'Pomyślnie wysłano wiadomość');
                    $model = new Message();
                }
        };

        $messageTitles = MessageTitle::find()->asArray()->all();
        $messageTitles = ArrayHelper::getColumn($messageTitles, 'name');

        return $this->render('contact', [
            'message' => $model,
            'messageTitles' => $messageTitles,
        ]);
    }


    public function actionError(){
        return $this->render('error');
    }

    public function actionGallery(){
        return $this->render('gallery');
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

    public function actionView($id){
        if (($model = Furniture::findOne($id)) == null) {
            throw new NotFoundHttpException('Wybrany element nie istnieje, lub nie masz do niego uprawnień.');
        }

        $message = new Message();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Pomyślnie wysłano wiadomość');
                $model = new Message();
            }
        };

        $messageTitles = MessageTitle::find()->asArray()->all();

        $messageTitles = ArrayHelper::getColumn($messageTitles, 'name');

        $messageTitles = array_merge([$model->name], $messageTitles);

        return $this->render('view', [
            'model' => $model,
            'message' => $message,
            'messageTitles' => $messageTitles,
        ]);
    }


}
