<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            )
        ),
        'dpt' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A department is required'
            )
        ),
        'jobdetail' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A jobdetail is required'
            )
        ),
        'curr_address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please current address is required'
               
            )
        ),
        'per_address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A parmanat address is required'
            )
        ),
        'total_exp' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A total experiance is required'
            )
        ),
        'company_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A company is required'
            )
            )
      
        
    );
    
    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
    public function published($fields = null) {
        $params = array(
                   'fields' => $fields
        );

        return $this->find('all', $params);
    }
    public function singleemployee($fields = null) {
        $params = array(
                   'fields' => $fields
        );

        return $this->find('first', $params);
    }

}
