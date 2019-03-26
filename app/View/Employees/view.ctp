<div class="employee view">
<h2><?php echo __('Employee'); ?></h2>
<div class="col-sm-12">
<div class="col-sm-8 detail">
	<dl>

	<div class="col-sm-4 profile-img">
<img src="<?php echo $this->Html->url('/img/profile_images/'.h($employee['Employee']['profile'])); ?>" width="100" height="100">

	</div>
	
			<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['dpt']); ?>
			&nbsp;
		</dd>
		

		<dt><?php echo __('Job /Detail'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['jobdetail']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Current Address'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['curr_address']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Permanant Address'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['per_address']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Total Exp.'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['total_exp']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['company_name']); ?>
			&nbsp;
		</dd>



		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['modified']); ?>
			&nbsp;
		</dd>

		
	</dl>
	</div>
	
	
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employee'), array('action' => 'edit', $employee['Employee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $employee['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $employee['Employee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add New Employee'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'Users', 'action' => 'logout')); ?></li>
	</ul>
</div>
