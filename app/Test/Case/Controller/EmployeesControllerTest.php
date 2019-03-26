<?php
App::uses('EmployeesController', 'Controller');

/**
 * EmployeesController Test Case
 *
 */
class EmployeesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee'
	);

	/**
 * testIndex method
 *
 * @return void
 */
public function testIndex() {
	$this->testAction('/employees/index');
	$this->assertInternalType('array', $this->vars['employees']);
	
	
}

/**
* testView method
*
* @return void
*/
public function testView() {
	$this->testAction('/employees/view/1');

			
	//$this->assertInternalType('array', $this->vars['employees']);
	//$this->markTestIncomplete('testIndex not implemented.');
}

/**
* testAdd method
*
* @return void
*/
public function testAdd() {
	
	$Employees = $this->generate('Employees', array(
		'methods' => array(
			'isAuthorized'
		),
		'models' => array(
			'Employee' => array('save')
		),
		'components' => array(
			'RequestHandler' => array('isPut'),
			'Email' => array('send'),
			'Session'
		)
	));
	$Employees = $this->generate('Employees', array(
        'components' => array(
            'Session',
            'Auth' => array('user')
        )
    ));
    $this->testAction('/employees/add', array(
        'data' => array(
            'Employee' => array('name' => 'emplyee 1','dpt'=>'IT','jobdetail'=>'He is in IT department.','profile'=>'','curr_address'=>'shinhgad road, manikbaug, pune','per_address'=>'shram safalya niwas, nashik phata, kasarawadi, pune','total_exp'=>5,'company_name'=>'ssit')
		)
		
    ));
	
}

/**
* testEdit method
*
* @return void
*/
public function testEdit() {
	$this->testAction('/employees/edit/1');
	
}

/**
* testDelete method
*
* @return void
*/
public function testDelete() {
	$this->testAction('/employees/delete/1');

}
public function testAddGet() {
    $this->testAction('/employees/add', array(
        'method' => 'GET',
        'return' => 'contents'
    ));
    $this->assertRegExp('/<html/', $this->contents);
    $this->assertRegExp('/<form/', $this->view);
}



}
