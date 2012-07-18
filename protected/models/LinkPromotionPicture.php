<?php

/**
 * This is the model class for table "link_promotion_picture".
 *
 * The followings are the available columns in table 'link_promotion_picture':
 * @property integer $id
 * @property integer $picture_id
 * @property integer $promotion_id
 *
 * The followings are the available model relations:
 * @property Picture $picture
 * @property Promotion $promotion
 */
class LinkPromotionPicture extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LinkPromotionPicture the static model class
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
		return 'link_promotion_picture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('picture_id, promotion_id', 'required'),
			array('picture_id, promotion_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, picture_id, promotion_id', 'safe', 'on'=>'search'),
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
			'picture' => array(self::BELONGS_TO, 'Picture', 'picture_id'),
			'promotion' => array(self::BELONGS_TO, 'Promotion', 'promotion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'picture_id' => 'Picture',
			'promotion_id' => 'Promotion',
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
		$criteria->compare('picture_id',$this->picture_id);
		$criteria->compare('promotion_id',$this->promotion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}