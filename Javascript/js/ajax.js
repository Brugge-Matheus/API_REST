// Função para escapar caracteres especiais e evitar XSS
function escapeHTML(str) {
    return str.replace(/[&<>"'`=\/]/g, function(s) {
        return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;',
            '=': '&#x3D;',
            '`': '&#x60;'
        }[s];
    });
}


function addComment(name, comment) {
    const escapedName = escapeHTML(name);
    const escapedComment = escapeHTML(comment);

    $('.comments-container').prepend(`
        <div class="comment-entry">
            <p class="name">${escapedName}</p>
            <p class="comment">${escapedComment}</p>
        </div>
    `);
}


function loadComments() {
    $.ajax({
        url: 'http://localhost/Jquery/ajax/select.php',
        method: 'POST',
        dataType: 'json'
    }).done(function(result) {
        console.log(result);

        $('.comments-container').empty();
        for (let i = 0; i < result.length; i++) {
            addComment(result[i].name, result[i].comment);
        }
    });
}


$('#form-comment input[type="submit"]').click(function (e) {
    e.preventDefault();

    let u_name = $('.name').val();
    let u_comment = $('.comment').val();

    $.ajax({
        url: 'http://localhost/Jquery/ajax/insert.php',
        method: 'POST',
        data: {
            name: u_name,
            comment: u_comment
        },
        dataType: 'json'
    }).done(function(result) {
        $('.name').val('');
        $('.comment').val('');
        console.log(result);
        
        
        addComment(u_name, u_comment);
    });
});


$(document).ready(function () {
    loadComments();
});
