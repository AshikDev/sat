<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horizontal".
 *
 * @property int $id
 * @property string $name
 * @property int $sort_order
 * @property int $view_id
 * @property int $project_id
 * @property string|null $extra
 *
 * @property Project $project
 * @property BackgroundView $view
 * @property Vertical[] $verticals
 */
class Horizontal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horizontal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sort_order', 'view_id'], 'required'],
            [['sort_order', 'view_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['extra'], 'string', 'max' => 80],
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
            'sort_order' => 'Sort Order',
            'view_id' => 'View',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(BackgroundView::className(), ['id' => 'view_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerticals()
    {
        return $this->hasMany(Vertical::className(), ['horizontal_id' => 'id']);
    }
}
