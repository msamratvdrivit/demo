<?php
App::uses('ComponentCollection', 'Controller');
App::uses('Component', 'Controller');
App::uses('PagematronComponent', 'Controller/Component');

/**
 * PagematronComponent Test Case
 *
 */
class PagematronComponentTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$Collection = new ComponentCollection();
		$this->Pagematron = new PagematronComponent($Collection);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pagematron);

		parent::tearDown();
	}

}
