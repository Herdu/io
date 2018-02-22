<?php

namespace app\controllers;

use Yii;
use app\models\Furniture;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\FurnitureType;
use app\models\FurnitureStyle;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * FurnitureController implements the CRUD actions for Furniture model.
 */
class FurnitureController extends Controller
{
    /**
     * @inheritdoc
     */
    public $bodyClass = 'furniture-controller';

    public function behaviors(){

        $actions = ['index', 'edit', 'create', 'update', 'delete', 'view'];

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
     * Lists all Furniture models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Furniture::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Furniture model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Furniture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Furniture();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $url = $model->upload();
                if ($url) {
                    $model->image_url = $url;
                    Yii::info($url);
                    if ($model->save(false)) {
                        return $this->redirect(['/furniture/view', 'id' => $model->id]);
                    }
                }
            } else {
                if ($model->save()) {
                    return $this->redirect(['/furniture/view', 'id' => $model->id]);
                }
            }
        }

        $types = FurnitureType::find()->all();
        $types = ArrayHelper::map($types, 'id', 'name');

        $styles = FurnitureStyle::find()->all();
        $styles = ArrayHelper::map($styles, 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'isUpdate' => false,
            'types' => $types,
            'styles' => $styles,
        ]);
    }

    /**
     * Updates an existing Furniture model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->imageFile){
                $url = $model->upload();
                if ($url) {
                    $model->image_url = $url;
                    Yii::info($url);
                    if($model->save(false)){
                        return $this->redirect(['/furniture/view', 'id' => $model->id]);
                    }
                }
            }else{
                if($model->save()){
                    return $this->redirect(['/furniture/view', 'id' => $model->id]);
                }
            }



            return $this->redirect(['view', 'id' => $model->id]);
        }


        $types = FurnitureType::find()->all();
        $types = ArrayHelper::map($types, 'id', 'name');

        $styles = FurnitureStyle::find()->all();
        $styles = ArrayHelper::map($styles, 'id', 'name');


        return $this->render('update', [
            'model' => $model,
            'isUpdate' => true,
            'types' => $types,
            'styles' => $styles,
        ]);
    }

    /**
     * Deletes an existing Furniture model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Furniture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Furniture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Furniture::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
