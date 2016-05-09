(function () {

    "use strict";


    angular.module("myApp").controller("ngDatePickerCtrl", function ($cookies, $scope, $http) {

            var devices = [], selected = [];
            var title, start, end = 0;

        $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevices/' + $cookies.get('id')).then(function (response) {

            console.log(response.data);
            for (var i = 0; i < response.data.length; i++) {

                title = response.data[i].device_name;
                start = response.data[i].start_date;
                end = response.data[i].end_date;

                var formattedStart = moment(start).format('dddd DD');
                var formattedend = moment(end).format('dddd DD');
                var formattedmonth = moment(start).format('MMMM');

                if (start != null && end != null) {

                    devices.push({
                        title: title,
                        start: start,
                        end: end,
                        allDay: true,
                        description: title + ' is not available from ' + formattedStart + ' until 9am ' + formattedend + ' of ' + formattedmonth
                    });

                }

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
                weekends: false,

                dayClick: function (start) {
                    if (true) {
                        $('#calendar').fullCalendar('renderEvent', {
                            id: start,
                            title: 'Device(s) Booked For This Day',
                            start: start,
                            color: '#70C1B3',
                            textColor: 'white'
                        }, true);
                        addDeviceToBookingArray(start, selected);
                    }
                },

                eventRender: function (event, element) {
                    element.prepend('<span class="close" style="cursor: pointer; color:white;margin-right: 5px">&#10005;</span>');
                    element.find(".close").click(function () {
                        $('#calendar').fullCalendar('removeEvents', event._id);
                        removeDeviceFromBookingArray(event._id, selected);
                    });
                    element.qtip({
                        content: event.description
                    });
                },
                eventBackgroundColor: '#F25F5C',
                eventBorderColor: '#F25F5C'
            });
            /* $('#calendar').fullCalendar*/


        });


            $scope.registerBookingDates = function () {

                    var maxDate = new Date(Math.max.apply(null, selected));
                    var minDate = new Date(Math.min.apply(null, selected));

                    /*to increase the end dat by one day so it show correctly on the calendar*/
                    maxDate = moment(maxDate).add('days', 1).toDate();

                    var data = {
                        'booking_id': $cookies.get('id'),
                        'start_date': minDate,
                        'end_date': maxDate
                    };
                $http.post('http://localhost/yoobee-hardware-booking-app/api/addDates', data);

            }
            /* $scope.registerBookingDates = function()*/

        })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


