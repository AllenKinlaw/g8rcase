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

        <link href="<?php echo base_url(); ?>css/overcast/jquery-ui-1.10.4.custom.css" rel="stylesheet"> 

                <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Page-Level Plugin CSS - Blank -->

        <!-- SB Admin CSS - Include with every page -->
        <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

        <!--        Have to load jquery  and jquery ui in the header for widgets to load-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 
        <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.js"></script>

        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <title>Home</title>
        <script>
            $(function() {



                $("#datepicker").datepicker({
                    inline: true
                });



            });
        </script>
    </head>
    <body>
        <!--            <div class="row">
                <div class="col-lg-12" id="myModal">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-body">
                                <i class="fa fa-spinner fa-spin fa-5x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        <div id="wrapper">
