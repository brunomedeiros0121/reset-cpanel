<?php require_once '../common/header.php';?>
<section>
	<div class="row">
		<div class="small-8 medium-8 large-8 div_form_servico small-centered medium-centered large-centered">
			<fieldset class="fieldset field">
				<legend class="text-center">
					<h4>Cadastro Serviços</h4>
				</legend>
				<form id="form_servicos">
					<input type="hidden" id="acao" name="acao" value="insert_servico" />
					<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
						<label for="user">
							Texto Id<input type="text" id="text_id" name="text_id" required title="Recebe o nome do serviço a ser reiniciado" />
						</label>
					</div>
					<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
						<label for="user">
							Texto Name<input type="text" id="text_name" name="text_name" required title="Recebe o name do input" />
						</label>
					</div>
					<div class="small-6 medium-6 large-6  small-centered medium-centered large-centered">
						<label for="user">
							Texto Name<input type="text" id="lbl_servico" name="lbl_servico" required title="Insira o label do botão" />
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