<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
echo '<script>';
echo '   set_create("'.base_url().'contacts/create/'.'")';
echo '</script>'
?>
<?php
echo '<script>';
echo '   show_create()';
echo '</script>'
?>
    <?php
$formvars = array('class' => 'main-form',
    'target-div' => 'main-form-div',
    'id' => 'step-form');
echo form_open('contacts/update/'.$fields['id'], $formvars);
$pills = array('first' => 'contacts', 'second' => 'cases', 'third' => 'crganizations', 'fourth' => 'documents','id'=>$fields['id']);
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
//$this->load->view('contacts/forms/contactsHidden', $fields);
$this->load->view('contacts/forms/contactsLegend', $fields);
$this->load->view('contacts/forms/contactFields', $fields);
?>
</div>

<?php echo form_close(); 
?>
