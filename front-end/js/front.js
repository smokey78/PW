/**
 * Library for front-end AJAX manipulation
 */
function loadAllProducts() {
    console.log("Loading all products");

    apiGet("/products", renderProducts)
}

function renderProducts(data) {
    console.log("renderProducts", data);
    
    var row = $('<div>', {class:'row'});
    
    data.map((p) => {
        console.log(p);
        var prod = $('<div>', { class: 'product card' , width:"200px", heigth:"100px", })
            .append(
                $('<img>', { class: 'card-img-top', src: "./Images/" + p.image }))
                .append(
                    $('<div>', { class: 'card-body' })
                    .append($('<h3>', { text: p.name }))
                    .append($('<p>', { text: p.description }))
                );
        
        var col = $('<div>', {class:'col', style:'width:10em'});
        col.append(prod);
        row.append(col);
        
    });
    
    $('#products').append(row);
}