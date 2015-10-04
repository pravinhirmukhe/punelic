define(['jq', 'bootstrap', 'chart', 'progressbar', 'nicescroll', 'icheck', 'moment', 'datepicker', 'custom', 'flot', 'flot_pie', 'flot_orderBars', 'flot_time', 'date', 'flot_spline', 'flot_stack', 'curvedLines', 'flot_resize', 'inputmask', 'datatable', 'tabletools', 'fileinput', 'validator'], function ($) {
    $(":input").inputmask();
    $(".file").fileinput({
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        maxFileSize: 100
    });
    var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
    ];
    var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
    ];
    $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [data1, data2], {
        series: {
            lines: {
                show: false,
                fill: true
            },
            splines: {
                show: true,
                tension: 0.4,
                lineWidth: 1,
                fill: 0.4
            },
            points: {
                radius: 0,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
        },
        yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
    });

    function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
    }
    $('#intradaymsg').fadeOut('500');
//    var oTable = $('#example').dataTable({
//        "oLanguage": {
//            "sSearch": "Search all columns:"
//        },
//        "aoColumnDefs": [{
//                'bSortable': false,
//                'aTargets': [0]
//            }],
//        'iDisplayLength': 12,
//        "sPaginationType": "full_numbers",
//        "dom": 'T<"clear">lfrtip',
//        "tableTools": {
//            "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
//        }
//    });
    $("tfoot input").keyup(function () {
        oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
    });
    $("tfoot input").each(function (i) {
        asInitVals[i] = this.value;
    });
    $("tfoot input").focus(function () {
        if (this.className == "search_init") {
            this.className = "";
            this.value = "";
        }
    });
    $("tfoot input").blur(function (i) {
        if (this.value == "") {
            this.className = "search_init";
            this.value = asInitVals[$("tfoot input").index(this)];
        }
    });
    $('.single_cal1').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_1",
        format: 'DD/MM/YYYY'
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });
//    $('#reservation').daterangepicker(null, function (start, end, label) {
//        console.log(start.toISOString(), end.toISOString(), label);
//    });

    // initialize the validator function
    validator.message['date'] = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

    // bind the validation to the form submit event
    //$('#send').click('submit');//.prop('disabled', true);

    //                                        $('form').submit(function(e) {
    //                                            e.preventDefault();
    //                                            var submit = true;
    //                                            // evaluate the form using generic validaing
    //                                            if (!validator.checkAll($(this))) {
    //                                                submit = false;
    //                                            }
    //
    //                                            if (submit)
    //                                                this.submit();
    //                                            return false;
    //                                        });

    /* FOR DEMO ONLY */
    $('#vfields').change(function () {
        $('form').toggleClass('mode2');
    }).prop('checked', false);

    $('#alerts').change(function () {
        validator.defaults.alerts = (this.checked) ? false : true;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
    $('#selectalldays').click(function (event) {  //on click 
        if (this.checked) { // check select status
            $('.days').each(function () { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        } else {
            $('.days').each(function () { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });
        }
    });



});