(function () {

    "user strict";

    angular.module("myApp")
        .controller("ngDatePickerCtrl", function ($scope, $uibModal, $log, $compile, uiCalendarConfig) {

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $scope.events = [{
                title: 'flash',
                start: new Date(y, m, 1)
            }, {
                title: 'camera',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2)
            }, {
                id: 999,
                title: 'tripod',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false
            }, {
                id: 999,
                title: 'flash',
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false
            }, {
                title: 'memory card',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false
            }, {
                title: 'camera',
                start: new Date(y, m, 28),
                end: new Date(y, m, 30),
            }];

            $scope.eventSources = [$scope.events];

            $scope.uiConfig = {
                calendar: {
                    defaultView: 'month',
                    height: "auto",
                    editable: true,
                    eventTextColor: 'blue',
                    eventBorderColor: 'black',
                    eventBackgroundColor: 'yellow',
                    header: {
                        left: 'title',
                        center: '',
                        right: 'today prev,next'
                    },
                    eventClick: $scope.alertOnEventClick,
                    dayClick: $scope.alertOnDayClick,
                    eventRender: $scope.eventRender
                }
            };
        })
})();
/*(function () {*/


