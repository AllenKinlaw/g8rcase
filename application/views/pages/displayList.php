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
class DisplayList {

    //put your code here
    Function printList($listmodel, $rows) {
        //echo '<div class="listview-outlook"> <ul class=" chat">' ;
        echo '<ul class=" chat">';

        foreach ($rows as $row) {
            $display['id'] = '';
            foreach ($listmodel as $displyfield) {
                // $i = 0;
                $displaystring = '';
                foreach ($displyfield as $field) {
                    if ($field != 'id') {
                        if ($displaystring != '') {
                            $displaystring = $displaystring . ' ' . $row[$field];
                        } else {
                            $displaystring = $row[$field];
                        }
                    } else {
                        $display['id'] = $row[$field];
                    }
                }
                if ($displaystring != '') {
                    $display['row'][] = $displaystring;
                }
            }


            // display the record
            $this->displaylistitem($display);
            $display = array();
        }


        echo '</ul>';

        //echo '</div>';
    }

    function displaylistitem($display) {

        require_once 'helpers/viewHelpers.php';
        $targeturl = 'http://localhost/display/contacts' . '/' . $display['id'];

        $active = '';
        $i = 1;
        echo '<li class="left clearfix">'
        . '<span class="chat-img pull-left">';
        foreach ($display['row'] as $rowtext) {
            switch ($i) {
                case 1:
                    $letter = $rowtext[0];
                    $background = getLetterBackground($letter);
                    echo '<img src="http://placehold.it/58x81/' . $background . '/&text=' . $letter . '" alt="Capital Letter" class="img-thunbnail" />'
                    . '</span>'
                    . '<div class="chat-body clearfix">'
                    . '<a href="#" class="list-group-item list-link" target-url="' . $targeturl . '">'
                    . '<i class="fa fa-users fa-fw"></i> <strong class="primary-font">' . $rowtext . '</strong>'
                    // .'<span class="pull-right text-muted small"><em> Docket:' . $this->docket .'</em>'
                    // .'</span>'
                    . '<br>';
                    break;
                default:
                    echo '<p>' . $rowtext . '</p>';
                    break;
            }
            $i += 1;
        }
        echo '</span>'
        . '</a>'
        . '</div>'
        . '</li>';
    }

}
