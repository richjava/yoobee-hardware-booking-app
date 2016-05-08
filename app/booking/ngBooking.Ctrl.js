(function () {

    "use strict";

    angular.module("myApp").controller("ngBookingCtrl", function ($cookies, $scope, $http, $mdDialog, $state) {

        $http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookingDetails').then(function success(bookings) {

            $scope.bookings = bookings.data;

        })
        /*$http.get('http://localhost/yoobee-hardware-booking-app/api/getAllBookingDetailsForStudent').*/

        $scope.deleteBooking = function (id) {

            $http.delete('http://localhost/yoobee-hardware-booking-app/api/deleteBooking/' + id).then(function success(deleted) {

                $scope.deletedBooking = deleted.data;
                //$scope.refresh();

            })

        }

        $scope.reloadPage = function () { /*reloads the page after deletation */
            $state.reload();
        }

        $scope.deleteConfirm = function (id) {
            var confirm = $mdDialog.confirm()
                .title('Are you sure you want to delete this booking?')
                .textContent('This booking will be permanently deleted from database and can not be resotred.')
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

        $scope.beginBooking = function () {

            $http.get('http://localhost/yoobee-hardware-booking-app/api/createNewBooking').then(function (bookingID) {
                $cookies.put('id', bookingID.data);
            })
        }
        /*$scope.beginBooking = function (list)*/

    })
    /*.controller("ngDatePickerCtrl", function ($scope,$http)*/

})();
/*(function () {*/


