<?php

/**
 * This is the model class for table "extenshions".
 *
 * The followings are the available columns in table 'extenshions':
 * @property integer $id
 * @property string $name
 * @property integer $level
 * @property string $content
 */
class Extenshions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'extenshions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('level', 'numerical', 'integerOnly'=>true),
			array('name, content', 'length', 'max'=>255),
			array('id, name, level, content', 'safe', 'on'=>'search'),
			array('id, name, level, content', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название этапа',
			'level' => 'Номер этапа',
			'content' => 'Расширения',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Extenshions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
