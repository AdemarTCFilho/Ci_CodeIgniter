<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$dados['titulo'] = 'ATCtech Desenvolvedor Web';
		$this->load->view('home', $dados);
	}

	public function clientes()
	{
		$dados['titulo'] = 'Clientes - ATCtech Desenvolvedor Web';
		$this->load->view('clientes', $dados);
	}

	public function servicos()
	{
		$dados['titulo'] = 'O que eu faço - ATCtech Desenvolvedor Web';
		$this->load->view('servicos', $dados);
	}

	public function sobre()
	{
		$dados['titulo'] = 'Sobre mim - ATCtech Desenvolvedor Web';
		$this->load->view('sobre', $dados);
	}

	public function contato()
	{
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'email'));
		//regras de validação do formulário
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required');
		if($this->form_validation->run() == FALSE):
			$dados['formerror'] = validation_errors();
		else:
			$dados_form = $this->input->post();
			$this->email->from($dados_form['email'], $dados_form['nome']);
			$this->email->to('ademartcfilho@gmail.com');
			$this->email->subject($dados_form['assunto']);
			$this->email->message($dados_form['mensagem']);
			if($this->email->send()):
				$dados['formerror'] = '<p class="bg-success">Email enviado com sucesso!<p>';
			else:
				$dados['formerror'] = 'Erro ao enviar email, tente novamente em alguns minutos.';
			endif;	
		endif;

		$dados['titulo'] = 'Fale comigo - ATCtech Desenvolvedor Web';
		$this->load->view('contato', $dados);
	}
}