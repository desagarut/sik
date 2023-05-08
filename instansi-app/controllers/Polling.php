<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Polling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if ($grup != 1 AND $grup != 2 AND $grup != 3)
		{
			if (empty($grup))
				$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			else
				unset($_SESSION['request_uri']);
			redirect('siteman');
		}
		$this->load->model('header_model');
		$this->load->model('polling_model', 'poll');
		$this->modul_ini = 206;
	}

	public function index()
	{
		$data['main']   = $this->poll->list_polling();

		$header = $this->header_model->get_data();
		$nav['act'] = 205;
		$nav['act_sub'] = 205;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('polling/table', $data);
		$this->load->view('footer');
	}

	public function form( $id=NULL )
	{
		if ( !is_null( $id ) ) {
			$data['polling'] = $this->poll->get_polling( $id );
			$data['form_action'] = site_url("polling/update/$id");
		} else {
			$data['polling'] = null;
			$data['form_action'] = site_url("polling/insert");
		}

		$header = $this->header_model->get_data();

		$nav['act'] = 205;
		$nav['act_sub'] = 205;
		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('polling/form', $data);
		$this->load->view('footer');
	}

	public function pilihan( $polling=1 )
	{
		$data['tip'] = 2;
		$data['pilihan'] = $this->poll->list_pilihan($polling);
		$data['polling'] = $polling;
		$header = $this->header_model->get_data();
		$nav['act'] = 205;
        $nav['act_sub'] = 205;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('polling/pilihan_table', $data);
		$this->load->view('footer');
	}

	public function ajax_add_pilihan($polling='', $id='')
	{
		$data['polling'] = $polling;

		if ($id)
		{
			$data['pilihan'] = $this->poll->get_pilihan($id);
			$data['form_action'] = site_url("polling/update_pilihan/$polling/$id");
		}
		else
		{
			$data['pilihan'] = null;
			$data['form_action'] = site_url("polling/insert_pilihan/$polling");
		}

		$this->load->view('polling/ajax_add_pilihan_form', $data);
	}

	public function insert()
	{
		$this->poll->insert();
		redirect("polling");
	}

	public function update($id='')
	{
		$this->poll->update($id);
		redirect("polling");
	}

	public function delete($id='')
	{
		$this->poll->delete($id);
		redirect("polling");
	}

	public function ubah_polling_status($id='', $val=0)
	{
		$this->poll->polling_status($id, $val);
		redirect("polling");
	}

	public function insert_pilihan($polling='')
	{
		$this->poll->insert_pilihan($polling);
		redirect("polling/pilihan/$polling");
	}

	public function update_pilihan($polling='', $id='')
	{
		$this->poll->update_pilihan($id);
		redirect("polling/pilihan/$polling");
	}

	public function delete_pilihan($polling='', $id=0)
	{
		$this->poll->delete_pilihan($id);
		redirect("polling/pilihan/$polling");
	}

	public function ubah_pilihan_status($polling='', $id='', $val=0)
	{
		$this->poll->pilihan_status($id, $val);
		redirect("polling/pilihan/$polling");
    }
    
    public function hasil( $polling=1 )
	{
		$data['pilihan'] = $this->poll->list_pilihan( $polling );
		$data['datas'] = $this->poll->list_vote( $polling );
		$data['polling'] = $polling;
		$header = $this->header_model->get_data();
		$nav['act'] = 205;
        $nav['act_sub'] = 205;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('polling/vote_table', $data);
		$this->load->view('footer');
    }
    
    public function delete_hasil($polling='', $id=0)
	{
		$this->db->delete('poll_vote', "id_poll=$polling AND id=$id");
		redirect("polling/hasil/$polling");
	}
}
