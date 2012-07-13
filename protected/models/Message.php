<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $id
 * @property string $content
 * @property string $date_send
 * @property string $date_read
 * @property string $read
 * @property integer $student_id_receive
 * @property integer $student_id_send
 *
 * The followings are the available model relations:
 * @property Student $studentIdReceive
 * @property Student $studentIdSend
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, date_send, student_id_receive, student_id_send', 'required'),
			array('student_id_receive, student_id_send', 'numerical', 'integerOnly'=>true),
			array('read', 'length', 'max'=>3),
			array('date_read', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, date_send, date_read, read, student_id_receive, student_id_send', 'safe', 'on'=>'search'),
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
			'studentIdReceive' => array(self::BELONGS_TO, 'Student', 'student_id_receive'),
			'studentIdSend' => array(self::BELONGS_TO, 'Student', 'student_id_send'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'date_send' => 'Date Send',
			'date_read' => 'Date Read',
			'read' => 'Read',
			'student_id_receive' => 'Student Id Receive',
			'student_id_send' => 'Student Id Send',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date_send',$this->date_send,true);
		$criteria->compare('date_read',$this->date_read,true);
		$criteria->compare('read',$this->read,true);
		$criteria->compare('student_id_receive',$this->student_id_receive);
		$criteria->compare('student_id_send',$this->student_id_send);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}