<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of caseEdit
 *
 * @author allen
 */
class MyFormHelper {

    private $frm_labels;
    var $hidden;

    function MyFormHelper($formstrings = array('LBL'=>'')) {
        //require_once 'homestrings.php';
        $this->frm_labels = $formstrings;
    }

    function addFormHeader($postto = '', $title = '') {
        //echo validation_errors();
        //echo form_open($postto, $attributes); //action="'. base_url(). $postto. '"
        echo '<form method="post" action="' . base_url() . $postto . '" role ="form" /> ' . "\n";
        echo form_fieldset($title);
    }

    function addFormFooter() {

        echo form_fieldset_close();
        echo '</form> ' . "\n";
    }

    function addLegend($title) {
        echo '<legend> ' . "\n"
        . '<label> ' . $title . ' </label> ' . "\n"
        . '</legend> ' . "\n";
    }

    function addTextField($label, $name, $type, $placeholder, $class, $js, $value) {
        $inputparms = array(
            'name' => $name,
            'value' => set_value($name, $value),
            'placeholder' => $placeholder,
            'class' => $class,
        );
        echo '<div class="input-control text" data-role="input-control"> ' . "\n"
        . '<label>' . $label . '</label> ' . "\n"
        . '<div class="input-control text" data-role="input-control"> ' . "\n"
        . form_input($inputparms); //. '<input type="text" value="" placeholder="' . $label . '"name="' . $name . '">'
        //. '<button class="btn-clear" tabindex="-1" type="button"></button>'
        echo "\n" . '</div> ' . "\n" 
                .'</div>'."\n";
    }

    function addSubmitBtn() {
        echo '<input type="submit" value="submit"> ' . "\n";
    }

    function addCheckBox($label, $name, $checked, $value) {
        //$i = 0;
        //foreach ($labels as $label) {
        echo '<div class="input-control checkbox" > ' . "\n"
        . '<label>' . "\n"
        . '<input type="checkbox" checked="' . $checked . '" name="' . $name . '" value="' . $value . '"> ' . "\n"
        . '<span class="check"></span> ' . "\n"
        . $label
        . '</label> ' . "\n"
        . '</div> ' . "\n";
        // $i++;
        // }
    }

    function addHiddon($field, $value) {
        form_hidden($field, '$value');
    }

    function addDropDown($label, $name, $class, $dropdownvalues) {
        echo '<div class="form-group">' . "\n"
        . '   <label>' . $label . '</label>' . "\n"
        . '  <select class="' . $class . '" name = "' . $name . '">' . "\n";
        foreach ($dropdownvalues as $key => $option) {
            echo '<option>' . $option . '</option>' . "\n";
        }
        echo '</select>' . "\n"
        . '</div>' . "\n";
    }

    function addGroupHeader($label, $target, $class ='well', $collapse = 'collapse in') {

        if ($collapse === '') {
            $collapse = 'collpase in';
        }
        switch ($class) {
            case 'accordian':
                echo '<div id="accordian" class="panel-group">' . "\n"
                . '<div class="panel panel-info">' . "\n"
                . '<div class = "panel-heading">' . "\n"
                . '<h4 class = "panel-title">' . "\n"
                . '<a href = "#collapse' . $target . '" data-parent = "#accordion" data-toggle = "collapse" class = "">' . $label . '</a>' . "\n"
                . '</h4>' . "\n"
                . '</div>' . "\n"
                . '<div id="collapse' . $target . '" class="panel-collapse ' . $collapse . ' " style="height: auto;">' . "\n";
                break;
            case 'well':
                echo '<div class="' . $class . '">' . "\n"
                     . '<label>'. $label. '</label>'. "\n";
                break;
            default :
                break;
        }
    }

    function addGroupfooter($class ='well') {
        switch ($class) {
            case 'accordian':
                echo '</div>' . "\n"  //end Collapse#label Div
                 . '</div>' . "\n" // end panel
                . '</div>' . "\n"; // end panel group
                break;
            case ('well'):
                echo '</div>'. "\n";
            default :
                break;
        }
    }

    function processFieldDefs($formFieldDefs, $values) {

        foreach ($formFieldDefs as $field => $attributes) {

            //echo $field;
            //print_r($attributes);
            extract($attributes);
            if (isset($related_fields)) {
                $theFields = $related_fields;
            }
            switch ($ftype) {

                case 'group':
                    $this->addGroupHeader($this->frm_labels[$label], strtolower($field), $class,isset($collapse)?$collapse :'');
                    $this->processFieldDefs($related_fields, $values);
                    $this->addGroupFooter($class);
                    break;
                case 'text':
                    $this->addTextField($this->frm_labels[$label], strtolower($field), $ftype, $this->frm_labels[$label], $class, $js, $values[strtolower($field)]);
                    break;
                case 'drop-down':
                    $this->addDropDown($this->frm_labels[$label], strtolower($field), $class, $dropdownvalues);
                    break;
                case 'checkbox':
                    $this->addCheckBox($this->frm_labels[$label], strtolower($field), $checked, $values[strtolower($field)]);
                    break;
                case 'hidden':
                    $this->addHiddon(strtolower($field), 'ABCD');
                    $this->hidden[] = array($field => 'ABCD');
                    break;
                default:
                    break;
            }
        }
        // $editForm->addHiddon('id', $id);
        // $editForm->addTextField('Name', 'name', 'text', 'Enter a Case Name', 'form-control', '', '');
        // $editForm->addTextField('Docket', 'docket', 'text', 'Enter a Docket Number', 'form-control', '', $case); 
    }

}
