
function set_create(url)
{
    $("#create-button").attr("href", url);
}
function hide_create()
{
    $("#create-button").toggle("display");
}
function show_create()
{
    $("#create-button").show();
}
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
function spinnermodal()
{
    return '<div class="modal-dialog hidden" id="myDetailModal" > <div class="modal-content"><div class="modal-body"><i class="fa fa-spinner fa-spin fa-5x text-primary"></i></div></div></div>';
}

function postajaxcall(url, targetdiv, form)
{

    $(targetdiv).hide();
    //$("#myDetailModal").show();
    //var targeturl = $(this).attr('target-url');
    //alert("you chose the target: " + targeturl);
    if (form) {
        if (form == 'this') {
            var posting = $.post(url, $(this).serialize(), function(rtndata) {
                $(targetdiv).empty().append(rtndata);
                //$("#myDetailModal").hide();
                ;
                $(targetdiv).show();
            });
        }
        else {
            var posting = $.post(url, form, function(rtndata) {
                $(targetdiv).empty().append(rtndata);
                //$("#myDetailModal").hide();
                ;
                $(targetdiv).show();
            });
        }
    }
    else {
        var posting = $.post(url, '', function(rtndata) {
            $(targetdiv).empty().append(rtndata);
            //$("#myDetailModal").hide();
            ;
            $(targetdiv).show();
        });
    }
    // Put the results in a div

    posting.error(function(rtndata) {

        alert('error' + rtndata)
                //$("#myDetailModal").hide();
                ;
        $(targetdiv).show();
    });
}
$(document).ready(function() {
    $(document).on("change", "[name='frequency']", function() {

        var plantype = $(this).val();
        var numusers = $("#num-users").val();
        var payment = 0;
        //alert(plantype);
        if (plantype == 'F') {
            $("#pay-total-div").removeClass('hidden');
            $("#pay-total").html('$0.00');
            return;
        }
        if (plantype == 'M') {
            $("#pay-total-div").removeClass('hidden');
            payment = numusers * 35;
            $("#pay-total").html('$' + payment);
            return;
        }
        if (plantype == 'A') {
            $("#pay-total-div").removeClass('hidden');
            payment = numusers * 360;
            $("#pay-total").html('$' + payment);
            return;
        }
        ;
    });
    $(document).on("change", "[name='accounttype']", function() {

        var acttype = $(this).val();
        //alert(acttype);
        if (acttype == 'S') {
            $(".firm-field").addClass('hidden');
            $("#num_users").val(1);
            return;
        }
        $(".firm-field").removeClass('hidden');
    });
//        $("a.step-link").click(function(e) {
//            var clickedStep = $(this).attr('id');
//            switchStep(clickedStep);
//            switchAnnotation(clickedStep);
//            return false;
//        });
    $(document).on("click", "#btn-search", function() {
//alert('searching...');
        var url = $("#btn-search").attr("href");
        var targetdiv = "#main-list-div";

        //$("#myDetailModal").show();
        //var targeturl = $(this).attr('target-url');
        //alert("you chose the target: " + targeturl);
        //var posting = $.post(url, {search_str: $("#search-btn-input").val()}, function(data) {
        var searchstr = $("#search-btn-input").val();
        if (!searchstr) {
            alert('Enter a value to search.')
            return;
        }
        $(targetdiv).hide();
        var posting = $.post(url, {search_str: searchstr}, function(data) {
            $(targetdiv).empty().append(data);
            //$("#myDetailModal").hide();;
            $(targetdiv).show();
        });
        // Put the results in a div

        posting.error(function(data) {

            alert('error' + data)
            //$("#myDetailModal").hide();;
            $(targetdiv).show();
        });
    });
    //Select a list item to detail
    $(document).on("click", "#display-list-item", function(event) {
        event.preventDefault();
        var url = $(this).attr("target-url");
//         alert('clicked '+ url);
//          return;
        var targetdiv = "#main-form-div";

        //$("#myDetailModal").show();
        //var targeturl = $(this).attr('target-url');
        //alert("you chose the target: " + targeturl);
        //var posting = $.post(url, {search_str: $("#search-btn-input").val()}, function(data) {
        $(targetdiv).hide();
        var posting = $.post(url, '', function(data) {
            $(targetdiv).empty().append(data);
            //$("#myDetailModal").hide();;
            $(targetdiv).show();
        });
        // Put the results in a div

        posting.error(function(data) {

            alert('error' + data)
            //$("#myDetailModal").hide();;
            $(targetdiv).show();
        });
    });
//    $("#save-step").click(function(e) {
    $(document).on("click", "#create-button", function(event) {
        event.preventDefault();
        var url = $(this).attr("href");
        var targetdiv = "#" + $("#step-form").attr("target-div");
        //var form = "#step-form";
        var form = '';
        //alert ('url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        postajaxcall(url, targetdiv, form)
    });
       $(document).on("click", "#module-pills li a", function(event) {
        event.preventDefault();
        var url = $(this).attr("href");
        var targetdiv = "#" + $("#step-form").attr("target-div");

        //var form = $("#current-control-form").serialize();
        var form ='';
        //alert ('url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        postajaxcall(url, targetdiv, form)
        // $('#cases-table').dataTable();

    });
           $(document).on("click", "#module-pills li a", function(event) {
        event.preventDefault();
        var url = $(this).attr("href");
        var targetdiv = "#" + $("#step-form").attr("target-div");

        //var form = $("#current-control-form").serialize();
        var form ='';
        //alert ('url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        postajaxcall(url, targetdiv, form)
         $('#cases-table').dataTable();

    });
    $(document).on("click", "#case-row", function(event) {
        event.preventDefault();
        $("#cases-table tr").toggleClass('success',false);
        $(this).toggleClass('success');
        var idform = $(this).find('form');
        var url = idform.attr("action");
        var targetdiv = "#" + idform.attr("target-div");
        //var form = "#step-form";
        var form = idform.serialize();
        //alert ('Id:'+form +'url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        postajaxcall(url, targetdiv, form)
    });
    $(document).on("click", "#cancel-btn", function(event) {
        event.preventDefault();
        var url = $("#cancel-btn").attr("href");
        var targetdiv = "#" + $("#step-form").attr("target-div");
        var form = "";
        //alert ('url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        postajaxcall(url, targetdiv, form)
    });
    $(document).on("click", "#delete-btn", function(event) {
        event.preventDefault();
        var url = $("#delete-btn").attr("href");
//        var targetdiv = "#" + $("#step-form").attr("target-div");
//        var form = "";
        //alert ('url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        $.post(url, '', function(data) {
            if (data) {
                document.location.href = data;
                return;
            }
            alert('Database Error. Please check your network connection and try again.');
        });

    });
    $(document).on("click", "#save-step", function() {
        var url = $("#step-form").attr("action"),
                targetdiv = "#" + $("#step-form").attr("target-div");
        $(targetdiv).hide();
        $("#myDetailModal").show();
        //var targeturl = $(this).attr('target-url');
        //alert("you chose the target: " + targeturl);
        var posting = $.post(url, $("#step-form").serialize(), function(data) {
            $(targetdiv).empty().append(data);
            $("#myDetailModal").hide();
            ;
            $(targetdiv).show();
        });
        // Put the results in a div

        posting.error(function(data) {

            alert('error' + data)
            $("#myDetailModal").hide();
            ;
            $(targetdiv).show();
        });
    });
    $('#myModal').hide();
    //$('#myDetailModal').hide();
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
    $(document).on("submit", ".main-form", function(event) {
        event.preventDefault();
        var url = $(this).attr("action")
        var targetdiv = "#" + $(this).attr("target-div");
        var form = $(this).serialize();
        //alert ('url: '+ url +'\n' + 'targetdiv: '+ targetdiv +'\n' + 'form:' + form);
        postajaxcall(url, targetdiv, form)
    });
});