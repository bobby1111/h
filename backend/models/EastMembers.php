<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%east_members}}".
 *
 * @property integer $id
 * @property integer $bind_uid
 * @property string $username
 * @property string $sex
 * @property integer $phone
 * @property string $email
 * @property string $code
 * @property double $trade_day
 * @property double $trade_total
 * @property integer $created_at
 * @property integer $updated_at
 */
class EastMembers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%east_members}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bind_uid', 'sex', 'phone', 'created_at', 'updated_at'], 'integer'],
            [['username'], 'required'],
            [['trade_day', 'trade_total'], 'number'],
            [['username', 'code'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/EastMembers', 'ID'),
            'bind_uid' => Yii::t('common/EastMembers', '绑定的 业务员 id'),
            'username' => Yii::t('common/EastMembers', 'Username'),
            'sex' => Yii::t('common/EastMembers', '0 是 男  1 ，是 女'),
            'phone' => Yii::t('common/EastMembers', 'Phone'),
            'email' => Yii::t('common/EastMembers', 'Email'),
            'code' => Yii::t('common/EastMembers', 'Code'),
            'trade_day' => Yii::t('common/EastMembers', '当天交易额'),
            'trade_total' => Yii::t('common/EastMembers', '累计交易额'),
            'created_at' => Yii::t('common/EastMembers', 'Created At'),
            'updated_at' => Yii::t('common/EastMembers', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return EastMembersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EastMembersQuery(get_called_class());
    }
}
