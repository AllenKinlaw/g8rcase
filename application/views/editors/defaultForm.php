<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// put your code here
// put your code here
require_once 'helpers/myFormHelper.php';
echo validation_errors();
if (isset($postback)) {
    echo '<p class="success-msg">' . $postback . '</p>' . "\n";
}
if (isset($debugpost)) {
    
    echo '<a href="mailto:support@g8rcase.com?subject=Hard Error Report&body=';
    print_r($debugpost);
    echo '">Click Here to Contact G8RCase support</a>';
    print_r($debugpost);
}
$editForm = new MyFormHelper($formstrings);
$editForm->addFormHeader($postto . '/' . $page, $title);
//$editForm->addLegend($title);
$editForm->processFieldDefs($formfielddefs, $values);
$this->session->set_userdata('hidden', $editForm->hidden);
$hidden = $this->session->userdata('hidden');
$editForm->addSubmitBtn();

$editForm->addFormFooter();
echo '<form role="form" action="http://localhost/delete/contacts" method="post">';
echo '<input type="submit" value="Delete">';
echo '</form>';
?>

