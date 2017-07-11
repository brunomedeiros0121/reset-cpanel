<?php require_once '../common/header.php';?>
	<section>
		<div class="row">
			<div class="small-8 medium-8 large-8 div_form_servico small-centered medium-centered large-centered">
				<fieldset class="fieldset field">
					<legend class="text-center">
						<h4>Cadastro de Servidores</h4>
					</legend>
					<form id="form_servicos">
						<input type="hidden" id="acao_server" name="acao_server" value="insert_server" />
						<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
							<label for="user">
								Nome<input type="text" id="nome" name="nome" required title="Nome do servidor" />
							</label>
						</div>
						<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
							<label for="user">
								IP<input type="text" id="ip" name="ip"  pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" title="Digite um IP válido" />
							</label>
						</div>
						<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
							<label for="user">
								Chave<input type="text" id="chave" name="chave" required title="Insira o token gerado pelo cPanel" />
							</label>
						</div>
						<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
							<label for="user">
								Descricao<input type="text" id="descricao" name="descricao"  title="Descrição [opcional]" />
							</label>
						</div>
						<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
							<input type="submit" id="btn_ok" name="btn_ok" class="button expanded" value="Cadastrar"> 
						</div>

					</form>
				</fieldset>
			</div>
		</div>
	</section>

<?php require_once '../common/footer.php';?>