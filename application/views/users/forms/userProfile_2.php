<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' =>'step-form');
echo form_open('user/saveProfile/2',$formvars);
echo '<div class="well well-default">';
// echo '<legend> Phone </legend>';
echo '<p> <label>Work Phone: </label>';
echo form_input(array(
    'name' => 'work_phone',
    'class' => 'form-control',
    'value' => $this->input->post('work_phone')
));
echo '</p>';
echo '<p> <label>Mobile Phone: </label>';
echo form_input(array(
    'name' => 'mobile_phone',
    'class' => 'form-control',
    'value' => $this->input->post('mobile_phone')
));
echo '</p>';
echo '<p> <label>Home Phone: </label>';
echo form_input(array(
    'name' => 'home_phone',
    'class' => 'form-control',
    'value' => $this->input->post('home_phone')
));
echo '</p></div>';
echo form_close();

