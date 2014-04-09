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

    function addFormHeader($postto='',$title='I Forgot The Title!',$attributes=array('role'=>'form')) {
        //echo validation_errors();
        echo form_open($postto,$attributes);
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

    function addTextField($label, $name,$type,$placeholder, $class,$js,$value) {
        $inputparms = array(
            'name' => $name,
            'value' => $value,
            'placeholder' => $placeholder,
            'class' => $class
        );
        echo '<div class="input-control text" data-role="input-control">'
        . '<label>' . $label . '</label>'
        . '<div class="input-control text" data-role="input-control">'
        . form_input($inputparms) //. '<input type="text" value="" placeholder="' . $label . '"name="' . $name . '">'
        . '<button class="btn-clear" tabindex="-1" type="button"></button>'
        . '</div>';
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
}
