<?php

/**
 * This is the model class for table "files".
 *
 * The followings are the available columns in table 'files':
 * @property integer $id
 * @property string $name
 * @property string $extenshion
 * @property string $user_id
 */
class Files extends CActiveRecord
{
 	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'files';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, extenshion, user_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, extenshion, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'user'=>array(self::BELONGS_TO, 'User', 'user_id', 'together'=>true),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'extenshion' => 'Extenshion',
			'user_id' => 'User',
		);
	}
    public function getLevel($extenshion){
        $extenshions = Extenshions::model()->findAll();
        foreach($extenshions as $ext){
            $allExt = explode(",", $ext->content);
            foreach ($allExt as $exten){
                if(strtolower(trim($exten)) == $extenshion){
                    $level = $ext->level;
                }
            }
        }return $level;
    }

    public function checkLevel($level, $user){
        $level = (int)$level;
        if($level == 1){
            $check = true;
        }else{
            $check = false;
        }
        $allFilesByUser = $this->findAllByAttributes(array('user_id'=>$user));
        foreach($allFilesByUser as $file){
              if($level>=$file->level){
                $check = true;
            }
        }
        return $check;
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
		$criteria->compare('extenshion',$this->extenshion,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Files the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
