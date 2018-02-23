<?php

namespace app\controllers;

use app\models\MessageQuery;
use Yii;
use app\models\Picture;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\Message;

/**
 * PictureController implements the CRUD actions for Picture model.
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors(){

        $actions = ['index', 'delete'];

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => $actions,
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }

    /**
     * Lists all Picture models.
     * @return mixed
     */
    public function actionIndex()
    {
        $messages = Message::find()->orderBy('id DESC')->all();

        return $this->render('index', [
            'messages' => $messages,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->getSession()->setFlash('success', 'Pomyślnie usunięto wiadomość.');

        return $this->redirect(['admin/index']);
    }

    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
