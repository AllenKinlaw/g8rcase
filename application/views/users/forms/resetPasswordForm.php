<?php
$this->myhelpers->displayErrorAlert(validation_errors());
//echo validation_errors();
$formvars = array('class' => 'ajax-form',
    'target-div' => 'panel-registration');
echo form_open('user/changePassword/' . $key, $formvars);
echo '<p> <label>Password: </label>';
echo form_password(array(
    'name' => 'Password',
    'class' => 'form-control'
));
echo '<p> <label>Confirm Password: </label>';
echo form_password(array(
    'name' => 'CPassword',
    'class' => 'form-control'
));
echo '</p>';
echo '<p>';
echo form_submit('login_submit', 'Reset My Password!');
echo '</p>';
echo form_close();
?>
