<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $title
 * @property string $name
 * @property string|null $subtitle
 * @property string $metadata
 * @property int $estimate_time
 * @property string $file_type
 * @property string $icon
 * @property int $horizontal_id
 * @property int $vertical_id
 * @property int $view_id
 * @property int $project_id
 * @property string $extra
 *
 * @property Horizontal $horizontal
 * @property Project $project
 * @property Vertical $vertical
 * @property BackgroundView $view
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'name', 'metadata', 'estimate_time', 'icon', 'horizontal_id', 'vertical_id', 'view_id'], 'required'],
            [['metadata', 'file_type'], 'string'],
            [['horizontal_id', 'vertical_id', 'view_id', 'project_id'], 'integer'],
            [['estimate_time'], 'number'],
            [['title', 'name', 'subtitle', 'icon', 'extra'], 'string', 'max' => 80],
            [['horizontal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horizontal::className(), 'targetAttribute' => ['horizontal_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['vertical_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vertical::className(), 'targetAttribute' => ['vertical_id' => 'id']],
            [['view_id'], 'exist', 'skipOnError' => true, 'targetClass' => BackgroundView::className(), 'targetAttribute' => ['view_id' => 'id']],
            ['name', 'file', 'skipOnEmpty' => true, 'maxSize' => 10002400]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'File',
            'subtitle' => 'Subtitle',
            'metadata' => 'Metadata',
            'estimate_time' => 'Estimate Reading Time (Min)',
            'file_type' => 'File Type',
            'icon' => 'Icon',
            'horizontal_id' => 'Horizontal ID',
            'vertical_id' => 'Vertical ID',
            'view_id' => 'View ID',
            'project_id' => 'Project ID',
            'extra' => 'Extra',
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
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVertical()
    {
        return $this->hasOne(Vertical::className(), ['id' => 'vertical_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(BackgroundView::className(), ['id' => 'view_id']);
    }
}
