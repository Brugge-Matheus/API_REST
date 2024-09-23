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

// filters first, last and eq
$('.filter p').first().css({'border':'1px solid #f00'});
$('.filter p').last().css({'border':'1px solid #f00'});
$('.filter p').eq(3).css({'border':'1px solid #0f0'});

$('.filter p').filter('.border').css({'color': '#f00'})
$('.filter p').not('.border').css({'color': '#00f'})

// funções de manipulção de texto (val, text, html)
$('.text-manipulation h2').click(function () { 
    alert(`Texto: ${$(this).text()}`)
 })

$('.text-manipulation').click(function (event) { 
    event.stopPropagation();
    alert(`Texto: ${$(this).html()}`);
 })

 $('input[class="show-text"]').click((event) => {
    event.preventDefault();
    let textValue = $('input[name="value"]').val();

    alert(textValue.toUpperCase());
 })

 //modificar valores dos atributos html
 $('.box-attr').click(function(e) {
    if($(this).attr('class').includes('vermelho')) {
        $(this).attr('class', 'box-attr azul');
        return;
    }

    $(this).attr('class', 'box-attr vermelho');

 })


//  Efeitos hide() e show()
function showBox() {
    $('.box-attr').show();
}
function hideBox() {
    $('.box-attr').hide();
}

// função toggle
const box = $('.box-attr');

function hideOrShow() {
    box.toggle();
    if(box.is(':visible')) {
        $('#hide-or-Show-btn').text('Ocultar');
    } else {
        $('#hide-or-Show-btn').text('Mostrar');

    }

}

// animações com animate()
$('#btn-aumentar').click(function() {
    $('.box-animation').animate({'width': '500px', 'height': '500px'})
});
$('#btn-diminuir').click(function() {
    $('.box-animation').animate({'width': '200px'}).animate({'height': '200px'})
});

// animate com toggle
$('#btn-tamanho').click(() => {
    $('.box-animation').animate({width: 'toggle', height: 'toggle'})
});

$('#btn-visibilidade').click(() => {
    $('.box-animation').animate({opacity: 'toggle'})
});

// uso do delay
$('#btn-largura').click(() => {
    $('.box-animation').delay(2000).animate({width: '700px'})
})

$('#btn-largura-e-altura').click(() => {
    $('.box-animation').delay(2000).animate({width: '700px'}).delay(2000).animate({height: '500px'})
})

// fade in e fade out
$('#btn-ocultar-com-fade').click(() => {
    $('.box-animation').fadeOut(3000, () => alert('Item oculto'));
})
$('#btn-mostrar-com-fade').click(() => {
    $('.box-animation').fadeIn(3000);
})
$('#btn-ocultar-mostrar-com-fade').click(() => {
    $('.box-animation').fadeOut().delay(1000).fadeIn();
})