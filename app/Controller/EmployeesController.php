<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class EmployeesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Employee->recursive = 0;
			 
		$this->set('employees', $this->Paginator->paginate());
	}
	public function index1() {
		
		$this->Employee->recursive = 0;
		//$this->paginate = array('Employee'=>array('limit'=>3));
		$this->set('employees', $this->paginate('Employee'));
		//$this->set('employees', $this->Paginator->paginate());
		 
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
		$this->set('employee', $this->Employee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employee->create();

			//Check if image has been uploaded
			if (!empty($this->request->data['Employee']['profile']['name'])) {
				$file = $this->request->data['Employee']['profile'];
	
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
				$arr_ext = array('jpg', 'jpeg', 'gif','png','jfif');
				
				if (in_array($ext, $arr_ext)) {
					
					move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/profile_images/' . $file['name']);
					//prepare the filename for database entry
					
					$this->request->data['Employee']['profile'] = $file['name'];
				}
			}else{

				$this->request->data['Employee']['profile'] ='';
			}

			
			if ($this->Employee->save($this->request->data)) {
				$this->Session->setFlash(__('The employee added sucessfully.'));
				return $this->redirect(array('controller' => 'Employees', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if ($this->request->is(array('post', 'put'))) {

			if (empty($this->request->data['Employee']['profile']['name'])) {
				unset($this->request->data['Employee']['profile']);
			} else {
				
					$file = $this->request->data['Employee']['profile'];
		
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
					$arr_ext = array('jpg', 'jpeg', 'gif','png','jfif');
					
					if (in_array($ext, $arr_ext)) {
						echo $file['name'];
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/profile_images/' . $file['name']);
						//prepare the filename for database entry
						
						$this->request->data['Employee']['profile'] = $file['name'];
					}
				


			}


			if ($this->Employee->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Employee->id = $id;
		if (!$this->Employee->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employee->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect(array('controller' => 'employees', 'action' => 'index')));
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        //return $this->redirect($this->Auth->logout());
        return $this->redirect($this->Auth->logout($this->Auth->redirect(array('controller' => 'employees', 'action' => 'index'))));
    }
}
