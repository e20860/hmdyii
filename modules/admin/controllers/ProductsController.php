<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use app\modules\admin\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $images = new ActiveDataProvider([
            'query' => \app\modules\admin\models\Images::find()->where(['prod_id' => $id]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'images' => $images,
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $images = new ActiveDataProvider([
            'query' => \app\modules\admin\models\Images::find()->where(['prod_id' => $id]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('update', [
            'model' => $model,
            'images' => $images,
        ]);
    }

        public function actionDelpic($id, $prod) {
        $imgRec = \app\modules\admin\models\Images::findOne($id);
        $imgRec->delete();
        return $this->redirect(['update', 'id' => $prod]);
    }

    public function actionUploadpic() {
        $key = Yii::$app->request->post();
        $prodId = $key['idmodel'];
        $path = Yii::$app->basePath . '/web/images/';
        $fname = $_FILES['imgFile']['name'];
        //return json_encode($gal);
        if (0 < $_FILES['imgFile']['error']) {
            return 'Ошибка: ' . $_FILES['imgFile']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['imgFile']['tmp_name'], $path . $_FILES['imgFile']['name']);
            $gif = new \app\modules\admin\models\Images();
            $gif->prod_id = $prodId;
            $gif->file = $fname; 
            $gif->ord = 0;
            $gif->save(false);
            echo 'Файл загружен';
        }
        return $this->redirect(['update', 'id' => $prodId]);
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
