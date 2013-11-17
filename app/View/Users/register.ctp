<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<legend><?php echo __('register'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>


		<li><?php echo $this->Html->link(__('List Contributions'), array('controller' => 'contributions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contribution'), array('controller' => 'contributions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notifications'), array('controller' => 'notifications', 'action' => 'index')); ?> </li>
	http://localhost/projects/catedra2/admin/users/login	<li><?php echo $this->Html->link(__('New Notification'), array('controller' => 'notifications', 'action' => 'add')); ?> </li>
		
</div>

<div class="users form">
 <? Php echo $ this -> Sesión -> flash ('auth');?> 
 <? Php echo $ this -> Form -> create ('Usuario');?> 
 <fieldset>
 <legend> <php echo __ ('Por favor ingrese su nombre de usuario y la contraseña');?> </ legend>
          <? Php echo $ this -> Form -> input ('nombre de usuario');
         echo $ this -> Form -> input ('password');
     ?> 
 </ Fieldset>
 <? Php echo $ this -> Form -> end (__ ('Login'));?> 
 </ Div>
