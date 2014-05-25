<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savepayment/1/' . $firmkey, $formvars);
?>
<input type="hidden" id="num-users" name=numusers value="<?php echo $numUsers;?>">
<div class="well well-default">
    <legend> Payment Plans </legend>
    <div class="radio"> 

        <label> 
            <input type="radio" 
                   name="frequency" 
                   id = "free"
                   value="F" <?php echo set_radio('frequency', 'F', true); ?> />
            One Month Free! (Try before you buy!)
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" 
                   name="frequency" 
                   id = "monthly"
                   value="M" <?php echo set_radio('frequency', 'M'); ?> />
            Monthly ($35 per user/per month)
        </label>
    </div>
    <div class="radio">
        <label> 
            <input type="radio" 
                   name="frequency" 
                   id = "annual"
                   value="A" <?php echo set_radio('frequency', 'A'); ?> />
            Annual ($360 per User/ Per year - <strong class="text-primary">Save $60 per year per User! </strong>) 
        </label>
    </div>
    <p > 
    <div id="pay-total-div" class="alert alert-success hidden">
        <label id="pay-total"></label>
    </div>
</p>
</div>

