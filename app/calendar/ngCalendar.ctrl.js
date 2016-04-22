(function () {

    "user strict";

    angular.module("myApp")

        .controller("ngDatePickerCtrl", function ($scope, $http, lastBookingsIDFactory) {

            var devices = [], selected = [];
            var title, start, end = 0;

            $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookedDevices').then(function (response) {
                for (var i = 0; i < response.data.length; i++) {

                    title = response.data[i].device_name;
                    start = response.data[i].start_date;
                    end = response.data[i].end_date;

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
                        if (true) {
                            $('#calendar').fullCalendar('renderEvent', {
                                id: start,
                                title: 'Booked ',
                                start: start,
                                color: 'orange',
                                textColor: 'white',
                                borderColor: 'yellow',
                                className: 'booked'
                            }, true);
                            addDeviceToBookingArray(start, selected);
                        }
                    },

                    eventRender: function (event, element) {
                        element.prepend('<span class="close" style="float:right;cursor: pointer;color:black;">&#10005;</span>');
                        element.find(".close").click(function () {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            removeDeviceFromBookingArray(event._id, selected);
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

            $scope.registerBookingDates = function () {
                lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID) {
                    var maxDate = new Date(Math.max.apply(null, selected));
                    var minDate = new Date(Math.min.apply(null, selected));

                    /*to increase the end dat by one day so it show correctly on the calendar*/
                    maxDate = moment(maxDate).add('days', 1).toDate();

                    data = {
                        'booking_id': parseInt(currentBookingID.data) + 1,
                        'start_date': minDate,
                        'end_date': maxDate
                    };
                    $http({
                        method: 'POST',
                        url: 'http://localhost/yoobee-hardware-booking-app/api/addNewBookedDatesToDB',
                        data: data
                    });
                });

            }
            /* $scope.registerBookingDates = function()*/

        })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


