(function () {

    "use strict";

    angular.module("myApp").controller("ngBookingCtrl", function ($cookies, $scope, $http) {

        $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookingDetailsForStudent').then(function success(data) {

            console.log(data.data);

        })
        /*$http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookingDetailsForStudent').*/


    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


