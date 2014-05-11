<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savefirm/3', $formvars);
?>

<div class="well well-default">
    <legend> Primary Phone </legend>
    <p> 
        <label>Phone: </label>
        <?php
        echo form_input(array(
            'name' => 'acct_phone',
            'class' => 'form-control',
            'value' => $this->input->post('acct_phone')
        ));
        ?>

    </p>
    <legend> Firm/Account Billing Address </legend>
    <p> 
        <label>Street: </label>
        <?php
        echo form_input(array(
            'name' => 'street',
            'class' => 'form-control',
            'value' => $this->input->post('street')
        ));
        ?>

    </p>

    <p> <label>City: </label>
        <?php
        echo form_input(array(
            'name' => 'city',
            'class' => 'form-control',
            'value' => $this->input->post('city')
        ));
        ?>
    </p>
    <p> 
        <label>State: 
        </label>
        <?php
        echo form_input(array(
            'name' => 'state',
            'id' => 'num_users',
            'class' => 'form-control firm-field',
            'value' => $this->input->post('state')
        ));
        ?>
    </p>
    <p> 
        <label>Zip: 
        </label>
        <?php
        echo form_input(array(
            'name' => 'postalcode',
            'id' => 'num_users',
            'class' => 'form-control firm-field',
            'value' => $this->input->post('postalcode')
        ));
        ?>
    </p>
</div>
