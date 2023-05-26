<?php
/**
 * Main entry point in site
 */
global $db;
require_once('./config.php');
require_once "./lib/common.php";


// -- start of render
include "./includes/header.php";

if ($db == null) {
    renderError("No database connection");
} else {
    if (false) { // todo: check user
        // user page
    } else {
        renderMainContent();
    }    
}

include "./includes/footer.php";
// --- end of render


/**
 * Generate an error message box
 */
function renderError($message) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print $message; ?>
        </div>
    <?php
}

/**
 * Content displayed when visitor user shows on main page
 */
function renderMainContent() {
    ?>
        <h1>Produse</h1>
        <div id="products"></div>
        <script type="text/javascript">
            loadAllProducts("products");
        </script>
    <?php
}
