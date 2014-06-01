<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
$formvars = array('class' => 'main-form',
    'target-div' => 'main-form-div',
    'id' => 'step-form');
echo form_open('contacts/update/View/'.$fields['id'], $formvars);
$pills = array('first' => 'Contacts', 'second' => 'Cases', 'third' => 'Organizations', 'fourth' => 'Documents',);
?>
<div class="pull-right">
<!--    <button class="btn btn-circle btn-success" id="create-btn">
        <i class="fa fa-plus fa-fw"> </i>
    </button>-->
    <button class="btn btn-circle btn-primary" id="edit-btn">
        <i class="fa fa-edit fa-fw"> </i>
    </button>
</div>
<?php $this->load->view('widgets/modulePills', $pills) ?>
<div class="tab-pane active" id="first">
<?php 
$fields['disabled'] = 'disabled=""';
//$fields['disabled'] = '';
$this->load->view('contacts/forms/contactFields', $fields);
?>
</div>

<?php echo form_close(); ?>
