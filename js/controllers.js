/**
*  Controllers
*
* Implements the logic
*/
(function(){
    angular.module('forksControllers', ['forksServices'])

        // Implement Forks controller
        .controller('ForksController', ['$scope', 'Repository', 'Forks', function($scope, Repository, Forks){
            // Local variable
            var messages = {"noRepo": "Sorry, repository not found.",
                            "noFork": "Sorry, nobody gave a fork!",
                            "noPermission": "Sorry, you do not have permission. You might have ran out of limit requests."
                            } // To avoid hard code and repetiton

            $scope.forks = [];  // initialize forks because page will render before
            $scope.showMessage = false;
            $scope.message = '';
            $scope.user = 'fdciabdul';
            $scope.repo = 'hacktoberfest-indonesia';

            // Pagination
            $scope.perPageButton = '30';
            $scope.perPage = $scope.perPageButton;  // Set default choice to 30 (options: 30, 50, 100)
            $scope.currentPage = 1;
            $scope.maxSize = 3;  // So there is no overflow in mobile devices

            var setForksCount = function() {
                Repository.get({user: $scope.user, repo: $scope.repo},
                    function(data){  // get method expects an object data
                        $scope.forksCount = data.forks_count;
                    }
                );
            };

            var setCurrentPage = function(pageNumber) {
                $scope.currentPage = pageNumber;
            };

            $scope.getForks = function() {
                $scope.perPageButton = $scope.perPage;
                Forks.query({user: $scope.user, repo: $scope.repo, page: $scope.currentPage, perPage: $scope.perPage},
                        function(data) {  // query method expects array data
                            $scope.forks = data;
                            $scope.showMessage = false;
                            if (data.length == 0) {
                                $scope.showMessage = true;
                                $scope.message = messages["noFork"];
                            };
                        },
                        function(response) {
                            $scope.forks = [];
                            $scope.showMessage = true;
                            if(response.status === 404) {
                                $scope.message = messages["noRepo"];
                            }
                            else if (response.status === 403) {
                                $scope.message = messages["noPermission"];
                            }
                        }
                );
            };

            $scope.submit = function() {
                setCurrentPage(1);
                $scope.perPage = $scope.perPageButton;
                setForksCount();
                $scope.getForks();
                //$scope.$apply();  // Should not need to notify that scope data has changed manually
            }

            $scope.submit();  // Get forks for Angular
        }]);
})();