
<?php
App::uses('AppController', 'Controller');
/**
 * Home Controller
 *
 * @property Home $Home
 * @property PaginatorComponent $Paginator
 */
class HomeController extends AppController {
	
	var $name = 'Users';
     var $helpers = array('Html','Form');
     var $components = array('Auth','Session');

     function beforeFilter()
     {
         $this->Auth->allow("logout");
         parent::beforeFilter();
     }

     function index() { } //Redirects to login()
function login()
     {
         if ($this->Auth->login())
         {
             $this->redirect($this->Auth->redirect());
         } else
         {
             $this->Session->setFlash(__('Invalid username or password, try again'));
         }
     }

     function logout()
     {
         $this->redirect($this->Auth->logout());
     }
 }
 ?>

  var $name = 'Users';
  var $helpers = array('Html', 'Form');
  var $components = array('Auth');
  
  function beforeFilter() {
      $this->Auth->allow('register');
  }
      
  function register() {
      if (!empty($this->data)) {
          if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
              $this->User->create();
              $this->User->save($this->data);
              $this->redirect(array('action' => 'index'));
          }
      }
  }


/**
 * Components
 *
 * @var array
 */
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }



}
