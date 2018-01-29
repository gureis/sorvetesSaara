<?php  // inserir no inicio
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<?php  // parte do form no html
	if($erro == 1){
		echo '<font color="#FF0000">Usuário e/ou senha inválido(s)';
	}
?>

<script> // cod js em jquery
	$(document).ready(function(){
		// verificar se os campos de usuario e senha foram devidamente preenchidos
		$('#btn_loguin').onClick(function(){

			var campo_vazio = false;

			if($('#campo_usuario').val() == ''){ // mudar id campo_usuario de acordo com o que o front usar
				$('#campo_usuario').css({'border-color': '#A94442'}); // bordas vermelhas caso nao haja dados
				campo_vazio = true;
			}else{
				$('#campo_usuario').css({'border-color': '#CCC'});
			}

			if($('#campo_senha').val() == ''){ // mudar id campo_senha de acordo com o que o front usar
				$('#campo_senha').css({'border-color': '#A94442'});  // bordas vermelhas caso nao haja dados
				campo_vazio = true;
			}else{
				$('#campo_usuario').css({'border-color': '#CCC'});
			}

			if(campo_vazio) return false;
			});
		});
</script>