<span class='text-danger'> <?php $this->myhelpers->displayErrorAlert(validation_errors()); ?></span>
<?php
echo '<script>';
echo '   set_create("' . base_url() . 'cases/create/' . $fields['id'] . '")';
echo '</script>'
?>
<?php
echo '<script>';
echo '   show_create()';
echo '</script>';

$pills = array('first' => 'contacts', 'second' => 'cases', 'third' => 'organizations', 'fourth' => 'documents', 'id' => $fields['id']);
?>
<!--<div class="pull-right">
        <button class="btn btn-circle btn-success" id="create-btn">
            <i class="fa fa-plus fa-fw"> </i>
        </button>
    <button class="btn btn-circle btn-primary" id="edit-btn">
        <i class="fa fa-edit fa-fw"> </i>
    </button>
</div>-->
<?php $this->load->view('widgets/modulePills', $pills) ?>
<div class="tab-pane active" id="first">
    <?php
    $this->load->view('cases/forms/caseLegend', $fields);
    ?>
</div>
<div id='case-details-div'>
    <?php
    //create the form empty becuse of jscript dependancies
//    $formvars = array('class' => 'main-form',
//        'target-div' => 'main-form-div',
//        'id' => 'step-form');
//    echo form_open('cases/update/View/' . $fields['id'], $formvars);
//    echo form_close();
    ?>
</div>

