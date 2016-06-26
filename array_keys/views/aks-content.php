<?php
namespace ArrayKeys;
require_once '../src/ArrayKeys.php';
$arrayKeys = new ArrayKeys();
$source = file("../src/ArrayKeys.php");
?>
<div class="thumbnail">

    <div class="caption-full">

        <div class="left_panel" ng-show="tab.isSet(0)" ng-controller="DummyRESTController as drc">
            <div ng-class="{ active:tab.isSet(0) }" ><a ng-click="tab.setTab(0)" class="btn btn-success">Test Function</a>
                <!--  Review Form -->
                <form name="drc.Form" ng-submit="drc.restFunction()" ng-show="tab.isSet(0)">
                    <!--  Review Form -->
                    <h4>Test the function</h4>
                    <fieldset class="form-group">
                        <textarea id="postData" name="postData" ng-model="drc.postData" ng-bind="drc.postData" class="form-control" placeholder="Invoke my_array_keys()" title="Function Call"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                    </fieldset>
                </form>
                <hr>
                <!--  Review Tab's Content  -->
                <pre>{{ drc.postData }}</pre>
                <!--  Live PreviewCtrl. -->
                <pre>{{ drc.result }}</pre>
            </div>
        </div>
    </div>


    <div class="right_panel"  ng-show="tab.isSet(1)">
        <h3><b>Original array_keys( )</b></h3>
        <br>
        <p><a href="http://php.net">PHP.net</a> examples.</p>
        <pre>
            <?php $array = array(0 => 100, "color" => "red"); ?>
            <?php print_r(array_keys($array)); ?>
        </pre>
        <pre>
            <?php $array = array("blue", "red", "green", "blue", "blue"); ?>
            <?php print_r(array_keys($array, "blue")); ?>
        </pre>
        <pre>
            <?php $array = array("color" => array("blue", "red", "green"), "size" => array("small", "medium", "large")); ?>
            <?php print_r(array_keys($array)); ?>
        </pre>
    </div>


    <div class="left_panel"  ng-show="tab.isSet(1)">
        <h3><b>My array_keys( )</b></h3>
        <br>
        <p><a href="http://php.net">PHP.net</a> examples.</p>
        <pre>                
            <?php $array = array(0 => 100, "color" => "red"); ?>
            <?php print_r($arrayKeys->my_array_keys($array)); ?>
        </pre>
        <pre>
            <?php $array = array("blue", "red", "green", "blue", "blue"); ?>
            <?php print_r($arrayKeys->my_array_keys($array, "blue")); ?>
        </pre>
        <pre>
            <?php $array = array("color" => array("blue", "red", "green"), "size" => array("small", "medium", "large")); ?>
            <?php print_r($arrayKeys->my_array_keys($array)); ?>
        </pre>
    </div>

    <div class="left_panel" ng-model="aks"  ng-show="tab.isSet(2)">
        <h3>
            <b>function</b> 
            <pre>{{aks.function.prototype}}</pre>
        </h3>
        <br>
        <pre>
            <?php
            for ($i = 0; $i < count($source); $i++) {
                $line = $source[$i];
                $str = ($i > 10) ? $i . ":" . $line : "0$i" . ":" . $line;
                echo $str;
            }
            ?>
        </pre>

    </div> 
</div>
</div>