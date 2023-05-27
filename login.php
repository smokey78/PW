<?php

/**
 * Login form
 */
global $db;
require_once('./config.php');
require_once "./lib/common.php";


// -- start of render
include "./includes/header.php";

if ($db == null) {
    render_error("No database connection");
} else {
    render_login_form();
}

include "./includes/footer.php";
// --- end of render



/**
 * The login form - javascript support (commit via POST REST call) is in front.js
 */
function render_login_form()
{
?>
    <h1>Login</h1>
    <form id="loginForm">
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Adresa de email</div>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Parola</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button id="submitButton" type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    <?php render_loading(); ?>

    <div id="result" style="display:none">
    </div>
    
    
    <script type="text/javascript">
        // register submit event and process it in front.js
        $("#loginForm").submit(loginSubmit);
                
        // callback if everything is ok
        function loginOk(data) {
            console.log("Login OK", data);
            $("#loading").hide();
            
            $("#result")
                .html(data.message)
                .addClass("alert alert-success")
                .show();
        }
        
        function loginError(data) {
            console.log("Login ERROR", data);
            $("#loading").hide();
            
            $("#result")
                .html(data)
                .addClass("alert alert-danger")
                .show();
        }
    </script>
<?php
}
