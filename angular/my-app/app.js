angular.module("myApp", [])

    .controller("firstCtrl", function ($scope) {
        $scope.tempInput = "Test task";

        $scope.tasksArray = ["это задание", "это другое задание"];

        $scope.addNewFunction = function () {
            if ($scope.tempInput) {
                $scope.tasksArray.push($scope.tempInput);
                $scope.tempInput = "";
            } else {

            }
        }

        $scope.deleteItem = function (item) {
            var index = $scope.tasksArray.indexOf(item);

            console.log(index);

            $scope.tasksArray.splice(index, true)
        }
    });

