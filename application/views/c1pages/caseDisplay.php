<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of caseDisplay
 *
 * @author allen
 */
class CaseDisplay {

    var $id = '';
    var $casename = '';
    var $docket = '';
    var $ctype = '';
    var $setactive = 'No';
    var $initalurl = '';

    function selectList($fieldkey, $fieldvalue) {
        $i = 0;
        echo '<div class="listview-outlook">';
        $current_item = '';


        foreach ($fieldkey as $value) {
            if ($value === 'id')
            //{echo $value .':' . $fieldvalue[$i];
            //}
                if ($value === 'id' &&
                        $value != $current_item) {
                    if (strlen($current_item) > 0) {
                        //we are finished processing the record strings so disply the record
                        if ($this->setactive === 'No') {
                            $this->setactive = 'Yes';
                        }
                        $this->displaylistitem();
                    }
                }
            $this->parselistitem($value, $fieldvalue[$i]);
            $current_item = $value;
            $i++;
        }
// display the last record
        $this->displaylistitem();
        echo '</div>';
    }

    function parselistitem($key, $value) {

        switch ($key) {
            case 'id':
                $this->id = $value;
                return;
            case 'name':
                $this->casename = $value;
                return;
            case 'docket':
                $this->docket = $value;
                return;
            case 'ctype':
                $this->ctype = $value;
                return;
        }
    }

    function displaylistitem() {
        $targeturl = 'http://localhost/ci1/index.php/editors/form' . '/' . 'edithome/' . $this->id .'/'.$this->docket .'/'.$this->casename;
        /*if ($this->setactive === 'Yes') {
            $active = 'selected';
            $this->setactive = 'Set';
            $this->initalurl = $targeturl;
        } else {*/
            $active = '';
        //}
        echo '<a href="' . $targeturl . '"  target = "editFrame" class="list ' . $active . '">'
        . '<div class="list-content">'
        //.'<div class="data">'
        . '<span class="list-title bg-darkblue fg-white"> ' . $this->casename . ' </span>'
        . ' <span class="list-subtitle"> Docket: ' . $this->docket . '<br> </span>'
        . ' <span class="list-remark"> Type: ' . $this->ctype . '<br> </span>'
        //.'</div>'
        . '</div>'
        . '</a>';
    }

//put your code here
}
