(function () {

    "user strict";

    angular.module("myApp")
        .controller('ngConfirmationCtrl', function ($scope, $http, lastBookingsIDFactory) {
            $scope.loading = true;
            lastBookingsIDFactory.getLastBookingID().then(function success(data) {
                $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevicesDetails/' + data.data).then(function (deviceName) {

                    $scope.devicesName = deviceName.data;
                    $http({
                        method: 'GET',
                        url: 'http://localhost/yoobee-hardware-booking-app/api/getBookingDetails/' + data.data
                    }).then(function (response) {
                        $http.get('http://localhost/yoobee-hardware-booking-app/api/getStudentDetails').then(function (student) {
                            $scope.studentID = student.data[0].student_id;
                            $scope.username = student.data[0].username;
                            $scope.fullname = student.data[0].fullname;
                            $scope.address = student.data[0].address;
                            $scope.phone = student.data[0].phone;
                            $scope.email = student.data[0].email;
                            $scope.programmeID = student.data[0].programme_id;
                            $scope.bookingID = response.data[0].booking_id;
                            $scope.startDate = response.data[0].start_date;
                            $scope.endDate = response.data[0].end_date;
                            $scope.loading = false;
                            $scope.page = true;
                        });

                        $scope.sendEmail = function () {
                            $http.get('http://localhost/yoobee-hardware-booking-app/api/sendEmail/' + $scope.studentID + '/' + $scope.bookingID);
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


