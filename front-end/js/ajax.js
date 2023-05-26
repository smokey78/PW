const API_URL = "/ProjectPW/api/index.php?api=";

/**
 * Call an API GET
 */
function apiGet(apiCall, onSuccess) {
    $.ajax({
        url: API_URL + apiCall,
        contentType: "application/json",
        dataType: 'json',
        success: function (result) {
            console.log("GET " + apiCall, result);
            onSuccess(result);
        },
        error: function (xhr, status, error) {
            console.error("GET " + apiCall, status, error, xhr)
            renderError("Nu am putut apela GET " + apiCall, error, xhr);
        }
    })
}

function renderError(message, error, xhr) {
    $("#errorMessage").html(
        "<h3>Eroare</h3>" 
        + "<p><strong>" + message + "</strong> " 
        + "<br/>" + error
        + "<br/>" + xhr.status + " " + xhr.statusText 
        + "<br/><small>" + xhr.responseText + "</small>" 
        + "</p></div>");
    $("#errorMessage").show();
}