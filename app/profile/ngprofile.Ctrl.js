(function () {

    "user strict";

    angular.module("myApp").controller("ngProfileCtrl", function ($scope, $http, $location, $mdToast) {

        $http.get('http://localhost/yoobee-hardware-booking-app/api/getStudentDetails').then(function success(student) {

            $scope.studentID = student.data[0].student_id;
            $scope.username = student.data[0].username;
            $scope.fullname = student.data[0].fullname;
            $scope.address = student.data[0].address;
            $scope.phone = student.data[0].phone;
            $scope.email = student.data[0].email;

        });

        $scope.updateStudentDetails = function () {
            $scope.profileToast();
            var data = {
                'fullname': $scope.fullname,
                'address': $scope.address,
                'phone': $scope.phone,
                'email': $scope.email
            };

            $http.put('http://localhost/yoobee-hardware-booking-app/api/updateStudentDetails', data).then(function success() {

                $location.path("booking");

            });
        }

        $scope.profileToast = function () {
            $mdToast.show(
                $mdToast.simple()
                    .textContent("Your details have been updated")
                    .position('bottom right')
                    .hideDelay(3000)
            );
        };


    })
    /*.controller("ngSettingsCtrl", function ($scope,$http)*/

})();
/*(function () {*/


