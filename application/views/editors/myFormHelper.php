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

    function MyFormHelper($formstrings) {
        //require_once 'homestrings.php';
        $this->frm_labels = $formstrings;
    }

    function addFormHeader($postto = '', $title = 'I Forgot The Title!') {
        //echo validation_errors();
        //echo form_open($postto, $attributes); //action="'. base_url(). $postto. '"
        echo '<form method="post" action="'. base_url(). $postto. '" role ="form" />';
        echo form_fieldset($title);
    }

    function addFormFooter() {

        echo form_fieldset_close();
        echo '</form>';
    }

    function addLegend($title) {
        echo '<legend>'
        . '<label> ' . $title . ' </label>'
        . '</legend>';
    }

    function addTextField($label, $name, $type, $placeholder, $class, $js,$width='100%', $value) {
        $inputparms = array(
            'name' => $name,
            'value' => set_value($name,$value),
            'placeholder' => $placeholder,
            'class' => $class,
            'width' => $width,
        );
        echo '<div class="input-control text" data-role="input-control">'
        . '<label>' . $label . '</label>'
        . '<div class="input-control text" data-role="input-control">'
        . form_input($inputparms); //. '<input type="text" value="" placeholder="' . $label . '"name="' . $name . '">'
        //. '<button class="btn-clear" tabindex="-1" type="button"></button>'
        echo '</div>';
    }

    function addSubmitBtn() {
        echo '<input type="submit" value="Submit">';
    }

    function addCheckBox($labels, $name, $values) {
        $i = 0;
        foreach ($labels as $label) {
            echo '<div class="input-control checkbox" data-role="input-control">'
            . '<label>'
            . '<input type="checkbox" checked="' . $values[$i] . '" name="' . $name . '">'
            . '<span class="check"></span>'
            . $label
            . '</label>'
            . '</div>';
            $i++;
        }
    }

    function addHiddon($field, $value) {
        form_hidden($field, '$value');
    }

    function addDropDown($label, $name, $class, $dropdownvalues) {
        echo '<div class="form-group">'
        . '   <label>' . $label . '</label>'
        . '  <select class="' . $class . '" name = "'.$name.'">';
        foreach ($dropdownvalues as $key => $option) {
            echo '<option>' . $option . '</option>';
        }
        echo '</select>'
        . '</div>';
    }

    function processFieldDefs($formFieldDefs, $values) {

        foreach ($formFieldDefs as $field => $attributes) {

            //echo $field;
            //print_r($attributes);
            extract($attributes);

            switch ($ftype) {
                case 'text':
                    $this->addTextField($this->frm_labels[$label], strtolower($field), $ftype, $this->frm_labels[$label], $class, $js,$width, $values[strtolower($field)]);
                    break;
                case 'drop-down':
                    $this->addDropDown($this->frm_labels[$label],strtolower($field), $class, $dropdownvalues);
                    break;
                case 'hidden':
                    $this->addHiddon(strtolower($field), 'ABCD');
                    $this->hidden[] = array($field =>'ABCD');
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
