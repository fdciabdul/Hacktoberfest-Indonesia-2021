/**
* forks Module
*
* Gets forks data for a Github repository
*/
(function() {
// Self executing function to ensure that code is not declared
// in the global scope
    angular.module('forks', ['ui.bootstrap', 'forksControllers', 'forksDirectives']);
})();