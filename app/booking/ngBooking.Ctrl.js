(function () {

    "use strict";

    angular.module("myApp").controller("ngBookingCtrl", function ($cookies, $scope, $http, $mdDialog, $state, $rootScope, $location) {

        $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookingDetails').then(function success(bookings) {

            $scope.bookings = bookings.data;

        })
        /*$http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookingDetailsForStudent').*/

        $scope.reloadPage = function () { /*reloads the page after deletation */
            $state.reload();
        }

        $scope.deleteConfirm = function (id) {
            var confirm = $mdDialog.confirm()
                .title('Are you sure you want to delete this booking?')
                .textContent('This booking will be permanently deleted and can not be undone.')
                .targetEvent(id)
                .ok('Delete')
                .cancel('Cancel');
            $mdDialog.show(confirm).then(function () {
                $http.delete('http://localhost/yoobee-hardware-booking-app/api/deleteBooking/' + id).then(function success() {
                    $mdDialog.show(
                        $mdDialog.alert()
                            .parent(angular.element(document.querySelector('#popupContainer')))
                            .clickOutsideToClose(true)
                            .title('Success')
                            .textContent('The booking was deleted successfully.')
                            .ok('Ok')
                    );
                    $scope.reloadPage();
                });
            });
        };

        $scope.editConfirm = function (id) {
            $cookies.put('id', id);
            $cookies.put('isExistingBooking', true);
            $location.path("devices");
        };
        /*$scope.editConfirm = function(id)*/

        $scope.beginBooking = function () {

            $http.get('http://localhost/yoobee-hardware-booking-app/api/createNewBooking').then(function (bookingID) {
                $cookies.put('id', bookingID.data);
                $cookies.put('isExistingBooking', false);
            })
        }
        /*$scope.beginBooking = function (list)*/

    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


