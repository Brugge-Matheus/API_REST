$('#loadBtn').on('click', function(event) {
    event.preventDefault();

    $('.response').load('http://localhost/jquery/example.html', (event) => console.log('Dados dados enviados com sucesso'))
});