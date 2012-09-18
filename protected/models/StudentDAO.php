<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $dob
 * @property string $email
 * @property string $date_add
 * @property string $gender
 * @property string $status
 * @property string $right
 * @property integer $promotion_id
 * @property integer $profil_id
 *
 * The followings are the available model relations:
 * @property Article[] $articles
 * @property Comments[] $comments
 * @property Message[] $messages
 * @property Message[] $messages1
 * @property Promotion $promotion
 * @property Picture $profil
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_add, gender, promotion_id, profil_id', 'required'),
			array('promotion_id, profil_id', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>45),
			array('password, email', 'length', 'max'=>90),
			array('gender, status', 'length', 'max'=>6),
			array('right', 'length', 'max'=>11),
			array('dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, password, dob, email, date_add, gender, status, right, promotion_id, profil_id', 'safe', 'on'=>'search'),
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
			'articles' => array(self::HAS_MANY, 'Article', 'student_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'student_id'),
			'messages' => array(self::HAS_MANY, 'Message', 'student_id_receive'),
			'messages1' => array(self::HAS_MANY, 'Message', 'student_id_send'),
			'promotion' => array(self::BELONGS_TO, 'Promotion', 'promotion_id'),
			'profil' => array(self::BELONGS_TO, 'Picture', 'profil_id'),
			'school' => array(self::BELONGS_TO, 'School', 'promotion_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'dob' => 'Dob',
			'email' => 'Email',
			'date_add' => 'Date Add',
			'gender' => 'Gender',
			'status' => 'Status',
			'right' => 'Right',
			'promotion_id' => 'Promotion',
			'profil_id' => 'Profil',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('right',$this->right,true);
		$criteria->compare('promotion_id',$this->promotion_id);
		$criteria->compare('profil_id',$this->profil_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}