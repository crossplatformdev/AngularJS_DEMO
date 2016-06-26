<?php
namespace ArrayKeys;
?>
<!DOCTYPE html>
<html ng-app="ArrayKeys">
    <head>
        <title>Función array_keys( ) - Elías A. Angulo Klein</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/arraykeys.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <script src="js/app.js"></script>
    </head>

    <body ng-controller="ArrayKeysController as aks">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <aks-navbar ng-show="true"></aks-navbar>
        </nav>

        <!-- Page Content -->
        <div class="container"ng-controller="TabController as tab">

            <div class="row">

                <div class="col-md-3">
                    <aks-nav ng-show="true"></aks-nav>
                </div>

                <div class="col-md-9">
                    <aks-content ng-show="tab.isSet(tab.tab)"></aks-content>
                </div>

                <div class="ratings">
                    <p class="pull-right">{{aks.reviews.length}} reviews</p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        {{aks.reviews.stars}} stars
                    </p>
                </div>
            </div>
            <div class="well">

                <aks-reviews></aks-reviews>


                <aks-messages ng-show="true"></aks-messages>

            </div>
        </div>

    </div>

    <div class="container">

        <hr>

        <!-- Footer -->
        <aks-footer ng-src="aks-footer.html"></aks-footer>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>    

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script>
                    $(document).ready(function () {
                        $("#email").attr("href", "mailto:elias-angulo-klein@gmail-com?Subject=Array_Keys".replace(/-/g, "."));
                        $('#email').click(function () {
                            window.open(this.href, 'Sending an email to Elías', '_blank');
                            return false;
                        });
                    });
        </script>
    </div>
    <!-- /.container -->


</body>

</html>        
