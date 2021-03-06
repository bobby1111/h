<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class EastUserController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app -> request -> post('User');
            $hash = Yii::$app->getSecurity()->generatePasswordHash($post['password_hash']);
            $identity = Yii::$app->user->identity;
            $model -> auth_key = $identity['auth_key'];
            $model -> username = $post['username'];
            $model -> password_hash = $hash;
            $model -> cellphone = $post['cellphone'];
            $model -> email = $post['email'];
            $model -> created_at = time();
            if($model ->save()){
                Yii::$app->getSession()->setFlash('success', '增加业务员成功');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->getSession()->setFlash('success', '增加业务员成功');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionResetPassword($id)
    {
        $id = $_GET['id'];
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) ) {
            $post = Yii::$app->request->post("User");
            $pass = $post['password_hash'];
            $hash = Yii::$app->getSecurity()->generatePasswordHash($pass);
            $model->validate($pass);
            $model->password_hash = $hash;
            if($model->save()){
                Yii::$app->session->setFlash('success', '新密码保存成功.');
            }else{
                Yii::$app->session->setFlash('error', '新密码保存失败.');
            }
            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }



} //--------------- class end -------------------
