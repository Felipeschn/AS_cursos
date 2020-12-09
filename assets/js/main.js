$("#produto").change(function(){
    $.ajax({
        url : "vendas-carrega-produto-grid.php",
        type : 'post',
        data : {
            codigo : this.value
        },
        beforeSend : function(){
            
        }
    })
    .done(function(msg){            
        var produto = JSON.parse(msg);   
        if (produto.codigo) {
            var produto_linha = "<tr id='produto_"+produto.codigo+"'>" +
                                    "<td><input type='checkbox' name='codigo_produto[]' checked class='d-none' value='"+produto.codigo+"'>"+produto.descricao+"</td> " +
                                    "<td id='preco_venda_"+produto.codigo+"' class='preco_venda'>"+produto.precoVenda+"</td> " +
                                    "<td><input name='qtd_prod_"+produto.codigo+"' type='text' required class='form-control qtd_prod' value='0' placeholder='0,00' onkeyUp='calcularTorais("+produto.codigo+","+produto.precoVenda+",this.value)'></td> " +
                                    "<td id='total_produto_"+produto.codigo+"' class='subtotal' >0,00</td> " +
                                    "<td><button class='btn btn-danger' onclick='excluirProdGrid("+produto.codigo+")'>Excluir</button></td> " +
                                "</tr>";
            $("#produtos-grid").append(produto_linha);
        }
        
        
    })
    .fail(function(jqXHR, textStatus, msg){
        
    });         
    
});

function calcularTorais(codigo,valor,qtd){      
    
    if(valor && qtd){
        var subtotal = parseFloat(valor) * parseInt(qtd);
        $("#total_produto_"+codigo).text(subtotal.toFixed(2));
        
        calculaValorTotal();
    }
    
}

function calculaValorTotal(){
    var total = 0 ;
    var frete = $("#frete").val();
    var desconto = $("#desconto").val();
    $(".subtotal").each(function(){    
        if(this.innerHTML){
            total = total+ parseFloat(this.innerHTML);
        }            
    });    
    if(frete){
        total = total + parseFloat(frete);  
    }
    if(desconto){
        total = total - parseFloat(desconto);
    }    
    $("#total").text(total.toFixed(2));
    $("#input-total").val(total.toFixed(2));
}



function excluirProdGrid(codigo){
    $("#produto_"+codigo).remove();
    calculaValorTotal()
}

$(document).on('keydown', 'input[pattern]', function(e){
var input = $(this);
var oldVal = input.val();
var regex = new RegExp(input.attr('pattern'), 'g');

setTimeout(function(){
    var newVal = input.val();
    if(!regex.test(newVal)){
    input.val(oldVal); 
    }
}, 0);
});