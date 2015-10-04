
var dateFormat = function () {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
            timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
            timezoneClip = /[^-+\dA-Z]/g,
            pad = function (val, len) {
                val = String(val);
                len = len || 2;
                while (val.length < len)
                    val = "0" + val;
                return val;
            };
    // Regexes and supporting functions are cached through closure
    return function (date, mask, utc) {
        var dF = dateFormat;
        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length === 1 && Object.prototype.toString.call(date) === "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date))
            throw SyntaxError("invalid date");
        mask = String(dF.masks[mask] || mask || dF.masks["default"]);
        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) === "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var _ = utc ? "getUTC" : "get",
                d = date[_ + "Date"](),
                D = date[_ + "Day"](),
                m = date[_ + "Month"](),
                y = date[_ + "FullYear"](),
                H = date[_ + "Hours"](),
                M = date[_ + "Minutes"](),
                s = date[_ + "Seconds"](),
                L = date[_ + "Milliseconds"](),
                o = utc ? 0 : date.getTimezoneOffset(),
                flags = {
                    d: d,
                    dd: pad(d),
                    ddd: dF.i18n.dayNames[D],
                    dddd: dF.i18n.dayNames[D + 7],
                    m: m + 1,
                    mm: pad(m + 1),
                    mmm: dF.i18n.monthNames[m],
                    mmmm: dF.i18n.monthNames[m + 12],
                    yy: String(y).slice(2),
                    yyyy: y,
                    h: H % 12 || 12,
                    hh: pad(H % 12 || 12),
                    H: H,
                    HH: pad(H),
                    M: M,
                    MM: pad(M),
                    s: s,
                    ss: pad(s),
                    l: pad(L, 3),
                    L: pad(L > 99 ? Math.round(L / 10) : L),
                    t: H < 12 ? "a" : "p",
                    tt: H < 12 ? "am" : "pm",
                    T: H < 12 ? "A" : "P",
                    TT: H < 12 ? "AM" : "PM",
                    Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                    o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                    S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
                };
        return mask.replace(token, function ($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();
function getAge(DOB) {
    var today = new Date();
    var birthDate = new Date(DOB);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}
// Some common format strings
dateFormat.masks = {
    "default": "ddd mmm dd yyyy HH:MM:ss",
    shortDate: "m/d/yy",
    mediumDate: "mmm d, yyyy",
    longDate: "mmmm d, yyyy",
    fullDate: "dddd, mmmm d, yyyy",
    shortTime: "h:MM TT",
    mediumTime: "h:MM:ss TT",
    longTime: "h:MM:ss TT Z",
    isoDate: "yyyy-mm-dd",
    isoTime: "HH:MM:ss",
    isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};
// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};
// For convenience...
Date.prototype.format = function (mask, utc) {
    return dateFormat(this, mask, utc);
};
function timeCompare(startTime, endTime) {
    return Date.parse('01/01/2011 ' + startTime) < Date.parse('01/01/2011 ' + endTime);
}
var city;
'use strict';
/**
 * 
 * @type @exp;angular@call;module
 */
app = angular.module('administrator', ['ui.bootstrap']);
/**
 * 
 * @param {type} param1
 * @param {type} param2
 * Admin login controller
 */
app.controller('adminlogin', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.login = function (user) {
            $http.post(site_url + 'admin-login', user).success(function (data) {
                if (data == 'true') {
                    //alert('Signin successfuly.');
                    window.location.reload(site_url);
                } else {
                    alert('Username or password invalid OR user already login, please try again.');
                }
            });
        };
    }]);
/**
 * Dasboard controller
 */
app.controller('dashboard', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.totalusers = "";
        $scope.totalprofessional = "";
        $scope.totalprofessionalmale = "";
        $scope.totalprofessionalfemale = "";
        $http.post(site_url + 'admin/getdashboard').success(function (data) {
            $scope.totalusers = data.totalusers;
            $scope.totalprofessional = data.totalprofessional;
            $scope.totalprofessionalexec = data.totalprofessionalexec;
            $scope.totalprofessionalad = data.totalprofessionalad;
            // new count reports 
            $scope.totalActivationPending = data.totalActivationPending;
            $scope.getOnlineApp = data.getOnlineApp;
            $scope.getOfflineApp = data.getOfflineApp;
            $scope.totalActiveUsers = data.totalActiveUsers;
            $scope.totalActiveLawProf = data.totalActiveLawProf;
            $scope.totalActiveCAProf = data.totalActiveCAProf;
            $scope.totalActiveCSProf = data.totalActiveCSProf;
            $scope.totalPendingForOper = data.totalPendingForOper;
            $scope.totalprofOffline = data.totalprofOffline;
            $scope.totalprofOnline = data.totalprofOnline;
        });
    }]);
/**
 * Professional Login
 */

app.controller('prof_account', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.login = function (user) {
            $rootScope.loading = 1;
            $http.post(site_url + "prof/prof_login", user).success(function (data) {
                if (data == 'true') {
                    window.location.replace(site_url + 'prof/Professional');
                } else {
                    alert("Username and password is invalid, Please try again. ");
                }
            });
        };
    }]);
/**
 * Change password for professional
 */
app.controller('chngpasswordprof', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.oldpass = "";
        $scope.newpass = "";
        $scope.repass = "";
        $scope.updatepass = function () {
            var data = {'newpass': $scope.newpass};
            if ($scope.newpass == $scope.repass) {
                $rootScope.loading = 1;
                $http.post(site_url + 'prof/prof_changepass', data).success(function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                    $rootScope.loading = 0;
                });
            } else {
                $scope.status = 2;
                $scope.msg = "Password didnot match.";
            }
        };
        $scope.matchpass = function () {
            if ($scope.newpass != $scope.repass) {
                $scope.pstatus = 2;
                $scope.pmsg = "Password didnot match.";
                $scope.repass = "";
            } else {
                $scope.pstatus = 1;
                $scope.pmsg = "Password Match.";
            }
        }
        $scope.checkpass = function () {
            var data = {'oldpass': $scope.oldpass};
            $rootScope.loading = 1;
            $http.post(site_url + 'prof/prof_checkpass', data).success(function (data) {
                $scope.olpstatus = data.status;
                $scope.olpmsg = data.msg;
                if ($scope.olpstatus == 2) {
                    $scope.oldpass = "";
                }
                $rootScope.loading = 0;
            });
        };
    }]);
app.controller('chngpasswordadmin', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.oldpass = "";
        $scope.newpass = "";
        $scope.repass = "";
        $scope.updatepass = function () {
            var data = {'newpass': $scope.newpass};
            if ($scope.newpass == $scope.repass) {
                $rootScope.loading = 1;
                $http.post(site_url + 'admin/admin_changepass', data).success(function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                    $rootScope.loading = 0;
                });
            } else {
                $scope.status = 2;
                $scope.msg = "Password didnot match.";
            }
        };
        $scope.matchpass = function () {
            if ($scope.newpass != $scope.repass) {
                $scope.pstatus = 2;
                $scope.pmsg = "Password didnot match.";
                $scope.repass = "";
            } else {
                $scope.pstatus = 1;
                $scope.pmsg = "Password Match.";
            }
        }
        $scope.checkpass = function () {
            var data = {'oldpass': $scope.oldpass};
            $rootScope.loading = 1;
            $http.post(site_url + 'admin/admin_checkpass', data).success(function (data) {
                $scope.olpstatus = data.status;
                $scope.olpmsg = data.msg;
                if ($scope.olpstatus == 2) {
                    $scope.oldpass = "";
                }
                $rootScope.loading = 0;
            });
        };
    }]);
app.controller('appointmentnotification', ['$scope', '$rootScope', 'filterFilter', '$http', '$modal', function ($scope, $rootScope, filterFilter, $http, $modal) {
        $scope.booklist = [];
        $scope.newstatus = "";
        $scope.profdata = [];
        $rootScope.loading = 1;
        $scope.booking = 0;
        $http.get(site_url + 'prof/prof_book_list').success(function (data) {
            $scope.booklist = data;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.booklist.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        });
        $scope.statusupdate = function (ix, id, status, oldstatus) {
            if (status == "Reschedule") {
                var modalInstance = $modal.open({
                    animation: $scope.animationsEnabled,
                    templateUrl: 'Reschedule.html',
                    controller: 'ModalInstanceCtrl',
                    size: 'md',
                    resolve: {
                        items: function () {
                            return $http.post(site_url + 'user/user_controller/getBookApp', {id: id});
                        }
                    }
                });
                modalInstance.result.then(function (selectedItem) {
                    $scope.selected = selectedItem;
                }, function () {
                    //$log.info('Modal dismissed at: ' + new Date());
                });
            } else {
                var dat = {'id': id, 'status': status};
                var i = confirm('Are You sure to change status of Booked Appointment.');
                if (i) {
                    $rootScope.loading = 1;
                    $http.post(site_url + "prof/prof_bookstatus", dat).success(function (d) {
//                        var data = d.result;
                        $scope.booking = d.status;
                        if (dat.status != "Pending") {
                            var sms = {
                                'user': 'lacaco',
                                'pwd': 'lbs123',
                                'to': d.data.mob,
                                'sid': 'LACACO',
                                'fl': 0,
                                'gwid': 2
                            };
                            if (dat.status == "Approve") {
                                sms['msg'] = 'Your appointment with ' + d.data.cat + '. ' + d.data.fname + ' ' + d.data.lname + ' through ' +
                                        'LACACO.COM [1] on (' + d.data.dt + ') at (' + d.data.ts + ') has been confirmed by the ' +
                                        ' professional.';
                            } else if (dat.status == "Reject") {
                                sms['msg'] = 'We regret to inform you that your appointment with ' + d.data.cat + '. ' + d.data.fname + ' ' + d.data.lname + ' scheduled on (' + d.data.dt + ') at (' + d.data.ts + ') has been cancelled by the ' +
                                        ' professional due to some exigency. Thank you for using LACACO.COM [1].';
                            }
                            var msg = "";
                            $.each(sms, function (k, v) {
                                msg += k + "=" + v + "&";
                            });
                            msg = msg.substring(0, msg.length - 1);
                            var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                        }
                        if (dat.status != "Pending") {
                            var sms = {
                                'user': 'lacaco',
                                'pwd': 'lbs123',
                                'to': d.data.pmob,
                                'sid': 'LACACO',
                                'fl': 0,
                                'gwid': 2
                            };
                            if (dat.status == "Approve") {
                                sms['msg'] = 'Appointment with Mr. / Ms. ' + d.data.name + ' confirmed on (' + d.data.dt + ') at (' + d.data.ts + '). Please ensure you are available on time. You can reschedule the appointment from the website or App.';
                            } else if (dat.status == "Reject") {
                                sms['msg'] = 'Your appointment with Mr. / Ms. ' + d.data.name + ' scheduled on (' + d.data.dt + ') at (' + d.data.ts + ') has been cancelled as per your request. Thank you for using LACACO.COM.';
                            }
                            var msg = "";
                            $.each(sms, function (k, v) {
                                msg += k + "=" + v + "&";
                            });
                            msg = msg.substring(0, msg.length - 1);
                            var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                        }
                        $rootScope.loading = 0;
                        for (i = 0; i < d.length; i++) {
                            if (data[i]['id'] == id) {
                                $scope.booklist[i] = data[i];
                            }
                        }
                        $scope.view = true;
                    });
                } else {
                    $scope.newstatus = "";
                    $scope.booklist[ix].status = oldstatus;
                }
            }
        };
        $scope.animationsEnabled = true;
        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.booklist.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        // pagination controls

        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.booklist, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
    }]);
app.controller('ModalInstanceCtrl', function ($scope, $modalInstance, items, $rootScope, $http) {

    $scope.book = items.data;

    $scope.getTimeSlot = function () {
        var d1 = new Date($scope.book.book_date);
        var dt = dateFormat(d1, "yyyy-mm-dd");
        var nd = dateFormat(new Date(), "yyyy-mm-dd");
        if (getAge(dt) < 0 || dt == nd) {
            var dat = {'id': $scope.book.prof_id, 'dt': dt};
            $rootScope.loading = 1;
            $http.post(site_url + "GetCheckDateTime", dat).success(function (data) {
                $rootScope.loading = 0;
                $scope.timeslots = data;
            });
        } else {
            alert("Please Select date from today onwords.");
            $scope.book.book_date = "";
            $scope.timeslots = [];
        }
    };
    $scope.rescheduleappoint = function () {
        $scope.usercount = 0;
        $http.post(site_url + "user/user_controller/getRescheduleCount", {id: $scope.book.id}).success(function (data) {
            $scope.usercount = parseInt(data.prof_count);

            if ($scope.usercount < 3) {
                var d1 = new Date($scope.book.book_date);
                var dt = dateFormat(d1, "yyyy-mm-dd");
                var nd = dateFormat(new Date(), "yyyy-mm-dd");
                if (getAge(dt) < 0 || dt == nd) {
                    $scope.book.book_date = dt;
                    $scope.book.prof_id = $scope.book.prof_id;
                    $scope.book.reschedule = 1;
                    $rootScope.loading = 1;
                    $scope.book.from = "prof";
                    $http.post(site_url + "Bookappoint", $scope.book).success(function (data) {
                        $rootScope.loading = 0;
                        $scope.status = data.status;
                        $scope.msg = data.msg;
                        $scope.prof = data.data;
                        var sms = {
                            'user': 'lacaco',
                            'pwd': 'lbs123',
                            'to': $scope.book.contact_no,
                            'sid': 'LACACO',
                            'msg': $scope.prof.cat + '. ' + $scope.prof.fname + ' ' + $scope.prof.lname + '  has requested for reschedule the' +
                                    'appointment to ' + $scope.book.book_date + ' at ' + $scope.book.timeslot + ' for appointment requested by you through' +
                                    'LACACO.COM [1]. Kindly log-in to your account on LACACO.COM [1] to' +
                                    'confirm / reschedule the same.',
                            'fl': 0,
                            'gwid': 2
                        };
                        var msg = "";
                        $.each(sms, function (k, v) {
                            msg += k + "=" + v + "&";
                        });
                        var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                    });
                } else {
                    alert("Please Select date from today onwords.");
                    $scope.book.book_date = "";
                    $scope.timeslots = [];
                }
            } else {
                $scope.status = 2;
                $scope.msg = "Your Reschedule Attempt for this Booking is expire.";
            }
        });
    };
    $scope.ok = function () {
        $modalInstance.close($scope.selected.item);
    };
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});
app.controller('bookingnotification', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $http.get(site_url + 'prof/prof_book_list_noti').success(function (data) {
            $scope.booknoti = data;
        });
    }]);
/**
 * addprofessional controller
 */
app.controller('addprofessional', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.terms = 0;
        $scope.selectedFile = [];
        $scope.ex = [];
        $scope.cities = [];
        $rootScope.loading = 1;
        var msec = Date.parse("March 21, 2012 00:00");
        $scope.txt_TimeAviablefrom = new Date(msec);
        $scope.txt_TimeAviableto = new Date(msec);
        $scope.txt_TimeAviablefrome = new Date(msec);
        $scope.txt_TimeAviabletoe = new Date(msec);
        $scope.selectCity = function (id) {
            var data = {'state_name': id};
            $http.post(site_url + 'user/user_controller/getCities', data).success(function (data) {
                $scope.cities = data;
                $rootScope.loading = 0;
            });
        };
        $scope.subcategory = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + 'user/user_controller/getSubCategory/' + id).success(function (data) {
                $scope.service = data;
                $rootScope.loading = 0;
            });
        };
        $scope.showcode = function () {
            if ($scope.service != null) {
                $scope.showlist = !$scope.showlist;
            }
            else {
                alert("Please Select Category ( Lawyer , CA, CS )")
            }

        };
        $scope.formno = "";
        var d = new Date();
        $rootScope.loading = 1;
        $scope.regdate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        $http.post(site_url + 'admin/getRegidtypehead').success(function (data) {
            $scope.formno = data;
            $rootScope.loading = 0;
        });
        $scope.loc = "";
        $http.post(site_url + 'admin/getLoctypehead').success(function (data) {
            $scope.loc = data;
            $rootScope.loading = 0;
        });
        $scope.states = [];
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $scope.days = [{name: 'Monday'},
            {name: 'Tuesday'},
            {name: 'Wednesday'},
            {name: 'Thursday'},
            {name: 'Friday'},
            {name: 'Saturday'},
            {name: 'Sunday'}];
        $scope.daysavail = [];
        $scope.servicelist = [];
        // toggle selection for a given employee by name
        $scope.toggleSelection = function (day) {
            var idx = $scope.daysavail.indexOf(day);
            if (idx > -1) {
                $scope.daysavail.splice(idx, 1);
                $scope.selectalldays = false;
            }
            else {
                $scope.daysavail.push(day);
            }
        };
        $scope.selectall = function () {
            if ($scope.selectalldays) {
                $scope.daysavail = ['Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday'];
            } else {
                $scope.daysavail = [];
            }
        }
        $scope.toggleSelectionService = function (service) {
            var idx = $scope.servicelist.indexOf(service);
            if (idx > -1) {
                $scope.servicelist.splice(idx, 1);
            }
            else {
                $scope.servicelist.push(service);
            }
            if ($scope.servicelist.length > 3) {
                $scope.msg = 'you can only check 3 Services';
                $scope.status = 2;
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
                $scope.servicelist.splice(idx, 1);
                $("#" + service).attr("checked", false);
            }
        };

        $scope.getForm = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getRegForm", data).success(function (data) {

//                alert($scope.ex.length);
                if (data != "false") {
                    $scope.ex = data[0];
                } else {
                    alert('Form no Dose not Exist.Please check Form No.');
                    $('#regid').val('');
                    $scope.ex = {};
                }
                $rootScope.loading = 0;
            });
        };
        $scope.checkemail = function (email) {
            var data = {'email': email};
            $rootScope.loading = 1;
            $http.post(site_url + 'admin/prof_controller/getEmail', data).success(function (data) {
                $scope.estates = data.status;
                $scope.emsg = data.msg;
                $scope.cmail = (data.status === 2) ? 1 : 0;
                $rootScope.loading = 0;
            });
        };
        $scope.onFileSelect = function ($files) {
            $scope.selectedFile = $files;
        };
        $scope.save = function (prof) {
            var obj = {
                days: $scope.daysavail,
                services: $scope.servicelist
            };
//            var file = $scope.selectedFile[0];
//            $rootScope.loading = 1;
            angular.extend(prof, obj);
            prof['txt_RegistrationNo'] = $scope.formno;
            prof['txt_RegDate'] = $scope.regdate;
            var f = $scope.txt_TimeAviablefrom;
            var t = $scope.txt_TimeAviableto;
            var fe = $scope.txt_TimeAviablefrome;
            var te = $scope.txt_TimeAviabletoe;
            var dob = prof['txt_DOB'] + "";
            var co = prof['txt_DateOfCommencment'] + "";
//            alert(co);
            var d = new Date(dob);
            var d1 = new Date(co);
//            alert(d1.toDateString());
            prof['txt_DOB'] = dateFormat(d, "yyyy-mm-dd");
            prof['txt_DateOfCommencment'] = dateFormat(d1, "yyyy-mm-dd");
            prof['txt_RegistrationNo'] = $scope.ex.formno;
            prof['txt_Fname'] = $scope.ex.fname;
            prof['txt_Mname'] = $scope.ex.mname;
            prof['txt_Lname'] = $scope.ex.lname;
            prof['txt_MobileNo'] = $scope.ex.contactno;
//            console.log(f.getHours() + ":" + f.getMinutes(), t.getHours() + ":" + t.getMinutes());
//            console.log(prof['txt_DOB'] + "," + prof['txt_DateOfCommencment']);
            $scope.timeeve = 1;
            var fmi = "", tmi = "";
            if (f.getMinutes() < 10) {
                fmi += "0" + f.getMinutes();
            } else {
                fmi += f.getMinutes();
            }
            if (t.getMinutes() < 10) {
                tmi += "0" + t.getMinutes();
            } else {
                tmi += "" + t.getMinutes();
            }
            var femi = "", temi = "";
            if (fe.getMinutes() < 10) {
                femi += "0" + fe.getMinutes();
            } else {
                femi += fe.getMinutes();
            }
            if (te.getMinutes() < 10) {
                temi += "0" + te.getMinutes();
            } else {
                temi += "" + te.getMinutes();
            }
            //alert(timeCompare(f.getHours() + ":" + fmi, t.getHours() + ":" + tmi));
            $scope.timeeve = 1;
            $scope.timeeve1 = 1;
            $scope.timeeve2 = 1;
            if (timeCompare(f.getHours() + ":" + fmi, t.getHours() + ":" + tmi)) {

                var fx = "" + f.getHours() + ":" + fmi;
                var tx = "" + t.getHours() + ":" + tmi;
                var fex = "" + fe.getHours() + ":" + femi;
                var tex = "" + te.getHours() + ":" + temi;
                var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                $scope.prof['txt_TimeAviable'] = tim;
                $scope.timeeve = 1;
            }
            else {
                if (f.getHours() == 0 && fmi == 0 && t.getHours() == 0 && tmi == 0) {
                    var fex = "" + fe.getHours() + ":" + femi;
                    var tex = "" + te.getHours() + ":" + temi;
                    var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': fex, 'te': tex});
                    $scope.prof['txt_TimeAviable'] = tim;
                    $scope.timeeve = 1;
                } else {
                    alert('Please Check Morning Time From and To');
                    $scope.timeeve = 0;
                }
            }
            if (fe.getHours() != 0) {
                if (timeCompare(t.getHours() + ":" + tmi, fe.getHours() + ":" + femi)) {

                    //alert($scope.txt_TimeAviablefrom.getHours());
                    var fx = "" + f.getHours() + ":" + fmi;
                    var tx = "" + t.getHours() + ":" + tmi;
                    var fex = "" + fe.getHours() + ":" + femi;
                    var tex = "" + te.getHours() + ":" + temi;
                    var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                    $scope.prof['txt_TimeAviable'] = tim;
                }
                else {
                    if (t.getHours() == 0 && tmi == 0 && fe.getHours() == 0 && femi == 0) {
                        var fx = "" + f.getHours() + ":" + fmi;
                        var tx = "" + t.getHours() + ":" + tmi;
                        var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': '00:00', 'te': '00:00'});
                        $scope.prof['txt_TimeAviable'] = tim;
                        $scope.timeeve2 = 1;
                    } else {
                        alert('Please Check Morning End Time and Evening Start Time');
                        $scope.timeeve2 = 0;
                    }
                }
            } else {
                $scope.timeeve2 = 1;
            }
            if (timeCompare(fe.getHours() + ":" + femi, te.getHours() + ":" + temi)) {
                if (fe.getHours() != 0) {
                    if (timeCompare(t.getHours() + ":" + tmi, fe.getHours() + ":" + femi)) {

                        //alert($scope.txt_TimeAviablefrom.getHours());
                        var fx = "" + f.getHours() + ":" + fmi;
                        var tx = "" + t.getHours() + ":" + tmi;
                        var fex = "" + fe.getHours() + ":" + femi;
                        var tex = "" + te.getHours() + ":" + temi;
                        var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                        $scope.prof['txt_TimeAviable'] = tim;
                    }
                    else {
                        if (t.getHours() == 0 && tmi == 0 && fe.getHours() == 0 && femi == 0) {
                            var fx = "" + f.getHours() + ":" + fmi;
                            var tx = "" + t.getHours() + ":" + tmi;
                            var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': '00:00', 'te': '00:00'});
                            $scope.prof['txt_TimeAviable'] = tim;
                            $scope.timeeve2 = 1;
                        } else {
                            alert('Please Check Morning End Time and Evening Start Time');
                            $scope.timeeve2 = 0;
                        }
                    }
                } else {
                    $scope.timeeve2 = 1;
                }
                //alert($scope.txt_TimeAviablefrom.getHours());
            }
            else {
                if (fe.getHours() == 0 && femi == 0 && te.getHours() == 0 && temi == 0) {
                    var fx = "" + f.getHours() + ":" + fmi;
                    var tx = "" + t.getHours() + ":" + tmi;
                    var tim = angular.toJson({'f': fx, 't': tx, 'fe': '00:00', 'te': '00:00'});
                    $scope.prof['txt_TimeAviable'] = tim;
                    $scope.timeeve1 = 1;
                } else {
                    alert('Please Check Evening Time From and To');
                    $scope.timeeve1 = 0;
                }
            }
//            if ($scope.terms) {           
            if ($scope.timeeve) {
                if ($scope.timeeve1) {
                    if ($scope.timeeve2) {
                        if (getAge(prof['txt_DOB']) >= 18) {
                            if (getAge(prof['txt_DateOfCommencment']) >= 0) {
                                if ($scope.cmail == 1) {
                                    if ($scope.timeeve == 1) {
                                        if ($scope.servicelist.length <= 3 && $scope.servicelist.length >= 1) {
                                            $http.post(site_url + 'admin/AddProfssinal1', prof).success(function (data) {
//                                        $rootScope.loading = 0;
                                                $scope.msg = data.msg;
                                                $scope.status = data.status;
                                                $('body,html').animate({
                                                    scrollTop: 0
                                                }, 500);
                                                var sms = {
                                                    'user': 'lacaco',
                                                    'pwd': 'lbs123',
                                                    'to': prof['txt_MobileNo'],
                                                    'sid': 'LACACO',
                                                    'msg': 'Thank you for signing-up with LACACO.com. Kindly e-mail your docs to support@lacaco.com. Your registration will be confirmed after verification of details.',
                                                    'fl': 0,
                                                    'gwid': 2
                                                };
                                                var msg = "";
                                                $.each(sms, function (k, v) {
                                                    msg += k + "=" + v + "&";
                                                });
                                                var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                                            });
                                            setTimeout(function () {
                                                window.location = site_url + "admin/add-professionals";
                                            }, 3000);
                                        } else {
//                alert('Please Select Atleast 1 Servises or maximum 3 servises');
                                            $scope.msg = 'Please Select Atleast 1 Servises or maximum 3 servises';
                                            $scope.status = 1;
                                            $('body,html').animate({
                                                scrollTop: 0
                                            }, 500);
                                        }
                                    } else {
                                        $scope.msg = 'Please check time availability.';
                                        $scope.status = 2;
                                        $('body,html').animate({
                                            scrollTop: 0
                                        }, 500);
                                    }
                                } else {
                                    $scope.msg = 'Email Already Exist Enter another email address.';
                                    $scope.status = 2;
                                    $('body,html').animate({
                                        scrollTop: 0
                                    }, 500);
                                }
                            } else {
                                $scope.msg = 'Please Select DATE OF COMMENCEMENT OF PRACTICE below current date.';
                                $scope.status = 2;
                                $('body,html').animate({
                                    scrollTop: 0
                                }, 500);
                            }
                        } else {
                            $scope.msg = 'Please Select Date of birth age of above 18.';
                            $scope.status = 2;
                            $('body,html').animate({
                                scrollTop: 0
                            }, 500);
                        }
                    } else {
                        $scope.msg = "Please Check Evening End time and evening start time.OR Set it zero";
                        $scope.status = 2;
                        $('body,html').animate({
                            scrollTop: 0
                        }, 500);
                    }
                } else {
                    $scope.msg = "Please Check Evening From time and to time.OR Set it zero";
                    $scope.status = 2;
                    $('body,html').animate({
                        scrollTop: 0
                    }, 500);
                }
            } else {
                $scope.msg = "Please Check Morning From time and to time.OR Set it zero";
                $scope.status = 2;
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
            }
//            }
//            else
//            {
//                $scope.termsmsg = "Please Select Terms and Condtions";
//            }
            //alert(prof['txt_TimeAviable']);
//            prof['txt_RegistrationNo'] = $scope.ex.formno;
//            prof['txt_Fname'] = $scope.ex.fname;
//            prof['txt_Mname'] = $scope.ex.mname;
//            prof['txt_Lname'] = $scope.ex.lname;
//            prof['txt_MobileNo'] = $scope.ex.contactno;

        };
        $scope.today = function () {
            $scope.dt = new Date();
        };
        $scope.today();
        $scope.clear = function () {
            $scope.dt = null;
        };
        // Disable weekend selection
        $scope.disabled = function (date, mode) {
            return (mode === 'day' && (date.getDay() === 0 || date.getDay() === 6));
        };
        $scope.toggleMin = function () {
            $scope.minDate = $scope.minDate ? null : new Date();
        };
        $scope.toggleMin();
        $scope.open = function ($event) {
            $scope.opened = true;
        };
        $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };
        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 2);
        $scope.events =
                [
                    {
                        date: tomorrow,
                        status: 'full'
                    },
                    {
                        date: afterTomorrow,
                        status: 'partially'
                    }
                ];
        $scope.getDayClass = function (date, mode) {
            if (mode === 'day') {
                var dayToCheck = new Date(date).setHours(0, 0, 0, 0);
                for (var i = 0; i < $scope.events.length; i++) {
                    var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);
                    if (dayToCheck === currentDay) {
                        return $scope.events[i].status;
                    }
                }
            }

            return '';
        }
        ;
    }]);
app.controller('exec_form_no', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {

        $scope.getForm = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getRegFormexe", data).success(function (data) {
//                alert($scope.ex.length);
                if (data == "false") {
                    alert('Form no already Exist.Use another Form no.');
                    $('#regid').val('');
                }
                $rootScope.loading = 0;
            });
        };
    }]);
app.controller('edit_professional', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.prof = [];
        $scope.services = [];
        $scope.set_prof = function (prof, service) {
            $scope.prof = prof;
            $scope.services = service;
        };
        $scope.terms = 0;
        $scope.selectedFile = [];
        $scope.ex = [];
        $scope.cities = [];
        $rootScope.loading = 1;
        var msec = Date.parse("March 21, 2012 00:00");
        $scope.txt_TimeAviablefrom = new Date(msec);
        $scope.txt_TimeAviableto = new Date(msec);
        $scope.txt_TimeAviablefrome = new Date(msec);
        $scope.txt_TimeAviabletoe = new Date(msec);
        $scope.selectCity = function (id) {
            var data = {'state_name': id};
            $http.post(site_url + 'user/user_controller/getCities', data).success(function (data) {
                $scope.cities = data;
                $rootScope.loading = 0;
            });
        };
        $scope.formno = "";
        var d = new Date();
        $rootScope.loading = 1;
        $scope.regdate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        $http.post(site_url + 'admin/getRegidtypehead').success(function (data) {
            $scope.formno = data;
            $rootScope.loading = 0;
        });
        $scope.states = [];
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $scope.days = [{name: 'Monday'},
            {name: 'Tuesday'},
            {name: 'Wednesday'},
            {name: 'Thursday'},
            {name: 'Friday'},
            {name: 'Saturday'},
            {name: 'Sunday'}];
        $scope.daysavail = [];
        $scope.servicelist = [];
        // toggle selection for a given employee by name
        $scope.toggleSelection = function (day) {
            var idx = $scope.daysavail.indexOf(day);
            if (idx > -1) {
                $scope.daysavail.splice(idx, 1);
                $scope.selectalldays = false;
            }
            else {
                $scope.daysavail.push(day);
            }
        };
        $scope.selectall = function () {
            if ($scope.selectalldays) {
                $scope.daysavail = ['Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday'];
            } else {
                $scope.daysavail = [];
            }
        }
        $scope.toggleSelectionService = function (service) {
            var idx = $scope.servicelist.indexOf(service);
            if (idx > -1) {
                $scope.servicelist.splice(idx, 1);
            }
            else {
                $scope.servicelist.push(service);
            }
            if ($scope.servicelist.length > 3) {
                alert('you can only check 3 Servises');
                $scope.servicelist.splice(idx, 1);
                $("#" + service).attr("checked", false);
            }
        };
        $scope.getForm = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getRegForm", data).success(function (data) {

//                alert($scope.ex.length);
                if (data != "false") {
                    $scope.ex = data[0];
                } else {
                    $('#regid').val('');
                }
                $rootScope.loading = 0;
            });
        };
        $scope.checkemail = function (email) {
            var data = {'email': email};
            $rootScope.loading = 1;
            $http.post(site_url + 'admin/prof_controller/getEmail', data).success(function (data) {
                $scope.estates = data.status;
                $scope.emsg = data.msg;
                $scope.cmail = (data.status === 2) ? 1 : 0;
                $rootScope.loading = 0;
            });
        };
        $scope.onFileSelect = function ($files) {
            $scope.selectedFile = $files;
        };
        $scope.save = function () {
            var obj = {
                days: $scope.daysavail,
                services: $scope.servicelist
            };
            var file = $scope.selectedFile[0];
            $rootScope.loading = 1;
            angular.extend($scope.prof, obj);
            var dob = $scope.prof['txt_DOB'] + "";
            var co = $scope.prof['txt_DateOfCommencment'] + "";
//            $scope.prof['txt_DOB'] = dob.replace(/(\d*)\/(\d*)\/(\d*)/, '$3-$2-$1');
//            $scope.prof['txt_DateOfCommencment'] = co.replace(/(\d*)\/(\d*)\/(\d*)/, '$3-$2-$1');
            var d = new Date(dob);
            var d1 = new Date(co);
            $scope.prof['txt_DOB'] = dateFormat(d, "yyyy-mm-dd");
//            console.log(f.getHours() + ":" + f.getMinutes(), t.getHours() + ":" + t.getMinutes());
//            console.log($scope.prof['txt_DOB'] + "," + $scope.prof['txt_DateOfCommencment']);
            $scope.timeeve = 1;
            $scope.timeeve1 = 1;
            $scope.timeeve2 = 1;
            if ($scope.txt_TimeAviablefrom.getHours() || $scope.txt_TimeAviableto.getHours() || $scope.txt_TimeAviablefrome.getHours() || $scope.txt_TimeAviabletoe.getHours()) {
                var f = $scope.txt_TimeAviablefrom;
                var t = $scope.txt_TimeAviableto;
                var fe = $scope.txt_TimeAviablefrome;
                var te = $scope.txt_TimeAviabletoe;
                var fmi = "", tmi = "";
                if (f.getMinutes() < 10) {
                    fmi += "0" + f.getMinutes();
                } else {
                    fmi += f.getMinutes();
                }
                if (t.getMinutes() < 10) {
                    tmi += "0" + t.getMinutes();
                } else {
                    tmi += "" + t.getMinutes();
                }
                var femi = "", temi = "";
                if (fe.getMinutes() < 10) {
                    femi += "0" + fe.getMinutes();
                } else {
                    femi += fe.getMinutes();
                }
                if (te.getMinutes() < 10) {
                    temi += "0" + te.getMinutes();
                } else {
                    temi += "" + te.getMinutes();
                }
                //alert(timeCompare(f.getHours() + ":" + fmi, t.getHours() + ":" + tmi));

                if (timeCompare(f.getHours() + ":" + fmi, t.getHours() + ":" + tmi)) {

                    var fx = "" + f.getHours() + ":" + fmi;
                    var tx = "" + t.getHours() + ":" + tmi;
                    var fex = "" + fe.getHours() + ":" + femi;
                    var tex = "" + te.getHours() + ":" + temi;
                    var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                    $scope.prof['txt_TimeAviable'] = tim;
                    $scope.timeeve = 1;
                }
                else {
                    if (f.getHours() == 0 && fmi == 0 && t.getHours() == 0 && tmi == 0) {
                        var fex = "" + fe.getHours() + ":" + femi;
                        var tex = "" + te.getHours() + ":" + temi;
                        var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': fex, 'te': tex});
                        $scope.prof['txt_TimeAviable'] = tim;
                        $scope.timeeve = 1;
                    } else {
                        alert('Please Check Morning Time From and To');
                        $scope.timeeve = 0;
                    }
                }
                if (fe.getHours() != 0) {
                    if (timeCompare(t.getHours() + ":" + tmi, fe.getHours() + ":" + femi)) {

                        //alert($scope.txt_TimeAviablefrom.getHours());
                        var fx = "" + f.getHours() + ":" + fmi;
                        var tx = "" + t.getHours() + ":" + tmi;
                        var fex = "" + fe.getHours() + ":" + femi;
                        var tex = "" + te.getHours() + ":" + temi;
                        var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                        $scope.prof['txt_TimeAviable'] = tim;
                    }
                    else {
                        if (t.getHours() == 0 && tmi == 0 && fe.getHours() == 0 && femi == 0) {
                            var fx = "" + f.getHours() + ":" + fmi;
                            var tx = "" + t.getHours() + ":" + tmi;
                            var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': '00:00', 'te': '00:00'});
                            $scope.prof['txt_TimeAviable'] = tim;
                            $scope.timeeve2 = 1;
                        } else {
                            alert('Please Check Morning End Time and Evening Start Time');
                            $scope.timeeve2 = 0;
                        }
                    }
                } else {
                    $scope.timeeve2 = 1;
                }
                if (timeCompare(fe.getHours() + ":" + femi, te.getHours() + ":" + temi)) {
                    if (fe.getHours() != 0) {
                        if (timeCompare(t.getHours() + ":" + tmi, fe.getHours() + ":" + femi)) {

                            //alert($scope.txt_TimeAviablefrom.getHours());
                            var fx = "" + f.getHours() + ":" + fmi;
                            var tx = "" + t.getHours() + ":" + tmi;
                            var fex = "" + fe.getHours() + ":" + femi;
                            var tex = "" + te.getHours() + ":" + temi;
                            var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                            $scope.prof['txt_TimeAviable'] = tim;
                        }
                        else {
                            if (t.getHours() == 0 && tmi == 0 && fe.getHours() == 0 && femi == 0) {
                                var fx = "" + f.getHours() + ":" + fmi;
                                var tx = "" + t.getHours() + ":" + tmi;
                                var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': '00:00', 'te': '00:00'});
                                $scope.prof['txt_TimeAviable'] = tim;
                                $scope.timeeve2 = 1;
                            } else {
                                alert('Please Check Morning End Time and Evening Start Time');
                                $scope.timeeve2 = 0;
                            }
                        }
                    } else {
                        $scope.timeeve2 = 1;
                    }
                    //alert($scope.txt_TimeAviablefrom.getHours());
                }
                else {
                    if (fe.getHours() == 0 && femi == 0 && te.getHours() == 0 && temi == 0) {
                        var fx = "" + f.getHours() + ":" + fmi;
                        var tx = "" + t.getHours() + ":" + tmi;
                        var tim = angular.toJson({'f': fx, 't': tx, 'fe': '00:00', 'te': '00:00'});
                        $scope.prof['txt_TimeAviable'] = tim;
                        $scope.timeeve1 = 1;
                    } else {
                        alert('Please Check Evening Time From and To');
                        $scope.timeeve1 = 0;
                    }
                }
            }
            if ($scope.timeeve) {
                if ($scope.timeeve1) {
                    if ($scope.timeeve2) {
                        if (getAge($scope.prof['txt_DOB']) >= 18) {
                            if (getAge($scope.prof['txt_DateOfCommencment']) >= 0) {
                                if ($scope.timeeve == 1) {

                                    $http.post(site_url + 'prof/editProfssinal', $scope.prof).success(function (data) {
                                        $scope.msg = data.msg;
                                        $scope.status = data.status;
                                        $('body,html').animate({
                                            scrollTop: 0
                                        }, 500);
                                        $rootScope.loading = 0;
                                    });
                                } else {
                                    $scope.msg = 'Please check time availability.';
                                    $scope.status = 1;
                                    $rootScope.loading = 0;
                                    $('body,html').animate({
                                        scrollTop: 0
                                    }, 500);
                                }
                            } else {
                                $scope.msg = 'Please Select DATE OF COMMENCEMENT OF PRACTICE below current date.';
                                $scope.status = 1;
                                $rootScope.loading = 0;
                                $('body,html').animate({
                                    scrollTop: 0
                                }, 500);
                            }
                        } else {
                            $scope.msg = 'Please Select Date of birth age of above 18.';
                            $scope.status = 1;
                            $rootScope.loading = 0;
                            $('body,html').animate({
                                scrollTop: 0
                            }, 500);
                        }
                    } else {
                        $scope.msg = "Please Check Evening End time and evening start time.OR Set it zero";
                        $scope.status = 2;
                        $rootScope.loading = 0;
                        $('body,html').animate({
                            scrollTop: 0
                        }, 500);
                    }
                } else {
                    $scope.msg = "Please Check Evening From time and to time.OR Set it zero";
                    $scope.status = 2;
                    $rootScope.loading = 0;
                    $('body,html').animate({
                        scrollTop: 0
                    }, 500);
                }
            } else {
                $scope.msg = "Please Check Morning From time and to time.OR Set it zero";
                $scope.status = 2;
                $rootScope.loading = 0;
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
            }

            //alert($scope.prof['txt_TimeAviable']);
//            $scope.prof['txt_RegistrationNo'] = $scope.ex.formno;
//            $scope.prof['txt_Fname'] = $scope.ex.fname;
//            $scope.prof['txt_Mname'] = $scope.ex.mname;
//            $scope.prof['txt_Lname'] = $scope.ex.lname;
//            $scope.prof['txt_MobileNo'] = $scope.ex.contactno;

        };
        $scope.subcategory = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + 'user/user_controller/getSubCategory/' + id).success(function (data) {
                $scope.service = data;
                $rootScope.loading = 0;
            });
        };
        $scope.today = function () {
            $scope.dt = new Date();
        };
        $scope.today();
        $scope.clear = function () {
            $scope.dt = null;
        };
        // Disable weekend selection
        $scope.disabled = function (date, mode) {
            return (mode === 'day' && (date.getDay() === 0 || date.getDay() === 6));
        };
        $scope.toggleMin = function () {
            $scope.minDate = $scope.minDate ? null : new Date();
        };
        $scope.toggleMin();
        $scope.open = function ($event) {
            $scope.opened = true;
        };
        $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };
        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 2);
        $scope.events =
                [
                    {
                        date: tomorrow,
                        status: 'full'
                    },
                    {
                        date: afterTomorrow,
                        status: 'partially'
                    }
                ];
        $scope.getDayClass = function (date, mode) {
            if (mode === 'day') {
                var dayToCheck = new Date(date).setHours(0, 0, 0, 0);
                for (var i = 0; i < $scope.events.length; i++) {
                    var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);
                    if (dayToCheck === currentDay) {
                        return $scope.events[i].status;
                    }
                }
            }

            return '';
        }
        ;
    }]);
/**
 * 
 * @param {type} param1
 * @param {type} param2
 * fileModel directive
 */
app.directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;
                element.bind('change', function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]);
app.directive('appFilereader', function ($q) {
    var slice = Array.prototype.slice;
    return {
        restrict: 'A',
        require: '?ngModel',
        link: function (scope, element, attrs, ngModel) {
            if (!ngModel)
                return;
            ngModel.$render = function () {
            };
            element.bind('change', function (e) {
                var element = e.target;
                $q.all(slice.call(element.files, 0).map(readFile))
                        .then(function (values) {
                            if (element.multiple)
                                ngModel.$setViewValue(values);
                            else
                                ngModel.$setViewValue(values.length ? values[0] : null);
                        });
                function readFile(file) {
                    var deferred = $q.defer();
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        deferred.resolve(e.target.result);
                    };
                    reader.onerror = function (e) {
                        deferred.reject(e);
                    };
                    reader.readAsDataURL(file);
                    return deferred.promise;
                }

            }); //change

        } //link
    }; //return
});
/**
 * add professional from user controller 
 */
app.controller('addprofessionaluser', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.terms = 0;
        $scope.selectedFile = [];
        $scope.ex = [];
        $scope.cities = [];
        $rootScope.loading = 1;
        $scope.daysavail = [];
        $scope.servicelist = [];
        var msec = Date.parse("March 21, 2012 00:00");
        $scope.txt_TimeAviablefrom = new Date(msec);
        $scope.txt_TimeAviableto = new Date(msec);
        $scope.txt_TimeAviablefrome = new Date(msec);
        $scope.txt_TimeAviabletoe = new Date(msec);
        $scope.selectCity = function (id) {
            var data = {'state_name': id};
            $http.post(site_url + 'user/user_controller/getCities', data).success(function (data) {
                $scope.cities = data;
                $rootScope.loading = 0;
            });
        };
        /* 	
         $scope.subcategory = function (id) {
         $rootScope.loading = 1;
         $http.post(site_url + 'user/user_controller/getSubCategory/' + id).success(function (data) {
         $scope.service = data;
         $rootScope.loading = 0;
         });
         };
         */
        $scope.showcode = function () {
            if ($scope.service != null) {
                $scope.showlist = !$scope.showlist;
            }
            else {
                alert("Please Select Category ( Lawyer , CA, CS )")
            }

        };
        $scope.formno = "";
        var d = new Date();
        $scope.regdate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        $http.post(site_url + 'admin/getRegidCheck').success(function (data) {
            $scope.formno = data;
        });
        $scope.loc = "";
        $http.post(site_url + 'admin/getLoctypehead').success(function (data) {
            $scope.loc = data;
            $rootScope.loading = 0;
        });
        $scope.getLoc = function (c) {
            alert();
            var da = {'c': c};
            $http.post(site_url + 'admin/getLoctypeheadId', da).success(function (data) {
                $scope.loc = data;
                $rootScope.loading = 0;
            });
        }
        $scope.states = [];
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $scope.checkemail = function (email) {
            var data = {'email': email};
            $rootScope.loading = 1;
            $http.post(site_url + 'admin/prof_controller/getEmail', data).success(function (data) {
                $scope.estates = data.status;
                $scope.emsg = data.msg;
                $scope.cmail = (data.status === 2) ? 1 : 0;
                $rootScope.loading = 0;
            });
        };
        $scope.days = [{name: 'Monday'},
            {name: 'Tuesday'},
            {name: 'Wednesday'},
            {name: 'Thursday'},
            {name: 'Friday'},
            {name: 'Saturday'},
            {name: 'Sunday'}];
        $scope.selectall = function () {
            if ($scope.selectalldays) {
                $scope.daysavail = ['Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday'];
            } else {
                $scope.daysavail = [];
            }
        };
        // toggle selection for a given employee by name
        $scope.toggleSelection = function (day) {
            var idx = $scope.daysavail.indexOf(day);
            if (idx > -1) {
                $scope.daysavail.splice(idx, 1);
                $scope.selectalldays = false;
            }
            else {
                $scope.daysavail.push(day);
            }
        };
        $scope.toggleSelectionService = function (service) {
            var idx = $scope.servicelist.indexOf(service);
            if (idx > -1) {
                $scope.servicelist.splice(idx, 1);
            }
            else {
                $scope.servicelist.push(service);
            }
            if ($scope.servicelist.length > 3) {
                $scope.msg = 'you can only check 3 Services';
                $scope.status = 2;
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
                $scope.servicelist.splice(idx, 1);
                $("#" + service).attr("checked", false);
            }
        };
        $scope.getForm = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getRegForm", data).success(function (data) {
                $rootScope.loading = 0;
//                alert($scope.ex.length);
                if (data != "false") {
                    $scope.ex = data[0];
                } else {
                    $('#regid').val('');
                }
            });
        };
        $scope.onFileSelect = function ($files) {
            $scope.selectedFile = $files;
        };
//        $scope.$watch('file', function (file) {
//            $scope.selectedFile = $scope.file;
//        });
        $scope.save = function (prof) {
            var obj = {
                days: $scope.daysavail,
                services: $scope.servicelist
            };
            var file = $scope.selectedFile[0];
//            var file = $scope.selectedFile[0];
            $rootScope.loading = 1;
            angular.extend(prof, obj);
            prof['txt_RegistrationNo'] = $scope.formno;
            prof['txt_RegDate'] = $scope.regdate;
            var f = $scope.txt_TimeAviablefrom;
            var t = $scope.txt_TimeAviableto;
            var fe = $scope.txt_TimeAviablefrome;
            var te = $scope.txt_TimeAviabletoe;
            var dob = prof['txt_DOB'] + "";
            var co = prof['txt_DateOfCommencment'] + "";
//            prof['txt_DOB'] = dob.replace(/(\d*)\/(\d*)\/(\d*)/, '$3-$2-$1');
//            prof['txt_DateOfCommencment'] = co.replace(/(\d*)\/(\d*)\/(\d*)/, '$3-$2-$1');
            var d = new Date(dob);
            var d1 = new Date(co);
            prof['txt_DOB'] = dateFormat(d, "yyyy-mm-dd");
            prof['txt_DateOfCommencment'] = dateFormat(d1, "yyyy-mm-dd");
//            console.log(f.getHours() + ":" + f.getMinutes(), t.getHours() + ":" + t.getMinutes());
//            console.log(prof['txt_DOB'] + "," + prof['txt_DateOfCommencment']);
            $scope.timeeve = 1;
            var fmi = "", tmi = "";
            if (f.getMinutes() < 10) {
                fmi += "0" + f.getMinutes();
            } else {
                fmi += f.getMinutes();
            }
            if (t.getMinutes() < 10) {
                tmi += "0" + t.getMinutes();
            } else {
                tmi += "" + t.getMinutes();
            }
            var femi = "", temi = "";
            if (fe.getMinutes() < 10) {
                femi += "0" + fe.getMinutes();
            } else {
                femi += fe.getMinutes();
            }
            if (te.getMinutes() < 10) {
                temi += "0" + te.getMinutes();
            } else {
                temi += "" + te.getMinutes();
            }
            //alert(timeCompare(f.getHours() + ":" + fmi, t.getHours() + ":" + tmi));
            $scope.timeeve = 1;
            $scope.timeeve1 = 1;
            $scope.timeeve2 = 1;
            if (timeCompare(f.getHours() + ":" + fmi, t.getHours() + ":" + tmi)) {

                var fx = "" + f.getHours() + ":" + fmi;
                var tx = "" + t.getHours() + ":" + tmi;
                var fex = "" + fe.getHours() + ":" + femi;
                var tex = "" + te.getHours() + ":" + temi;
                var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                $scope.prof['txt_TimeAviable'] = tim;
                $scope.timeeve = 1;
            }
            else {
                if (f.getHours() == 0 && fmi == 0 && t.getHours() == 0 && tmi == 0) {
                    var fex = "" + fe.getHours() + ":" + femi;
                    var tex = "" + te.getHours() + ":" + temi;
                    var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': fex, 'te': tex});
                    $scope.prof['txt_TimeAviable'] = tim;
                    $scope.timeeve = 1;
                } else {
//                    alert('Please Check Morning Time From and To');
                    $scope.msg = 'Please Check Morning Time From and To';
                    $scope.status = 2;
                    $('body,html').animate({scrollTop: 0
                    }, 500);
                    $scope.timeeve = 0;
                }
            }
            if (fe.getHours() != 0) {
                if (timeCompare(t.getHours() + ":" + tmi, fe.getHours() + ":" + femi)) {

                    //alert($scope.txt_TimeAviablefrom.getHours());
                    var fx = "" + f.getHours() + ":" + fmi;
                    var tx = "" + t.getHours() + ":" + tmi;
                    var fex = "" + fe.getHours() + ":" + femi;
                    var tex = "" + te.getHours() + ":" + temi;
                    var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                    $scope.prof['txt_TimeAviable'] = tim;
                }
                else {
                    if (t.getHours() == 0 && tmi == 0 && fe.getHours() == 0 && femi == 0) {
                        var fx = "" + f.getHours() + ":" + fmi;
                        var tx = "" + t.getHours() + ":" + tmi;
                        var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': '00:00', 'te': '00:00'});
                        $scope.prof['txt_TimeAviable'] = tim;
                        $scope.timeeve2 = 1;
                    } else {
//                        alert('Please Check Morning End Time and Evening Start Time');
                        $scope.timeeve2 = 0;
                        $scope.msg = 'Please Check Morning End Time and Evening Start Time';
                        $scope.status = 2;
                        $('body,html').animate({scrollTop: 0
                        }, 500);
                    }
                }
            } else {
                $scope.timeeve2 = 1;
            }
            if (timeCompare(fe.getHours() + ":" + femi, te.getHours() + ":" + temi)) {
                if (fe.getHours() != 0) {
                    if (timeCompare(t.getHours() + ":" + tmi, fe.getHours() + ":" + femi)) {

                        //alert($scope.txt_TimeAviablefrom.getHours());
                        var fx = "" + f.getHours() + ":" + fmi;
                        var tx = "" + t.getHours() + ":" + tmi;
                        var fex = "" + fe.getHours() + ":" + femi;
                        var tex = "" + te.getHours() + ":" + temi;
                        var tim = angular.toJson({'f': fx, 't': tx, 'fe': fex, 'te': tex});
                        $scope.prof['txt_TimeAviable'] = tim;
                    }
                    else {
                        if (t.getHours() == 0 && tmi == 0 && fe.getHours() == 0 && femi == 0) {
                            var fx = "" + f.getHours() + ":" + fmi;
                            var tx = "" + t.getHours() + ":" + tmi;
                            var tim = angular.toJson({'f': '00:00', 't': '00:00', 'fe': '00:00', 'te': '00:00'});
                            $scope.prof['txt_TimeAviable'] = tim;
                            $scope.timeeve2 = 1;
                        } else {
                            alert();
                            $scope.timeeve2 = 0;
                            $scope.msg = 'Please Check Morning End Time and Evening Start Time';
                            $scope.status = 2;
                            $('body,html').animate({scrollTop: 0
                            }, 500);
                        }
                    }
                } else {
                    $scope.timeeve2 = 1;
                }
                //alert($scope.txt_TimeAviablefrom.getHours());
            }
            else {
                if (fe.getHours() == 0 && femi == 0 && te.getHours() == 0 && temi == 0) {
                    var fx = "" + f.getHours() + ":" + fmi;
                    var tx = "" + t.getHours() + ":" + tmi;
                    var tim = angular.toJson({'f': fx, 't': tx, 'fe': '00:00', 'te': '00:00'});
                    $scope.prof['txt_TimeAviable'] = tim;
                    $scope.timeeve1 = 1;
                } else {
                    alert('Please Check Evening Time From and To');
                    $scope.timeeve1 = 0;
                }
            }
            if ($scope.timeeve) {
                if ($scope.timeeve1) {
                    if ($scope.timeeve2) {
                        if ($scope.terms) {
                            if (getAge(prof['txt_DOB']) >= 18) {
                                if (getAge(prof['txt_DateOfCommencment']) >= 0) {
                                    if ($scope.cmail == 1) {
                                        if ($scope.servicelist.length <= 3 && $scope.servicelist.length >= 1) {
                                            $http.post(site_url + 'admin/AddProfssinal', prof).success(function (data) {
                                                //                        prof['file']=file;
                                                //                        $http.post(site_url + 'admin/AddProfssinal', prof, {
                                                //                            headers: {'Content-Type': undefined}
                                                //                        }).success(function (data) {
//                        Upload.upload({
//                            url: site_url + 'admin/AddProfssinal',
//                            method: 'POST',
                                                //                            data: angular.toJson(prof),
                                                //                            file: file
                                                //                        }).success(function (data) {
                                                $scope.msg = data.msg;
                                                $scope.status = data.status;
                                                $('body,html').animate({
                                                    scrollTop: 0
                                                }, 500);
                                                $rootScope.loading = 0;
                                                var sms = {
                                                    'user': 'lacaco',
                                                    'pwd': 'lbs123',
                                                    'to': prof['txt_MobileNo'],
                                                    'sid': 'LACACO',
                                                    'msg': 'Thank you for signing-up with LACACO.com. Kindly e-mail your docs to support@lacaco.com. Your registration will be confirmed after verification of details.',
                                                    'fl': 0,
                                                    'gwid': 2
                                                };
                                                var msg = "";
                                                $.each(sms, function (k, v) {
                                                    msg += k + "=" + v + "&";
                                                });
                                                var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                                                setTimeout(function () {
                                                    window.location.replace(site_url + "RegistertoPdf/" + data.id);
                                                }, 1000);
                                            });
                                        } else {
                                            $rootScope.loading = 0;
                                            //                alert('Please Select Atleast 1 Servises or maximum 3 servises');
                                            $scope.msg = 'Please Select Atleast 1 Servises or maximum 3 servises';
                                            $scope.status = 2;
                                            $('body,html').animate({
                                                scrollTop: 0
                                            }, 500);
                                        }
                                    } else {
                                        $rootScope.loading = 0;
                                        $scope.msg = 'Email Already Exist Enter another email address.';
                                        $scope.status = 2;
                                        $('body,html').animate({
                                            scrollTop: 0
                                        }, 500);
                                    }
                                } else {
                                    $rootScope.loading = 0;
                                    $scope.msg = 'Please Select DATE OF COMMENCEMENT OF PRACTICE below current date.';
                                    $scope.status = 2;
                                    $('body,html').animate({scrollTop: 0
                                    }, 500);
                                }
                            } else {
                                $rootScope.loading = 0;
                                $scope.msg = 'Please Select Date of birth age of above 18.';
                                $scope.status = 2;
                                $('body,html').animate({scrollTop: 0
                                }, 500);
                            }
                        }
                        else
                        {
                            $rootScope.loading = 0;
                            $scope.termsmsg = "Please Select Terms and Condtions";
                            $scope.status = 2;
                            $('body,html').animate({scrollTop: 0
                            }, 500);
                        }
                    } else {
                        $rootScope.loading = 0;
                        $scope.msg = "Please Check Evening End time and evening start time.OR Set it zero";
                        $scope.status = 2;
                        $('body,html').animate({scrollTop: 0
                        }, 500);
                    }
                } else {
                    $rootScope.loading = 0;
                    $scope.msg = "Please Check Evening From time and to time.OR Set it zero";
                    $scope.status = 2;
                    $('body,html').animate({scrollTop: 0
                    }, 500);
                }
            } else {
                $rootScope.loading = 0;
                $scope.msg = "Please Check Morning From time and to time.OR Set it zero";
                $scope.status = 2;
                $('body,html').animate({scrollTop: 0
                }, 500);
            }


            //alert(prof['txt_TimeAviable']);
            //            prof['txt_RegistrationNo'] = $scope.ex.formno;
            //            prof['txt_Fname'] = $scope.ex.fname;
            //            prof['txt_Mname'] = $scope.ex.mname;
            //            prof['txt_Lname'] = $scope.ex.lname;
            //            prof['txt_MobileNo'] = $scope.ex.contactno;

        };
        $scope.subcategory = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + 'user/user_controller/getSubCategory/' + id).success(function (data) {
                $scope.service = data;
                $rootScope.loading = 0;
            });
        };
        $scope.today = function () {
            $scope.txt_DOB = new Date();
        };
        $scope.today();
        $scope.clear = function () {
            $scope.txt_DOB = null;
        };
        // Disable weekend selection
        $scope.disabled = function (date, mode) {
            return (mode === 'day' && (date.getDay() === 0 || date.getDay() === 6));
        };
        $scope.toggleMin = function () {
            $scope.minDate = $scope.minDate ? null : new Date();
        };
        $scope.toggleMin();
        $scope.open = function ($event) {
            $scope.opened = true;
        };
        $scope.dateOptions = {formatYear: 'yy',
            startingDay: 1
        };
        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = "dd-MM-yyyy";
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 2);
        $scope.events =
                [{
                        date: tomorrow,
                        status: 'full'
                    }, {
                        date: afterTomorrow,
                        status: 'partially'
                    }
                ];
        $scope.getDayClass = function (date, mode) {
            if (mode === 'day') {
                var dayToCheck = new Date(date).setHours(0, 0, 0, 0);
                for (var i = 0; i < $scope.events.length; i++) {
                    var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);
                    if (dayToCheck === currentDay) {
                        return $scope.events[i].status;
                    }
                }
            }

            return '';
        }
        ;
    }]);
/**
 * Time compare Function
 * @param {String} startTime
 * @param {String} endTime
 * @returns {Boolean}
 */

/**
 * file directive
 */
app.directive('file', function () {
    return {
        scope: {
            file: '='
        },
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var file = event.target.files[0];
                scope.file = file ? file : undefined;
                scope.$apply();
            });
        }
    };
});
/**
 * Professional List Controller
 */
app.controller('prof_list', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.proflist = [];
        $scope.profdata = [];
        $rootScope.loading = 1;
        $http.get(site_url + 'admin/listprof').success(function (data) {
            $scope.proflist = data;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.proflist.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        });
        $scope.viewprof = function (id) {
            var i = parseInt(id);
            window.location.replace(site_url + "admin/ViewProfessional/" + i);
        };
        $scope.deleterow = function (id) {
            var data = {'id': id};
            var i = confirm('Are You sure to Delete professional.');
            if (i) {
                $rootScope.loading = 1;
                $http.post(site_url + "admin/getProfDeleteId", data).success(function (d) {
                    $scope.delstatus = d.status;
                    $scope.proflist = d.res;
                    $rootScope.loading = 0;
                });
            }
        };
        $scope.statusupdate = function (ix, id) {
            var data = {'id': id};
            var i = confirm('Are You sure to change status of professional.');
            if (i) {
                $rootScope.loading = 1;
                $http.post(site_url + "admin/getProfApproveId", data).success(function (d) {
                    var dt = d.result;
                    if (d.mail) {
                        var sms = {
                            'user': 'lacaco',
                            'pwd': 'lbs123',
                            'to': d.mail.mob,
                            'sid': 'LACACO',
                            'msg': 'Welcome to LACACO.com. Your registration is confirmed. Login ID: ' + d.mail.username + ' Password: ' + d.mail.pass + ' Happy Networking!',
                            'fl': 0,
                            'gwid': 2
                        };
                        var msg = "";
                        $.each(sms, function (k, v) {
                            msg += k + "=" + v + "&";
                        });
                        msg = msg.substring(0, msg.length - 1);
                        var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                    }
                    $rootScope.loading = 0;
                    for (i = 0; i < dt.length; i++) {
                        if (dt[i]['id'] == id) {
                            $scope.proflist[i] = dt[i];
                        }
                    }
                    $scope.view = true;
                });
            }
        };
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.proflist.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        // pagination controls
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.proflist, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.predicate = 'status';
        $scope.reverse = true;
        $scope.order = function (predicate) {
            $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
            $scope.predicate = predicate;
        };
    }]);
/**
 * Professional View Controller
 */
app.controller('viewprofessional', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.content = function (data, service) {
            $scope.profd = data;
            $scope.service = service;
        };
        $scope.cities = [];
        $rootScope.loading = 1;
        $scope.txt_TimeAviablefrom = new Date();
        $scope.txt_TimeAviableto = new Date();
        $scope.txt_TimeAviablefrome = new Date();
        $scope.txt_TimeAviabletoe = new Date();
        $http.post(site_url + 'user/user_controller/getCities').success(function (data) {
            $scope.cities = data;
            $rootScope.loading = 0;
        });
        $scope.states = [];
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $scope.days = [{name: 'Sunday'},
            {name: 'Monday'},
            {name: 'Tuesday'}, {name: 'Wednesday'},
            {name: 'Thursday'},
            {name: 'Friday'},
            {name: 'Saturday'}];
        $scope.statusupdate = function (id) {
            var data = {'id': id};
            var i = confirm('Are You sure to change status of professional.');
            if (i) {
                $rootScope.loading = 1;
                $http.post(site_url + "admin/getProfApproveId", data).success(function (d) {
                    var data = d.result;
                    if (d.mail) {
                        var sms = {
                            'user': 'lacaco',
                            'pwd': 'lbs123',
                            'to': d.mail.mob,
                            'sid': 'LACACO',
                            'msg': 'Welcome to LACACO.com. Your registration is confirmed. Login ID: ' + d.mail.username + ' Password: ' + d.mail.pass + ' Happy Networking!',
                            'fl': 0,
                            'gwid': 2
                        };
                        var msg = "";
                        $.each(sms, function (k, v) {
                            msg += k + "=" + v + "&";
                        });
                        msg = msg.substring(0, msg.length - 1);
                        var sms1 = $http.get('http://dnd.softzeal.com/smsapi/pushsms.aspx?' + msg);
                    }
                    $rootScope.loading = 0;
                    window.location.replace(site_url + 'admin/ViewProfessional/' + id);
                });
            }
        };
    }]);
/**
 * Add Admin User Controller
 */
app.controller('AddUser', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.status = 0;
        $scope.msg = "";
        $scope.status1 = 0;
        $scope.checkmail = function (email) {
            $rootScope.loading = 1;
            var d = {email: email};
            $http.post(site_url + "admin/admin_controller/checkmail", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status1 = data.status;
                $scope.error1 = data.msg;
                if ($scope.status1 == "1") {
                    $('#email').val("");
                }
            });
        }
        $scope.save = function (user) {
            $rootScope.loading = 1;
            if ($scope.status1 == 2) {
                if (user.pass == user.repass) {
                    $http.post(site_url + 'admin/addUser', user).success(function (data) {
                        $scope.status = data.status;
                        $scope.msg = data.msg;
                        $rootScope.loading = 0;
                        setTimeout(function () {
                            window.location = site_url + "admin/listUsers";
                        }, 1000);
                        //                    $('#addadminuser').reset();
                        $('#addadminuser').trigger("reset");
                    });
                } else {
                    $scope.status = 0;
                    $scope.msg = "Password didnt match.";
                }
            } else {
                $rootScope.loading = 0;
                $scope.status = 0;
                $scope.msg = "Please Chech email.";
            }
        };
        $scope.checkmob = function (mob) {
            if (RegExp('[0-9]') == mob) {
                return true;
            } else {
                $('#mob').val("");
                return false;

            }
        }
    }]);
/**
 * Add Category Controller
 */
app.controller('AddCategory', ['$scope', '$rootScope', '$http', 'getMainCategory', function ($scope, $rootScope, $http, getMainCategory) {
        $scope.status = 0;
        $scope.msg = "";
        $scope.mainCategory = [];
        $rootScope.loading = 1;
        getMainCategory.getCategory().success(function (data) {
            $scope.mainCategory = data;
            $rootScope.loading = 0;
        });
        $scope.save = function (category) {
            $rootScope.loading = 1;
            if (category.subCategory != "") {
                $http.post(site_url + 'admin/addCategory', category).success(function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                    $rootScope.loading = 0;
                });
                setTimeout(function () {
                    window.location = site_url + "admin/listCategory";
                }, 1000);
            } else {
                $scope.status = 0;
                $scope.msg = "Please Enter Sub-category.";

            }
        };
    }]);
/**
 * MainCategory Factory
 * @param {type} param1
 * @param {type} param2  */
app.factory('getMainCategory', function ($http) {
    var factory = [];
    factory.getCategory = function () {
        return $http.post(site_url + 'user/user_controller/getMainCategory');
    };
    return factory;
});
/**  * startFrom For Pagination
 * @param {type} param1  * @param {type} param2
 */
app.filter('startFrom', function () {
    return function (input, start) {
        if (!input || !input.length) {
            return;
        }
        start = +start; //parse to int
        return input.slice(start);
    };
});
/**
 * Listing for admin user controller
 */
app.controller('user_list', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.userList = {};
        $scope.adminUser = [];
        $scope.userData = [];
        $rootScope.loading = 1;
        $http.get(site_url + 'admin/listAllUsers').success(function (data) {
            $scope.userList = data;
            $rootScope.loading = 0;
            // pagination controls
            $scope.currentPage = 1;
            $scope.totalItems = $scope.userList.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.userList.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.viewprof = function (id) {
            window.location.replace(site_url + "admin/editUser/" + id);
        };
        $scope.checkmail = function (email) {
            $rootScope.loading = 1;
            var d = {email: email};
            $http.post(site_url + "admin/admin_controller/checkmail", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status1 = data.status;
                $scope.error1 = data.msg;
                if ($scope.status1 == "2") {
                    $('#email').val("");
                }
            });
        }
        $scope.statusUpdate = function (ix, id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getUserApproveId", data).success(function (d) {

                $rootScope.loading = 0;
                for (i = 0; i < d.length; i++) {
                    if (d[i]['id'] == id) {
                        $scope.userList[i] = d[i];
                    }
                }

                $scope.view = true;
            });
        };
        $scope.search = "";
        $scope.resetFilters = function () {             // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.userList, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.editview = 0;
        $scope.viewuser = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/editUser/" + id).success(function (data) {
                $scope.adminUser = data.data[0];
                $scope.editview = data.status;
                $rootScope.loading = 0;
            });
        };
        $scope.editclose = function () {
            $scope.editview = !$scope.editview;
        };
        $scope.update = function () {
            $rootScope.loading = 1;
            var id = $scope.adminUser.id;
            $http.post(site_url + "admin/updateUser", $scope.adminUser).success(function (data) {
                $rootScope.loading = 0;
                $scope.msg = data.msg;
                for (i = 0; i < data.data.length; i++) {
                    if (data.data[i]['id'] == id) {
                        $scope.userList[i] = data.data[i];
                        //                        alert(data.data[i].id);

                    }
                }
                setTimeout(function () {
                    window.location = site_url + "admin/listUsers";
                }, 1000);
                $scope.status = data.status;
//                $('#editadminuser').reset();
                $('#editadminuser').trigger("reset");
            });
        };
    }]);
/**
 * Listing for End User controller
 */
app.controller('end_user_list', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.userList = {};
        $scope.adminUser = [];
        $scope.userData = [];
        $rootScope.loading = 1;
        $http.get(site_url + 'admin/listAllEndUsers').success(function (data) {
            $scope.userList = data;
            $rootScope.loading = 0;
            // pagination controls
            $scope.currentPage = 1;
            $scope.totalItems = $scope.userList.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.userList.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.viewprof = function (id) {
            window.location.replace(site_url + "admin/editEndUser/" + id);
        };
        $scope.statusUpdate = function (ix, id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getEndUserApproveId", data).success(function (d) {
                $rootScope.loading = 0;
                for (i = 0; i < d.length; i++) {
                    if (d[i]['id'] == id) {
                        $scope.userList[i] = d[i];
                    }
                }

                $scope.view = true;
            });
        };
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.userList, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.editview = 0;
        $scope.viewuser = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/editEndUser/" + id).success(function (data) {
                $scope.adminUser = data.data[0];
                $scope.editview = data.status;
                $rootScope.loading = 0;
            });
        };
        $scope.editclose = function () {
            $scope.editview = !$scope.editview;
        };
        $scope.update = function () {
            $rootScope.loading = 1;
            var id = $scope.adminUser.id;
            $http.post(site_url + "admin/updateEndUser", $scope.adminUser).success(function (data) {
                $rootScope.loading = 0;
                $scope.msg = data.msg;
                for (i = 0; i < data.data.length; i++) {
                    if (data.data[i]['id'] == id) {
                        $scope.userList[i] = data.data[i];
//                        alert(data.data[i].id);

                    }
                }
                setTimeout(function () {
                    window.location = site_url + "admin/listEndUsers";
                }, 1000);
                $scope.status = data.status;
            });
            setTimeout(function () {
                $scope.msg = !$scope.msg;
                $scope.editview = !$scope.editview;
            }, 1000);
        };
    }]);
/**
 * Listing For Category
 */
app.controller('category_list', ['$scope', '$rootScope', 'filterFilter', '$http', 'getMainCategory', function ($scope, $rootScope, filterFilter, $http, getMainCategory) {
        $scope.categoryList = {};
        $scope.userData = [];
        $rootScope.loading = 1;
        $scope.editview = 0;
        $http.get(site_url + 'admin/listAllCategory').success(function (data) {
            //alert(data);
            $scope.categoryList = data;
            $rootScope.loading = 0; // pagination controls
            $scope.currentPage = 1;
            $scope.totalItems = $scope.categoryList.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.categoryList.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.viewprof = function (id) {
            window.location.replace(site_url + "admin/editCategory/" + id);
        };
        $scope.statusUpdate = function (ix, id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getCategoryApproveId", data).success(function (data) {
                for (i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        $scope.categoryList[i] = data[i];
                    }
                }
                $rootScope.loading = 0;
                $scope.view = true;
            });
        };
        $scope.mainCategory = [];
        $rootScope.loading = 1;
        getMainCategory.getCategory().success(function (data) {
            $scope.mainCategory = data;
            $rootScope.loading = 0;
        });
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.categoryList, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.cat = [];
        $scope.update = function () {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/updateCategory", $scope.cat).success(function (data) {
                $rootScope.loading = 0;
                $scope.msg = data.msg;
                $scope.status = data.status;
                setTimeout(function () {
                    window.location = site_url + "admin/listCategory";
                }, 1000);
            });
        };
        $scope.editclose = function () {
            $scope.editview = !$scope.editview;
        };
        $scope.viewcategory = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/editCategory/" + id).success(function (data) {
                $scope.cat = data.data[0];
//                alert($scope.cat.id)
                $scope.editview = 1;
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * Adding City (save function)
 */
app.controller('addcity', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.status = 0;
        $scope.msg = "";
        $scope.status1 = 0;
        // add city (save function)
        $scope.save = function (area) {
            $rootScope.loading = 1;
            if ($scope.status1 == 2) {
                $http.post(site_url + 'admin/addCity', area).success(function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                    $rootScope.loading = 0;
                    $('#addcity').trigger("reset");
                    setTimeout(function () {
                        window.location = site_url + "admin/city_list";
                    }, 1000);
                });
            } else {
                $rootScope.loading = 0;
            }
        };
        // data to display in page-dropdown
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $rootScope.loading = 1;
        $http.post(site_url + 'admin/state_city_controller/getPay_slot').success(function (data) {
            $scope.payslot = data;
            $rootScope.loading = 0;
        });
        $scope.getCity = function (city) {
            $http.post(site_url + 'admin/state_city_controller/getCityName', {city: city}).success(function (data) {
                $scope.status1 = data.status;
                if (data.status == 1) {
                    $('#cityname').val("");
                }
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * Listing And Editing City
 */
app.controller('city_list', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.cityList = {};
        $rootScope.loading = 1;
        $scope.editcat = 0;
        $scope.area = [];
        $scope.status1 = 0;
        $http.get(site_url + 'admin/listAllCities').success(function (data) {
            $scope.cityList = data;
            $rootScope.loading = 0;
            // pagination controls
            $scope.currentPage = 1;
            $scope.totalItems = $scope.cityList.length;
            $scope.entryLimit = 30; // items per page             $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            // end of pagination
        });
        // for status active
        $scope.statusUpdate = function (ix, id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getCityApproveId", data).success(function (data) {
                $rootScope.loading = 0;
                for (i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        $scope.cityList[i] = data[i];
                    }
                }
                $scope.view = true;
            });
        };
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.cityList.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        }
// data for update          $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $rootScope.loading = 1;
        $http.post(site_url + 'admin/state_city_controller/getPay_slot').success(function (data) {
            $scope.payslot = data;
            $rootScope.loading = 0;
        });
        // for search bar above table  
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination         
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.cityList, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        // end of serach bar 
        // for city data update
        $scope.update = function () {
            $rootScope.loading = 1;

            $http.post(site_url + "admin/updateCity", $scope.area).success(function (data) {
                $rootScope.loading = 0;
                $scope.msg = data.msg;
                $scope.status = data.status;
                setTimeout(function () {
                    window.location = site_url + "admin/city_list";
                }, 1000);
            });

        };
        $scope.editclose = function () {
            $scope.editview = !$scope.editview;
        };
        // for city list view
        $scope.editview = 0;
        $scope.viewcity = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/editCity/" + id).success(function (data) {
                $scope.area = data.data[0];
                $scope.editview = data.status;
                $rootScope.loading = 0;
            });
        };
        $scope.getCity = function (city) {
            $http.post(site_url + 'admin/state_city_controller/getCityName', {city: city}).success(function (data) {
                $scope.status1 = data.status;
                if (data.status == 2) {
                    $('#cityname').val("");
                }
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * Adding location (save function)
 */
app.controller('addlocation', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.status = 0;
        $scope.msg = "";
// add location (save function)
        $scope.save = function (area) {
            $rootScope.loading = 1;
            $http.post(site_url + 'admin/addLocation', area).success(function (data) {
                $scope.status = data.status;
                $scope.msg = data.msg;
                $rootScope.loading = 0;
                $('#addLocation').trigger("reset");
                setTimeout(function () {
                    window.location = site_url + "admin/location_list";
                }, 1000);
            });
        };
        // data to display in page-dropdown
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;

        });
        $scope.getCity = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + 'user/user_controller/getCities1', data).success(function (data) {
                $scope.cities = data;
                $rootScope.loading = 0;
            });
        }
    }]);
/**
 * Listing And Editing Location
 */
app.controller('location_list', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.locList = {};
        $rootScope.loading = 1;
        $scope.editcat = 0;
        $scope.area = [];
        $scope.status1 = 0;
        $http.get(site_url + 'admin/listAllLocation').success(function (data) {
            $scope.locList = data;
            $rootScope.loading = 0;
            // pagination controls
            $scope.currentPage = 1;
            $scope.totalItems = $scope.locList.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            // end of pagination
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.locList.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        // for status active
        $scope.statusUpdate = function (ix, id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getLocationApproveId", data).success(function (data) {
                $rootScope.loading = 0;
                for (i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        $scope.locList[i] = data[i];
                    }
                }
                $scope.view = true;
            });
        };
        // data for update 
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $scope.getCity = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + 'user/user_controller/getCities1', data).success(function (data) {
                $scope.cities = data;
                $rootScope.loading = 0;
            });
        }

        // for search bar above table  
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.locList, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        // end of serach bar
        // for city data update
        $scope.update = function () {
            $rootScope.loading = 1;

            $http.post(site_url + "admin/updateLocation", $scope.area).success(function (data) {
                $rootScope.loading = 0;
                $scope.msg = data.msg;
                $scope.status = data.status;
                setTimeout(function () {
                    window.location = site_url + "admin/location_list";
                }, 1000);
            });

        };
        $scope.editclose = function () {
            $scope.editview = !$scope.editview;
        };
        // for city list view
        $scope.editview = 0;
        $scope.viewLocation = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/editLocation/" + id).success(function (data) {
                $scope.area = data.data[0];
                $scope.editview = data.status;
                $rootScope.loading = 0;
            });
        };
        $scope.getLocation = function (loc) {
            $http.post(site_url + 'admin/state_city_controller/getLocationName', {loc: loc}).success(function (data) {
                $scope.status1 = data.status;
                if (data.status == 1) {
                    $('#locname').val("");
                }
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * Adding State
 */
app.controller('addstate', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.status = 0;
        $scope.msg = "";
        $scope.status1 = 0;
        $scope.save = function (area) {
            $rootScope.loading = 1;
            if ($scope.status1 == 1) {
                $http.post(site_url + 'admin/addState', area).success(function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                    $rootScope.loading = 0;
                    setTimeout(function () {
                        window.location = site_url + "admin/state_list";
                    }, 1000);
                    $('#addstate').trigger("reset");
                });
            } else {
                $rootScope.loading = 0;
            }
        };
        $scope.getState = function (state) {
            $http.post(site_url + 'admin/state_city_controller/getStateName', {state: state}).success(function (data) {
                $scope.status1 = data.status;
                if (data.status == 1) {
                    $('#statename').val("");
                }
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * Listing And Editing State  */
app.controller('state_list', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.StateList = {};
        $rootScope.loading = 1;
        $scope.editcat = 0;
        $scope.area = [];
        $scope.status1 = 0;
        $http.get(site_url + 'admin/listAllStates').success(function (data) {
            $scope.StateList = data;
            $rootScope.loading = 0;
            // pagination controls             $scope.currentPage = 1;
            $scope.totalItems = $scope.StateList.length;
            $scope.entryLimit = 8; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.StateList.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.statusUpdate = function (ix, id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + "admin/getStateApproveId", data).success(function (data) {
                $rootScope.loading = 0;
                for (i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        $scope.StateList[i] = data[i];
                    }
                }
                $scope.view = true;
            });
        };
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.StateList, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.update = function () {
            $rootScope.loading = 1;

            $http.post(site_url + "admin/updateState", $scope.area).success(function (data) {
                $rootScope.loading = 0;
                $scope.msg = data.msg;
                $scope.status = data.status;
                setTimeout(function () {
                    window.location = site_url + "admin/state_list";
                }, 1000);

            });

        };
        $scope.editclose = function () {
            $scope.editview = !$scope.editview;
        };
        $scope.editview = 0;
        $scope.viewstate = function (id) {
            $rootScope.loading = 1;
            $http.post(site_url + "admin/editState/" + id).success(function (data) {
                $scope.area = data.data[0];
                $scope.editview = data.status;
                $rootScope.loading = 0;
            });
        };
        $scope.getState = function (state) {
            $http.post(site_url + 'admin/state_city_controller/getStateName', {state: state}).success(function (data) {
                $scope.status1 = data.status;
                if (data.status == 1) {
                    $('#statename').val("");
                }
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * Adding location (save function)
 */
app.controller('addlocation', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.status = 0;
        $scope.msg = "";
        $scope.status1 = 0;
// add location (save function)
        $scope.save = function (area) {
            $rootScope.loading = 1;
            if ($scope.status1 == 1) {
                $http.post(site_url + 'admin/addLocation', area).success(function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                    $rootScope.loading = 0;
                    $('#addLocation').trigger("reset");
                });
            } else {
                $rootScope.loading = 0;
            }
        };
        // data to display in page-dropdown
        $rootScope.loading = 1;
        $http.post(site_url + 'user/user_controller/getStates').success(function (data) {
            $scope.states = data;
            $rootScope.loading = 0;
        });
        $scope.getCity = function (id) {
            var data = {'id': id};
            $rootScope.loading = 1;
            $http.post(site_url + 'user/user_controller/getCities1', data).success(function (data) {
                $scope.cities = data;
                $rootScope.loading = 0;
            });
        }
        $scope.getLocation = function (loc) {
            $http.post(site_url + 'admin/state_city_controller/getLocationName', {loc: loc}).success(function (data) {
                $scope.status1 = data.status;
                if (data.status == 1) {
                    $('#locname').val("");
                }
                $rootScope.loading = 0;
            });
        };
    }]);
/**
 * date wise exec report
 */
app.controller('exe_date_report', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.exe_date_report1 = [];
        $scope.set_content = function (content) {
            $scope.exe_date_report1 = content;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.exe_date_report1.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $rootScope.loading = 1;
        $http.post(site_url + 'admin/exec_reports_controller/getExec_list').success(function (data) {
            $scope.exe_user = data;
            $rootScope.loading = 0;
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.exe_date_report1.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.editview = 0;
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        $scope.downloadexel = function (rs) {
            var x = "dt_from=" + rs.dt_from + "&dt_to=" + rs.dt_to + "&exe_name=" + rs.exe_name + "&report=executive_reports";
            window.location = site_url + "admin/ReportExeclDownload/?" + x;
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.exe_date_report1, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
    }]);
app.controller('allexeformcount_date_report', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.exe_date_report1 = [];
        $scope.set_content = function (content) {
            $scope.exe_date_report1 = content;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.exe_date_report1.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $rootScope.loading = 1;
        $http.post(site_url + 'admin/exec_reports_controller/getExec_list').success(function (data) {
            $scope.exe_user = data;
            $rootScope.loading = 0;
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.exe_date_report1.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.editview = 0;
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.exe_date_report1, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.downloadexel = function (rs) {
            var x = "dt_from=" + rs.dt_from + "&dt_to=" + rs.dt_to + "&exe_name=" + rs.exe_name + "&report=countexec_reports";
            window.location = site_url + "admin/ReportExeclDownload/?" + x;
        };
    }]);
app.controller('alldataentryformcount_date_report', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.exe_date_report1 = [];
        $scope.set_content = function (content) {
            $scope.exe_date_report1 = content;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.exe_date_report1.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $rootScope.loading = 1;
        $http.post(site_url + 'admin/exec_reports_controller/getoper_list').success(function (data) {
            $scope.exe_user = data;
            $rootScope.loading = 0;
        });
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.exe_date_report1.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.editview = 0;
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.exe_date_report1, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.downloadexel = function (rs) {
            var x = "dt_from=" + rs.dt_from + "&dt_to=" + rs.dt_to + "&data_entry_id=" + rs.data_entry_id + "&report=countdataentry_reports";
            window.location = site_url + "admin/ReportExeclDownload/?" + x;
        };
    }]);
/**
 *all report
 */
app.controller('all_exe_report', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {
        $scope.allExe_report = [];
        // data to display in page-dropdown


        $scope.set_content = function (content) {
            $scope.allExe_report = content;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.allExe_report.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.allExe_report.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.editview = 0;
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.allExe_report, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
    }]);
/**
 * date wise dataentry_report
 */
app.controller('dataentry_report', ['$scope', '$rootScope', 'filterFilter', '$http', function ($scope, $rootScope, filterFilter, $http) {

        $scope.dataEReport = [];
        $scope.set_content = function (content) {
            $scope.dataEReport = content;
            $rootScope.loading = 0;
            $scope.currentPage = 1;
            $scope.totalItems = $scope.dataEReport.length;
            $scope.entryLimit = 20; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $scope.perpage = function (per) {
            $scope.currentPage = 1;
            $scope.totalItems = $scope.dataEReport.length;
            $scope.entryLimit = per; // items per page
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
        };
        $rootScope.loading = 1;
        $http.post(site_url + 'admin/exec_reports_controller/getoper_list').success(function (data) {
            $scope.oper_user = data;
            $rootScope.loading = 0;
        });
        $scope.editview = 0;
        $scope.search = "";
        $scope.resetFilters = function () {
            // needs to be a function or it won't trigger a $watch
            $scope.search = "";
        };
        // $watch search to update pagination
        $scope.$watch('search', function (newVal, oldVal) {
            $scope.filtered = filterFilter($scope.dataEReport, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
            $scope.currentPage = 1;
        }, true);
        $scope.downloadexel = function (rs) {
            var x = "dt_from=" + rs.dt_from + "&dt_to=" + rs.dt_to + "&data_entry_id=" + rs.data_entry_id + "&report=dataentry_reports";
            window.location = site_url + "admin/ReportExeclDownload/?" + x;
        };
    }]);
app.controller('lostpassadmin', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.email = "";
        $scope.checkmail = function () {
            $rootScope.loading = 1;
            var d = {email: $scope.email};
            $http.post(site_url + "admin/admin_controller/checkmail", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status = data.status;
                $scope.error = data.msg;
                if ($scope.status == "2") {
                    $scope.email = "";
                }
            });
        }
        $scope.save = function () {
            $rootScope.loading = 1;
            var d = {email: $scope.email};
            $http.post(site_url + "admin/admin_controller/lost_pass", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status = data.status;
                $scope.error = data.msg;
                if ($scope.status == "2") {
                    $scope.email = "";
                }
                else {
                    setTimeout(function () {
                        $("#lost_pass").modal('hide');
                    });
                }
            });
        }
    }]);
app.controller('adminlostpasschange', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.flag = 1;
        $scope.email = "";
        $scope.newpass = "";
        $scope.repass = "";
        $scope.id = "";
        $scope.username = "";

        $scope.checkmail = function () {
            $rootScope.loading = 1;
            var d = {email: $scope.username};
            $http.post(site_url + "admin/admin_controller/checkmail", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status = data.status;
                $scope.error = data.msg;
                if ($scope.status == "2") {
                    $scope.user.username = "";
                    $scope.flag = 0;
                } else {
                    $scope.flag = 1;
                }
            });
        }
        $scope.matchpass = function () {
            if ($scope.newpass != $scope.repass) {
                $scope.status1 = 2;
                $scope.error1 = "Password did Match";
                $scope.flag = 0;
            } else {
                $scope.status1 = 1;
                $scope.error1 = "Password Match";
                $scope.flag = 1;
            }
        }
        $scope.changepass = function () {
            $rootScope.loading = 1;
            var da = {
                id: $scope.id,
                username: $scope.username,
                pass: $scope.newpass,
                repass: $scope.repass,
            };
            if ($scope.flag) {
                $http.post(site_url + "admin/admin_controller/lost_pass_change", da).success(function (data) {
                    $rootScope.loading = 0;
                    $scope.status3 = data.status;
                    $scope.error3 = data.msg;
                    if ($scope.status3 == "2") {
                        $scope.flag = 0;
                        $scope.username = "";

                    } else {
                        setTimeout(function () {
                            window.location = site_url + "admin";
                        }, 2000);
                    }
                });
            } else {
                alert('something is wrong');
            }
        }
    }]);

app.controller('lostpassprof', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.email = "";
        $scope.checkmail = function () {
            $rootScope.loading = 1;
            var d = {email: $scope.email};
            $http.post(site_url + "admin/admin_controller/checkmail_prof", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status = data.status;
                $scope.error = data.msg;
                if ($scope.status == "2") {
                    $scope.email = "";
                }
            });
        }
        $scope.save = function () {
            $rootScope.loading = 1;
            var d = {email: $scope.email};
            $http.post(site_url + "admin/admin_controller/lost_pass_p", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status = data.status;
                $scope.error = data.msg;
                if ($scope.status == "2") {
                    $scope.email = "";
                }
                else {
                    setTimeout(function () {
                        $("#lost_pass").modal('hide');
                    }, 2000);
                }
            });
        }
    }]);
app.controller('proflostpasschange', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.flag = 1;
        $scope.email = "";
        $scope.newpass = "";
        $scope.repass = "";
        $scope.id = "";
        $scope.username = "";

        $scope.checkmail = function () {
            $rootScope.loading = 1;
            var d = {email: $scope.username};
            $http.post(site_url + "admin/admin_controller/checkmail_prof", d).success(function (data) {
                $rootScope.loading = 0;
                $scope.status = data.status;
                $scope.error = data.msg;
                if ($scope.status == "2") {
                    $scope.user.username = "";
                    $scope.flag = 0;
                } else {
                    $scope.flag = 1;
                }
            });
        }
        $scope.matchpass = function () {
            if ($scope.newpass != $scope.repass) {
                $scope.status1 = 2;
                $scope.error1 = "Password did Match";
                $scope.flag = 0;
            } else {
                $scope.status1 = 1;
                $scope.error1 = "Password Match";
                $scope.flag = 1;
            }
        }
        $scope.changepass = function () {
            $rootScope.loading = 1;
            var da = {
                id: $scope.id,
                username: $scope.username,
                pass: $scope.newpass,
                repass: $scope.repass,
            };
            if ($scope.flag) {
                $http.post(site_url + "admin/admin_controller/lost_pass_change_prof", da).success(function (data) {
                    $rootScope.loading = 0;
                    $scope.status3 = data.status;
                    $scope.error3 = data.msg;
                    if ($scope.status3 == "2") {
                        $scope.flag = 0;
                        $scope.username = "";

                    } else {
                        setTimeout(function () {
                            window.location = site_url + "prof/Professional";
                        }, 2000);
                    }
                });
            } else {
                alert('something is wrong');
            }
        }
    }]);
app.controller('rating', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.count = 0;
        $scope.rat = {
            id: 0,
            user_id: 0
        }
        $scope.save = function () {
            var da = {
                prof_id: $scope.rat.id,
                user_id: $scope.rat.user_id,
                rating: $scope.count
            };
            $http.post(site_url + "Profrating", da).success(function (data) {
                $scope.msg = data.msg;
                $scope.status = data.status;
                $('#subrat').attr('disabled', 'disabled');
            });
        }
        $http.post(site_url + "CheckProfrating", $scope.rat).success(function (data) {
            if (data.status != 2) {
                $scope.msg = data.msg;
                $scope.status = data.status;
                $('#subrat').attr('disabled', 'disabled');
            }
        });
        $('#stars').on('starrr:change', function (e, value) {
            $scope.count = value;
        });
    }]);