<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
    $formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savefirm/1',$formvars); ?>
<div class="well well-default">
<p> <label>My firm has an account: </label>
 <br> <small class="text-danger"> Please type the code you were provided in the field below</small>
<div class="panel panel-danger">
    <?php

echo form_input(array(
    'name' => 'firmkey',
    'id' => 'firmkey',
    'class' => 'form-control danger',
    'value' => isset($ticker_symbol) ? $ticker_symbol : set_value('firmkey')
));?>
</div>
<p> <label>My firm does not have an account yet: 

<input type="checkbox" 
       name="newfirm" 
       id = "newfirm"
       value="1" <?php echo set_checkbox('newfirm', '1'); ?> />
</label> 
</p>
</div>

