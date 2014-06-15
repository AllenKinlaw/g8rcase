<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
$formvars = array('class' => 'main-form',
    'target-div' => 'main-form-div',
    'id' => 'step-form');
echo form_open('cases/update/Update/'.$fields['id'], $formvars);
//$pills = array('first' => 'Contacts', 'second' => 'Cases', 'third' => 'Organizations', 'fourth' => 'Documents',);
?>
<div class="pull-right">

    <button class="btn btn-circle btn-danger" id="delete-btn" href="<?php echo base_url().'cases/delete/'.$fields['id'] ?>" >
        <i class="fa fa-minus fa-fw"> </i>
    </button>
</div>
<?php //$this->load->view('widgets/modulePills', $pills) ?>
<div class="tab-pane active" id="first">
<?php 
$fields['disabled'] = '';
//$this->load->view('cases/forms/updateLegend', $fields);
$this->load->view('cases/forms/caseFields', $fields);
?>
</div>
<div class="panel-footer">
    <button class="btn btn-success" id="save-btn" type="submit" >
        <i class="fa fa-save fa-fw"> </i> Save
    </button>
    <button class="btn btn-danger" id="cancel-btn" href=" <?php echo base_url().'cases/details/View/'.$fields['id'] ?>" >
        <i class="fa fa-undo fa-fw"> </i> Cancel
    </button>
</div>
<?php echo form_close(); ?>
