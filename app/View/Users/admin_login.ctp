<?php
	echo $this->Session->flash('auth');
    echo $this->Form->create('Admin_User', array('action' => 'admin_login'));
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>
