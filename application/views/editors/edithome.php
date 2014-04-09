<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
        // put your code here
                 // put your code here
                    require_once 'myFormHelper.php';
                    echo validation_errors();
                    $editForm = new MyFormHelper();
                    $editForm->addFormHeader('editors/edithome',$title);
                    //$editForm->addLegend($title);
                    $editForm->processFieldDefs($formfielddefs,$values);
                    $this->session->set_userdata('hidden', $editForm->hidden);
                    $hidden = $this->session->userdata('hidden');
                    $editForm->addSubmitBtn();
                    $editForm->addFormFooter();
        /*$editForm = new MyFormHelper();
        $editForm->addFormHeader($title);
        //$editForm->addLegend($title);
        $editForm->addHiddon('id', $id);
        $editForm->addTextField('Name', 'name', 'text','Enter a Case Name', '', '','');
        $editForm->addTextField('Docket','docket','text','Enter a Docket Number','','',$case);
        $editForm->addSubmitBtn();
        $editForm->addFormFooter();*/
        ?>

