<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common/user', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common/user', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'auth_key',
//            'password_hash',
            'cellphone',
            // 'email:email',
            // 'status',

//             'created_at',

            ['attribute' => 'count',
                'value' => function($model){
                    $count = \backend\models\User::getCountMember($model->id);
                    return$count;
                },
                'label' => '客户数量'
            ],

            ['attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d']
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
