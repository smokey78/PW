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

/**
 * Call an API POST with payload
 */
function apiPost(apiCall, payload, onSuccess, loginError) {
    $.ajax({
        url: API_URL + apiCall,
        data: JSON.stringify(payload),
        
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        
        success: function (result) {
            console.log("POST " + apiCall, result);
            onSuccess(result);
        },
        
        error: function (xhr, status, error) {
            console.error("POST " + apiCall, status, error, xhr)
            if (!!loginError) {
                loginError(xhr.responseText );
            } else {
                renderError("Nu am putut apela POST " + apiCall, error, xhr);
            }
        }
    })
}


/** 
 * Display an error message 
 */
function renderError(message, error, xhr) {
    $("#loading").hide();
    
    $("#errorMessage").html(
        "<h3>Eroare</h3>" 
        + "<p><strong>" + message + "</strong> " 
        + "<br/>" + error
        + "<br/>" + xhr.status + " " + xhr.statusText 
        + "<br/><small>" + xhr.responseText + "</small>" 
        + "</p></div>");
    $("#errorMessage").show();
}