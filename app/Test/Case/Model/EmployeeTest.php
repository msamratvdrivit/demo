<?php
App::uses('Employee', 'Model');

/**
 * Employee Test Case
 *
 */
class EmployeeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Employee = ClassRegistry::init('Employee');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Employee);

		parent::tearDown();
	}

	public function singleEmployee() {
		
		$result = $this->Employee->singleemployee(array('id'));
        $expected = array(
            array('Employee' => array('id' => 1))
          
        );

		$this->assertEquals($expected, $result);
		
		
		//	$result = $this->field('id', array('id' =>  array('name' => 'emplyee 1','dpt'=>'IT','jobdetail'=>'He is in IT department.','profile'=>'','curr_address'=>'shinhgad road, manikbaug, pune','per_address'=>'shram safalya niwas, nashik phata, kasarawadi, pune','total_exp'=>5,'company_name'=>'ssit'), 'user_id' => 1)) !== false;
		

	}
	
		public function testGetAllEmployees() {
        $result = $this->Employee->published(array('id', 'name'));
        $expected = array(
            array('Employee' => array('id' => 1, 'name' => 'emplyee 1'))
          
        );

        $this->assertEquals($expected, $result);
	}

}
