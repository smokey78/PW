<?php

/**
 * Library for common functions used across the backend
 */

// global variable to hold database connection
global $db;
$db = get_database();


/**
 * Connect to the database and provide a link
 */
function get_database()
{
	try {
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

		if (!$link) {
			return null; // let the others handle the error
			//die_with_error('Could not connect: ' . mysqli_connect_errno());
		}

		mysqli_select_db($link, DB_NAME);

		return $link;
	} catch (Exception $e) {
		return null;
		//die_with_error('Could not connect to DB server: ' . $e->getMessage());
	}
}

/**
 * Close the database
 */
function close_db()
{
	global $db;

	mysqli_close($db);
}

/**
 * Create a prepared statement for the database
 */
function prepare_statement($query)
{
	global $db;
	return mysqli_prepare($db, $query);
}

/**
 * Create a prepared statement for the database
 */
function query($query)
{
	global $db;
	return mysqli_query($db, $query);
}


/**
 * Respond back to the front-end with a not-authorized (401)
 */
function deny($msg)
{
	http_response_code(401);
	die('Unauthorized: ' . $msg);
}

/**
 * Stop processing and respond back to front-end with custom HTTP error
 */
function die_with_error($msg = '', $error = 500)
{
	http_response_code($error);
	die($msg);
}


/**
 * Generate an error message box
 */
function render_error($message)
{
?>
	<div class="alert alert-danger" role="alert">
		<?php print $message; ?>
	</div>
<?php
}

/**
 * Generate an loading spinbar
 */
function render_loading()
{
?>
	<div id="loading" style="display:none">
		<div class="d-flex justify-content-center">
			<img height="70px" src="<?php print ROOT_URL ?>/front-end/img/loading.gif" />
		</div>
	</div>
<?php
}

/**
 * Extract the api call from URL
 */
function get_api_call()
{
	global $_GET;
	global $_SERVER;

	if (isset($_GET['api'])) {
		return ($_GET['api']);
	}

	$uri = $_SERVER['REQUEST_URI'];
	return str_replace('/api/', '/', $uri);
}



/**
 * Check if it's a POST call
 */
function is_post_call()
{
	global $_SERVER;
	return ($_SERVER['REQUEST_METHOD'] === 'POST');
}

/**
 * Extract the payload sent via POST call
 */
function get_post_payload() {
	$post = file_get_contents("php://input", true);
	return json_decode($post);
}
