/**
*  Services
*
* Queries the Github API
*/
(function(){
    angular.module('forksServices', ['ngResource'])

        // Add factory Forks
        .factory('Forks', ['$resource', function($resource){
            return $resource('https://api.github.com/repos/:user/:repo/forks?page=:page&per_page=:perPage');
        }])

        // Add factory Repository
        .factory('Repository', ['$resource', function($resource){
            return $resource('https://api.github.com/repos/:user/:repo');
        }]);    
})();
