<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $date_add
 * @property string $date_update
 * @property integer $student_id
 * @property integer $picture_id
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Picture $picture
 * @property Comments[] $comments
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_add, student_id, picture_id', 'required'),
			array('student_id, picture_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>90),
			array('content, date_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, content, date_add, date_update, student_id, picture_id', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'picture' => array(self::BELONGS_TO, 'Picture', 'picture_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'article_id'),
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
			'content' => 'Content',
			'date_add' => 'Date Add',
			'date_update' => 'Date Update',
			'student_id' => 'Student',
			'picture_id' => 'Picture',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('picture_id',$this->picture_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}