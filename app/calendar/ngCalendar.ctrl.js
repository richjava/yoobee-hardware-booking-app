(function () {

    "user strict";


    angular.module("myApp").controller("ngDatePickerCtrl", function ($scope, $http) {

        $scope.events = [];

            $scope.eventSources = [$scope.events];

            $scope.uiConfig = {
                calendar: {
                    defaultView: 'month',
                    height: "auto",
                    editable: false,
                    eventTextColor: 'black',
                    eventBorderColor: 'black',
                    eventBackgroundColor: 'pink',
                    header: {
                        left: 'title',
                        center: '',
                        right: 'today prev,next'
                    },
                    dayClick: function (date) {
                        $scope.events.push({
                            color: 'green',
                            textColor: 'yellow',
                            title: 'Device(s) booked for this date',
                            start: date,
                            end: date,
                            allDay: true
                        });
                    }/*dayClick: function(date)*/
                }
            };
        /* $scope.uiConfig*/


        $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBooking').then(function (response) {
            $scope.data = response.data;
            for (var i = 0; i < response.data.length; i++) {

                var title = response.data[i].device_name;
                var start = response.data[i].start_date;
                var end = response.data[i].end_date;

                $scope.events.push({
                    title: title,
                    start: start,
                    end: end,
                    allDay: true
                });

            }
            /* for(var i=0 ; i< response.data.length ; i++)*/

        })
        /* $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBooking*/

    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


