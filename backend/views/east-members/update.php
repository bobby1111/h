<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Members */

$this->title = Yii::t('common/EastMembers', '更新会员信息:') . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/EastMembers', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common/EastMembers', 'Update');
?>
<div class="members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
