<span class='text-danger'> <?php echo validation_errors(); ?></span>
<?php
$formvars = array('class' => 'ajax-form',
    'target-div' => 'step-form-div',
    'id' => 'step-form');
echo form_open('user/savepayment/2/' . $firmkey, $formvars);
?>
<div class="pay-processor-div well well-default">
    <legend> Payment Options:</legend>
    <p> 
        <button class="btn btn-success"> Google Wallet </button>
<!--        <button> PayPal </button>
        <button> Amazon </button>-->
        <button class="btn btn-success"> Bill Me! </button>
    </p>
</div>
