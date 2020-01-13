<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depth".
 *
 * @property int $id
 * @property string $name
 * @property int $horizontal_id
 * @property int $view_id
 *
 * @property Horizontal $horizontal
 * @property BackgroundView $view
 */
class Depth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'depth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'horizontal_id', 'view_id', 'sort_order'], 'required'],
            [['horizontal_id', 'view_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['horizontal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horizontal::className(), 'targetAttribute' => ['horizontal_id' => 'id']],
            [['view_id'], 'exist', 'skipOnError' => true, 'targetClass' => BackgroundView::className(), 'targetAttribute' => ['view_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'horizontal_id' => 'Horizontal ID',
            'view_id' => 'View ID',
            'sort_order' => 'Sort Order'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorizontal()
    {
        return $this->hasOne(Horizontal::className(), ['id' => 'horizontal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(BackgroundView::className(), ['id' => 'view_id']);
    }
}
