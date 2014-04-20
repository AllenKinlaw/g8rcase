<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// put your code here
// put your code here
require_once 'helpers/myDisplayHelper.php';

$display = new MyDisplayHelper($formstrings);

echo $display->processFieldDefs($formfielddefs, $values);

?>

