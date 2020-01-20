<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $overview
 * @property string $date_from
 * @property string $date_to
 * @property string $logo
 * @property string|null $extra
 *
 * @property Horizontal[] $horizontals
 * @property Vertical[] $verticals
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['date_from', 'date_to'], 'required', 'message' => 'Project duration cannot be blank.'],
            [['description', 'overview'], 'string'],
            [['date_from', 'date_to'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['extra'], 'string', 'max' => 80],
            ['logo', 'file', 'skipOnEmpty' => true, 'maxSize' => 10002400, 'extensions' => 'jpg, jpeg, png'],
            [['logo'], 'required', 'on'=> 'create']
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
            'description' => 'Description',
            'overview' => 'Overview',
            'date_from' => 'From',
            'date_to' => 'To',
            'logo' => 'Logo',
            'extra' => 'Field of research',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorizontals()
    {
        return $this->hasMany(Horizontal::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerticals()
    {
        return $this->hasMany(Vertical::className(), ['project_id' => 'id']);
    }
}
