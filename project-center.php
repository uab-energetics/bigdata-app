<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <?php require 'assets/partials/meta-includes.html'; ?>
    <title>Projects | Big Data UAB</title>
    <?php require 'assets/partials/css-includes.html'; ?>
    <link rel="stylesheet" href="/assets/vendor/jquery-selective/jquery-selective.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/assets/examples/css/apps/projects.css">
</head>
<body class="animsition app-projects">
<?php require 'assets/partials/IE-check.html'; ?>
<?php require 'assets/partials/navbar.html'; ?>
<?php require 'assets/partials/sidebar.html'; ?>
<!-- Page -->
<div class="page" ng-app="project-center" ng-controller="ProjectCenterController">
    <div class="page-header">
        <h1 class="page-title">Project Center</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">You are Here</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="projects-wrap">
            <ul id="project-ul" class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
                data-plugin="animateList" data-child=">li">
                <!-- Dynamically Populated -->
                <li ng-repeat="project in projects">
                    <div class="panel">
                        <figure class="overlay overlay-hover animation-hover">
                            <img class="caption-figure overlay-figure" src="..\assets/photos/placeholder.png">
                            <figcaption
                                    class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                                <div class="btn-group">
                                    <div class="dropdown float-left">
                                        <button type="button" class="btn btn-icon btn-pure btn-default" title="Setting">
                                            <i class="icon wb-edit" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" ng-click="openProjectBuilder(project)"
                                               href="javascript:void(0)">Edit Questions</a>
                                            <a class="dropdown-item" ng-click="openForkProject(project)"
                                               href="javascript:void(0)">Fork Project</a>
                                        </div>
                                    </div>
                                    <div class="dropdown float-left">
                                        <button type="button" class="btn btn-icon btn-pure btn-default" title="Setting">
                                            <i class="icon wb-user-add" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" ng-click="inviteCollaborator(project)"
                                               href="javascript:void(0)">Invite Collaborator</a>
                                        </div>
                                    </div>
                                </div>
                                <button ng-click="openProjectManager(project)" type="button"
                                        class="btn btn-outline btn-default project-button">
                                    View Project
                                </button>
                            </figcaption>
                        </figure>
                        <div class="time float-right" style="color: green;">
                            <span ng-bind="project.registrationCode"></span>
                        </div>
                        <div class="text-truncate">
                            <span ng-bind="project.name"></span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Add Project Form -->
    <div class="modal fade" id="addProjectForm" aria-hidden="true" aria-labelledby="addProjectForm"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Create New Project</h4>
                </div>
                <div class="modal-body">
                    <form name="createProjectForm" action="" role="form">
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="name">Project name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Project name">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="name">Project description:</label>
                            <textarea name="description" class="form-control mb-sm" placeholder="Project description."
                                      rows="4"></textarea>
                        </div>
                        <!--<div class="form-group">-->
                        <!--<label class="form-control-label mb-15" for="name">Choice people to your project:</label>-->
                        <!--<select multiple="multiple" class="plugin-selective"></select>-->
                        <!--</div>-->
                    </form>
                </div>
                <div class="modal-footer text-left">
                    <button class="btn btn-primary" data-dismiss="modal" type="button" ng-click="createProject()">
                        Create
                    </button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Project Form -->
    <!-- Fork Project Form -->
    <div class="modal fade" id="forkProjectForm" aria-hidden="true" aria-labelledby="forkProjectForm"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Fork Existing Project</h4>
                </div>
                <div class="modal-body">
                    <form name="createProjectForm" action="" role="form">
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="name">New Project Name:</label>
                            <input type="text" class="form-control" id="newName" name="name" placeholder="Project name">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="name">New Project Description:</label>
                            <textarea name="description" id="newDescription" class="form-control mb-sm"
                                      placeholder="Project description."
                                      rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-left">
                    <button class="btn btn-primary" data-dismiss="modal" type="button" ng-click="submitFork()">
                        Fork
                    </button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fork Project Form -->
</div>
<!-- Site Action -->
<button class="site-action btn-raised btn btn-success btn-floating" data-target="#addProjectForm"
        data-toggle="modal" type="button">
    <i class="icon wb-plus" aria-hidden="true"></i>
</button>
<!-- End Site Action -->

<?php require 'assets/partials/footer.html'; ?>
<?php require 'assets/partials/js-includes.html'; ?>
<script src="/node_modules/angular/angular.min.js"></script>

<script src="/assets/vendor/bootstrap-sweetalert/sweetalert.js"></script>
<script src="/assets/vendor/jquery-selective/jquery-selective.min.js"></script>
<script src="/assets/vendor/bootbox/bootbox.js"></script>
<script src="/assets/vendor/peity/jquery.peity.min.js"></script>
<script src="/app/project-center/project-center.module.js"></script>
<script src="/app/project-center/project-center.controller.js"></script>

<script src="/assets/js/Plugin/animate-list.js"></script>
<script src="/assets/js/Plugin/bootbox.js"></script>
<script src="/assets/js/Site.js"></script>
<script src="/assets/js/App/Projects.js"></script>
<script src="/assets/js/Plugin/peity.js"></script>

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