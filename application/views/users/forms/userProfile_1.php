<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/saveProfile/1', $formvars);
echo '<div class="well well-default">';
//echo '<legend>  </legend>';

echo '<p> <label>Prefered Email Address: </label> <small class="text-danger"> *required </small>';
echo '<div class="panel panel-danger">';
echo form_input(array(
    'name' => 'email',
    'class' => 'form-control danger',
    'value' => $this->input->post('email')
));
echo '</div>';
echo '<p> <label>Title: </label> <small>(As would appear on offical documents) </small>';
echo form_input(array(
    'name' => 'title',
    'class' => 'form-control',
    'value' => $this->input->post('title')
));
echo '</p></div>';
echo form_close();

