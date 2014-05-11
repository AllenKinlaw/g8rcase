<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' =>'step-form');
echo form_open('user/saveProfile/3',$formvars);
echo '<div class="well well-default">';
//echo '<legend> Address </legend>';
echo '<p> <label>Street: </label>';
echo form_input(array(
    'name' => 'address_street',
    'class' => 'form-control',
    'value' => $this->input->post('address_street')
));
echo '</p>';
echo '<p> <label>City </label>';
echo form_input(array(
    'name' => 'address_city',
    'class' => 'form-control',
    'value' => $this->input->post('address_city')
));
echo '</p><p> <label>State</label>';
echo form_input(array(
    'name' => 'address_state',
    'class' => 'form-control',
    'value' => $this->input->post('address_state')
));
echo '</p><p> <label>Zip </label>';
echo form_input(array(
    'name' => 'address_postalcode',
    'class' => 'form-control',
    'value' => $this->input->post('address_postalcode')
));

echo '</p>';
echo '</div>';
echo form_close();

