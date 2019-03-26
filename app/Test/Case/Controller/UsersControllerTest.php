<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 *
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user'
	);


	function testAdd() {
	
		$result = $this->testAction( "/users/add", array(
			"method" => "post",
			"return" => "contents",
			"data" => array('username'=>'mahesh','password'=>'mahesh123','email'=>'mahesh@test.com','phone'=>'9767781274','role'=>'admin')
		));
		
	  }


	function testLogin() {

		 //test login action
		 $this->testAction('/users/login');
	

        $result = $this->testAction( "/users/login", array(
                "method" => "post",
                "return" => "contents",
                "data" => array('username'=>'john.','password'=>'john124')
            )
		);
		

     
	}

	function testLogout() {
	
		$this->testAction('/users/logout');
		
	  }

	
/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	$this->testAction('/users/index');
	$this->assertInternalType('array', $this->vars['users']);
	}

	public function testView() {

		$this->testAction('/users/view/1');
	
		}

		public function testEdit() {
			$this->testAction('/users/edit/1');
			
		}
		
		/**
		* testDelete method
		*
		* @return void
		*/
		public function testDelete() {
			$this->testAction('/users/delete/1');
		
		}

	
	


}
