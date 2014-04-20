
<script type="text/javascript">
    $(document).ready(function() {
        
        $('#myModal').hide();
        $('#myDetailModal').hide();
        var currentDate = new Date();
        //$("#mydate").datepicker("setDate",currentDate);
        $(".date-picker").datepicker({
            showOn: 'button',
            buttonText: 'Show Date',
            buttonImageOnly: true,
            buttonImage: 'http://jqueryui.com/resources/demos/datepicker/images/calendar.gif',
            dateFormat: 'mm/dd/yy',
            constrainInput: true,
            defaultDate: currentDate
        });

        $(".ui-datepicker-trigger").mouseover(function() {
            $(this).css('cursor', 'pointer');
        });
        $(".ui-datepicker-trigger").css("margin-left", "-30px");
        $(".date-picker").css("width", "100%");

        $(".list-link").click(function() {
        $("#target-panel").hide();    
        $("#myDetailModal").show();
            var targeturl = $(this).attr('target-url');
            //alert("you chose the target: " + targeturl);
            $("#target-panel").load(targeturl, function(responseTxt, statusTxt, xhr) {
                if (statusTxt == "success") {
                    // alert("External content loaded successfully!");
                    $('#myDetailModal').hide();
                    $("#target-panel").show(); 
                }
                if (statusTxt == "error") {
                    $('#myDetailModal').hide();
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                }
            });
        });
        
    });
</script>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.js"></script>
<!-- Page-Level Plugin Scripts - Blank -->

<!-- SB Admin Scripts - Include with every page -->
<script src="<?php echo base_url(); ?>js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Blank - Use for reference -->

</div> <!--         wrapper-->
</body>
</html>
