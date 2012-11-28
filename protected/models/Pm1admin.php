<?php

/**
 * This is the model class for table "tbl_pm1admin".
 *
 * The followings are the available columns in table 'tbl_pm1admin':
 * @property string $username
 * @property string $password
 * @property integer $id
 */
class Pm1admin extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Pm1admin the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_pm1admin';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username', 'required'),
            array('username', 'length', 'max' => 20),
            array('password', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'username' => 'Username',
            'password' => 'Password',
            'id'=>'ID',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /* perform one-way encryption on the password before we store it in 
      the database
     */

    protected function afterValidate() {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }

    public function encrypt($value) {
        return md5($value);
    }

}