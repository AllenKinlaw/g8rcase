<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savefirm/2', $formvars);
?>
<div class="well well-default">;

    <legend> Firm Account Details </legend>
    <p> 

        <label>Solo (1 User): 
            <input type="radio" 
                   name="accounttype" 
                   id = "accounttype"
                   value="S" <?php echo set_radio('accounttype', 'S', true); ?> />
        </label>
        <label class="pull-right">  Firm (Multiple Users): 
            <input type="radio" 
                   name="accounttype" 
                   id = "accounttype2"
                   value="F" <?php echo set_radio('accounttype', 'F'); ?> />
        </label>
    </p>

    <p> <label>Firm/Account Name: </label>
        <?php
        echo form_input(array(
            'name' => 'firm_name',
            'class' => 'form-control',
            'value' => $this->input->post('firm_name')
        ));
        ?>
    </p>'
<!--    <p> <label class="firm-field">Number of users you will set up under this account: </label>
        <?php
        echo form_input(array(
            'name' => 'num_users',
            'id' => 'num_users',
            'class' => 'form-control firm-field',
            'value' => $this->input->post('num_users')
        ));
        ?>
    </p>-->
</div>

