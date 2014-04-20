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
class MyDisplayHelper {

    private $frm_labels;
    var $hidden;

    function MyFormHelper($formstrings = array('LBL'=>'')) {
        //require_once 'homestrings.php';
        $this->frm_labels = $formstrings;
    }


    function addLegend($title) {
        echo '<legend> ' . "\n"
        . '<label> ' . $title . ' </label> ' . "\n"
        . '</legend> ' . "\n";
    }

    function addText($label,$js, $prefix, $value,$postfix) {

        $thecode ='';
        $thecode = $thecode . $prefix . $value . $postfix. "\n"
         . $js . "\n";
          return $thecode;
    }

  


    function addGroupHeader($label, $target, $class ='well', $collapse = 'collapse in',$prefix='') {
            $thecode ='';
        $thecode = $prefix . "\n";
        if ($collapse === '') {
            $collapse = 'collpase in';
        }
        switch ($class) {
            case 'accordian':
                $thecode = $thecode . '<div class="panel panel-info">' . "\n"
                . '<div class = "panel-heading">' . "\n"
                . '<h4 class = "panel-title">' . "\n"
                . '<a href = "#collapse' . $target . '" data-parent = "#accordion" data-toggle = "collapse" class = "">' . $label . '</a>' . "\n"
                . '</h4>' . "\n"
                . '</div>' . "\n"
                . '<div id="collapse' . $target . '" class="panel-collapse ' . $collapse . ' " style="height: auto;">' . "\n";
                break;
            case 'well':
                $thecode = $thecode . '<div class="' . $class . '">' . "\n";
                    if($label != ''){
                     $thecode = $thecode .  '<label>'. $label. '</label>'. "\n";
                    }
                break;
            default :
                break;
        }
        return $thecode;
    }

    function addGroupfooter($class ='well',$postfix) {
           $thecode='';
        switch ($class) {
            case 'accordian':
                $thecode = '</div>' . "\n"  //end Collapse#label Div
                 . '</div>' . "\n" // end panel
                . '</div>' . "\n"; // end panel group
                break;
            case ('well'):
                $thecode =  '</div>'. "\n";
            default :
                break;
        }
                $thecode = $thecode . $postfix . "\n";
                return $thecode;
    }

    function processFieldDefs($formFieldDefs, $values) {
        $thepage ='';
        foreach ($formFieldDefs as $field => $attributes) {

            //echo $field;
            //print_r($attributes);
            extract($attributes);
            if (isset($fields)) {
                $theFields = $fields;
            }
            switch ($ftype) {

                case 'group':
                    $thepage= $thepage . $this->addGroupHeader($this->frm_labels[$label], strtolower($field), $class,isset($collapse)?$collapse :'',$prefix);
                    $thepage= $thepage . $this->processFieldDefs($fields, $values);
                    $thepage= $thepage . $this->addGroupFooter($class,$postfix);
                    break;
                case 'text':
                    $thepage= $thepage . $this->addText($this->frm_labels[$label],$js, $prefix,$values[strtolower($field)],$postfix );
                    break;

                default:
                    break;
            }
        }
        return $thepage;
    }

}
