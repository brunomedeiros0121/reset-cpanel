$(document).ready(function() {
	
	function	Erro(){
		swal({
			title: "Erro!",
			text: "Desculpe, houve um erro! \n Contate o administrador do site. ",
			type: "error",
			confirmButtonColor: "#FF3328",
			confirmButtonText: "Fechar"
			
		});
	}
	
	function Cadastro_ok(info){
		swal({
			title: "Cadastrado Com sucesso",
			text: info+" cadastrado com sucesso",
			type: "success",
			confirmButtonColor: "#A5DC86",
			confirmButtonText: "Fechar"
		});
	}
	

	// Verifica se algum servidor foi escolhido.
	$(".click_func").click(function() {
		
		var serv = $("#serv").val();

		if (serv != null) {

			var servico = $(this).attr('id');
			$("#servico").val(servico);	
			Ajax();

		}else{
			$( "#serv" ).focus();

			swal({
				title: "Selecione um servidor.",
				text: "Selecione um servidor.",
				type: "info",
				confirmButtonText: "Fechar"
			});

		}
	});
	
		
	// Realiza o o envio e tratamento da resposta após a conexão com a API.
	function Ajax(){

		swal({
			title: "Atenção",
			text: "Deseja realmente reiniciar o serviço ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#F8C486",
			closeOnConfirm: false,
			showLoaderOnConfirm: true,
		},
		function(){

			setTimeout(function(){

				var form = $("#form_reiniciar").serialize();
				
				$.ajax({

					type:"POST",
					url:"/reset-cpanel/controller/auxiliar.php",
					data:form,
					dataType: "json",


					success: function(result) {
						console.log(result);
						var j = result.length;

						var info = ("info-", result['info']);   
						var resultado =  ("resultado-", result['resultado']);  


						if (resultado == 'OK') {

							var string = info.length;


							if (string > 990) {

								var info_r = info.substr(0, 990); 

								swal({
									title: "Serviço Reiniciado!",
									text: info_r+"....\n Restarted successfully.",
									type: "success",
									confirmButtonColor: "#A5DC86",
									confirmButtonText: "Fechar"
								});
							}else{

								swal({
									title: "Serviço Reiniciado!",
									text: info,
									type: "success",
									confirmButtonColor: "#A5DC86",
									confirmButtonText: "Fechar"
								});
							}

						}else if(resultado == 'Access denied'){

							swal({
								title: "Acesso Negado!",
								text: "Desculpe, o acesso ao servidor foi negado.\n Contate o administrador. ",
								type: "error",
								confirmButtonColor: "#FF3328",
								confirmButtonText: "Fechar"
							});


						}else if(resultado == 'No such service'){
							swal({
								title: "ServiÃ§o NÃ£o Encontrado!",
								text: "Talves o serviço não esteje disponivel neste servidor.\n Caso haja duvidas, contate o administrador. ",
								type: "warning",
								confirmButtonColor: "#F8C486",
								confirmButtonText: "Fechar"
							});

						}else if(resultado == null){
							swal({
								title: "Sem rosposta do servidor!",
								text: "O servidor não respondeu.\n Tente novamente. ",
								type: "warning",
								confirmButtonColor: "#F8C486",
								confirmButtonText: "Fechar"
							});

						}else{
							Erro();
						}

					},
					error:function(XMLHttpRequest){
						for(i in XMLHttpRequest) {
						    if(i!="channel")
						    document.write(i +" : " + XMLHttpRequest[i] +"<br>")
						}
					}

				}, 10000);
			},5000);

		});
		return false;
	}
	
	
	// Realiza a submit dos dados para o arquivo auxiliar.php.
	$("#form_servicos").submit(function(){
		
		var form = $("#form_servicos").serialize();
		
		$.ajax({

			type:"POST",
			url:"../../controller/auxiliar.php",
			data:form,

			success: function(result) {
						
				if (result == "ok") {
					var info = "Serviço";
					Cadastro_ok(info);		
					$('#form_servicos').each (function(){

						this.reset();

					});
				}else{
					console.log(result);
					Erro();
					
				}
			},
			
			error: function(XMLHttpRequest) {
				Erro();
			}
					
		});	
		return false;
	});

});