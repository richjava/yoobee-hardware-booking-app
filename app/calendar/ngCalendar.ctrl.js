(function () {

    "user strict";

    angular.module("myApp").controller("ngDatePickerCtrl", function ($scope, $http) {


        $(document).ready(function () {

            events = [];

            // page is now ready, initialize the calendar...
            $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBooking').then(function (response) {

                for (var i = 0; i < response.data.length; i++) {

                    var title = response.data[i].device_name;
                    var start = response.data[i].start_date;
                    var end = response.data[i].end_date;

                    events.push({
                        title: title,
                        start: start,
                        end: end,
                        allDay: true
                    });


                }
                /* for(var i=0 ; i< response.data.length ; i++)*/

                console.log(events);

                $('#calendar').fullCalendar({

                    events: events,
                    editable: false,
                    eventLimit: true,
                    selectable: true,
                    contentHeight: 'auto',
                    header: {
                        left: 'title',
                        center: '',
                        right: 'prev,next'
                    },
                    eventColor: 'pink',
                    eventBackgroundColor: '#378006',
                    eventBorderColor: '#378006',
                    color: 'yellow',
                    textColor: 'black'
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


