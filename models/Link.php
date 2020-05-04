<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property int $id
 * @property int $project_id
 * @property string $project_name
 * @property string $view_ids
 * @property string $view_names
 *
 * @property Project $project
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'view_ids'], 'required'],
            [['project_id'], 'integer'],
            [['project_id'], 'unique', 'message' => 'This project has already been added.'],
            [['view_names'], 'safe'],
            [['project_name'], 'string', 'max' => 150],
            [['view_ids'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project',
            'project_name' => 'Project Name',
            'view_ids' => 'View Ids',
            'view_names' => 'View Names',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
