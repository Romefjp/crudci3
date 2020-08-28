<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Persona');
	}

	public function index() {
		$datos = array();
		$datos['personas'] = $this->Persona->obtener_datos();
		//print_r($datos);
		$this->load->view('welcome_message', $datos);
	}

	public function agregar() {
		$persona = array();
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ap'] = $this->input->post('ap');
		$persona['am'] = $this->input->post('am');
		$persona['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		$persona['genero'] = $this->input->post('genero');

		$this->Persona->agregar($persona);
		redirect('welcome');
	}

	public function eliminar($id_persona) {
		$this->Persona->eliminar($id_persona);
		redirect('welcome');
	}

	public function editar($id_persona) {
		$persona = array();
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ap'] = $this->input->post('ap');
		$persona['am'] = $this->input->post('am');
		$persona['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		$persona['genero'] = $this->input->post('genero');

		$this->Persona->editar($persona, $id_persona);
		redirect('welcome');
	}
}
