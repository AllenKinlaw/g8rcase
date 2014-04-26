
   <div class="row" id="myModal">
        <div class="col-md-12" >
            <div class="modal-dialog col-offset-4" >
                <div class="modal-content">
                    <div class="modal-body" >
                        <input id ="target_url" 
                               type="hidden" 
                               class ="form-control" 
                               value="<?php echo base_url();?>private_<?php echo $current_url?>">
                        <br><i class="fa fa-spinner fa-spin fa-5x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
 <div class="row" id="target-div">
 
 </div> <!--         wrapper-->
<script>
 //$(document).ready(function() {

	$(window).load(function() {
		 $('#myModal').show();
		var targeturl = $('#target_url').val();
    $("#target-div").load(targeturl, function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
        // alert("External content loaded successfully!");
        $('#myModal').hide();
        $('#myDetailModal').hide();
                $("#target-div").show();
        }
        if (statusTxt == "error") {
        $('#myModal').hide();
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        }
        });
	});
	

//}); 
</script>

