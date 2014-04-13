<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/overcast/jquery-ui-1.10.4.custom.css" rel="stylesheet"> 
        <!-- Page-Level Plugin CSS - Blank -->

        <!-- SB Admin CSS - Include with every page -->
        <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

        <!--        Have to load jquery  and jquery ui in the header for widgets to load-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.js"></script>
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <input type="hidden" id="confirm-Delete"/>
        <input type="hidden" name="myId" id="myId" value='myID'>
        <input type="submit" value="Delete" name='delete-btn' id='delete-btn'>
        <?php
        // put your code here
        ?>

        <script>
            $(document).ready(function() {

                $('#delete-btn').click(function() {
                    var myId = $('#myId').val();
                    //$.post( "delete\delete", { id: myId } );
                    $.post( "<?php echo base_url()?>deleteitem", { id: myId } ,
                    function(data) {
                        alert(data.result);
                    }, "json");


                });
            });
        </script>

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.js"></script>
        <!-- Page-Level Plugin Scripts - Blank -->

        <!-- SB Admin Scripts - Include with every page -->
        <script src="<?php echo base_url(); ?>js/sb-admin.js"></script>
    </body>
</html>
