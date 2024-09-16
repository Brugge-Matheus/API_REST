// Get
$('#loadBtn').click(function (e) { 
    e.preventDefault();

    $.ajax({
        url: 'http://localhost/API_REST/get_all/',
    }).done(function(response) {
        console.log(response);
    
    }).fail(function(xhr, status, error) {
        console.log(error);
    }).always(function(xhr, status) {
        console.log(status);
        
    })
    
});

// Simplify Get
$('#loadBtn2').click(function (e) { 
    e.preventDefault();
    
    $.get("http://localhost/API_REST/get_all/", function(result) { 
        console.log(result);
        
     });
});

// Post
