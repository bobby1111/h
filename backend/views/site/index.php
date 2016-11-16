<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use kartik\date\DatePicker;


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
<!--        <h1>Congratulations!</h1>-->
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><?= Yii::t('common/common', 'Users'); ?></h2>

                <p>业务员管理</p>

                <p><a class="btn btn-info" href="<?= Url::to('user/index'); ?>">进入业务员管理系统  &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2><?= Yii::t('common/common', 'Members'); ?></h2>

                <p>客户管理</p>

                <p><a class="btn btn-info" href="<?= Url::to('east-members/index'); ?>">进入客户管理系统  &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
