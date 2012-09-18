<?php

/**
 * This is the model class for table "promotion".
 *
 * The followings are the available columns in table 'promotion':
 * @property integer $id
 * @property string $name
 * @property string $year
 * @property string $date_add
 * @property string $date_update
 * @property integer $school_id
 *
 * The followings are the available model relations:
 * @property LinkPromotionPicture[] $linkPromotionPictures
 * @property School $school
 * @property Student[] $students
 */
class Promotion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promotion the static model class
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
		return 'promotion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_add, school_id', 'required'),
			array('school_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>90),
			array('year', 'length', 'max'=>4),
			array('date_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, year, date_add, date_update, school_id', 'safe', 'on'=>'search'),
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
			'promopict' => array(self::HAS_MANY, 'LinkPromotionPicture', 'promotion_id'),
			'school' => array(self::BELONGS_TO, 'School', 'school_id'),
			'students' => array(self::HAS_MANY, 'Student', 'promotion_id'),			
            'pictures' => array(self::HAS_MANY, 'Picture', 'picture_id', 
            'through' => 'promopict'),			
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
			'year' => 'Year',
			'date_add' => 'Date Add',
			'date_update' => 'Date Update',
			'school_id' => 'School',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('school_id',$this->school_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}