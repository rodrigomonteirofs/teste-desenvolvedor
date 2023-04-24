function dropdown(recebeClick){
    let clickIn = document.querySelector(".dropDown");
    let eventos = ['block','none'];

    clickIn.style.display = eventos[recebeClick];
}

function pegaMes(recebeItem){
    let item = document.querySelector(`#item-${recebeItem}`).innerHTML;
    let gravaMes = document.querySelector('#recebeMes');
    
    gravaMes.value = item;
}

function mostraMenu(){
    let recebeMenu = document.querySelector('.menu');
    let recebeItensMenu = document.querySelector('.itens-menu');

    if(recebeItensMenu.style.display === 'block'){
        recebeItensMenu.style.display = 'none';
    } else{
        recebeItensMenu.style.display = 'block';
    }
}

$(function() {
    $('.modal_ajax').on('click', function(e){
        e.preventDefault();
        
        $('.modal_bg').show();
        var link = $(this).attr('href');
        $.ajax({
            url:link,
            type: 'GET',
            success:function(html){
            $('.modal').html(html);
            }
        });

    });
});

// busca cliente

$(document).ready(function() {
    $("#pesquisaPorNome").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "busca.php",
                dataType: "json",
                data: {
                    nome: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.label,
                            value: item.label,
                            id: item.value
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            $("#resultados").html("<a class='modal_ajax' href='EditViewClientes.php?id=" + ui.item.id + "'>" + ui.item.label + "</a>");
            return false;
        }
    });
});

// busca produto

$(document).ready(function() {
    $("#pesquisaPorProduto").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "busca.php",
                    dataType: "json",
                    data: {
                        produtos: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.label,
                                value: item.label,
                                id: item.value
                            };
                        }));
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                $("#resultados").html("<a class='modal_ajax' href='EditViewProdutos.php?id=" + ui.item.id + "'>" + ui.item.label + "</a>");
                return false;
            }
        });
    });


    
$(function() {
        $('body').on('click', '.modal_ajax', function(e){
            e.preventDefault();
            
            $('.modal_bg').show();
            var link = $(this).attr('href');
            $.ajax({
                url:link,
                type: 'GET',
                success:function(html){
                    $('.modal').html(html);
                }
            });
    
        });
    });
    
$('.fechaModal').on('click', function(e) {
        e.preventDefault();
        $('.modal_bg').hide();
    });
