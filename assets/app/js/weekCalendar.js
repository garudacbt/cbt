/**
 * Created by ccc on 2017/7/11.
 */
//Inisialisasi halaman detail
var WeekCalendar = function (func1, func2) {
    var weekCalendar_plugin = {
        init: function () {
            //Siapkan sinkronisasi global
            $.ajaxSetup({
                async: false, //Siapkan sinkronisasi ajax global
                cache: false //Setel ajax global tidak ke cache
            });

            //Langkah 1: Inisialisasi parameter yang diteruskan dari halaman lain
            weekCalendar_plugin.initParams();
            // Langkah kedua adalah menginisialisasi kontrol
            weekCalendar_plugin.initControl();
            //Langkah 3: Step 3: bind events
            weekCalendar_plugin.bindEvent();
        },
        initParams: function () {//Step 1: Initialize the parameters passed from other pages
            weekCalendar_plugin.getNowDate();
            weekCalendar_plugin.theMonth = weekCalendar_plugin.nowMonth; //Current month (unchanged)
            $(".wcMonth").children('li:eq(' + weekCalendar_plugin.theMonth + ')').addClass("today");
            weekCalendar_plugin.theYear = weekCalendar_plugin.nowYear;//Current year (unchanged)
            weekCalendar_plugin.weekStartDate = '';
            weekCalendar_plugin.startDateMonth = '';
            weekCalendar_plugin.weekEndDate = '';
            weekCalendar_plugin.StartDay = 0;
            weekCalendar_plugin.EndDay = 0;
        },
        initControl: function () {//The second step is to initialize the control
            weekCalendar_plugin.getStartAndEndDay();
            weekCalendar_plugin.initWeekCalendar(weekCalendar_plugin.StartDay, weekCalendar_plugin.EndDay, weekCalendar_plugin.nowDay, weekCalendar_plugin.nowYear, weekCalendar_plugin.startDateMonth);
        },
        //Step 3: bind events
        bindEvent: function () {
            //Click the weekly calendar display to jump to the weekly calendar and display the events of the day
            $(".wcDate>li").click(function (e) {
                var StartDay = '';
                var EndDay = '';
                var lastWeekStartDate = '';
                var lastWeekEndDate = '';
                //if ($(e.target).text().indexOf("上周") == -1 && $(e.target).text().indexOf("下周") == -1) {
                console.log('li:click', (this).id);
                if ((this).id == 'next-week' && (this).id == 'prev-week') {
                    $(".wcDate>li.active").removeClass('active');
                    $(this).addClass('active');
                    weekCalendar_plugin.getNowDate($(".wcDate>li.active").attr("data-date"));
                    weekCalendar_plugin.getStartAndEndDay();
                    weekCalendar_plugin.initWeekCalendar(weekCalendar_plugin.StartDay, weekCalendar_plugin.EndDay, weekCalendar_plugin.theDay, weekCalendar_plugin.nowYear, weekCalendar_plugin.startDateMonth);
                    if (func1)
                        func1($(this).attr("data-date").substr(0, 4), $(this).attr("data-date").substr(5, 2) - 1, $(this).attr("data-date").substr(8, 2), $(this).find("span:last-of-type").text());
                } else {
                    //if ($(e.target).text().indexOf("上周") != -1) {
                    if ((this).id == 'prev-week') {
                        lastWeekStartDate = weekCalendar_plugin.getLastWeekDate(7);
                        lastWeekEndDate = weekCalendar_plugin.getLastWeekDate(1);
                    } else {
                        lastWeekStartDate = weekCalendar_plugin.getLastWeekDate(-7);
                        lastWeekEndDate = weekCalendar_plugin.getLastWeekDate(-13);
                    }
                    StartDay = parseInt(lastWeekStartDate.substr(8, 2));
                    EndDay = parseInt(lastWeekEndDate.substr(8, 2));
                    weekCalendar_plugin.nowMonth = parseInt(lastWeekStartDate.substr(5, 2)) - 1;
                    weekCalendar_plugin.startDateMonth = weekCalendar_plugin.nowMonth;
                    weekCalendar_plugin.nowYear = parseInt(lastWeekStartDate.substr(0, 4));
                    weekCalendar_plugin.nowMonth = weekCalendar_plugin.getPositiveMonth(weekCalendar_plugin.nowMonth) % 12 + 1;
                    if (weekCalendar_plugin.nowMonth < 10) {
                        weekCalendar_plugin.nowMonth = "0" + weekCalendar_plugin.nowMonth;
                    }
                    $(".wcDate>li.active").removeClass('active');
                    weekCalendar_plugin.getNowDate(weekCalendar_plugin.nowYear + '-' + weekCalendar_plugin.nowMonth + '-' + StartDay);
                    weekCalendar_plugin.getStartAndEndDay();
                    weekCalendar_plugin.initWeekCalendar(StartDay, EndDay, weekCalendar_plugin.theDay, weekCalendar_plugin.nowYear, weekCalendar_plugin.startDateMonth);
                }
            });
            //Click on the month to display the corresponding weekly calendar
            $(".wcMonth>li").click(function (e) {
                $(".wcMonth>li.active").removeClass('active');
                $(this).addClass("active");
                $(".wcDate>li.active").removeClass('active');
                weekCalendar_plugin.getNowDate(weekCalendar_plugin.nowYear + '-' + $(this).attr('data-month') + '-01');
                weekCalendar_plugin.getStartAndEndDay();
                weekCalendar_plugin.initWeekCalendar(weekCalendar_plugin.StartDay, weekCalendar_plugin.EndDay, weekCalendar_plugin.nowDay, weekCalendar_plugin.nowYear, weekCalendar_plugin.startDateMonth);
            });
            //Click on the year to display the corresponding weekly calendar
            $(".wcYear").on('click', 'i', function (e) {
                var nowYear = '';
                if ($(e.target).attr('data-change') == 'pre') {
                    nowYear = parseInt(e.target.nextSibling.nodeValue) - 1;
                } else {
                    nowYear = parseInt(e.target.previousSibling.nodeValue) + 1;
                }
                weekCalendar_plugin.getNowDate(nowYear + '-' + $(".wcMonth>li.active").attr('data-month') + '-01');
                weekCalendar_plugin.getStartAndEndDay();
                weekCalendar_plugin.initWeekCalendar(weekCalendar_plugin.StartDay, weekCalendar_plugin.EndDay, weekCalendar_plugin.nowDay, weekCalendar_plugin.nowYear, weekCalendar_plugin.startDateMonth);
                $(".wcDate>li.active").removeClass('active');
            });
            //The background changes when the mouse moves in and out of the month and date
            $(".wcDate>li,.wcMonth>li").mouseover(function (e) {
                if ($(e.target).attr("data-month")) {
                    $(".wcMonth>li.mouseActive").removeClass('mouseActive');
                    $(this).addClass("mouseActive");
                } else if ($(e.target).children().length != 0) {
                    $(".wcDate>li.mouseActive").removeClass('mouseActive');
                    $(this).addClass("mouseActive");
                }
            }).mouseleave(function () {
                $(".wcMonth>li.mouseActive").removeClass('mouseActive');
                $(".wcDate>li.mouseActive").removeClass('mouseActive');
            });
        },
        //Get the beginning and ending dates of the previous or next week
        getLastWeekDate: function (n) {
            var now = new Date($(".wcDate>li:eq(1)").attr('data-date'));
            var year = now.getFullYear();
            //Because the month starts from 0, you need to add 1 to get the number of months in this month.
            var month = now.getMonth() + 1;
            var date = now.getDate();
            var day = now.getDay();
            //Determine whether it is Sunday, if not, let today's day-1 (for example, Tuesday is 2-1)
            if (day !== 0) {
                n = n + (day - 1);
            }
            else {
                n = n + day;
            }
            if (day) {
                //This judgment is to solve the problem of New Year's Eve
                if (month > 1) {
                    //month = month;
                }
                //This judgment is to solve the problem of New Year's Eve, the month starts from 0
                else {
                    year = year - 1;
                    month = 12;
                }
            }
            now.setDate(now.getDate() - n);
            year = now.getFullYear();
            month = now.getMonth() + 1;
            date = now.getDate();
            s = year + "-" + (month < 10 ? ('0' + month) : month) + "-" + (date < 10 ? ('0' + date) : date);
            return s;
        },
        //Negative number of months
        getPositiveMonth: function (month) {
            var i = 0;
            do {
                month = month + 12 * i;
                i++;
            }
            while (month < 0);
            return month;
        },
        //Get the current day, month, year
        getNowDate: function (date) {
            if (date)
                weekCalendar_plugin.now = new Date(date); //Current date
            else {
                weekCalendar_plugin.now = new Date(); //Current date
                weekCalendar_plugin.theDay = weekCalendar_plugin.now.getDate(); //Current day
            }
            weekCalendar_plugin.nowDayOfWeek = weekCalendar_plugin.now.getDay(); //Today the day of the week
            weekCalendar_plugin.nowDay = weekCalendar_plugin.now.getDate(); //Current day
            weekCalendar_plugin.nowMonth = weekCalendar_plugin.now.getMonth(); //Current month
            weekCalendar_plugin.nowYear = weekCalendar_plugin.now.getYear(); //Current year
            weekCalendar_plugin.nowYear += (weekCalendar_plugin.nowYear < 2000) ? 1900 : 0; //
        },
        //Get the beginning and end dates of the week
        getStartAndEndDay: function () {
            weekCalendar_plugin.weekStartDate = weekCalendar_plugin.getWeekStartDate();
            weekCalendar_plugin.weekEndDate = weekCalendar_plugin.getWeekEndDate();
            weekCalendar_plugin.startDateMonth = parseInt(weekCalendar_plugin.weekStartDate.substr(5, 2)) - 1;
            $.each($(".wcDate").find('li'), function (a, b) {
                if (a > 0 && a < 8) {
                    var date = new Date(weekCalendar_plugin.nowYear, weekCalendar_plugin.nowMonth, weekCalendar_plugin.nowDay + (a - 1 - weekCalendar_plugin.nowDayOfWeek));
                    date = weekCalendar_plugin.formatDate(date);
                    $(b).attr("data-date", date);
                }
            });
            weekCalendar_plugin.StartDay = parseInt(weekCalendar_plugin.weekStartDate.substr(8, 2));
            weekCalendar_plugin.EndDay = parseInt(weekCalendar_plugin.weekEndDate.substr(8, 2));
        },
        //Get the start date of the week
        getWeekStartDate: function () {
            var weekStartDate = new Date(weekCalendar_plugin.nowYear, weekCalendar_plugin.nowMonth, weekCalendar_plugin.nowDay - weekCalendar_plugin.nowDayOfWeek);
            return weekCalendar_plugin.formatDate(weekStartDate);
        },
        //Get the stop date of this week
        getWeekEndDate: function () {
            var weekEndDate = new Date(weekCalendar_plugin.nowYear, weekCalendar_plugin.nowMonth, weekCalendar_plugin.nowDay + (6 - weekCalendar_plugin.nowDayOfWeek));
            return weekCalendar_plugin.formatDate(weekEndDate);
        },
        //Format date: yyyy-MM-dd
        formatDate: function (date) {
            var myyear = date.getFullYear();
            var mymonth = date.getMonth() + 1;
            var myweekday = date.getDate();

            if (mymonth < 10) {
                mymonth = "0" + mymonth;
            }
            if (myweekday < 10) {
                myweekday = "0" + myweekday;
            }
            return (myyear + "-" + mymonth + "-" + myweekday);
        },
        //Generate this week's calendar
        initWeekCalendar: function (StartDay, EndDay, today, nowYear, nowMonth) {
            var i = StartDay;
            if (StartDay < EndDay) {
                $.each($(".wcDate").find('li>span:first-of-type'), function (a, b) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    $(b).text(i);
                    i = parseInt(i);
                    if (i == today && weekCalendar_plugin.nowMonth == weekCalendar_plugin.theMonth && nowYear == weekCalendar_plugin.theYear) {
                        $(b).parent().addClass('today');
                    } else {
                        $(b).parent().removeClass('today');
                    }
                    i++;
                });
            } else {
                var MonthEndDate = weekCalendar_plugin.getMonthEndDate(nowYear, nowMonth);
                var j = 1;
                $.each($(".wcDate").find('li>span:first-of-type'), function (a, b) {
                    if (i <= new Date(MonthEndDate).getDate()) {
                        $(b).text(i);
                        i = parseInt(i);
                        if (i == today && weekCalendar_plugin.nowMonth == weekCalendar_plugin.theMonth && nowYear == weekCalendar_plugin.theYear) {
                            $(b).parent().addClass('today');
                        } else {
                            $(b).parent().removeClass('today');
                        }
                        i++;
                    } else {
                        if (j <= EndDay) {
                            $(b).text("0" + j);
                            if (j == today && weekCalendar_plugin.nowMonth == weekCalendar_plugin.theMonth && nowYear == weekCalendar_plugin.theYear) {
                                $(b).parent().addClass('today');
                            } else {
                                $(b).parent().removeClass('today');
                            }
                            j++;
                        }
                    }
                });
            }
            //Show the current year
            $(".wcYear").html('<i data-change="pre"></i>' + weekCalendar_plugin.nowYear + '<i data-change="next"></i>');
            //Show current month
            $(".wcMonth").children('li').removeClass("active");
            weekCalendar_plugin.nowMonth = weekCalendar_plugin.getPositiveMonth(weekCalendar_plugin.nowMonth) % 12;
            $(".wcMonth").children('li:eq(' + weekCalendar_plugin.nowMonth + ')').addClass("active");
            if (func2)
                func2();
        },
        //Get the start date of the month
        getMonthStartDate: function (nowYear, nowMonth) {
            var monthStartDate = new Date(nowYear, nowMonth, 1);
            return weekCalendar_plugin.formatDate(monthStartDate);
        },

        //Get the stop date of the month
        getMonthEndDate: function (nowYear, nowMonth) {
            var monthEndDate = new Date(nowYear, nowMonth, weekCalendar_plugin.getMonthDays(nowYear, nowMonth));
            return weekCalendar_plugin.formatDate(monthEndDate);
        },
        //Get the number of days in a month
        getMonthDays: function (nowYear, myMonth) {
            var monthStartDate = new Date(nowYear, myMonth, 1);
            var monthEndDate = new Date(nowYear, myMonth + 1, 1);
            return (monthEndDate - monthStartDate) / (1000 * 60 * 60 * 24);
        }
    };
    weekCalendar_plugin.init();
};