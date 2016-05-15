(function () {

    "use strict";


    angular.module("myApp").controller("ngDatePickerCtrl", function ($cookies, $scope, $http) {

        var devices = [], selectedDevices = [], selected = [],
            title, start, end = 0,
            existingBookingEnd, existingBookingStart = 0,
            evnts = [], flag;


        var getBookedDevices = function (flag) {
            $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevices/' + $cookies.get('id')).then(function (response) {
                response.data.forEach(function (device) {
                    title = device.device_name;
                    start = device.start_date;
                    end = device.end_date;
                    var formattedStart = moment(start).format('dddd DD');
                    var formattedend = moment(end).format('dddd DD');
                    var formattedmonth = moment(start).format('MMMM');
                    if (start && end) {
                        devices.push({
                            title: title,
                            start: start,
                            end: end,
                            allDay: true,
                            description: title + ' is not available from ' + formattedStart + ' until 9am ' + formattedend + ' of ' + formattedmonth,
                        });
                    }
                });
                /* response.data.forEach(function (device)*/
                calendar(flag);
            });
            /*$http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevices/' + $cookies.get('id')).then(function (response)*/
        }
        /*var getBookedDevices = function()*/
        $scope.isAnyDateSelected = true;

        if ($cookies.get('isExistingBooking')) {
            $http.get('http://localhost/yoobee-hardware-booking-app/api/editDates/' + $cookies.get('id')).then(function success(rspnd) {

                rspnd.data.forEach(function (existingDevice) {
                    existingBookingStart = existingDevice.start_date;
                    existingBookingEnd = existingDevice.end_date;
                    selectedDevices.push({
                        title: "Your Device(s) currently Booked For These Days",
                        start: existingBookingStart,
                        end: existingBookingEnd,
                        allDay: true
                    });
                })
                /* rspnd.data.forEach(function(device)*/
                flag = true;
                getBookedDevices(flag);
            });
            ///*$http.get('http://localhost/yoobee-hardware-booking-app/api/editDates/' + $cookies.get('id')).then(function success(rspnd)*/
        } else {
            console.log("hello");
            flag = false;
            getBookedDevices(flag);
        }


        var calendar = function (flag) {

            if (flag) {
                evnts = [
                    {
                        events: devices,
                        color: '#F25F5C'

                },
                    {
                        events: selectedDevices,
                        color: '#70C1B3',
                        textColor: 'white'
                    }
                ]
            } else {
                evnts = [
                    {
                        events: devices,
                        color: '#F25F5C'
                    }
                ]
            }

            $('#calendar').fullCalendar({
                eventSources: evnts,
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

                    $('#calendar').fullCalendar('renderEvent', {
                        id: start,
                        title: 'Device(s) Booked For This Day',
                        start: start,
                        color: '#70C1B3',
                        textColor: 'white'
                    }, true);
                    addDeviceToBookingArray(start, selected);

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
                }
            });
            /* $('#calendar').fullCalendar*/
        };
        /*var calendar = function()*/


        var addDeviceToBookingArray = function (device, list) {
            list.push(device);
        };

        var removeDeviceFromBookingArray = function (device, list) {
            var index = list.indexOf(device);
            list.splice(index, 1);
        };


        $scope.registerBookingDates = function () {

            var maxDate = new Date(Math.max.apply(null, selected));
            var minDate = new Date(Math.min.apply(null, selected));

            var today = moment();
            var tomorrow = today.add('days', 1);
            var currentDate = moment(tomorrow).format();

            if ((selected.length > 0) && (moment(maxDate).isAfter(currentDate)) && (moment(minDate).isAfter(currentDate))) {
                $scope.isAnyDateSelected = false;

                /*to increase the end dat by one day so it show correctly on the calendar*/
                maxDate = moment(maxDate).add('days', 1).toDate();

                var data = {
                    'booking_id': $cookies.get('id'),
                    'start_date': minDate,
                    'end_date': maxDate
                };
                $http.post('http://localhost/yoobee-hardware-booking-app/api/addDates', data);
        }
        }
        /* $scope.registerBookingDates = function()*/

    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


