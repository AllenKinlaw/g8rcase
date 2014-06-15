<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
echo '<script>';
echo '   set_create("'.base_url().'cases/create/'.$fields['id'].'")';
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
echo form_open('cases/update/View/'.$fields['id'], $formvars);
?>
<div class="pull-right">
<!--    <button class="btn btn-circle btn-success" id="create-btn">
        <i class="fa fa-plus fa-fw"> </i>
    </button>-->
    <button class="btn btn-circle btn-primary" id="edit-btn">
        <i class="fa fa-edit fa-fw"> </i>
    </button>
</div>

<div class="tab-pane active" id="second">
<?php 
$fields['disabled'] = 'disabled=""';
$this->load->view('cases/forms/caseHidden', $fields);
$this->load->view('cases/forms/caseFields', $fields);
?>
</div>

<?php echo form_close();
?>
