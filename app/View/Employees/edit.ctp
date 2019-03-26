<div class="employees form">
<?php echo $this->Form->create('Employee'); ?>
	<fieldset>
		<legend><?php echo __('Edit Employee',array('enctype'=>'multipart/form-data')); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('dpt');
		echo $this->Form->input('jobdetail');
		echo $this->Form->input('curr_address');
		echo $this->Form->input('per_address');
		echo $this->Form->input('total_exp');
		echo $this->Form->input('company_name');
		echo $this->Form->input('profile', array('type'=>'file'));


	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Employee.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Employee'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'Users', 'action' => 'logout')); ?></li>
	</ul>
</div>
