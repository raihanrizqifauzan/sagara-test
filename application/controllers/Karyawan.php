<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct() {
		parent::__construct();
    	$this->load->model("M_Karyawan");
	}

	public function index()
	{
		$data['title'] = "Data Karyawan";
		$data['karyawan'] = $this->M_Karyawan->getAll();
		$this->load->view('karyawan/index', $data);
	}

	public function add()
	{
		$data['title'] = "Tambah Data Karyawan";
		$lastDataNik = $this->M_Karyawan->getLastKaryawan()->nik;
		// var_dump($lastDataNik->nik);
		// die;
		$tahun = date("y");
		$bulan = date("m");
		$number = substr($lastDataNik,5)+1;
		$subNumber = "";
		if ($number >= 1 && $number < 10) {
			$subNumber = '0000'.$number;
		} elseif ($number >= 10 && $number < 100) {
			$subNumber = '000'.$number;
		} elseif ($number >= 100 && $number < 1000) {
			$subNumber = '00'.$number;
		} elseif ($number >= 1000 && $number < 10000) {
			$subNumber = '0'.$number;
		} elseif ($number >= 10000 && $number < 10000) {
			$subNumber = '0'.$number;
		}
		$data['kodeNik'] = 'K'.$tahun.$bulan.$subNumber; 
		$this->load->view('karyawan/add', $data);
	}

	public function save()
	{
		$input = $this->input->post();
		
		// var_dump(count($input['keahlian']));
		// die;
		if ($this->input->post('keahlian') != null) {
			if ($input['email'] != "" && count($input['keahlian']) >= 3 && count($input['keahlian']) <= 5) {
				$inputKeahlian = $input['keahlian'];

				$keahlian = "";
				foreach ($inputKeahlian as $row) {
					$keahlian .= $row;
					$keahlian .= ", ";
				}

				$data = array(
					'nik' => $input['nik'],
					'nama' => $input['nama'],
					'alamat' => $input['alamat'],
					'email' => $input['email'],
					'tempat_lahir' => $input['tempat_lahir'],
					'tgl_lahir' => $input['tgl_lahir'],
					'gender' => $input['gender'],
					'keahlian' => $keahlian,
				);

				$this->M_Karyawan->save($data);
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('karyawan');
			} else {
				$this->session->set_flashdata('failed', 'Gagal disimpan, periksa inputan');
				redirect('karyawan/add');
				
			}

			
		}

		$this->session->set_flashdata('failed', 'Gagal disimpan, periksa inputan');
		redirect('karyawan/add');

		
	}

	public function edit($nik)
	{
		$data['title'] = "Edit Data Karyawan";
		$data['karyawan'] = $this->M_Karyawan->getByNik($nik);
		$this->load->view('karyawan/edit', $data);
	}

	public function update()
	{
		$input = $this->input->post();
		$nik = $input['nik'];
		// var_dump(count($input['keahlian']));
		// die;
		if ($this->input->post('keahlian') != null) {
			if ($input['email'] != "" && count($input['keahlian']) >= 3 && count($input['keahlian']) <= 5) {
				$inputKeahlian = $input['keahlian'];

				$keahlian = "";
				foreach ($inputKeahlian as $row) {
					$keahlian .= $row;
					$keahlian .= ", ";
				}

				$data = array(
					'nik' => $input['nik'],
					'nama' => $input['nama'],
					'alamat' => $input['alamat'],
					'email' => $input['email'],
					'tempat_lahir' => $input['tempat_lahir'],
					'tgl_lahir' => $input['tgl_lahir'],
					'gender' => $input['gender'],
					'keahlian' => $keahlian,
				);

				$this->M_Karyawan->update($data, $nik);
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('karyawan');
			} else {
				$this->session->set_flashdata('failed', 'Gagal disimpan, periksa inputan');
				redirect('karyawan');
				
			}

			
		}

		$this->session->set_flashdata('failed', 'Gagal disimpan, periksa inputan');
		redirect('karyawan/add');

	}

	public function delete($nik)
    {
        $this->M_Karyawan->delete($nik);
        redirect(site_url('karyawan'));
    }

}
