<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savepayment/1/' . $firmkey, $formvars);
?>
<div class="well well-default">
    <legend> Payment Options </legend>
    <p> 

        <label>One Month Free! (Try before you buy!): 
            <input type="radio" 
                   name="frequency" 
                   id = "free"
                   value="F" <?php echo set_radio('frequency', 'F', true); ?> />
        </label>
        <label>Monthly ($35 per user/per month): 
            <input type="radio" 
                   name="frequency" 
                   id = "monthly"
                   value="M" <?php echo set_radio('frequency', 'M'); ?> />
        </label>
        <label class="pull-right">  Annual ($360 per User/ Per year - Save $60 per year per User!): 
            <input type="radio" 
                   name="frequency" 
                   id = "annual"
                   value="A" <?php echo set_radio('frequency', 'A'); ?> />
        </label>
    </p>
    <p id="pay-total-div" class="hidden"> 
    <div class="alert alert-success">
        <label id="pay-total"></label>
    </div>
</p>
</div>
<div class="pay-processor-div well well-default">
    <legend> Pay by:</legend>
    <p> 
        <button> Google Wallet </button>
        <button> PayPal </button>
        <button> Amazon </button>
    </p>
</div>
