<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function autocomplete()
	{
		return $this->autocomplete_str('dusun', 'tweb_wilayah');
	}

	private function search_sql()
	{
		if (isset($_SESSION['cari']))
		{
			$cari = $this->db->escape_like_str($_SESSION['cari']);
			$kw = $this->db->escape_like_str($cari);
			$kw = '%' .$kw. '%';
			$search_sql= " AND u.dusun LIKE '$kw'";
			return $search_sql;
		}
	}

	public function paging($p = 1, $o = 0)
	{
		$sql = "SELECT COUNT(*) AS jml " . $this->list_data_sql();
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$jml_data = $row['jml'];

		$this->load->library('paging');
		$cfg['page'] = $p;
		$cfg['per_page'] = $_SESSION['per_page'];
		$cfg['num_rows'] = $jml_data;
		$this->paging->init($cfg);

		return $this->paging;
	}

	private function list_data_sql()
	{
		$sql = " FROM tweb_wilayah u
			LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id
			WHERE u.rt = '0' AND u.rw = '0'  ";
		$sql .= $this->search_sql();
		return $sql;
	}

	/*
		Struktur tweb_wilayah:
		- baris dengan kolom rt = '0' dan rw = '0' menunjukkan dusun
		- baris dengan kolom rt = '-' dan rw <> '-' menunjukkan rw
		- baris dengan kolom rt <> '0' dan rt <> '0' menunjukkan rt

		Di tabel penduduk_hidup  dan keluarga_aktif, kolom id_cluster adalah id untuk
		baris rt.
	*/
	public function list_data($o = 0, $offset = 0, $limit = 500)
	{
		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;

		$select_sql = "SELECT u.*, a.nama AS nama_kadus, a.nik AS nik_kadus,
		(SELECT COUNT(dusun.id) FROM tweb_wilayah dusun WHERE desa = u.desa AND dusun<> '-' AND rw = '-' AND rt = '-') AS jumlah_dusun,
		(SELECT COUNT(rw.id) FROM tweb_wilayah rw WHERE dusun = u.dusun AND rw <> '-' AND rt = '-') AS jumlah_rw,
		(SELECT COUNT(v.id) FROM tweb_wilayah v WHERE dusun = u.dusun AND v.rt <> '0' AND v.rt <> '-') AS jumlah_rt,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun)) AS jumlah_warga,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) AND p.sex = 1) AS jumlah_warga_l,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) AND p.sex = 2) AS jumlah_warga_p,
		(SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala = p.id  WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) AND p.kk_level = 1) AS jumlah_kk ";
		$sql = $select_sql . $this->list_data_sql();
		$sql .= $paging_sql;

		$query = $this->db->query($sql);
		$data = $query->result_array();

		//Formating Output
		$j = $offset;
		for ($i=0; $i<count($data); $i++)
		{
			$data[$i]['no'] = $j + 1;
			$j++;
		}
		return $data;
	}

	public function list_semua_wilayah()
	{
		$this->case_dusun = "w.rt = '0' and w.rw = '0'";
		$this->case_rw = "w.rw <> '0' and w.rw <> '-' and w.rt = '0'";
		$this->case_rt = "w.rt <> '0' and w.rt <> '-'";

		$this->select_jumlah_rw_rt();
		$this->select_jumlah_warga();
		$this->select_jumlah_kk();

		$data = $this->db
			->select('w.*, p.nama AS nama_kepala, p.nik AS nik_kepala')
			->select("(CASE WHEN w.dusun = '0' THEN '' ELSE w.dusun END) AS dusun")
			->select("(CASE WHEN w.rw = '0' THEN '' ELSE w.rw END) AS rw")
			->select("(CASE WHEN w.rt = '0' THEN '' ELSE w.rt END) AS rt")
			->from('tweb_wilayah w')
			->join('penduduk_hidup p', 'w.id_kepala = p.id', 'left')

			->group_start()
				->where("w.rt = '0' and w.rw = '0' and w.dusun = '0'")
				->or_where("w.dusun <> '0' and w.rt = '0'")
				->or_where("w.rw <> '-' and w.rt = '0'")
				->or_where("w.rt <> '0' and w.rt <> '-'")
			->group_end()

			->order_by('w.desa, dusun, rw, rt')
			->get()
			->result_array();
		return $data;
	}

	private function select_jumlah_rw_rt()
	{
		$this->db
			->select("(CASE
				WHEN ".$this->case_dusun." THEN (SELECT COUNT(id) FROM tweb_wilayah WHERE dusun = w.dusun AND rw <> '-' AND rt = '-')
				END) AS jumlah_rw");

		$this->db
			->select("(CASE
				WHEN ".$this->case_dusun." THEN (SELECT COUNT(id) FROM tweb_wilayah WHERE dusun = w.dusun AND rt <> '0' AND rt <> '-')
				WHEN ".$this->case_rw." THEN (SELECT COUNT(id) FROM tweb_wilayah WHERE dusun = w.dusun AND rw = w.rw AND rt <> '0' AND rt <> '-')
				END) AS jumlah_rt");
	}

	private function select_jumlah_warga()
	{
		$this->db
			->select("(CASE
				WHEN ".$this->case_dusun." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun))
				WHEN ".$this->case_rw." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun and rw = w.rw))
				WHEN ".$this->case_rt." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster = w.id)
				END) AS jumlah_warga");

		$this->db
			->select("(CASE
				WHEN ".$this->case_dusun." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun) AND p.sex = 1)
				WHEN ".$this->case_rw." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun and rw = w.rw) AND p.sex = 1)
				WHEN ".$this->case_rt." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster = w.id and p.sex = 1)
				END) AS jumlah_warga_l");

		$this->db
			->select("(CASE
				WHEN ".$this->case_dusun." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun) AND p.sex = 2)
				WHEN ".$this->case_rw." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun and rw = w.rw) AND p.sex = 2)
				WHEN ".$this->case_rt." THEN (SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster = w.id and p.sex = 2)
				END) AS jumlah_warga_p");
	}

	private function select_jumlah_kk()
	{
		$this->db
			->select("(CASE
				WHEN ".$this->case_dusun." THEN (SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala = p.id WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun) AND p.kk_level = 1)
				WHEN ".$this->case_rw." THEN (SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala = p.id WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = w.dusun and rw = w.rw) AND p.kk_level = 1)
				WHEN ".$this->case_rt." THEN (SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala = p.id WHERE p.id_cluster = w.id AND p.kk_level = 1)
				END) AS jumlah_kk ");
	}

	private function bersihkan_data($data)
	{
		if (empty((int)$data['id_kepala']))
			unset($data['id_kepala']);
		$data['dusun'] = nama_terbatas($data['dusun']) ?: 0;
		$data['rw'] = nama_terbatas($data['rw']) ?: 0;
		$data['rt'] = bilangan($data['rt']) ?: 0;
		return $data;
	}

	private function cek_data($table, $data = [])
	{
		$count = $this->db->get_where($table, $data)->num_rows();
		return $count;
	}

	public function insert()
	{
		$data = $this->bersihkan_data($this->input->post());
		$wil = array('desa' => $data['desa']);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		$this->db->insert('tweb_wilayah', $data);

		$rw = $data;
		$rw['dusun'] = "-";
		$this->db->insert('tweb_wilayah', $dusun);

		$rw = $data;
		$rw['rw'] = "-";
		$this->db->insert('tweb_wilayah', $rw);

		$rt = $rw;
		$rt['rt'] = "-";
		$outp = $this->db->insert('tweb_wilayah', $rt);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function update($id = 0)
	{
		$data = $this->bersihkan_data($this->input->post());
		$wil = array('desa' => $data['desa'], 'dusun' => '0', 'rw' => '0', 'rt' => '0', 'id <>' => $id);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		$temp = $this->wilayah_model->cluster_by_id($id);
		$this->db->where('desa',$temp['desa']);
		$this->db->where('dusun', '0');
		$this->db->where('rw', '0');
		$this->db->where('rt', '0');
		$outp1 = $this->db->update('tweb_wilayah', $data);

		// Ubah nama Desa di semua baris dusun/rw/rt untuk desa ini
		$outp2 = $this->db->where('desa', $temp['desa'])->
			update('tweb_wilayah', array('desa' => $data['desa']));

		if ( $outp1 AND $outp2) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
	}

	//Delete desa/dusun/rw/rt tergantung tipe
	public function delete($tipe = '', $id = '')
	{
		$this->session->success = 1;
		// Perlu hapus berdasarkan nama, supaya baris RW dan RT juga terhapus
		$temp = $this->cluster_by_id($id);
		$rw = $temp['rw'];
		$dusun = $temp['dusun'];
		$desa = $temp['desa'];

		switch ($tipe)
		{
			case 'desa':
				$this->db->where('desa', $desa);
				break; //desa
			case 'dusun':
				$this->db->where('dusun', $dusun)->where('desa', $desa);
				break; //dusun
			case 'rw':
				$this->db->where('rw', $rw);
				break; //rw
			default:
				$this->db->where('id', $id);
				break; //rt
		}

		$outp = $this->db->delete('tweb_wilayah');

		status_sukses($outp, $gagal_saja=true); //Tampilkan Pesan
	}
	
		//Bagian Dusun
	public function list_data_dusun($id = '')
	{
		$temp = $this->cluster_by_id($id);
		$desa = $temp['desa'];

		$sql = "SELECT u.*, a.nama AS nama_ketua, a.nik AS nik_ketua,
		(SELECT COUNT(rt.id) FROM tweb_wilayah rt WHERE dusun = u.dusun AND rw = u.rw AND rt <> '-' AND rt <> '0' ) AS jumlah_rt,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw)) AS jumlah_warga,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.sex = 1) AS jumlah_warga_l,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.sex = 2) AS jumlah_warga_p,
		(SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala=p.id  WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.kk_level = 1) AS jumlah_kk
		FROM tweb_wilayah u
		LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id
		WHERE u.rt = '0' AND u.rw <> '0' AND u.dusun = '$dusun'";
		$query = $this->db->query($sql);
		$data = $query->result_array();

		//Formating Output
		for ($i=0; $i<count($data); $i++)
		{
			$data[$i]['no'] = $i + 1;
		}
		return $data;
	}

	public function insert_dusun($desa = '')
	{
		$data = $this->bersihkan_data($this->input->post());
		$temp = $this->cluster_by_id($desa);
		$data['desa']= $temp['desa'];
		$wil = array('desa' => $data['desa'], 'dusun' => $data['dusun']);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		$outp1 = $this->db->insert('tweb_wilayah', $data);

		$rw = $data;
		$rw['rw'] = "-";
		$outp2 = $this->db->insert('tweb_wilayah', $rw);
				$rt = $data;
		$rt['rt'] = "-";
		$outp3 = $this->db->insert('tweb_wilayah', $rt);


		status_sukses($outp1 & $outp2); //Tampilkan Pesan
	}

	public function update_dusun($id_dusun = '')
	{
		$data = $this->bersihkan_data($this->input->post());
		$temp = $this->wilayah_model->cluster_by_id($id_rw);
		$wil = array('desa' => $temp['desa'], 'dusun' => $data['dusun'], 'rw' => $data['rw'], 'rt' => '0', 'id <>' => $id_rw);
		unset($data['id_dusun']);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		// Update data Dusun
		$data['desa'] = $temp['desa'];
		$outp1 = $this->db->where('id', $id_dusun)
			->update('tweb_wilayah', $data);
		// Update nama Dusun di semua RW untuk RT ini
		$outp2 = $this->db->where('dusun', $temp['dusun'])
			->update('tweb_wilayah', array('dusun' => $data['rw']));

		// Update nama RW di semua RT untuk RW ini
		$outp2 = $this->db->where('rw', $temp['rw'])
			->update('tweb_wilayah', array('rw' => $data['rw']));
		status_sukses($outp1 and $outp2); //Tampilkan Pesan
	}

	
	//akhir Bagian Dusun

	//Bagian RW
	public function list_data_rw($id = '')
	{
		$temp = $this->cluster_by_id($id);
		$dusun = $temp['dusun'];

		$sql = "SELECT u.*, a.nama AS nama_ketua, a.nik AS nik_ketua,
		(SELECT COUNT(rt.id) FROM tweb_wilayah rt WHERE dusun = u.dusun AND rw = u.rw AND rt <> '-' AND rt <> '0' ) AS jumlah_rt,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw)) AS jumlah_warga,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.sex = 1) AS jumlah_warga_l,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.sex = 2) AS jumlah_warga_p,
		(SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala=p.id  WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.kk_level = 1) AS jumlah_kk
		FROM tweb_wilayah u
		LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id
		WHERE u.rt = '0' AND u.rw <> '0' AND u.dusun = '$dusun'";
		$query = $this->db->query($sql);
		$data = $query->result_array();

		//Formating Output
		for ($i=0; $i<count($data); $i++)
		{
			$data[$i]['no'] = $i + 1;
		}
		return $data;
	}

	public function insert_rw($dusun = '')
	{
		$data = $this->bersihkan_data($this->input->post());
		$temp = $this->cluster_by_id($dusun);
		$data['dusun']= $temp['dusun'];
		$wil = array('dusun' => $data['dusun'], 'rw' => $data['rw']);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		$outp1 = $this->db->insert('tweb_wilayah', $data);

		$rt = $data;
		$rt['rt'] = "-";
		$outp2 = $this->db->insert('tweb_wilayah', $rt);

		status_sukses($outp1 & $outp2); //Tampilkan Pesan
	}

	public function update_rw($id_rw = '')
	{
		$data = $this->bersihkan_data($this->input->post());
		$temp = $this->wilayah_model->cluster_by_id($id_rw);
		$wil = array('dusun' => $temp['dusun'], 'rw' => $data['rw'], 'rt' => '0', 'id <>' => $id_rw);
		unset($data['id_rw']);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		// Update data RW
		$data['dusun'] = $temp['dusun'];
		$outp1 = $this->db->where('id', $id_rw)
			->update('tweb_wilayah', $data);
		// Update nama RW di semua RT untuk RW ini
		$outp2 = $this->db->where('rw', $temp['rw'])
			->update('tweb_wilayah', array('rw' => $data['rw']));
		status_sukses($outp1 and $outp2); //Tampilkan Pesan
	}

	//Bagian RT
	public function list_data_rt($dusun = '', $rw = '')
	{
		$sql = "SELECT u.*, a.nama AS nama_ketua, a.nik AS nik_ketua,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt)) AS jumlah_warga,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt) AND p.sex = 1) AS jumlah_warga_l,(
		SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt) AND p.sex = 2) AS jumlah_warga_p,
		(SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala=p.id  WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt) AND p.kk_level = 1) AS jumlah_kk
		FROM tweb_wilayah u
		LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id
		WHERE u.rt <> '0' AND u.rt <> '-' AND u.rw = '$rw' AND u.dusun = '$dusun'
		ORDER BY u.rt";

		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}

	public function insert_rt($id_dusun = '', $id_rw = '')
	{
		$data = $this->bersihkan_data($this->input->post());
		$temp = $this->cluster_by_id($id_dusun);
		$data['dusun']= $temp['dusun'];
		$data_rw = $this->cluster_by_id($id_rw);
		$data['rw'] = $data_rw['rw'];
		$wil = array('dusun' => $data['dusun'], 'rw' => $data['rw'], 'rt' => $data['rt']);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}

		$outp = $this->db->insert('tweb_wilayah', $data);
		status_sukses($outp); //Tampilkan Pesan
	}

	public function update_rt($id=0)
	{
		$data = $this->bersihkan_data($this->input->post());
		$rt_lama = $this->db->where('id', $id)->get('tweb_wilayah')->row_array();
		$wil = array('dusun' => $rt_lama['dusun'], 'rw' => $rt_lama['rw'], 'rt' => $data['rt'], 'id <>' => $id);
		$cek_data = $this->cek_data('tweb_wilayah', $wil);
		if ($cek_data)
		{
			$_SESSION['success'] = -2;
			return;
		}
		$data['dusun'] = $rt_lama['dusun'];
		$data['rw'] = $rt_lama['rw'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function list_penduduk()
	{
		$data = $this->db->select('p.id, p.nik, p.nama, c.dusun')
			->from('penduduk_hidup p')
			->join('tweb_wilayah c', 'p.id_cluster = c.id', 'left')
			->where('p.id NOT IN (SELECT c.id_kepala FROM tweb_wilayah c WHERE c.id_kepala != 0)')
			->get()->result_array();
		return $data;
	}

	public function get_penduduk($id = 0)
	{
		$sql = "SELECT id,nik,nama FROM penduduk_hidup WHERE id = ?";
		$query = $this->db->query($sql, $id);
		$data = $query->row_array();
		return $data;
	}

	public function cluster_by_id($id = 0)
	{
		$data = $this->db->where('id', $id)
			->get('tweb_wilayah')
			->row_array();
		return $data;
	}

	public function list_dusun()
	{
		$data = $this->db
			->where('rt', '0')
			->where('rw', '0')
			->get('tweb_wilayah')
			->result_array();

		return $data;
	}

	public function list_rw($dusun = '')
	{
		$data = $this->db
			->where('rt', '0')
			->where('dusun', urldecode($dusun))
			->where('rw <>', '0')
			->order_by('rw')
			->get('tweb_wilayah')
			->result_array();

		return $data;
	}

	public function list_rt($dusun = '', $rw = '')
	{
		$data = $this->db
			->where('rt <>', '0')
			->where('dusun', urldecode($dusun))
			->where('rw', urldecode($rw))
			->order_by('rt')
			->get('tweb_wilayah')
			->result_array();

		return $data;
	}

	public function get_rt($dusun = '', $rw = '', $rt = '')
	{
		$sql = "SELECT * FROM tweb_wilayah WHERE dusun = ? AND rw = ? AND rt = ?";
		$query = $this->db->query($sql, array($dusun, $rw, $rt));
		return $query->row_array();
	}

	public function total()
	{
		$sql = "SELECT
		(SELECT COUNT(rw.id) FROM tweb_wilayah rw WHERE  rw <> '-' AND rt = '-') AS total_rw,
		(SELECT COUNT(v.id) FROM tweb_wilayah v WHERE v.rt <> '0' AND v.rt <> '-') AS total_rt,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah)) AS total_warga,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah) AND p.sex = 1) AS total_warga_l,
		(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah) AND p.sex = 2) AS total_warga_p,
		(SELECT COUNT(p.id) FROM keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala=p.id WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah) AND p.kk_level = 1) AS total_kk
		FROM tweb_wilayah u
		LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id WHERE u.rt = '0' AND u.rw = '0' limit 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function total_rw($dusun = '')
	{
		$sql = "SELECT sum(jumlah_rt) AS jmlrt, sum(jumlah_warga) AS jmlwarga, sum(jumlah_warga_l) AS jmlwargal, sum(jumlah_warga_p) AS jmlwargap, sum(jumlah_kk) AS jmlkk
			FROM
			(SELECT u.*, a.nama AS nama_ketua, a.nik AS nik_ketua,
				(SELECT COUNT(rt.id) FROM tweb_wilayah rt WHERE dusun = u.dusun AND rw = u.rw AND rt <> '-' AND rt <> '0' ) AS jumlah_rt,
				(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw )) AS jumlah_warga,
				(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.sex = 1) AS jumlah_warga_l,
				(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.sex = 2) AS jumlah_warga_p,
				(SELECT COUNT(p.id) FROM  keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala=p.id   WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = u.rw) AND p.kk_level = 1) AS jumlah_kk
				FROM tweb_wilayah u
				LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id
				WHERE u.rt = '0' AND u.rw <> '0' AND u.dusun = '$dusun') AS x ";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		return $data;
	}

	public function total_rt($dusun = '', $rw = '')
	{
		$sql = "SELECT sum(jumlah_warga) AS jmlwarga, sum(jumlah_warga_l) AS jmlwargal, sum(jumlah_warga_p) AS jmlwargap, sum(jumlah_kk) AS jmlkk
			FROM
				(SELECT u.*, a.nama AS nama_ketua,a.nik AS nik_ketua,
					(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt)) AS jumlah_warga,
					(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt) AND p.sex = 1) AS jumlah_warga_l,
					(SELECT COUNT(p.id) FROM penduduk_hidup p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt) AND p.sex = 2) AS jumlah_warga_p,
					(SELECT COUNT(p.id) FROM  keluarga_aktif k inner join penduduk_hidup p ON k.nik_kepala=p.id   WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = '$dusun' AND rw = '$rw' AND rt = u.rt) AND p.kk_level = 1) AS jumlah_kk
					FROM tweb_wilayah u
					LEFT JOIN penduduk_hidup a ON u.id_kepala = a.id
					WHERE u.rt <> '0' AND u.rt <> '-' AND u.rw = '$rw' AND u.dusun = '$dusun') AS x  ";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		return $data;
	}

	private function validasi_koordinat($post)
	{
		$data['id'] = $post['id'];
		$data['zoom'] = $post['zoom'];
		$data['map_tipe'] = $post['map_tipe'];
		$data['lat'] = koordinat($post['lat']) ?: NULL;
		$data['lng'] = koordinat($post['lng']) ?: NULL;
		return $data;
	}

	public function update_kantor_dusun_map($id = 0)
	{
		$data = $this->validasi_koordinat($this->input->post());
		$id = $data['id'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function update_wilayah_dusun_map($id = 0)
	{
		$data = $_POST;
		$id = $_POST['id'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}


	public function get_desa_maps($id = 0)
	{
		$sql = "SELECT * FROM tweb_wilayah WHERE id = ?";
		$query = $this->db->query($sql, $id);
		return $query->row_array();
	}

	public function get_dusun_maps($id = 0)
	{
		$sql = "SELECT * FROM tweb_wilayah WHERE id = ?";
		$query = $this->db->query($sql, $id);
		return $query->row_array();
	}

	public function update_kantor_rw_map($id = 0)
	{
		$data = $this->validasi_koordinat($this->input->post());
		$id = $data['id'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function update_wilayah_rw_map($id = 0)
	{
		$data = $_POST;
		$id = $_POST['id'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function get_rw_maps($dusun = '', $rw = '')
	{
		$sql = "SELECT * FROM tweb_wilayah WHERE dusun = ? AND rw = ?";
		$query = $this->db->query($sql, array($dusun, $rw));
		return $query->row_array();
	}

	public function update_kantor_rt_map($id = 0)
	{
		$data = $this->validasi_koordinat($this->input->post());
		$id = $data['id'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function update_wilayah_rt_map($id = 0)
	{
		$data = $_POST;
		$id = $_POST['id'];
		$this->db->where('id', $id);
		$outp = $this->db->update('tweb_wilayah', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function get_rt_maps($rt_id)
	{
		$data = $this->db->where('id', $rt_id)
			->get('tweb_wilayah')
			->row_array();
		return $data;
	}

	public function list_rw_gis($dusun = '')
	{
		$data = $this->db->
			where('rt', '0')->
			//where('dusun', urldecode($dusun))->
			where('rw <>', '0')->
			order_by('rw')->
			get('tweb_wilayah')->
			result_array();
		return $data;
	}

	public function list_rt_gis($dusun = '', $rw = '')
	{
		$data = $this->db->
			where('rt <>', '0')->
			//where('dusun', urldecode($dusun))->
			//where('rw', $rw)->
			order_by('rt')->
			get('tweb_wilayah')->
			result_array();
		return $data;
	}

	// TO DO : Gunakan untuk get_alamat mendapatkan alamat penduduk
	public function get_alamat_wilayah($data)
	{
		$alamat_wilayah= "$data[alamat] RT $data[rt] / RW $data[rw] ".ucwords(strtolower($this->setting->sebutan_dusun))." ".ucwords(strtolower($data['dusun']));

		return trim($alamat_wilayah);
	}

	public function get_alamat($id_penduduk)
	{
		$sebutan_dusun = ucwords($this->setting->sebutan_dusun);

		$data = $this->db
			->select("(
				case when (p.id_kk IS NULL or p.id_kk = 0)
					then
						case when (cp.dusun = '-' or cp.dusun = '')
							then CONCAT(COALESCE(p.alamat_sekarang, ''), ' RT ', cp.rt, ' / RW ', cp.rw)
							else CONCAT(COALESCE(p.alamat_sekarang, ''), ' {$sebutan_dusun} ', cp.dusun, ' RT ', cp.rt, ' / RW ', cp.rw)
						end
					else
						case when (ck.dusun = '-' or ck.dusun = '')
							then CONCAT(COALESCE(k.alamat, ''), ' RT ', ck.rt, ' / RW ', ck.rw)
							else CONCAT(COALESCE(k.alamat, ''), ' {$sebutan_dusun} ', ck.dusun, ' RT ', ck.rt, ' / RW ', ck.rw)
						end
				end) AS alamat")
			->from('tweb_penduduk p')
			->join('tweb_wilayah cp', 'p.id_cluster = cp.id', 'left')
			->join('tweb_keluarga k', 'p.id_kk = k.id', 'left')
			->join('tweb_wilayah ck', 'k.id_cluster = ck.id', 'left')
			->where('p.id', $id_penduduk)
			->get()
			->row_array();

		return $data['alamat'];
	}

}

?>
