import * as URLs from 'src/es/URLs';
import * as AuthService from 'AuthService';

var API_BASE_PATH = URLs.getUrl('api');

function forkProject( projectKey, newName, newDescription ){
    return http({
        url: "/projects/"+projectKey+"/fork",
        method: "POST",
        data: {
            name: newName,
            description: newDescription
        }
    })
}
function getUsersAssignments( id ){
    return http({
        url:    "/users/"+id+"/assignments",
        method: "GET",
        dataType: "json"
    })
}
function getAssignment( key ){
    return http({
        url: "/assignments/" + key,
        method: "GET",
        dataType: "json"
    });
}
function putAssignment( assignmentObject, async ){
    if( async == 'undefined' ) async = true;
    return http({
        url: "/assignments/" + assignmentObject._key,
        method: "PUT",
        async: async,
        data: {
            "done": assignmentObject.done,
            "completion": assignmentObject.completion,
            "encoding": assignmentObject.encoding
        }
    });
}
function loadPaperCoder( assignmentKey ){
    return http({
        url: "/loadPaperCoder?key="+assignmentKey,
        method: "GET",
        dataType: "json"
    });
}
function getProjectsData(){
    return http({
        url: "/loadProjects",
        method: "GET",
        dataType: "json"
    });
}
function getProjectBuilderData( projectKey ){
    return http({
        url: "/loadProjectBuilder",
        method: "GET",
        data: {
            'projectKey': projectKey
        },
        dataType: "json"
    })
}
function postProjectStructure( projectKey, structure ){
    return http({
        url: "/projects/"+projectKey+"/structure",
        method: "POST",
        data: structure
    })
}
function loadCodeBook(){
    return http({
        url: "/loadCodeBook",
        method: "GET",
        dataType: "json"
    })
}
function postProject( projectObject ){
    return http({
        url: "/projects",
        method: "POST",
        data: projectObject,
        dataType: "json"
    })
}
function postProjectEnrollments( registrationCode, userKey){
    return http({
        url: "/projects/members",
        method: "POST",
        data: {
            "userKey": userKey,
            "registrationCode": registrationCode
        },
        dataType: "json"
    })
}
function postForgotPassword( email ){
    return http({
        url: "/users/recover",
        method: "POST",
        data: {
            "email": email,
            "callback": URLs.getUrl( "resetPasswordCallback" )
        }
    })
}
function postResetPassword( newPassword, hash_code ){
    return http({
        url: "/users/reset",
        method: "POST",
        data: {
            "hash_code": hash_code,
            "newPassword": newPassword
        }
    });
}
function loadAssignments(){
    return http({
        url: "/loadAssignments" + "?userKey=" + AuthService.getUser()._key,
        method: "GET",
        dataType: "json"
    })
}
function loadManageProject( projectKey ){
    return http({
        url: "/loadManageProject" + "?projectKey=" + projectKey,
        method: "GET",
        dataType: "json"
    });
}
function loadConflictResolution( assignmentKey ){
    return http({
        url: "/loadConflictResolution" + "?assignmentKey=" + assignmentKey,
        method: "GET",
        dataType: "json"
    })
}
function loadReport( paperKey ){
    return http({
        url: "/activities/report" + "?paperKey=" + paperKey,
        method: "GET",
        dataType: "json"
    })
}
function uploadPapersCSV( projectKey, formData ){
    return http({
        url: "/projects/"+projectKey+"/papers",
        method: "POST",
        data: formData,
        dataType: "json"
    })
}
function uploadPapersByID( projectKey, pmcIDs ){
    return http({
        url: "/projects/"+projectKey+"/papers/byPMCID",
        method: "POST",
        data: {
            "pmcIDs": pmcIDs
        },
        dataType: "json"
    });
}
function moreAssignmentsPlease( userKey, projectKey, howMany ){
    return http({
        url: "/moreAssignmentsPlease",
        method: "POST",
        data: {
            userKey: userKey,
            projectKey: projectKey,
            howMany: howMany
        }
    });
}
function makeProjectOwner(projectKey, otherUserEmail){
    return http({
        url: "/projects/"+projectKey+"/makeOwner",
        method: "POST",
        data: {
            "userEmail": otherUserEmail
        },
        dataType: "json"
    })
}
function http( config ){
    config['url'] = API_BASE_PATH + config['url'];
    config['headers'] = {
        "Authorization": "Bearer " + AuthService.getToken() // token here
    };
    config['statusCode'] = {
        500: reportError,
        401: handleUnauthorized
    };
    return $.ajax(config).complete( function( res ){ AuthService.renew() } );
}

function reportError( err ){
    var report = {};
    if( err.responseJSON ) report = err.responseJSON;
    else if ( err.responseText ) report = err.responseText;
    else report = JSON.stringify( err );

    var activity = window.location.href;

    console.log( "generating error report", err );
    $.ajax({
        url: API_BASE_PATH + "/reportError",
        type: "POST",
        data: {
            "activity": activity,
            "error": report
        }
    }).complete( function( res ){
        console.log( "sent error report", res )
    });
}
function handleUnauthorized( err ){
    // The server is not appending the 'Access-Control-Allow-Origin' header into the response, preventing me from reading the status code.
    // window.location = window.location.hostname;
    window.location = "login.html";
}

export {
    loadManageProject,
    loadPaperCoder,
    loadCodeBook,
    loadAssignments,
    loadConflictResolution,
    loadReport,
    http,
    getAssignment,
    putAssignment,
    getUsersAssignments,
    getProjectsData,
    postProject,
    getProjectBuilderData,
    postProjectStructure,
    postProjectEnrollments,
    postForgotPassword,
    postResetPassword,
    uploadPapersCSV,
    uploadPapersByID,
    makeProjectOwner,
    reportError,
    handleUnauthorized,
    moreAssignmentsPlease,
    forkProject
}