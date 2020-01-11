<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "background_view".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $icon
 * @property string|null $extra
 *
 * @property Horizontal[] $horizontals
 */
class BackgroundView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'background_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'color', 'icon'], 'required'],
            [['content'], 'string'],
            [['name', 'icon', 'extra'], 'string', 'max' => 80],
            [['description'], 'string', 'max' => 255],
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
            'content' => 'Content',
            'color' => 'Color',
            'icon' => 'Icon',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorizontals()
    {
        return $this->hasMany(Horizontal::className(), ['view_id' => 'id']);
    }
}
