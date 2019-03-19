<?php 

class About Extends Controller {

	public function index($nama = 'Aco' , $aktivitas = 'Makan')
	{
		$data['nama'] = $nama;
		$data['aktivitas'] = $aktivitas;
		$data['judul'] = 'About Index';

		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');

	}

	public function page()
	{
		$data['judul'] = 'About Page';

		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}