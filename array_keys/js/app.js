(function () {
    var app = angular.module('ArrayKeys', []);
    /**
     * Controllers.
     */
    app.controller('ArrayKeysController', ['$http', function ($http) {
            var helper = this;
            this.aks = {
                "arrayKeys":
                        {
                            "function": [],
                            "result": [],
                            "examples": [],
                            "reviews": []
                        }
            };

            this.addComment = function () {
                $http.get('/array_keys/server.php').success(function (data) {
                    console.log(data);
                    helper.aks.reviews.push(data);
                });
            }

            $http.get('/array_keys/js/function.json').success(function (data) {
                console.log(data);
                helper.function = data;
            });
            $http.get('/array_keys/js/messages.json').success(function (data) {
                console.log(data);
                helper.reviews = data.reviews;
            });
            var data = {
                "array": "[0, 1, 2, 3, 4, 5]",
                "searchValue": "5",
                "strict": "false",
                "expandArray": "false",
                "depth": "0",
                "MAX_DEPTH": "INF",
                "keys": "array()"
            };
        }]);

    app.controller("DummyRESTController", ["$http", function ($http) {
            this.postData = JSON.stringify({"array": [0, 1, 2, 3, 4, 5], "search_value": "5", "strict": false, "expand_array": false, "depth": 0, "max_depth": "INF", "keys": []});
            this.result = {};
            var helper = this;

            this.restFunction = function () {
                $http.post('/array_keys/server.php', JSON.parse(helper.postData)).success(function (data) {
                    helper.result = data;
                    console.log(postData);
                    console.log(data);
                }).error(function (data) {
                    console.log(postData);
                    console.log(data);
                });

            };
        }]);

    app.controller("ReviewController", ['$http', function ($http) {
            var helper = this;
            this.review = {};
            this.addReview = function (arrayKeys) {
                console.log(arrayKeys);
                arrayKeys.reviews.push(this.review);
                this.review = {};
            };
        }]);

    app.controller("TabController", [function () {
            this.tab = 1;
            this.isSet = function (checkTab) {
                return this.tab === checkTab;
            };
            this.setTab = function (setTab) {
                this.tab = setTab;
            };
        }]);


    /**
     * Directives, one per view.
     */
    app.directive("aksNav", function () {
        return {
            restrict: 'E',
            templateUrl: "views/aks-nav.html"
        };
    });
    app.directive("aksNavbar", function () {
        return {
            restrict: 'E',
            templateUrl: "views/aks-navbar.html"
        };

    });
    app.directive("aksContent", function () {
        return {
            restrict: 'E',
            templateUrl: "views/aks-content.php"
        };
    });
    app.directive("aksReviews", function () {
        return {
            restrict: 'E',
            templateUrl: "views/aks-reviews.html"
        };
    });
    app.directive("aksMessages", function () {
        return {
            restrict: 'E',
            templateUrl: "views/aks-messages.html"
        };
    });
    app.directive("aksFooter", function () {
        return {
            restrict: 'E',
            templateUrl: "views/aks-footer.html"
        };
    });
})();