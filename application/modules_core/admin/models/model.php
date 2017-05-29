<?php

Class model extends CI_Model {
    function __construct(){
        parent::__construct();
		$this->load->database();
    }
    function getHomeProduk(){
        $this->load->database();
        $this->db->select('
		foto_produk.url_foto,
		produk.id_produk,
		produk.nama_produk,
		produk.harga
		');
	    $this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->where('produk.`status`',0);
        $this->db->order_by("produk.timestamp", "desc"); 
		$this->db->group_by("produk.id_produk"); 
		$this->db->limit(6);
        return  $this->db->get('foto_produk');
    }
	  function getTshirtProduk(){
        $this->load->database();
        $this->db->select('
		foto_produk.url_foto,
		produk.id_produk,
		produk.nama_produk,
		produk.harga
		');
	    $this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->where('produk.kategori', "1");
		$this->db->where('produk.`status`',0);
        $this->db->order_by("produk.id_produk", "desc"); 
		$this->db->limit(10);
		$this->db->group_by("produk.id_produk"); 
        return  $this->db->get('foto_produk');
    }
	function search($cari)
	{
		$this->db->select('
		produk.nama_produk,
		produk.id_produk,
		produk.nama_produk,
		produk.harga,produk.desc_short,foto_produk.url_foto
		');
		$this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->limit(10);$this->db->where('produk.`status`',0);
		$this->db->like('produk.nama_produk', $cari); 
		$this->db->group_by("produk.id_produk"); 
        return  $this->db->get('foto_produk');
	}
	
		function getAllData()
	{
		$this->db->select('*');
		$this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.kategori');
		
		$this->db->group_by("produk.id_produk"); 
        return  $this->db->get('foto_produk');
	}
	function getDataupdate($cari)
	{
		$this->db->select('*');
		$this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.kategori');
		$this->db->where('produk.id_produk', $cari);
		$this->db->group_by("produk.id_produk"); 
        return  $this->db->get('foto_produk');
	}
	function getAccProduk(){
        $this->load->database();
        $this->db->select('
		foto_produk.url_foto,
		produk.id_produk,
		produk.nama_produk,
		produk.harga
		');
	    $this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->where('produk.kategori', "2");
        $this->db->order_by("produk.id_produk", "desc"); 
		$this->db->limit(10);
		$this->db->where('produk.`status`',0);
		$this->db->group_by("produk.id_produk"); 
        return  $this->db->get('foto_produk');
    }
	
	function getCheckout($user_id)
	{
		$this->db->select('produk.nama_produk,
							produk.desc_short,
							detail_penjualan.harga,
							detail_penjualan.ukuran,
							detail_penjualan.`status` as statusPenjualan,
							detail_penjualan.color,
							detail_penjualan.jumlah,
							foto_produk.url_foto,
							penjualan.`status`,
							penjualan.tanggal_konfrmasi,
							penjualan.`timestamp`,
							penjualan.id_penjualan,detail_penjualan.id_detail');
		$this->db->join('produk','detail_penjualan.id_produk = produk.id_produk');	
		$this->db->join('foto_produk','foto_produk.id_produk = produk.id_produk');	
		$this->db->join('penjualan','detail_penjualan.id_penjualan = penjualan.id_penjualan');		
		$this->db->where('penjualan.`status`',1);
		$this->db->where('penjualan.id_user`',$user_id);
		$this->db->group_by("produk.nama_produk"); 
		return  $this->db->get('detail_penjualan');		
	}
	
		function getCheckout2()
	{
		$this->db->select('produk.nama_produk,
							produk.desc_short,
							detail_penjualan.harga,
							detail_penjualan.ukuran,
							detail_penjualan.`status` as statusPenjualan,
							detail_penjualan.color,
							detail_penjualan.jumlah,
							foto_produk.url_foto,
							penjualan.`status`,
							penjualan.tanggal_konfrmasi,
							penjualan.`timestamp`,
							penjualan.id_penjualan,detail_penjualan.id_detail');
		$this->db->join('produk','detail_penjualan.id_produk = produk.id_produk');	
		$this->db->join('foto_produk','foto_produk.id_produk = produk.id_produk');	
		$this->db->join('penjualan','detail_penjualan.id_penjualan = penjualan.id_penjualan');		
		$this->db->where('penjualan.`status`',1);
		$this->db->group_by("produk.nama_produk"); 
		return  $this->db->get('detail_penjualan');		
	}
	
		function getDetailPesanan($user_id,$id_penjualan)
	{
		$this->db->select('produk.nama_produk,
							produk.desc_short,
							detail_penjualan.harga,
							detail_penjualan.ukuran,
							detail_penjualan.`status` as statusPenjualan,
							detail_penjualan.color,
							detail_penjualan.jumlah,
							foto_produk.url_foto,
							penjualan.`status`,
							penjualan.tanggal_konfrmasi,
							penjualan.`timestamp`,
							penjualan.id_penjualan,detail_penjualan.id_detail');
		$this->db->join('produk','detail_penjualan.id_produk = produk.id_produk');	
		$this->db->join('foto_produk','foto_produk.id_produk = produk.id_produk');	
		$this->db->join('penjualan','detail_penjualan.id_penjualan = penjualan.id_penjualan');		
		$this->db->where('penjualan.id_user`',$user_id);
		$this->db->where('penjualan.id_penjualan`',$id_penjualan);
		$this->db->group_by("produk.nama_produk"); 
		return  $this->db->get('detail_penjualan');		
	}
	
	function getDetailPesananAdm()
	{
		$id = $this->security->xss_clean($this->input->post('id_penjualan'));
		$this->db->select('produk.nama_produk,
							produk.desc_short,
							detail_penjualan.harga,
							detail_penjualan.ukuran,
							detail_penjualan.`status` as statusPenjualan,
							detail_penjualan.color,
							detail_penjualan.jumlah,
							foto_produk.url_foto,
							penjualan.`status`,
							penjualan.tanggal_konfrmasi,
							penjualan.`timestamp`,
							penjualan.id_penjualan,detail_penjualan.id_detail');
		$this->db->join('produk','detail_penjualan.id_produk = produk.id_produk');	
		$this->db->join('foto_produk','foto_produk.id_produk = produk.id_produk');	
		$this->db->join('penjualan','detail_penjualan.id_penjualan = penjualan.id_penjualan');
		$this->db->where('penjualan.id_penjualan`',$id);
		$this->db->group_by("produk.nama_produk"); 
		return  $this->db->get('detail_penjualan');		
	}
	
	function getHistoryCheckout($user_id)
	{
		$this->db->select('produk.nama_produk,
							produk.desc_short,
							detail_penjualan.harga,
							detail_penjualan.ukuran,
							detail_penjualan.color,
							detail_penjualan.jumlah,
							penjualan.total_harga,
							foto_produk.url_foto,
							penjualan.`status`,
							penjualan.tanggal_konfrmasi,
							penjualan.`timestamp`,
							penjualan.id_penjualan,detail_penjualan.id_detail');
		$this->db->join('produk','detail_penjualan.id_produk = produk.id_produk');	
		$this->db->join('foto_produk','foto_produk.id_produk = produk.id_produk');	
		$this->db->join('penjualan','detail_penjualan.id_penjualan = penjualan.id_penjualan');		
		$this->db->where('penjualan.`status` >',1);
		$this->db->where('penjualan.id_user`',$user_id);
		$this->db->group_by("penjualan.id_penjualan"); 
		return  $this->db->get('detail_penjualan');		
	}
	
		function getDataPesanan()
	{
		$this->db->select('produk.nama_produk,
							produk.desc_short,
							detail_penjualan.harga,
							detail_penjualan.ukuran,
							detail_penjualan.color,
							detail_penjualan.jumlah,
							penjualan.total_harga,penjualan.id_user,
							foto_produk.url_foto,
							penjualan.`status`,
							penjualan.tanggal_konfrmasi,
							penjualan.`timestamp`,penjualan.`provinsi`,penjualan.`kota`,penjualan.`alamat`,penjualan.`kodepos`,
							penjualan.id_penjualan,detail_penjualan.id_detail');
		$this->db->join('produk','detail_penjualan.id_produk = produk.id_produk');	
		$this->db->join('foto_produk','foto_produk.id_produk = produk.id_produk');	
		$this->db->join('penjualan','detail_penjualan.id_penjualan = penjualan.id_penjualan');		
		$this->db->where('penjualan.`status` >',0);
		$this->db->order_by("penjualan.`timestamp`","desc");
		$this->db->group_by("penjualan.id_penjualan"); 
		return  $this->db->get('detail_penjualan');		
	}
	function getDaftarPesanan()
	{
		$session_id = $this->session->userdata('logged_in');
		$this->db->select('produk.nama_produk,
							foto_produk.url_foto,
							detail_penjualan.harga,
							detail_penjualan.jumlah,detail_penjualan.status,
							penjualan.id_user');
		$this->db->join('detail_penjualan', 'detail_penjualan.id_produk = produk.id_produk');
		$this->db->join('foto_produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
		$this->db->where('penjualan.id_user', $session_id["id_user"]);
		$this->db->where('penjualan.`status`', "1");
		$this->db->group_by("produk.id_produk"); 
		return  $this->db->get('produk');
							
	}
	
	function getSoesProduk(){
        $this->load->database();
        $this->db->select('
		foto_produk.url_foto,
		produk.id_produk,
		produk.nama_produk,
		produk.harga
		');
	    $this->db->join('produk', 'foto_produk.id_produk = produk.id_produk');
		$this->db->where('produk.kategori', "3");$this->db->where('produk.`status`',0);
        $this->db->order_by("produk.id_produk", "desc"); 
		$this->db->limit(10);
		$this->db->group_by("produk.id_produk"); 
        return  $this->db->get('foto_produk');
    }
    function getDetailProduk($produk_id){
        $this->load->database();
        $this->db->select('produk.id_produk,
							produk.nama_produk,
							produk.harga,
							produk.ukuran,
							produk.description,
							produk.desc_short,
							produk.color,
							produk.Kategori');
        $this->db->where('produk.id_produk', $produk_id);
        return  $this->db->get('produk');
    }
    function AutoInsertCI($table, $object) {
        $query = $this->db->insert($table, $object);
        return $query;
    }
	  function selectRecordTable($field, $table, $filterstate, $order,$limit) {
        $i = 0;
        $sql = "";
        foreach ($field as $f) {
            if ($i > 0)
                $sql.=",";
            $sql .= $f;
            $i++;
        }
        $this->db->select($sql);
        $this->db->from($table);
        $this->db->where($filterstate);
        if ($order != NULL) {
            $order = explode(",", $order);
            $this->db->order_by($order[0], $order[1]);
        }
        $query = $this->db->get();

        if (!$query) {
            return NULL;
        } else {
            $query = $query->result_array();
            return $query;
        }
    }
	
	function getFotoDetailProduk($produk_id)
	{
		   $this->load->database();
		   $this->db->select('foto_produk.url_foto');
		    $this->db->where('foto_produk.id_produk',$produk_id);
			return  $this->db->get('foto_produk');
			
	}
		function getIdUser()
	{
		   $this->load->database();
		   $this->db->select('`user`.id_user');
		   $this->db->order_by("`user`.id_user", "desc"); 
		   $this->db->limit(1);
			return  $this->db->get('user')->result_array();
			
	}
	public function CreateMember(){
		$data["firstname"] = $this->security->xss_clean($this->input->post('firstname'));
        $data["lastname"] = $this->security->xss_clean($this->input->post('lastname'));
		$data["dob"] = $this->security->xss_clean($this->input->post('dob'));
        $data["provinsi"] = $this->security->xss_clean($this->input->post('provinsi'));
		$data["kota"] = $this->security->xss_clean($this->input->post('kota'));
		$data["alamat"] = $this->security->xss_clean($this->input->post('alamat'));
        $data["kodepos"] = $this->security->xss_clean($this->input->post('kodepos'));
		$data["username"] = $this->security->xss_clean($this->input->post('username'));
        $data["auth"] = $this->security->xss_clean($this->input->post('auth'));
		$this->db->insert('user', $data);
		$a = $this->getIdUser();
            $data1 = array(
                    'id_user' => $a[0]["id_user"],
                    'firstname' => $data["firstname"],
                    'lastname' => $data["lastname"],
                    'validated' => true
                    );
            $this->session->set_userdata('logged_in',$data1);
			
		return  true;
	 }
	function getProfile($user_id)
	{
		 $this->db->select('`user`.firstname,
							`user`.lastname,
							`user`.alamat,
							`user`.provinsi,
							`user`.kota,
							`user`.kodepos,
							`user`.dob,
							`user`.url_foto
							');
		 $this->db->where('`user`.id_user ',$user_id);
		 return  $this->db->get('user');
	}
	function autoUpdateproduk($table,$data,$where){
		$this->db->where('id_produk', $where);
		return $this->db->update($table, $data); 
	}
	 public function UpdateProfile($user_id){
		$data["firstname"] = $this->security->xss_clean($this->input->post('firstname'));
        $data["lastname"] = $this->security->xss_clean($this->input->post('lastname'));
		$data["dob"] = $this->security->xss_clean($this->input->post('dob'));
        $data["provinsi"] = $this->security->xss_clean($this->input->post('provinsi'));
		$data["kota"] = $this->security->xss_clean($this->input->post('kota'));
		$data["alamat"] = $this->security->xss_clean($this->input->post('alamat'));
        $data["kodepos"] = $this->security->xss_clean($this->input->post('kodepos'));
		$this->db->where('id_user', $user_id);
		return $this->db->update('user', $data); 
	 }
	 public function update_status(){
		$id = $this->security->xss_clean($this->input->post('id'));
		$data["status"] = 1;
		$this->db->where('id_detail', $id);
		return $this->db->update('detail_penjualan', $data); 
	 }
	 
	 
	 public function updataFotoProfile($url,$id){
		$data["url_foto"] = $url;
		$this->db->where('id_user', $id);
		return $this->db->update('user', $data); 
	 }
	 
	 	 public function bayar(){
		$id = $this->security->xss_clean($this->input->post('id'));
		$data["total_harga"]  = $this->security->xss_clean($this->input->post('total'));
		$data["status"] = 2;
		$data["provinsi"] = $this->security->xss_clean($this->input->post('provinsi'));
		$data["kota"] = $this->security->xss_clean($this->input->post('kota'));
		$data["alamat"] = $this->security->xss_clean($this->input->post('alamat'));
        $data["kodepos"] = $this->security->xss_clean($this->input->post('kodepos'));
		$this->db->where('id_penjualan', $id);
		return $this->db->update('penjualan', $data); 
	 }
	 
	 public function terima(){
		$id = $this->security->xss_clean($this->input->post('id_penjualan'));
		$data["tanggal_konfrmasi"]  = date('YmdHis');
		$data["status"] = 3;
		$session_id = $this->session->userdata('adminLogin');
		$data["id_admin"] = $session_id["id_admin"];
		$this->db->where('id_penjualan', $id);
		return $this->db->update('penjualan', $data); 
	 }
	 public function tolak(){
		$id = $this->security->xss_clean($this->input->post('id_penjualan'));
		$data["tanggal_konfrmasi"]  = date('YmdHis');
		$data["status"] = 4;
		$session_id = $this->session->userdata('adminLogin');
		$data["id_admin"] = $session_id["id_admin"];
		$this->db->where('id_penjualan', $id);
		return $this->db->update('penjualan', $data); 
	 }
	 
	 public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('auth', $password);
        
        // Run the query
        $query = $this->db->get('user');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id_user' => $row->id_user,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'url_foto' => $row->url_foto,
                    'validated' => true
                    );
            $this->session->set_userdata('logged_in',$data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
		 public function validateAdmin(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('auth', $password);
		$this->db->where('status', 0);
        
        // Run the query
        $query = $this->db->get('admin');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id_admin' => $row->id_admin,
                    'nama_admin' => $row->nama_admin,
                    'validated' => true
                    );
            $this->session->set_userdata('adminLogin',$data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    function autoUpdate($table, $arrayData, $clause) {
        $sql = "UPDATE " . $table . " SET ";
        $i = 0;
        foreach ($arrayData as $field => $value) {

            $value = "'" . $value . "'";
            if ($i > 0) {
                $sql .= ", ";
            }
            $sql .= $field . "=" . $value;
            $i++;
        }
        if ($clause != '' || $clause != NULL) {
            $sql .= " WHERE " . $clause;
        }

        $rs = $this->db->query($sql);
        //print_r($sql);
        if (!$rs)
            return FALSE;

        return TRUE;
    }
}