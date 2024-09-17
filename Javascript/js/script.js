// Javascript
document.querySelector('#btn_sumjs').addEventListener('click', () => {
    let v1 = parseInt(document.querySelector('#v1').value)
    let v2 = parseInt(document.querySelector('#v2').value)
    let sum = v1 + v2

    document.querySelector('#result').value = sum
})

// Jquery
$('#btn_sumjq').click(() => {
    let v1 = parseInt($('#v1').val())
    let v2 = parseInt($('#v2').val())
    let sum = (v1 + v2)

    $('#result').val(sum)
})

// Jquery
$('.inputText').keyup(function() {
    $('.resultText').text($(this).val());
});

// Jquery
$('#box').on({
    click: () => $('.txt').text('Quadrado foi clicado'),
    mouseenter: () => $('.txt').text('Quadrado foi adentrado'),
    mouseleave: () => $('.txt').text(''),
    dblclick: () => $('.txt').text('Quadrado foi clicado 2 vezes')
})

$('#box2').click(function() {
    $('#box').trigger('click')
})


// Jquery
$(document).mousemove(event => {
    $('.positionText').text(`Mouse X: ${event.pageX} Mouse Y: ${event.pageY} Item clicado: ${event.target.id}`)
})

// Jquery event which
$(document).on({
    click: event => $('.info1').text(`${event.type}, ${event.which}`),

    keydown: function(event) {
        $('.info2').text(`${event.type}, ${event.which}`);
        if(event.which == 13) {
            alert('Enter pressionado')
        }   
    }    
})

// Jquery stop proppagation
$('.ctn1').click(event => {
    event.stopPropagation();
    alert('clique feito na div');
});

$('.ctn1 p').click(event => {
    event.stopPropagation();
    alert('clique feito no p');
});

$('.ctn1 span').click(event => {
    event.stopPropagation();
    alert('clique feito no span');
});

// Jquery parent selector
// $('h4').parentsUntil('div').css({'border': '1px solid #f00'});
// // $('li').parents().css({'border': '1px solid #0f0'});
// $('span').parent().css({'border': '1px solid #0f0'});


// Jquery children selector
// $('.div-pai').children().css({'border': '1px solid #f00'});
// $('.div-pai').find('ul:first').css({'border': '1px solid #f00'});
// $('.div-pai').find('ul:last').css({'border': '1px solid #f00'});
$('.div-pai li:first').find('*').css({'border': '1px solid #f00'});


// Jquery siblings selector
// $('.sibling-pai span h3').siblings('p').css({'border': '1px solid #f00'});
$('.sibling-pai span h2').next().css({'border': '1px solid #f00'});
$('.sibling-pai span h2').prev().css({'border': '1px solid #f00'});
// prev, prevAll e prevUntil
// next, nextAll e nextUntil

