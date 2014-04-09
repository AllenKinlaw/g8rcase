<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displayCaseList
 *
 * @author allen
 */
class DisplayCaseList {
    var $id = '';
    var $casename = '';
    var $docket = '';
    var $ctype = '';
    var $setactive = 'No';
    var $initalurl = '';
    //put your code here
    Function printCaseList($fieldkey, $fieldvalue) {
        $i = 0;
        //echo '<div class="listview-outlook"> <ul class=" chat">' ;
        echo '<ul class=" chat">' ;
        $current_item = '';


        foreach ($fieldkey as $value) {
            if ($value === 'id') {
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
                        //echo '</div>';
                    }
                }
                // echo '<div class="list-group">';
            }
            $this->parselistitem($value, $fieldvalue[$i]);
            $current_item = $value;
            $i++;
        }
        // display the last record
        $this->displaylistitem();
        //echo '</div>';
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
            $letter = $this->casename[0];
            $letter2 = $this->casename[1];
        echo '<li class="left clearfix">'            
            .'<span class="chat-img pull-left">'
            .'<img src="http://placehold.it/50/'.$letter.$letter2.$letter.$letter2.$letter.$letter2.'/&text='. $letter.'" alt="Capital Letter" class="img-thunbnail" />'
            . '</span>'
            . '<div class="chat-body clearfix"'
            .'<a href="#" class="list-group-item">'
            .'<i class="fa fa-users fa-fw"></i> <strong class="primary-font">'.$this->casename .'</strong>'
              .'<span class="pull-right text-muted small"><em> Docket:' . $this->docket .'</em>'
             .'</span>'
             .'<br><p> Type: '.  $this->ctype .'</p>'
             .'</span> <br>'
             .'</a>'
            .'</div> </li>';
    }

}
    