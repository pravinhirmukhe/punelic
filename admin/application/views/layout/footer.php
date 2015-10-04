
<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<script src="<?php echo BASEURL; ?>assets/admin/js/fileinput.min.js"></script>
<script>
    $(".file").fileinput({
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        maxFileSize: 100
    });
</script>
<!--<script data-main="<?php echo BASEURL; ?>assets/admin/js/my" src="<?php echo BASEURL; ?>assets/admin/<?php echo BASEURL; ?>assets/admin/js/require.js"></script>-->
<script src="<?php echo BASEURL; ?>assets/admin/js/bootstrap.min.js"></script>

<!-- chart js -->
<script src="<?php echo BASEURL; ?>assets/admin/js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="<?php echo BASEURL; ?>assets/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo BASEURL; ?>assets/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="<?php echo BASEURL; ?>assets/admin/js/icheck/icheck.min.js"></script>
<script src="<?php echo BASEURL; ?>assets/admin/js/custom.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="<?php echo BASEURL; ?>assets/admin/js/moment.min2.js"></script>
<script type="text/javascript" src="<?php echo BASEURL; ?>assets/admin/js/datepicker/daterangepicker.js"></script>
<!-- input mask -->
<script src="<?php echo BASEURL; ?>assets/admin/js/input_mask/jquery.inputmask.js"></script>
<!-- knob -->
<script src="<?php echo BASEURL; ?>assets/admin/js/knob/jquery.knob.min.js"></script>
<!-- range slider -->
<script src="<?php echo BASEURL; ?>assets/admin/js/ion_range/ion.rangeSlider.min.js"></script>
<!-- color picker -->
<script src="<?php echo BASEURL; ?>assets/admin/js/colorpicker/bootstrap-colorpicker.js"></script>
<script src="<?php echo BASEURL; ?>assets/admin/js/colorpicker/docs.js"></script>

<!-- image cropping -->
<script src="<?php echo BASEURL; ?>assets/admin/js/cropping/cropper.min.js"></script>
<script src="<?php echo BASEURL; ?>assets/admin/js/cropping/main2.js"></script>
<script src="<?php echo BASEURL; ?>assets/admin/js/validator/validator.js"></script>

<!-- datepicker -->
<script type="text/javascript">
    $(document).ready(function () {
        $(document).ready(function () {
            $('input[type=text]').keydown(function () {
                $(this).val($(this).val().toUpperCase());
            });
            $('input[type=text]').focusout(function () {
                $(this).val($(this).val().toUpperCase());
            });
        });
        $('.date-range').daterangepicker({format: 'DD/MM/YYYY', }, null, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        var cb = function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        };

        $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange_right').daterangepicker(optionSet1, cb);

        $('#reportrange_right').on('show.daterangepicker', function () {
            console.log("show event fired");
        });
        $('#reportrange_right').on('hide.daterangepicker', function () {
            console.log("hide event fired");
        });
        $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
            console.log("cancel event fired");
        });

        $('#options1').click(function () {
            $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
        });

        $('#options2').click(function () {
            $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
        });

        $('#destroy').click(function () {
            $('#reportrange_right').data('daterangepicker').remove();
        });

    });
</script>
<!-- datepicker -->
<script type="text/javascript">
    $(document).ready(function () {

        var cb = function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function () {
            console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function () {
            console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
            console.log("cancel event fired");
        });
        $('#options1').click(function () {
            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function () {
            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function () {
            $('#reportrange').data('daterangepicker').remove();
        });
    });
</script>
<!-- /datepicker -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#single_cal1').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal2').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_3"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#reservation').daterangepicker(null, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<!-- /datepicker -->
<!-- input_mask -->
<script>
    $(document).ready(function () {
        $(":input").inputmask();
    });
</script>
<!-- /input mask -->
<!-- ion_range -->
<script>
    $(function () {
        $("#range_27").ionRangeSlider({
            type: "double",
            min: 1000000,
            max: 2000000,
            grid: true,
            force_edges: true
        });
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true
        });
        $("#range_25").ionRangeSlider({
            type: "double",
            min: 1000000,
            max: 2000000,
            grid: true
        });
        $("#range_26").ionRangeSlider({
            type: "double",
            min: 0,
            max: 10000,
            step: 500,
            grid: true,
            grid_snap: true
        });
        $("#range_31").ionRangeSlider({
            type: "double",
            min: 0,
            max: 100,
            from: 30,
            to: 70,
            from_fixed: true
        });
        $(".range_min_max").ionRangeSlider({
            type: "double",
            min: 0,
            max: 100,
            from: 30,
            to: 70,
            max_interval: 50
        });
        $(".range_time24").ionRangeSlider({
            min: +moment().subtract(12, "hours").format("X"),
            max: +moment().format("X"),
            from: +moment().subtract(6, "hours").format("X"),
            grid: true,
            force_edges: true,
            prettify: function (num) {
                var m = moment(num, "X");
                return m.format("Do MMMM, HH:mm");
            }
        });
    });
</script>
<!-- /ion_range -->
<!-- knob -->
<script>
    $(function ($) {

        $(".knob").knob({
            change: function (value) {
                //console.log("change : " + value);
            },
            release: function (value) {
                //console.log(this.$.attr('value'));
                console.log("release : " + value);
            },
            cancel: function () {
                console.log("cancel : ", this);
            },
            /*format : function (value) {
             return value + '%';
             },*/
            draw: function () {

                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    this.cursorExt = 0.3;

                    var a = this.arc(this.cv) // Arc
                            ,
                            pa // Previous arc
                            , r = 1;

                    this.g.lineWidth = this.lineWidth;

                    if (this.o.displayPrevious) {
                        pa = this.arc(this.v);
                        this.g.beginPath();
                        this.g.strokeStyle = this.pColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });

        // Example of infinite knob, iPod click wheel
        var v, up = 0,
                down = 0,
                i = 0,
                $idir = $("div.idir"),
                $ival = $("div.ival"),
                incr = function () {
                    i++;
                    $idir.show().html("+").fadeOut();
                    $ival.html(i);
                },
                decr = function () {
                    i--;
                    $idir.show().html("-").fadeOut();
                    $ival.html(i);
                };
        $("input.infinite").knob({
            min: 0,
            max: 20,
            stopper: false,
            change: function () {
                if (v > this.cv) {
                    if (up) {
                        decr();
                        up = 0;
                    } else {
                        up = 1;
                        down = 0;
                    }
                } else {
                    if (v < this.cv) {
                        if (down) {
                            incr();
                            down = 0;
                        } else {
                            down = 1;
                            up = 0;
                        }
                    }
                }
                v = this.cv;
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
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
//            "sSwfPath": "<?php echo base_url('assets/admin/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
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

    /** ******  star rating  *********************** **/
// Starrr plugin (https://github.com/dobtco/starrr)
    var __slice = [].slice;

    (function ($, window) {
        var Starrr;

        Starrr = (function () {
            Starrr.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function (e, value) {
                }
            };

            function Starrr($el, options) {
                var i, _, _ref,
                        _this = this;

                this.options = $.extend({}, this.defaults, options);
                this.$el = $el;
                _ref = this.defaults;
                for (i in _ref) {
                    _ = _ref[i];
                    if (this.$el.data(i) != null) {
                        this.options[i] = this.$el.data(i);
                    }
                }
                this.createStars();
                this.syncRating();
                this.$el.on('mouseover.starrr', 'span', function (e) {
                    return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
                });
                this.$el.on('mouseout.starrr', function () {
                    return _this.syncRating();
                });
                this.$el.on('click.starrr', 'span', function (e) {
                    return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
                });
                this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function () {
                var _i, _ref, _results;

                _results = [];
                for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                    _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
                }
                return _results;
            };

            Starrr.prototype.setRating = function (rating) {
                if (this.options.rating === rating) {
                    rating = void 0;
                }
                this.options.rating = rating;
                this.syncRating();
                return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function (rating) {
                var i, _i, _j, _ref;

                rating || (rating = this.options.rating);
                if (rating) {
                    for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                    }
                }
                if (rating && rating < 5) {
                    for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                    }
                }
                if (!rating) {
                    return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            };

            return Starrr;

        })();
        return $.fn.extend({
            starrr: function () {
                var args, option;

                option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function () {
                    var data;

                    data = $(this).data('star-rating');
                    if (!data) {
                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                    }
                    if (typeof option === 'string') {
                        return data[option].apply(data, args);
                    }
                });
            }
        });
    })(window.jQuery, window);

    $(function () {
        return $(".starrr").starrr();
    });

    $(document).ready(function () {

        $('#stars').on('starrr:change', function (e, value) {
            $('#count').html(value);
        });


        $('#stars-existing').on('starrr:change', function (e, value) {
            $('#count-existing').html(value);
        });

    });
    /** ******  /star rating  *********************** **/

</script>
<script src="<?php echo SITEURL; ?>assets/admin/js/angular.min.js"></script>
<!--<script src="<?php echo SITEURL; ?>assets/admin/js/ngFileUpload/ng-file-upload-shim.js"></script>-->
<!--<script src="<?php echo SITEURL; ?>assets/admin/js/ngFileUpload/ng-file-upload.js"></script>-->
<script src="<?php echo SITEURL; ?>assets/admin/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
<script src="<?php echo SITEURL; ?>assets/admin/js/angular.control.js"></script>
