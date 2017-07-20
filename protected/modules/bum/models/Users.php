<?php
/**
 * Users class file.
 * Model class file for table users.
 *
 * @copyright	Copyright &copy; 2012 Hardalau Claudiu 
 * @package		bum
 * @license		New BSD License 
 */
/**
 * Users  class.
 * @package		bum
 */
/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $user_name
 * @property string $email
 * @property string $pass
 * @property string $salt
 * @property string $name
 * @property string $surname
 * @property string $date_of_creation
 * @property string $date_of_update
 * @property string $date_of_last_access
 * @property string $date_of_password_last_change
 * @property string $active
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Slideshows[] $slideshows
 * @property Albums[] $albums
 * @property Pictures $pictures
 * @property AtDirectoryStructure[] $atDirectoryStructures
 * @property UsersSettings $usersSettings
 * @property UsersData $usersData
 */
class Users extends BumActiveRecord
{
    public $password;
    public $password_repeat;
    public $password_old;
    
	public $verifyCode; // property required by Captcha
    
    public $social_login;

    CONST SOCIAL_NO=0;
    CONST SOCIAL_FACEBOOK=50;
    CONST SOCIAL_TWITTER=51;

    CONST ACTIVE_NO=0;
    CONST ACTIVE_YES=1;
    
    CONST STATUS_BLOCKED=-20;
    CONST STATUS_BANNED=-10;
    CONST STATUS_NORMAL=0;
    CONST STATUS_SPECIAL=10;
    CONST STATUS_ONLY_FACEBOOK=50;
    CONST STATUS_ONLY_TWITTER=51;
    CONST STATUS_ATTENTION=100;
        
    
	/**
     * Get the active status
     * @return type 
     */
	
	
	 public static function getUsertypeOptions()
    {
        // because for false - 0 the attriburte active is empty, and the first one is selected...
        return array(
            self::ACTIVE_NO => 'No',
            self::ACTIVE_YES => 'Yes',
        );
    }
    
    /**
    * @return string the status text display for the current issue
    */
    public function getUsertypeText()
    {
        $activeOptions=$this->activeOptions;
        return isset($activeOptions[$this->active]) ? $activeOptions[$this->active] : "unknown state: ({$this->active})";
    }    
	
	/**
     * Get the active status
     * @return type 
     */
	 
    public static function getActiveOptions()
    {
        // because for false - 0 the attriburte active is empty, and the first one is selected...
        return array(
            self::ACTIVE_NO => 'No',
            self::ACTIVE_YES => 'Yes',
        );
    }
    
    /**
    * @return string the status text display for the current issue
    */
    public function getActiveText()
    {
        $activeOptions=$this->activeOptions;
        return isset($activeOptions[$this->active]) ? $activeOptions[$this->active] : "unknown state: ({$this->active})";
    }    
    
    /**
     * Get the active status
     * @return type 
     */
    public static function getStatusOptions()
    {
        // because for false - 0 the attriburte active is empty, and the first one is selected...
        return array(
           // self::STATUS_BLOCKED => 'Blocked',
           // self::STATUS_BANNED => 'Banned',
            self::STATUS_NORMAL => 'Normal',
            self::STATUS_SPECIAL => 'Location Admin',
            //self::STATUS_ONLY_FACEBOOK => 'Facebook only',
            //self::STATUS_ONLY_TWITTER => 'Twitter only',
            //self::STATUS_ATTENTION => 'Attention!',
        );
    }
    
    /**
     * Get only social statuses
     * @return type 
     */
    public static function getSocialOnlyStatuses()
    {
        return array(
            self::STATUS_ONLY_FACEBOOK,
            self::STATUS_ONLY_TWITTER,
        );
    }
    
    /**
     * Social logIn codes
     * @return type 
     */
    public static function getSocialLogIn()
    {
        return array(
            self::SOCIAL_FACEBOOK,
            self::SOCIAL_TWITTER,
        );
    }
    
    /**
    * @return string the status text display for the current issue
    */
    public function getStatusText()
    {
        $statusOptions=$this->statusOptions;
        return isset($statusOptions[$this->status]) ? $statusOptions[$this->status] : "unknown status: ({$this->status})";
    }    
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
            //array('date_of_creation, date_of_update, date_of_last_access', 'date_of_password_last_change', 'date'), // out, because date_of_last_access is populated when users logs in, date_of_creation and date_of_password_last_change is generated by postgresql from a trigger, same date_of_update
            array('password', 'compare'),
            array('password_repeat', 'safe'),
            array('user_name, email', 'unique', 'caseSensitive'=>false),
            array('email','email'),
            array('email', 'length', 'max'=>60),
            array('active', 'boolean'),
            array('status', 'type', 'type'=>'integer'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'captchaRequired, signUp'), // see: http://www.yiiframework.com/forum/index.php/topic/21561-captcha-custom-validation/ for information
            array('password', 'required', 'on'=>'signUp, create, passwordReset, socialUpdate'),
            array('password_old', 'checkOldPassword', 'dependentAttribute'=>'password', 'on'=>'update'),
            
			array('user_name, email', 'required'),
			array('user_name, password, name, surname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, name, surname, date_of_creation, date_of_last_access, email, active, status', 'safe', 'on'=>'search'),
		);
	}

    /**
     * If the password is to be changed, check first the new password..
     * @param type $attribute
     * @param type $params
     */
    public function checkOldPassword($attribute,$params){
        if (strlen(trim($this->$params['dependentAttribute'])) > 0) {
            if(!Yii::app()->user->checkAccess("password_change")){
                if (!$this->validatePassword($this->$attribute)) {
                    $this->addError($attribute, "Incorrect password. Old password must be confirmed corectly before it can be changed!");
                }
            }
        }
    }
    
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'invitationsInvited' => array(self::HAS_MANY, 'Invitations', 'id_user_invited'),
			'invitations' => array(self::HAS_MANY, 'Invitations', 'id_user'),
			'usersData' => array(self::HAS_ONE, 'UsersData', 'id'),
			'emails' => array(self::HAS_MANY, 'Emails', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        switch($this->scenario){
            case 'update':
                return array(
                    'user_name' => 'User Name',
                    'password_old'=>'Old Password',
                    'password'=>'New Password',
                    'password_repeat'=>'Repeat Password',
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'active' => 'Active',
                    'email'=>'Primary Email',
                );
                break;
            case 'signUp':
                return array(
                    'id' => 'ID',
                    'user_name' => 'User Name',
                    'password_repeat'=>'Repeat Password',
                    'verifyCode' => 'Verification Code',
                    'email'=>'Email',
                );
                break;
            default:
                return array(
                    'id' => 'ID',
                    'user_name' => 'User Name',
                    'password'=>'Password',
                    'password_repeat'=>'Repeat Password',
                    'salt' => 'Salt',
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'date_of_creation' => 'Date Of Creation',
                    'date_of_update' => 'Date Of Update',
                    'date_of_last_access' => 'Date Of Last Access',
                    'date_of_password_last_change' => 'Date When Password Was Last Changed',
                    'active' => 'Active',
                    'status' => 'Status',
                    'verifyCode' => 'Verification Code',
                    'email'=>'Primary Email',
                    'social_login'=>'Social login',
                );
                break;
        }
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

        $criteria->with = array('usersData');
        
        $criteria->compare('t.id',$this->id,false);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('date_of_last_access',$this->date_of_last_access,false);
		$criteria->compare('date_of_password_last_change',$this->date_of_password_last_change,false);
		$criteria->compare('date_of_creation',$this->date_of_creation,false);
		$criteria->compare('active',$this->active,false);        
		$criteria->compare('status',$this->status,false);        
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function afterFind(){
        if(!empty($this->usersData->facebook_user_id)){
            $this->social_login[] = self::SOCIAL_FACEBOOK;
        }
        if(!empty($this->usersData->twitter_user_id)){
            $this->social_login[] = self::SOCIAL_TWITTER;
        }
        parent::afterFind();
    }
    
	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password, $this->salt)===$this->pass;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return crypt($password, '$6$rounds=12587$ ' . $this->salt . '$');
	}
    
    /**
     * 
     */
    protected function afterValidate() {
        parent::afterValidate();
        if (strlen(trim($this->password))>0) {
            // generate a salt variable
            $this->salt = self::generateSalt();
            $this->pass = $this->hashPassword($this->password, $this->salt);
        }
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    public static function generateSalt() {
        return uniqid('', true);
    }
    
    /**
     * Tests if a user is active or not.
     */
    public function isActive() {
        return $this->active;
    }    
    
    
    /**
     * Update some datatime statistical fields.
     */
    public function beforeSave() {
        if(!Yii::app()->getModule('bum')->db_triggers){
            if($this->isNewRecord){
                $this->date_of_creation = new CDbExpression('NOW()');
                $this->date_of_update = new CDbExpression('NOW()');
                $this->date_of_last_access = new CDbExpression('NOW()');
                $this->date_of_password_last_change = new CDbExpression('NOW()');
            }else{
                $this->date_of_update = new CDbExpression('NOW()');
                if (strlen(trim($this->password))>0) {
                    $this->date_of_password_last_change = new CDbExpression('NOW()');
                }
            }
        }
        return parent::beforeSave();
    }    
}