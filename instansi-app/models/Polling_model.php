<?php

class Polling_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
    }
    
    // POLLING
    public function list_polling( $param=NULL )
    {
        if( !is_null( $param ) ) $this->db->where( $param );
        $query = $this->db->get( 'polling' );

        if ( $query && $query->num_rows() > 0 ) {
            return $query->result_array();
        }

        return NULL;
    }

    public function get_polling( $id=NULL )
    {
        if( is_null( $id ) ) return FALSE;

        $this->db->where( 'id', $id );
        $query = $this->db->get( 'polling' );

        if ( $query && $query->num_rows() > 0 ) {
            return $query->row_array();
        }

        return NULL;
    }

    public function get_polling_widget()
    {
        $this->db->where( 'status', 1 );
        $query = $this->db->get( 'polling' );

        if ( $query && $query->num_rows() > 0 ) {
            return $query->row_array();
        }

        return NULL;
    }

	public function insert()
	{
		$data = $_POST;
		$data['pertanyaan'] = htmlentities( $data['pertanyaan'] );
		$data['status'] = 1;
        return $this->db->insert('polling', $data);

	}

	public function update( $id=NULL )
	{
        if( is_null( $id ) ) return FALSE;

		$data = $_POST;
		$data['pertanyaan'] = htmlentities( $data['pertanyaan'] );
        $this->db->where('id', $id);
        return $this->db->update('polling', $data);
	}

	public function delete( $id=NULL )
	{
        if( is_null( $id ) ) return FALSE;

		$sql = "DELETE FROM polling WHERE id = ?";
		return $this->db->query($sql, array($id));
	}

	public function polling_status( $id=NULL, $val=0 )
	{
        if( is_null( $id ) ) return FALSE;

		$sql = "UPDATE polling SET status = ? WHERE id = ?";
		$query = $this->db->query($sql, array($val, $id));

		if ($query) return TRUE;
        return FALSE;
    }

    // PILIHAN POLLING
    public function list_pilihan( $id_poll=NULL )
    {
        if( is_null( $id_poll ) ) return FALSE;
        
        $this->db->where( 'id_poll', $id_poll );
        $query = $this->db->get('poll_pilihan');

        if ( $query && $query->num_rows() > 0 ) 
            return $query->result_array();
        return NULL;
        
    }

    public function count_vote( $id_pilihan=NULL )
    {
        if( is_null( $id_pilihan ) ) return 0;

        $this->db->select( 'COUNT(*) as jumlah_vote' );
        $this->db->from( 'poll_vote' );  
        $this->db->where( 'id_pil', $id_pilihan );
        $query = $this->db->get();

        if ( $query && $query->num_rows() > 0 ) {
            return $query->row_array()['jumlah_vote'];
        }

        return 0;
    }

    public function total_vote( $id_poll=NULL )
    {
        if( is_null( $id_poll ) ) return 0;

        $this->db->select( 'COUNT(*) as jumlah_vote' );
        $this->db->from( 'poll_vote' );  
        $this->db->where( 'id_poll', $id_poll );
        $this->db->group_by( 'id_poll' );
        $query = $this->db->get();

        if ( $query && $query->num_rows() > 0 ) {
            return $query->row_array()['jumlah_vote'];
        }

        return 0;
    }

    public function list_vote( $polling=NULL, $group='a.id' )
    {
        if( is_null( $polling ) ) return FALSE;

        $this->db->select( 'a.id, b.nama, a.alasan, created' );
        $this->db->from( 'poll_vote as a' );
        $this->db->join( 'poll_pilihan as b', 'b.id=a.id_pil' );     
        $this->db->where( 'a.id_poll', $polling );
        $this->db->group_by( $group );
        $this->db->order_by( 'a.id DESC' );
        $query = $this->db->get();

        if ( $query && $query->num_rows() > 0 ) {
            return $query->result_array();
        }

        return NULL;
    }

    public function insert_vote()
	{
		$form = $this->input->post();
		$data['id_poll'] = $form['id_poll'];
		$data['id_pil'] = $form['id_pil'];
		$data['alasan'] = $form['alasan'];
        $data['created'] = date( 'Y-m-d H:i:s', time() );

        $query = $this->db->insert('poll_vote', $data);
        
        return $query;
	}

    public function get_pilihan( $id=NULL )
    {
        if( is_null( $id ) ) return FALSE;
        
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'poll_pilihan' );

        if ( $query && $query->num_rows() > 0 ) {
            return $query->row_array();
        }

        return NULL;
    }

    public function insert_pilihan( $id_poll=NULL )
	{
        if( is_null( $id_poll ) ) return FALSE;

		$data = $_POST;

		$data['id_poll'] = $id_poll;
		$data['nama'] = $data['nama'];
		$data['status'] = 1;
        
        return $this->db->insert('poll_pilihan', $data);
	}

	public function update_pilihan( $id=NULL )
	{
        if( is_null( $id ) ) return FALSE;

		$data = $_POST;
		$data['nama'] =$data['nama'];
		
		$this->db->where('id', $id);
		return $this->db->update('poll_pilihan', $data);
	}

	public function delete_pilihan( $id=NULL )
	{
        if( is_null( $id ) ) return FALSE;

		$sql = "DELETE FROM poll_pilihan WHERE id = ?";
		return $this->db->query($sql, array($id));
	}
    
    public function pilihan_status( $id=NULL, $val=0 )
	{
        if( is_null( $id ) ) return FALSE;

		$sql = "UPDATE poll_pilihan SET status = ? WHERE id = ?";
		return $this->db->query($sql, array($val, $id));
	}
}
?>
