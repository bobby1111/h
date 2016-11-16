<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Members */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/EastMembers', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common/common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common/common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'bind_uid',
            ['attribute' => 'bind_username',  'value' => \backend\models\User::findOne(['id' => $model -> bind_uid])->username,
                'label' => '绑定的业务员姓名'
            ],
            'username',
            ['attribute' => 'sex',  'value' => $model->sex==1 ? '女' : '男',
                'label' => '性别'
            ],
            'phone',
            'email:email',
            'code',
            'trade_day',
            'trade_total',
            ['attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i']
            ],
            ['attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i']
            ],
        ],
    ]) ?>

</div>
