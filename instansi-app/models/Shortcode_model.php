<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shortcode_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('laporan_penduduk_model');
    $this->load->model('config_model');
    $this->load->model('pamong_model');
  }

	// Shortcode untuk isi artikel
	public function shortcode($str = '')
	{
		$regex = "/\[\[(.*?)\]\]/";
		return preg_replace_callback($regex, function ($matches) {
			$result = array();
			$params_explode = explode(",", $matches[1]);
			$fnName = 'extract_shortcode';
			return $this->extract_shortcode($params_explode[0], $params_explode[1], $params_explode[2]);
		}, $str);
	}

	private function extract_shortcode($type, $thn)
	{
		if ($type == 'grafik-RP-APBD')
		{
		  return $this->grafik_rp_apbd($type, $thn);
		}
		elseif ($type == 'lap-RP-APBD-sm1')
		{
		  return $this->tabel_rp_apbd($type, $thn, $smt1=true);
		}
		elseif ($type == 'lap-RP-APBD-sm2')
		{
		  return $this->tabel_rp_apbd($type, $thn, $smt1=false);
		}
		elseif ($type == 'lap-RP-APBD-Bidang-sm1')
		{
		  return $this->tabel_rp_apbd_bidang($type, $thn, $smt1=true);
		}
		elseif ($type == 'lap-RP-APBD-Bidang-sm2')
		{
		  return $this->tabel_rp_apbd_bidang($type, $thn, $smt1=false);
		}
		elseif ($type == 'penerima_bantuan_penduduk_grafik')
		{
		  return $this->penerima_bantuan_penduduk_grafik($stat=0, $tipe=0);
		}
		elseif ($type == 'penerima_bantuan_penduduk_daftar')
		{
		  return $this->penerima_bantuan_penduduk_daftar($stat=0, $tipe=0);
		}
		elseif ($type == 'penerima_bantuan_keluarga_grafik')
		{
		  return $this->penerima_bantuan_keluarga_grafik($stat=0, $tipe=0);
		}
		elseif ($type == 'penerima_bantuan_keluarga_daftar')
		{
		  return $this->penerima_bantuan_keluarga_daftar($stat=0, $tipe=0);
		}
		elseif ($type == 'grafik-RP-APBD-manual')
		{
		  return $this->grafik_rp_apbd_manual($type, $thn);
		}
		elseif ($type == 'lap-RP-APBD-Bidang-manual')
		{
		  return $this->tabel_rp_apbd_bidang_manual($type, $thn);
		}
    elseif ($type == 'sotk_w_bpd')
		{
		  return $this->sotk_w_bpd();
		}
    elseif ($type == 'sotk_wo_bpd')
		{
		  return $this->sotk_wo_bpd();
		}
	}

  private function penerima_bantuan_penduduk_grafik($stat=0, $tipe=0)
	{
    $heading = 'Penerima Bantuan (Penduduk)';
		$stat = $this->laporan_penduduk_model->list_data('bantuan_penduduk',0);
		$tipe = $tipe;
		$st = $stat;
		$lap = 'bantuan_penduduk';

		ob_start();
			include("instansi-app/views/statistik/penduduk_grafik_web.php");
		$res = ob_get_clean();
		return $res;
	}

  private function penerima_bantuan_penduduk_daftar($stat=0, $tipe=0)
	{
		$heading = 'Penerima Bantuan (Penduduk)';
		$stat = $this->laporan_penduduk_model->list_data('bantuan_penduduk',0);
		$tipe = $tipe;
		$st = $stat;
		$lap = 'bantuan_penduduk';

		ob_start();
			include("instansi-app/views/statistik/peserta_bantuan.php");
		$res = ob_get_clean();
		return $res;
	}

  private function penerima_bantuan_keluarga_grafik($stat=0, $tipe=0)
	{
		$heading = 'Penerima Bantuan (Keluarga)';
		$stat = $this->laporan_penduduk_model->list_data('bantuan_keluarga',0);
		$tipe = $tipe;
		$st = $stat;
		$lap = 'bantuan_keluarga';

		ob_start();
			include("instansi-app/views/statistik/penduduk_grafik_web.php");
		$res = ob_get_clean();
		return $res;
	}

  private function penerima_bantuan_keluarga_daftar($stat=0, $tipe=0)
	{
		$heading = 'Penerima Bantuan (Keluarga)';
		$stat = $this->laporan_penduduk_model->list_data('bantuan_keluarga',0);
		$tipe = $tipe;
		$st = $stat;
		$lap = 'bantuan_keluarga';

		ob_start();
			include("instansi-app/views/statistik/peserta_bantuan.php");
		$res = ob_get_clean();
		return $res;
	}

  private function sotk_w_bpd()
	{
    $desa = $this->config_model->get_data();
		$bagan = $this->pamong_model->list_bagan();
		$ada_bpd = true;

		ob_start();
			include("instansi-app/views/beranda/bagan_sisip.php");
		$res = ob_get_clean();
		return $res;
	}

  private function sotk_wo_bpd()
	{
    $desa = $this->config_model->get_data();
		$bagan = $this->pamong_model->list_bagan();
		$ada_bpd = false;

		ob_start();
			include("instansi-app/views/beranda/bagan_sisip.php");
		$res = ob_get_clean();
		return $res;
	}

	// Shortcode untuk list artikel
	public function convert_sc_list($str = '')
	{
		$regex = "/\[\[(.*?)\]\]/";
		return preg_replace_callback($regex, function ($matches) {
			$result = array();

			$params_explode = explode(",", $matches[1]);
			$fnName = 'converted_sc_list';
			return $this->converted_sc_list($params_explode[0], $params_explode[1], $params_explode[2]);
		}, $str);
	}

	private function converted_sc_list($type, $thn)
	{
		if ($type == "lap-RP-APBD-sm1")
		{
			$output = "<i class='fa fa-table'></i> Tabel Laporan APBDes Smt. 1 TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "lap-RP-APBD-sm2")
		{
			$output = "<i class='fa fa-table'></i> Tabel Laporan APBDes Smt. 2 TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "lap-RP-APBD-Bidang-sm1")
		{
			$output = "<i class='fa fa-table'></i> Tabel Laporan APBDes Smt. 1 TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "lap-RP-APBD-Bidang-sm2")
		{
			$output = "<i class='fa fa-table'></i> Tabel Laporan APBDes Smt. 2 TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "grafik-RP-APBD")
		{
			$output = "<i class='fa fa-bar-chart'></i> Grafik APBDes TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "lap-RP-APBD-Bidang-manual")
		{
			$output = "<i class='fa fa-table'></i> Tabel Laporan APBDes TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "grafik-RP-APBD-manual")
		{
			$output = "<i class='fa fa-bar-chart'></i> Grafik APBDes TA. " . $thn . ", ";
			return $output;
		}
		elseif ($type == "penerima_bantuan_penduduk_grafik")
		{
			$output = "<i class='fa fa-bar-chart'></i> Penerima Bantuan (Penduduk)";
			return $output;
		}
		elseif ($type == "penerima_bantuan_penduduk_daftar")
		{
			$output = "<i class='fa fa-table'></i> Penerima Bantuan (Penduduk)";
			return $output;
		}
		elseif ($type == "penerima_bantuan_keluarga_grafik")
		{
			$output = "<i class='fa fa-bar-chart'></i> Penerima Bantuan (Keluarga)";
			return $output;
		}
		elseif ($type == "penerima_bantuan_keluarga_daftar")
		{
			$output = "<i class='fa fa-table'></i> Penerima Bantuan (Keluarga)";
			return $output;
		}
    elseif ($type == "sotk_w_bpd")
		{
			$output = "<i class='fa fa-table'></i> Struktur Organisasi (BPD)";
			return $output;
		}
    elseif ($type == "sotk_wo_bpd")
		{
			$output = "<i class='fa fa-table'></i> Struktur Organisasi";
			return $output;
		}
	}

}
?>
