(function () {

    "use strict";

    angular.module("myApp")
        .controller('ngConfirmationCtrl', function ($cookies, $scope, $http, $mdDialog, $location) {
            $scope.loading = true;
            $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevicesDetails/' + $cookies.get('id')).then(function success(deviceName) {
                $http.get('http://localhost/yoobee-hardware-booking-app/api/getBookingDetails/' + $cookies.get('id')).then(function success(response) {
                        $http.get('http://localhost/yoobee-hardware-booking-app/api/getStudentDetails').then(function success(student) {
                            $scope.studentID = student.data[0].student_id;
                            $scope.username = student.data[0].username;
                            $scope.fullname = student.data[0].fullname;
                            $scope.address = student.data[0].address;
                            $scope.phone = student.data[0].phone;
                            $scope.email = student.data[0].email;
                            $scope.programmeID = student.data[0].programme_id;
                            $scope.bookingID = $cookies.get('id');
                            $scope.devicesName = deviceName.data;
                            $scope.startDate = moment(response.data[0].start_date).format('dddd DD/MM/YYYY');
                            $scope.endDate = moment(response.data[0].end_date).format('dddd DD/MM/YYYY');
                            $scope.loading = false;
                            $scope.page = true;
                        });

                        $scope.sendEmail = function () {
                            $cookies.remove("isExistingBooking");
                            $http.post('http://localhost/yoobee-hardware-booking-app/api/sendEmail/' + $scope.studentID + '/' + $cookies.get('id')).then(function success() {
                                var confirm = $mdDialog.confirm()
                                    .title('Your booking was successful')
                                    .textContent('Selected devices are now booked. Please check your inbox for booking details.')
                                    .ok('Ok')
                                $mdDialog.show(confirm).then(function () {
                                    $cookies.remove("id");
                                    $location.path("booking");
                                });
                            });
                        }
                        /*$scope.sendEmail = function ()*/

                    });
                    /*then(function (response) {*/
                });
                /*$http.get('http://localhost/yoobee-hardware-booking-app/api/getBookedDevicesDetails/' + data.data).then(function (deviceName)*/
        });
    /*.controller('ngDeviceSelectionCtrl', function ($scope, $http) */
})();
/*(function () {*/


