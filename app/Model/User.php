<?php
App::uses('AppModel', 'Model');

+App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Contribution $Contribution
 * @property Notification $Notification
 * @property Project $Project
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			+      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A email is required'
       ),
      'unique' => array(
      'rule' => 'isUnique',
       'required' => 'create'
     ),
        'notEmpty' => array(
          'rule' => array('notEmpty'),
              ),
      );
          //'message' => 'Your custom message here',
 @@ -49,6 +57,10 @@ class User extends AppModel {
   
      'password' => array(
 +      'required' => array(
 +        'rule' => array('notEmpty'),
 +        'message' => 'A email is required'
 +      ),
        'notEmpty' => array(
          'rule' => array('notEmpty'),
          //'message' => 'Your custom message here',
 @@ -59,6 +71,10 @@ class User extends AppModel {
        ),
      ),
      'first_name' => array(
 +      'required' => array(
 +        'rule' => array('notEmpty'),
 +        'message' => 'A email is required'
 +      ),
        'notEmpty' => array(
          'rule' => array('notEmpty'),
          //'message' => 'Your custom message here',
 @@ -69,6 +85,10 @@ class User extends AppModel {
        ),
      ),
      'last_name' => array(
 +      'required' => array(
 +        'rule' => array('notEmpty'),
 +        'message' => 'A email is required'
 +      ),
        'notEmpty' => array(
          'rule' => array('notEmpty'),
          //'message' => 'Your custom message here',
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contribution' => array(
			'className' => 'Contribution',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Notification' => array(
			'className' => 'Notification',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
	}
}	
}
}
}
