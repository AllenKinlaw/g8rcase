<legend> 
</legend>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="cases-table">
        <thead>
            <tr>
                <th class='hidden'></th>
                <th>Docket</th>
                <th>Case Name</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($cases[0])) {
                $rowclass = 'even';
                foreach ($cases as $case) {
                    //toggle the row class
                    if ($rowclass == 'even') {
                        $rowclass = 'odd';
                    } else {
                        $rowclass = 'even';
                    }
                    echo '<tr id="case-row" data="' . $case['id'] . '" class=$rowclass>';

                    echo '<td class="hidden">';
                    $formvars = array('class' => '',
                        'target-div' => 'case-details-div',
                        'id' => 'id-form');
                    echo form_open('cases/childView/'.$case['id'], $formvars);
                    echo '<input name = "id" value = "';
                    echo $case['id'];
                    echo '" type = "hidden" class = "form-control ">
                    </form> </td>';
                    echo '<td>' . $case['case_number'] . '</td> ';
                    echo '<td>' . $case['name'] . '</td> ';
                    echo '<td>' . $case['type'] . '</td> ';
                    echo '<td>' . $case['status'] . '</td></tr> ';
                }
            }
//        echo 'No Cases. Click the Edit Button to add a new case.'
            ?>
<!--                <tr class="odd gradeX">
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>
                <td class="center">4</td>
                <td class="center">X</td>
            </tr>-->

        </tbody>
    </table>
</div>
<!-- Page-Level Plugin Scripts - Tables -->
<script src="<?php echo base_url(); ?>js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>$('#cases-table').dataTable({
        "columnDefs": [
            {
                "searchable": false
            }]
    } );
    $("#module-pills li").toggleClass("active", false);
    $("#cases-pill").toggleClass("active", true);
    $(".pagination, .dataTables_filter").toggleClass("pull-right",true);
</script>