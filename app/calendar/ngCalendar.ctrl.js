(function () {

    "user strict";

    angular.module("myApp").controller("ngDatePickerCtrl", function ($scope, $http) {


        $(document).ready(function () {

            var devices = [];

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
                        description: title + ' is not available from ' + formattedStart + ' until 9am ' + formattedend + ' of ' + formattedmonth
                    });
                }
                /* for(var i=0 ; i< response.data.length ; i++)*/


                selected = [];

                var addDeviceToBookingArray = function (device, list) {
                    list.push(device);
                };

                var removeDeviceFromBookingArray = function (device, list) {
                    var index = list.indexOf(device);
                    list.splice(index, 1);
                };


                $('#calendar').fullCalendar({
                    events: devices,
                    header: {
                        left: 'title',
                        center: '',
                        right: 'prev,next'
                    },
                    editable: false,
                    eventOverlap: false,
                    eventLimit: 3,
                    selectable: true,
                    contentHeight: 'auto',

                    select: function (start) {
                        formattedBookedDate = moment(start).format('ddd DD MMM');
                        $('#calendar').fullCalendar('renderEvent', {
                            id: start.format(),
                            title: 'Booked on ' + formattedBookedDate,
                            start: start,
                            color: 'orange',
                            textColor: 'white',
                            borderColor: 'yellow',
                        }, true);
                        addDeviceToBookingArray(start.format(), selected);
                        console.log(selected);
                    },

                    eventRender: function (event, element) {
                        element.prepend('<span class="close" style="float:right;cursor: pointer;color:black;">&#10005;</span>');
                        element.find(".close").click(function () {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            removeDeviceFromBookingArray(event._id, selected);
                            console.log(selected);
                        });
                        element.qtip({
                            content: event.description
                        });
                    },
                    eventBackgroundColor: 'green',
                    eventBorderColor: 'yellow',
                });
                /* $('#calendar').fullCalendar*/
            })
            /* $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBooking*/

        });
        /*$(document).ready(function()*/

    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


