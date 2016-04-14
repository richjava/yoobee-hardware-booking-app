(function () {

    "user strict";

    angular.module("myApp")
        .controller("ngDatePickerCtrl", function ($scope) {

            $scope.eventSources = [];

            $scope.uiConfig = {
                calendar: {
                    height: "400",
                    editable: true,
                    header: {
                        left: 'prev',
                        center: 'title',
                        right: 'next'
                    },
                    dayClick: $scope.alertEventOnClick,
                    eventDrop: $scope.alertOnDrop,
                    eventResize: $scope.alertOnResize
                }
            };

        });
})();


