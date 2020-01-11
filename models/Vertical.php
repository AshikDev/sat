<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vertical".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $sort_order
 * @property int $horizontal_id
 * @property int $project_id
 * @property int $view_id
 * @property string|null $extra
 *
 * @property File[] $files
 * @property Horizontal $horizontal
 * @property Project $project
 * @property BackgroundView $view
 */
class Vertical extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vertical';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'sort_order', 'horizontal_id', 'project_id', 'view_id'], 'required'],
            [['description'], 'string'],
            [['sort_order', 'horizontal_id', 'project_id', 'view_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['extra'], 'string', 'max' => 80],
            [['horizontal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horizontal::className(), 'targetAttribute' => ['horizontal_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
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
            'name' => 'Title',
            'description' => 'Description',
            'sort_order' => 'Sort Order',
            'horizontal_id' => 'Horizontal ID',
            'project_id' => 'Project ID',
            'view_id' => 'List of Views',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['vertical_id' => 'id']);
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
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(BackgroundView::className(), ['id' => 'view_id']);
    }
}
