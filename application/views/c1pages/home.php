<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'caseDisplay.php';
echo "Welcome to G8RCase!";
?>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    //$case = new CaseDisplay();
                    //$case->selectList($fieldkey, $fieldvalue);
                    echo 'List Goes Here'
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!--<iframe name=editFrame width=100% height=100% src="'. $case->initalurl .'" > </iframe>  -->
            <iframe name=editFrame  src="http://google.com" > </iframe>
        </div>

    </div>