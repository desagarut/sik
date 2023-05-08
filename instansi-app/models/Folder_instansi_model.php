<?php

class Folder_instansi_model extends CI_Model {

/*
	Dimasukkan di autoload. Supaya folder desa dibuat secara otomatis menggunakan
	desa-contoh apabila belum ada. Yaitu pada pertama kali menginstall SIDeGa.

	Perubahan folder desa pada setiap rilis dilakukan sebagai bagian dari
	Database > Migrasi DB.
*/
	public function __construct()
	{
		parent::__construct();
		$this->periksa_folder_instansi();
	}

	public function periksa_folder_instansi()
	{
		$this->salin_contoh();
	}

	private function salin_contoh()
	{
		if (!file_exists('instansi'))
		{
			mkdir('instansi');
			xcopy('instansi-contoh', 'instansi');
		}
	}

	public function amankan_folder_desa()
	{
		$this->salin_file('instansi', 'index.html', 'instansi-contoh/index.html');
		$this->salin_file('instansi/upload', '.htaccess', 'instansi-contoh/upload/media/.htaccess');
	}

	public function salin_file($cek, $cari, $contoh)
	{
		if (!file_exists("$cek/$cari")) copy($contoh, "$cek/$cari");

		foreach (glob("$cek/*", GLOB_ONLYDIR) as $folder)
		{
			$file = "$folder/$cari";

			if (!file_exists($file)) copy($contoh, $file);

			$this->salin_file($folder, $cari, $contoh);
		}
	}

}
