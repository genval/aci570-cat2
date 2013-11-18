<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class AdminUsersController extends AppController {



/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Auth');
    //Agregamos el helper Html
	
	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add'); // Letting users register themselves
	}
	var $name='Users';
    //Agregamos el componente Auth
    
    var $helpers    = array('Html'); 

	public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
	}

	public function logout() {
    return $this->redirect($this->Auth->logout());
	}
	
	
	 public function profile() {
      $userId = $this->Auth->user('id');
      if (!$this->User->exists($userId)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));}
/**
 *	 admin_index method
 *
 * @return void
 */
 
 public function admin_login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
	}

	public function admin_logout() {
    return $this->redirect($this->Auth->logout());
	}
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $Userid));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
 				$this->User->is_active = true;
 			     $this->User->is_admin = false;
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('An error has occurred. Please, try again.'));
			}
		}
	} 
	public function admin_register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
 				$this->User->is_active = true;
 			     $this->User->is_admin = true;
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('An error has occurred. Please, try again.'));
			}
		}

	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {
     $userId = $this->Auth->user('id');
     if (!$this->User->exists($userId)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'profile'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $UserId));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete() {
     $userId = $this->Auth->user('id');
     $this->User->id = $userId;
		throw new NotFoundException(__('Invalid user'));
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->Auth->logout());
	}}
	
