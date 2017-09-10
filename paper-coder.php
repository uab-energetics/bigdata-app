<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <?php require 'assets/partials/meta-includes.html'; ?>
    <title>Paper Coder | Big Data UAB</title>
    <?php require 'assets/partials/css-includes.html'; ?>
    <link rel="stylesheet" href="/assets/vendor/webui-popover/webui-popover.css">
    <link rel="stylesheet" href="/assets/vendor/ionrangeslider/ionrangeslider.min.css">
    <link rel="stylesheet" href="/assets/vendor/select2/select2.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/assets/vendor/jquery-asRange/css/asRange.css">
    <link rel="stylesheet" href="/assets/vendor/pace/loading-bar.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="/assets/vendor/multi-select/multi-select.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="/assets/fonts/material-design/material-design.css">
    <link rel="stylesheet" href="/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="/assets/examples/css/paper-coder.css">
</head>
<body class="animsition">
<?php require 'assets/partials/IE-check.html'; ?>
<?php require 'assets/partials/navbar.html'; ?>
<?php require 'assets/partials/sidebar.html'; ?>
<!-- Page -->
<div style="max-width: 3000px !important;" class="page" ng-controller="PaperCoderController"
     ng-app="paper-coder">
    <div class="page-header">
        <h1 class="page-title">{[{assignment.title}]}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Paper Coder</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" aria-valuenow="90" aria-valuemin="0"
                         aria-valuemax="100" style="width: {[{calculateCompletion()}]}%" role="progressbar">
                        <span class="sr-only">{[{calculateCompletion()}]}% Complete</span>
                    </div>
                </div>
                <button ng-click="save()" type="button"
                        class="btn btn-animate btn-animate-side btn-outline btn-success">
                    <span><i class="icon wb-download" aria-hidden="true"></i>Save</span>
                </button>
                <button ng-click="newBranch()" type="button" class="btn btn-outline btn-primary"><i class="icon md-plus"
                                                                                                    aria-hidden="true"></i>
                    New Branch
                </button>
                <button ng-click="toggleComplete()" ng-if="assignment.done == false" type="button"
                        class="btn btn-outline btn-success"><i class="icon wb-thumb-up" aria-hidden="true"></i> Mark as
                    Complete
                </button>
                <button ng-click="toggleComplete()" ng-if="assignment.done == true" type="button"
                        class="btn btn-outline btn-danger"><i class="icon wb-thumb-down" aria-hidden="true"></i> Mark as
                    Incomplete
                </button>
                <!--<button ng-click="nullify()"
                              type="button" class="btn btn-outline btn-danger"><i class="icon fa-bomb"
                                                                                  aria-hidden="true"></i> Reset
                      </button>-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <bd-branch branch="assignment.encoding.constants" name="'constants'" label="'Experiment Information'">
                    <bd-domain ng-repeat="domain in structure" domain="domain"
                               data-content="And here's some amazing content. It's very engaging. Right?"
                               data-trigger="hover" data-toggle="popover" data-original-title="Hover to trigger">
                        <bd-field ng-repeat="variable in domain.variables" field="variable"></bd-field>
                    </bd-domain>
                </bd-branch>
                <bd-branch ng-repeat="branch in assignment.encoding.branches" branch="branch" name="'branch'+$index"
                           label="'Study Branch '+ ($index+1)">
                    <bd-domain ng-repeat="domain in structure" domain="domain">
                        <bd-field ng-repeat="variable in domain.variables" field="variable"></bd-field>
                    </bd-domain>
                </bd-branch>
            </div>
            <div class="col-lg-6">
                <!-- Start Paper Embedding -->
                <div class="panel">
                    <div class="panel-heading">
                        <div style="margin-right: 200px">
                            <h3 class="panel-title"> {[{paper.title}]}</h3>
                        </div>
                        <div class="panel-actions">
                            <a class="panel-action icon wb-plus" data-toggle="panel-collapse" aria-hidden="true"></a>
                            <div class="dropdown">
                                <a class="panel-action" data-toggle="dropdown" href="#" aria-expanded="false"><i
                                            class="icon wb-settings" aria-hidden="true"></i></a>
                                <div class="dropdown-menu dropdown-menu-bullet" role="menu">
                                    <a ng-click="popOut( paper )" class="dropdown-item" href="javascript:void(0)"
                                       role="menuitem"><i class="icon wb-flag" aria-hidden="true"></i> Pop Out</a>
                                </div>
                            </div>
                            <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen"
                               aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        {[{paper.description}]}
                        <iframe ng-src="{[{paper.url}]}" width="100%" height="700px"></iframe>
                    </div>
                </div>
                <!-- End Paper Embedding -->
            </div>
        </div>
    </div>
    <bd-editor></bd-editor>
</div>
<!-- End Page -->
<?php require 'assets/partials/footer.html'; ?>
<?php require 'assets/partials/js-includes.html'; ?>

<script src="/assets/vendor/webui-popover/jquery.webui-popover.min.js"></script>
<script src="/assets/vendor/ionrangeslider/ion.rangeSlider.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="/assets/vendor/bootstrap-sweetalert/sweetalert.js"></script>
<script src="/assets/vendor/jquery-asRange/jquery-asRange.js"></script>
<script src="/assets/vendor/pace/pace.min.js"></script>
<script src="/assets/vendor/bootstrap-select/bootstrap-select.js"></script>
<script src="/assets/vendor/multi-select/jquery.multi-select.js"></script>
<script src="/assets/js/Plugin/ionrangeslider.js"></script>
<script src="/assets/js/Plugin/panel.js"></script>
<script src="/assets/js/Plugin/bootstrap-select.js"></script>
<script src="/assets/js/Plugin/multi-select.js"></script>

<script src="/app/paper-coder/paper-coder.module.js"></script>
<script src="/app/paper-coder/editor/editor.service.js"></script>
<script src="/app/paper-coder/editor/editor.directive.js"></script>
<script src="/app/paper-coder/domain/domain.directive.js"></script>
<script src="/app/paper-coder/branch/branch.directive.js"></script>
<script src="/app/paper-coder/field/field.directive.js"></script>

<script src="/app/paper-coder/inputs/input.text.directive.js"></script>
<script src="/app/paper-coder/inputs/input.number.directive.js"></script>
<script src="/app/paper-coder/inputs/input.boolean.directive.js"></script>
<script src="/app/paper-coder/inputs/input.select.directive.js"></script>
<script src="/app/paper-coder/inputs/input.multiselect.directive.js"></script>
<script src="/app/paper-coder/inputs/input.range.directive.js"></script>

<script src="/app/paper-coder/paper-coder.service.js"></script>
<script src="/app/paper-coder/paper-coder.controller.js"></script>

<script>
    (function (document, window, $) {
        $(document).ready(function () {
            Site.run();
            ApplicationService.renderSession();
        });
    })(document, window, jQuery);
</script>
</body>
</html>