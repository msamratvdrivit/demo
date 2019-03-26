<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}
	public function testGetAllUsers() {
        $result = $this->User->activeusers(array('id', 'username'));
        $expected = array(
            array('User' => array('id' => 1, 'username' => 'john'))
          
        );

        $this->assertEquals($expected, $result);
    }
	
}
