
<?php
foreach($employees as $employee)
{
$emp[] =  $employee['Employee'];

}
//echo json_encode($emp,true);
?>

    <h2><?php echo __('All Employees'); ?></h2>
    
    <div ng:app="myApp">
    <div ng-controller="employlist">
    
    <div class="employee index">
	<table cellpadding="0" cellspacing="0">
    <input type="text" ng-model="searchText" placeholder="Enter Search Text" class="search-text" />
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name	'); ?></th>
			<th><?php echo $this->Paginator->sort('dpt'); ?></th>
			<th><?php echo $this->Paginator->sort('jobdetail'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	
	<tr ng-repeat="employee in employees|filter:searchText">
        <td>{{employee.id}}</td>
        <td>{{employee.name}}</td>
        <td>{{employee.dpt}}</td>
        <td>{{employee.jobdetail}}</td>
        <td>{{employee.modified}}</td>
		
		<td class="actions">
		<a href="/app/Employees/edit/{{employee.id}}">Edit</a>
		<a href="/app/Employees/delete/{{employee.id}}">Delete</a>
        	
		</td>
	</tr>
	</tbody>
	</table>
	<div data-pagination="" data-num-pages="numOfPages()" 
      data-current-page="curPage" data-max-size="maxSize"  
      data-boundary-links="true"></div>
	
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add New Emplyee'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'Users', 'action' => 'logout')); ?></li>
	</ul>
</div>
<style>
.search-text {
    width: 25%;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<script>

angular.module('myApp', []).controller("employlist", employlist);

function employlist($scope) {
  var employee = <?php echo json_encode($emp);?>;
  $scope.employees = <?php echo json_encode($emp);?>;
}

</script>



