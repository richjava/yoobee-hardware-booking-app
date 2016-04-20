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
                        allDay: true,
                        description: title + ' is not available from ' + formattedStart + ' until 9am ' + formattedend + ' of ' + formattedmonth
                    });
                }
                /* for(var i=0 ; i< response.data.length ; i++)*/


                selected = [];


                var toggle = function (item, list) {
                    var idx = list.indexOf(item);
                    if (idx > -1) {
                        list.splice(idx, 1);
                    }
                    else {
                        list.push(item);
                    }
                };


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
                    select: function (start) {
                        formattedBookedDate = moment(start).format('ddd DD MMM');
                        $('#calendar').fullCalendar('renderEvent', {
                            title: 'Booked on ' + formattedBookedDate,
                            start: start,
                            color: 'orange',
                            textColor: 'white',
                            borderColor: 'black'
                        }, true);
                        var data = $('#calendar').fullCalendar('clientEvents');
                        console.log(data);


                        toggle(start.format(), selected);
                        //console.log(selected);
                    },

                    eventRender: function (event, element) {
                        element.prepend('<span class="close" style="float:right;cursor: pointer;color:black;">&#10005;</span>');
                        element.find(".close").click(function () {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            console.log(event._id);
                        });
                        element.qtip({
                            content: event.description
                        });
                    },
                    eventBackgroundColor: 'green',
                    eventBorderColor: 'black',
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


