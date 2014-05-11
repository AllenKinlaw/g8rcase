
function switchStep(newStep)
{
    $(".step-link").toggleClass("active", false);
    $("#" + newStep).toggleClass("active", true);
}

function switchAnnotation(newStep)
{
    $(".annotation-step").hide();
    $("#" + newStep + "-annotation").delay(300).fadeIn(500);
}


$(document).ready(function() {
    $("[name='accounttype']").on("change", function() {

        var acttype = $(this).val();
        //alert(acttype);
        if (acttype == 'S') {
            $(".firm-field").hide();
            return;
        }
        $(".firm-field").show();
    })

//        $("a.step-link").click(function(e) {
//            var clickedStep = $(this).attr('id');
//            switchStep(clickedStep);
//            switchAnnotation(clickedStep);
//            return false;
//        });

//    $("#save-step").click(function(e) {
       $(document).on("click","#save-step",function() {
        var url = $("#step-form").attr("action"),
        targetdiv = "#" + $("#step-form").attr("target-div");
        $(targetdiv).hide();
        $("#myModal").show();
        //var targeturl = $(this).attr('target-url');
        //alert("you chose the target: " + targeturl);
        var posting = $.post(url, $("#step-form").serialize(), function(data) {
            $(targetdiv).empty().append(data);
            $("#myModal").hide();
            $(targetdiv).show();
        });
        // Put the results in a div

        posting.error(function(data) {

            alert('error' + data)
            $("#myModal").hide();
            $(targetdiv).show();
        });
    });
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

    $(".ajax-form").submit(function(event) {
        event.preventDefault();
        var url = $(this).attr("action"),
                targetdiv = "#" + $(this).attr("target-div");

        $(targetdiv).hide();
        $("#myModal").show();
        //var targeturl = $(this).attr('target-url');
        //alert("you chose the target: " + targeturl);
        var posting = $.post(url, $(this).serialize(), function(data) {
            $(targetdiv).empty().append(data);
            $("#myModal").hide();
            $(targetdiv).show();
        });
        // Put the results in a div

        posting.error(function(data) {

            alert('error' + data)
            $("#myModal").hide();
            $(targetdiv).show();
        });

    });
});