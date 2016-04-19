(function () {

    "user strict";

    angular.module("myApp").controller("ngDatePickerCtrl", function ($scope, $http) {


        $(document).ready(function () {

            devices = [];

            $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBooking').then(function (response) {

                for (var i = 0; i < response.data.length; i++) {

                    var title = response.data[i].device_name;
                    var start = response.data[i].start_date;
                    var end = response.data[i].end_date;

                    formattedStart = moment(start).format('dddd DD');
                    formattedend = moment(end).format('dddd DD');
                    formattedmonth = moment(start).format('MMMM');

                    devices.push({
                        title: title,
                        start: start,
                        end: end,
                        allDay: true,
                        description: 'Your selected device(s) not available from ' + formattedStart + ' until morning of' + formattedend + ' of ' + formattedmonth + '!'
                    });

                }
                /* for(var i=0 ; i< response.data.length ; i++)*/

                selectedDays = [];

                selectedDates = function (days, list) {
                    list.push(days);
                    console.log(selectedDays);
                };

                removeDates = function (days, list) {
                    list.splice(days, 1);
                    console.log(selectedDays);
                }



                $('#calendar').fullCalendar({
                    events: devices,
                    header: {
                        left: 'title',
                        center: '',
                        right: 'prev,next'
                    },
                    editable: false,
                    eventLimit: 3,
                    selectable: true,
                    contentHeight: 'auto',
                    select: function (start, end) {
                        formattedBookedDate = moment(start).format('ddd DD MMM');
                        $('#calendar').fullCalendar('renderEvent', {
                            title: 'Booked for ' + formattedBookedDate,
                            start: start,
                            end: end,
                            color: 'orange',
                            textColor: 'white'
                        }, true);

                        selectedDates(end.format(), selectedDays);

                    },
                    eventRender: function (event, element) {
                        element.prepend('<span class="close" style="float:right;cursor: pointer;">&#10005;</span>');
                        element.find(".close").click(function () {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            removeDates(event.end.format());
                        });
                        element.qtip({
                            content: event.description
                        });
                    },
                    eventBackgroundColor: 'green',
                    eventBorderColor: 'black',
                })
                /* $('#calendar').fullCalendar*/

            })
            /* $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBooking*/

        });
        /*$(document).ready(function()*/

    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


