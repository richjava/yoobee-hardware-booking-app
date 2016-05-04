(function () {

    "use strict";

    angular.module("myApp")
        .controller('ngConfirmationCtrl', function ($scope, $http, bookingsIDFactory) {
            $scope.loading = true;
            bookingsIDFactory.getBookingID().then(function success(lastbookingID) {
                var currentBookingID = parseInt(lastbookingID.data) + 1;
                $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevicesDetails/' + currentBookingID).then(function success(deviceName) {
                    $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookingDetails/' + currentBookingID).then(function success(response) {
                        $http.get('http://localhost/yoobee-hardware-booking-app/api/getStudentDetails').then(function success(student) {
                            console.log(deviceName.data);
                            $scope.studentID = student.data[0].student_id;
                            $scope.username = student.data[0].username;
                            $scope.fullname = student.data[0].fullname;
                            $scope.address = student.data[0].address;
                            $scope.phone = student.data[0].phone;
                            $scope.email = student.data[0].email;
                            $scope.programmeID = student.data[0].programme_id;
                            $scope.bookingID = currentBookingID;
                            $scope.devicesName = deviceName.data;
                            //$scope.startDate = response.data[0].start_date;
                            //$scope.endDate = response.data[0].end_date;
                            $scope.loading = false;
                            $scope.page = true;
                        });

                        $scope.sendEmail = function () {
                            $http.post('http://localhost/yoobee-hardware-booking-app/api/sendEmail/' + $scope.studentID + '/' + currentBookingID);
                        }
                        /*$scope.sendEmail = function ()*/

                    });
                    /*then(function (response) {*/
                });
                /*$http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevicesDetails/' + data.data).then(function (deviceName)*/
            });
            /*lastBookingsIDFactory.getLastBookingID().then(function success(currentBookingID)*/
        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


