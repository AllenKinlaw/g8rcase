<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savepayment/1/' . $firmkey, $formvars);
?>
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
            Annual ($360 per User/ Per year - Save $60 per year per User!) 
        </label>
    </div>
    <p id="pay-total-div" class="hidden"> 
    <div class="alert alert-success">
        <label id="pay-total"></label>
    </div>
</p>
</div>
<div class="pay-processor-div well well-default">
    <legend> Payment Options:</legend>
    <p> 
        <button class="btn btn-success"> Google Wallet </button>
<!--        <button> PayPal </button>
        <button> Amazon </button>-->
        <button class="btn btn-success"> Bill Me! </button>
    </p>
</div>
