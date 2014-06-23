<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $role
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $about
 * @property string $profession
 * @property string $photo
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, role, password, email', 'required'),
			array('name, surname, patronymic, role, password, email, phone, address, photo', 'length', 'max'=>255),
			array('about, profession, reiting', 'safe'),
            array('email', 'safe'),
            array('email', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, surname, patronymic, role, password, email, phone, address, about, profession, photo,reiting', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'patronymic' => 'Отчество',
			'role' => 'Роль',
			'password' => 'Пароль',
			'email' => 'Email',
			'phone' => 'Телефон',
			'address' => 'Домашний адрес',
			'about' => 'О себе',
			'profession' => 'Задание',
			'photo' => 'Фотография',
			'reiting' => 'Рейтинг',
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
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('patronymic',$this->patronymic,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('profession',$this->profession,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getImage($size=Images::Big){
        return Images::getImage($this->photo,Images::Avatar,$size);
    }
    public function resize(){
        $webRootDir = YiiBase::getPathOfAlias('webroot');
        $destinationPath = $webRootDir.Yii::app()->params['images'][Images::Avatar]['path'];
        $tmpPath = $webRootDir.Yii::app()->params['images'][Images::Avatar]['tempPath'];
        $this->photo->saveAs($tmpPath.$this->photo);
        $image = $tmpPath.$this->photo;
        Images::resizeImage($image,Images::Avatar,$destinationPath);
        unlink($tmpPath.$this->photo);
    }
}
