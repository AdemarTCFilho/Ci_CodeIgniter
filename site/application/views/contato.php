<?php defined('BASEPATH') or exit('No direct scripts access allowed!') ?>

<?php $this->load->view('header') ?>
<h2>Contato</h2>

<div class="row">
	<div class="col-md-6">
		<img src="<?php echo base_url('assets/img/localizacao.png') ?>">
		<p>Rua: Cont de Sicard 86</p>
		<p>Bairro: Villa Seca</p>
		<p>Cidade: Tarragona</p>
		<hr>
		<h4><strong>Contato direto</strong></h4>
		<p>Fone: <strong>(99)99999-9999</strong></p>
		<p>Email: <strong>atctech@info.com</strong></p>
	</div>
	<div class="col-md-6 contato">
		<h2>Envia uma ensagem</h2>
		<?php
			if($formerror):
				echo '<p class="bg-danger">'.$formerror.'</p>';
			endif;	
		echo form_open('pagina/contato');
		echo form_label('Seu nome:', 'nome');
		echo form_input('nome', set_value('nome'));
		echo form_label('Seu email:', 'email');
		echo form_input('email', set_value('email'));
		echo form_label('Assunto:', 'assunto');
		echo form_input('assunto', set_value('assunto'));
		echo form_label('Mensagem:', 'mensagem');
		echo form_textarea('mensagem', set_value('mensagem'));
		echo form_submit('enviar','Enviar mensagem >>', array('class' => 'btn btn-primary'));
		echo form_close();
		?>
	</div>
</div>

<?php $this->load->view('footer') ?>
