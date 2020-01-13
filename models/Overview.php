<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "overview".
 *
 * @property int $id
 * @property string $title
 * @property string $paragraph
 * @property int $project_id
 * @property string|null $extra
 *
 * @property Project $project
 */
class Overview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'overview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'paragraph'], 'required'],
            [['title', 'paragraph'], 'string'],
            [['project_id'], 'integer'],
            [['extra'], 'string', 'max' => 80],
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
            'title' => 'Title',
            'paragraph' => 'Paragraph',
            'project_id' => 'Project',
            'extra' => 'Extra',
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
