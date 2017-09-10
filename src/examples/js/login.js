(function(document, window, $){
    'use strict';

    var Site = window.Site;
    $(document).ready(function(){
        Site.run();
    });

})(document, window, jQuery);


function login(){
    var email = $("#emailInput").val();
    var password = $("#passwordInput").val();

    var promise = AuthService.login( email, password );
    promise.success( win );
    promise.error( fail );

    return false;
}

function win(){
    console.log( AuthService.getUser() );
    console.log( AuthService.getToken() );
    window.location = "assignments.html";
}

function fail( response ){
    console.log( "fail", response );
    var data = response.responseJSON;
    data.reason = data.reason.toUpperCase();

    if( data.reason === "INACTIVE" ){
        swal({
            title: "Not so Fast!",
            text: "You need to validate your email first.",
            type: "warning",
            showCancelButton: false,
            confirmButtonClass: "btn-warning",
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });
    }
    if( data.reason === "INVALID") {
        swal({
            title: "Invalid Login",
            text: "Try Again",
            type: "error",
            showCancelButton: false,
            confirmButtonClass: "btn-danger",
            confirmButtonText: 'OK',
            closeOnConfirm: false
        });
    }
}