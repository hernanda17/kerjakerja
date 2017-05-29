<?php

Class model extends CI_Model {
    function __construct(){
        parent::__construct();
		$this->load->database();
    }
    function getCategory(){
        $this->db->select('*');
        return  $this->db->get('category')->result_array();
    }
	
	
	
	function getArea($data){
        $this->db->select('id,name');
		$this->db->where("level",1);
		if($data!=null)
		$this->db->where("id",$data);
        return  $this->db->get('area')->result_array();
    }
	function getEmail($email)
	{
		   $this->load->database();
		   $this->db->select('username');
			if(  $this->db->get('member')->num_rows > 0)
				return false;
			else
				return true;
			
	}
	function getEmailPerusahaan($email)
	{
		   $this->load->database();
		   $this->db->select('username');
			if(  $this->db->get('perusahaan')->num_rows > 0)
				return false;
			else
				return true;
			
	}
	public function CreateMember(){
		$data["id_member"]= rand ( 0, 9999 );
		$data["username"] = $this->security->xss_clean($this->input->post('email'));
		if($this->getEmail($data["username"]))
		{
			$data["firstname"] = $this->security->xss_clean($this->input->post('firstname'));
			$data["lastname"] = $this->security->xss_clean($this->input->post('lastname'));
			$data["dob"] = $this->security->xss_clean($this->input->post('dob'));
			$data["alamat"] = $this->security->xss_clean($this->input->post('address'));
			$data["auth"] = $this->security->xss_clean($this->input->post('auth'));
			$data["status"] = 1 ; 
			$data["id_category"] = $this->security->xss_clean($this->input->post('cat'));
			$this->db->insert('member', $data);
			return  $data;
		}else
		{
			return 0;
		}
	 }
	 
	 public function CreateLowongan($id){
		$data["id_lowongan"]= rand ( 0, 9999 );
		$data["id_perusahaan"]= $id;
		$data["title"] = $this->security->xss_clean($this->input->post('title'));
		$data["pengalaman"] = $this->security->xss_clean($this->input->post('pengalaman'));
		$data["pendidikan"] = $this->security->xss_clean($this->input->post('pendidikan'));
		$data["location"] = $this->security->xss_clean($this->input->post('location'));
		$data["typeTime"] = $this->security->xss_clean($this->input->post('typeTime'));
		$data["salary"] = $this->security->xss_clean($this->input->post('salary'));
		$data["maxAge"] = $this->security->xss_clean($this->input->post('age'));
		$data["status"] = 0 ; 
		$data["id_category"] = $this->security->xss_clean($this->input->post('cat'));
		$this->db->insert('lowongan', $data);
		return  $data;
	 }
	 
	 function autoUpdateEmail($table,$data,$where){
		$this->db->where('id_member', $where);
		return $this->db->update($table, $data); 
	}
	
	function autoUpdateEmailPerusahaan($table,$data,$where){
		$this->db->where('id_perusahaan', $where);
		return $this->db->update($table, $data); 
	}
	
	 public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('auth', $password);
        
        // Run the query
        $query = $this->db->get('member');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id_member' => $row->id_member,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'validated' => true
                    );
            $this->session->set_userdata('logged_in',$data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
	
	public function validatePerusahaan(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('auth', $password);
        
        // Run the query
        $query = $this->db->get('perusahaan');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id_perusahaan' => $row->id_perusahaan,
                    'name' => $row->nama_perusahaan,
                    'validated' => true
                    );
            $this->session->set_userdata('logged_in_perusahaan',$data);
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
        
        // Run the query
        $query = $this->db->get('admin');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id_admin' => $row->id_admin,
                    'validated' => true
                    );
            $this->session->set_userdata('logged_in_admin',$data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
	
	function getProfile($id)
	{
		$this->db->select('member.id_member,
							member.username,
							member.firstname,
							member.lastname,
							member.alamat,
							member.dob,
							member.picture,
							category.nama_category,
							lowongan_member.file_lamaran');
		$this->db->join('category', 'member.id_category = category.id_category');
		$this->db->join('lowongan_member', 'lowongan_member.id_member = member.id_member');
		$this->db->where('member.id_member', $id); 
        return  $this->db->get('member');
	}
	
	function getProfilePerusahaan($id)
	{
		$this->db->select(' perusahaan.id_perusahaan,
							perusahaan.username,
							perusahaan.nama_perusahaan,
							perusahaan.description,
							perusahaan.dateOpen,
							perusahaan.picture,
							area.name,
							category.nama_category');
		$this->db->join('category', 'perusahaan.id_category = category.id_category');
		$this->db->join('area', 'perusahaan.alamat = area.id',"left");
		$this->db->where('perusahaan.id_perusahaan', $id); 
		$this->db->where('perusahaan.status', 0); 
        return  $this->db->get('perusahaan');
	}
	
	public function updataFotoProfile($url,$id){
		$data["picture"] = $url;
		$this->db->where('id_member', $id);
		return $this->db->update('member', $data); 
	 }
	 
	 public function updataFotoProfilePerusahaan($url,$id){
		$data["picture"] = $url;
		$this->db->where('id_perusahaan', $id);
		return $this->db->update('perusahaan', $data); 
	 }
	 
	 public function updataFotoLowongan($url){
		$data["id_lowongan_gambar"]= rand ( 0, 9999 );
		$data["picture"]= $url;
		$data["id_lowongan"] = $this->security->xss_clean($this->input->post('id_lowongan'));
		return $this->db->insert('lowongan_gambar', $data); 
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
	
	public function CreatePerusahaan(){
		$data["id_perusahaan"]= rand ( 0, 9999 );
		$data["username"] = $this->security->xss_clean($this->input->post('email'));
		if($this->getEmailPerusahaan($data["username"]))
		{
			$data["nama_perusahaan"] = $this->security->xss_clean($this->input->post('name'));
			$data["description"] = $this->security->xss_clean($this->input->post('desc'));
			$data["alamat"] = $this->security->xss_clean($this->input->post('address'));
			$data["auth"] = $this->security->xss_clean($this->input->post('auth'));
			$data["dateOpen"] = $this->security->xss_clean($this->input->post('date'));
			$data["status"] = 1 ; 
			$data["id_category"] = $this->security->xss_clean($this->input->post('cat'));
			$this->db->insert('perusahaan', $data);
			return  $data;
		}else
		{
			return 0;
		}
	 }
	
	function getAllLowongan($id)
	{
		$this->db->select('lowongan.title,
							lowongan.id_lowongan,
							count(lowongan_member.id_daftar) as jumlah');
		$this->db->join('lowongan_member', 'lowongan_member.id_lowongan = lowongan.id_lowongan', 'left');
		$this->db->where('lowongan.id_perusahaan`',$id);
		return  $this->db->get('lowongan');		
	}
	
	function getMemberApply($id)
	{
		$this->db->select('lowongan_member.id_daftar,
							lowongan_member.id_member,
							lowongan_member.id_lowongan,
							lowongan_member.`status`,
							lowongan.title,
							lowongan.pendidikan,
							lowongan.location,
							lowongan.pengalaman,
							lowongan.salary,
							lowongan.id_category,
							lowongan.typeTime,
							lowongan.maxAge');
		$this->db->join('lowongan', 'lowongan_member.id_lowongan = lowongan.id_lowongan');
		$this->db->where('`lowongan_member.id_member`',$id);
		return  $this->db->get('lowongan_member');		
	}
	
	function getMemberApply2($idMember)
	{
		$id = $this->security->xss_clean($this->input->get('id_lowongan'));
		$this->db->select('lowongan_member.id_daftar,
							lowongan_member.id_member,
							lowongan_member.id_lowongan,
							lowongan_member.`status`,
							lowongan.title,
							lowongan.pendidikan,
							lowongan.location,
							lowongan.pengalaman,
							lowongan.salary,
							lowongan.id_category,
							lowongan.typeTime,
							lowongan.maxAge,lowongan_gambar.picture');
		$this->db->join('lowongan', 'lowongan_member.id_lowongan = lowongan.id_lowongan');
		$this->db->join('lowongan_gambar', 'lowongan.id_lowongan = lowongan_gambar.id_lowongan',"left");
		
		$this->db->where('`lowongan_member.id_member`',$idMember);
		$this->db->where('`lowongan.id_lowongan`',$id);
		$this->db->group_by("lowongan.id_lowongan");
		return  $this->db->get('lowongan_member');		
	}
	
	function getLowonganMember()
	{
		$id = $this->security->xss_clean($this->input->get('id_lowongan'));
		$this->db->select('lowongan_member.`id_lowongan`,
							lowongan_member.`status`,
							member.id_member,
							member.firstname,
							member.lastname,
							member.alamat,
							member.dob,
							member.picture,
							category.nama_category,
							member.username');
		$this->db->join('lowongan_member', 'lowongan_member.id_member = member.id_member');
		$this->db->join('category', 'member.id_category = category.id_category');
		
		$this->db->where('`lowongan_member.id_lowongan`',$id);
		return  $this->db->get('member');		
	}
	
	function getImgLowongan()
	{
		$id_lowongan = $this->security->xss_clean($this->input->get('id_lowongan'));
		$this->db->select('*');
		$this->db->where('lowongan_gambar.id_lowongan`',$id_lowongan);
		return  $this->db->get('lowongan_gambar');		
	}
	
	function getDetailLowongan($id)
	{
		$id_lowongan = $this->security->xss_clean($this->input->get('id_lowongan'));
		$this->db->select('lowongan.id_lowongan,
							lowongan.title,
							lowongan.pengalaman,
							lowongan.pendidikan,
							lowongan.location,
							lowongan.salary,
							lowongan.typeTime,
							lowongan.maxAge,
							lowongan.`status`,
							lowongan.id_lowongan,
						   	category.nama_category,
							count(lowongan_member.id_daftar) as jumlah');
		$this->db->join('category', 'lowongan.id_category = category.id_category');
		$this->db->join('lowongan_member', 'lowongan_member.id_lowongan = lowongan.id_lowongan', 'left');
		$this->db->where('lowongan.id_perusahaan`',$id);
		$this->db->where('lowongan.id_lowongan`',$id_lowongan);
		return  $this->db->get('lowongan');		
	}
	public function UpdateProfile($user_id){
		$data["firstname"] = $this->security->xss_clean($this->input->post('firstname'));
		$data["lastname"] = $this->security->xss_clean($this->input->post('lastname'));
		$data["dob"] = $this->security->xss_clean($this->input->post('dob'));
		$data["alamat"] = $this->security->xss_clean($this->input->post('address'));
		$data["auth"] = $this->security->xss_clean($this->input->post('auth'));
		$this->db->where('id_member', $user_id);
		return $this->db->update('member', $data); 
	 }
	 
	public function UpdateProfilePerusahaan($user_id){
		$data["nama_perusahaan"] = $this->security->xss_clean($this->input->post('name'));
		$data["description"] = $this->security->xss_clean($this->input->post('desc'));
		$data["alamat"] = $this->security->xss_clean($this->input->post('address'));
		$data["auth"] = $this->security->xss_clean($this->input->post('auth'));
		$data["dateOpen"] = $this->security->xss_clean($this->input->post('date'));
		$data["id_category"] = $this->security->xss_clean($this->input->post('cat'));
		$this->db->where('id_perusahaan', $user_id);
		return $this->db->update('perusahaan', $data); 
	 }
	 
	 public function UpdateDetailLowongan(){
		$id_lowongan =  $this->security->xss_clean($this->input->post('id_lowongan'));
		$data["title"] = $this->security->xss_clean($this->input->post('title'));
		$data["pengalaman"] = $this->security->xss_clean($this->input->post('pengalaman'));
		$data["pendidikan"] = $this->security->xss_clean($this->input->post('pendidikan'));
		$data["location"] = $this->security->xss_clean($this->input->post('location'));
		$data["typeTime"] = $this->security->xss_clean($this->input->post('typeTime'));
		$data["salary"] = $this->security->xss_clean($this->input->post('salary'));
		$data["maxAge"] = $this->security->xss_clean($this->input->post('age'));
		$data["id_category"] = $this->security->xss_clean($this->input->post('cat'));
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->update('lowongan', $data); 
	 }
	 
	 public function updateStatusLowongan(){
		 $data["status"] = $this->security->xss_clean($this->input->post('optradio'));
		$id_lowongan = $this->security->xss_clean($this->input->post('id_lowongan'));
		$id_member = $this->security->xss_clean($this->input->post('id_member'));
		 $this->db->where('id_lowongan', $id_lowongan);
		 $this->db->where('id_member', $id_member);
		return $this->db->update('lowongan_member', $data); 
	 }
	 
	 public function hapusDetailLowongan(){
		$id_lowongan =  $this->security->xss_clean($this->input->get('id_lowongan'));
		$data["status"] = 1;
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->update('lowongan', $data); 
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
	function getListKerja($page)
	{
		$this->db->select(' lowongan.id_lowongan,
							lowongan_gambar.picture,
							lowongan.title,
							perusahaan.nama_perusahaan,
							lowongan.salary,
							lowongan.location,
							lowongan.typeTime');
		$this->db->join('lowongan', 'lowongan_gambar.id_lowongan = lowongan.id_lowongan',"right");
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->group_by("lowongan.id_lowongan");
		$this->db->limit(5, $page);
		$this->db->where('perusahaan.status', 0); 
        return  $this->db->get('lowongan_gambar');
	}
	
	function getListKerjaAll2()
	{
		$this->db->select(' lowongan.id_lowongan,
							lowongan_gambar.picture,
							lowongan.title,
							perusahaan.nama_perusahaan,
							lowongan.salary,
							lowongan.location,
							lowongan.typeTime,
							lowongan.status');
		$this->db->join('lowongan', 'lowongan_gambar.id_lowongan = lowongan.id_lowongan',"right");
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->group_by("lowongan.id_lowongan");
		$this->db->limit(5);
        return  $this->db->get('lowongan_gambar');
	}
	
	function getListKerjaSearch()
	{
		
		$tempat = $this->security->xss_clean($this->input->post('tempat'));
		$category = $this->security->xss_clean($this->input->post('category'));
		
		$like = $this->security->xss_clean($this->input->post('like'));
		$this->db->select(' lowongan.id_lowongan,
							lowongan_gambar.picture,
							lowongan.title,
							perusahaan.nama_perusahaan,
							lowongan.salary,
							lowongan.location,
							lowongan.typeTime');
		$this->db->join('lowongan', 'lowongan_gambar.id_lowongan = lowongan.id_lowongan',"right");
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->join('category', 'lowongan.id_category = category.id_category');
		$this->db->group_by("lowongan.id_lowongan");
		$this->db->where('perusahaan.status', 0); 
		if($tempat!="9999999")
		$this->db->where('lowongan.location', $tempat); 
		if($category!="9999999")
		$this->db->where('lowongan.id_category', $category); 
		$this->db->like('lowongan.title',$like); 
        return  $this->db->get('lowongan_gambar');
	}
	
	function getListKerjaAll()
	{
		$this->db->select(' lowongan.id_lowongan,
							lowongan_gambar.picture,
							lowongan.title,
							perusahaan.nama_perusahaan,
							lowongan.salary,
							lowongan.location,
							lowongan.typeTime');
		$this->db->join('lowongan', 'lowongan_gambar.id_lowongan = lowongan.id_lowongan',"right");
		$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
		$this->db->group_by("lowongan.id_lowongan");
		$this->db->limit(9);
		$this->db->where('perusahaan.status', 0); 
        return  $this->db->get('lowongan_gambar');
	}
	
	public function applyNow(){
		$sess = $this->session->userdata('logged_in');
	  	$session_id = $sess["id_member"];
		$data["id_daftar"]= rand ( 0, 9999 );
		$data["id_member"] = $session_id;
		$data["id_lowongan"] = $this->security->xss_clean($this->input->get('id_lowongan'));
		$data["status"] = 0;
		return $this->db->insert('lowongan_member', $data); 
	 }
	 
	 public function updataLamaran($url,$id){
		$data["file_lamaran"] = $url;
		$data["id_daftar"]= rand ( 0, 9999 );
		$data["id_member"] = $id;
		$data["id_lowongan"] = $this->security->xss_clean($this->input->post('id_lowongan'));
		return $this->db->insert('lowongan_member', $data); 
	 }
	 
	 function getMemberApply3()
	{
		$id = $this->security->xss_clean($this->input->get('id_lowongan'));
		$this->db->select('
							lowongan.id_lowongan,
							lowongan.title,
							lowongan.pendidikan,
							area.name as "location",
							lowongan.pengalaman,
							lowongan.salary,
							lowongan.id_category,
							lowongan.typeTime,
							lowongan.maxAge,lowongan_gambar.picture');
		$this->db->join('lowongan_gambar', 'lowongan.id_lowongan = lowongan_gambar.id_lowongan',"left");
		$this->db->join('area', 'lowongan.location = area.id');
		$this->db->where('`lowongan.id_lowongan`',$id);
		$this->db->group_by("lowongan.id_lowongan");
		return  $this->db->get('lowongan');		
	}
	
	public function deleteLowongan(){
		$id_lowongan =  $this->security->xss_clean($this->input->get('id_lowongan'));
		$data["status"] = 1;
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->update('lowongan', $data); 
	 }
	 public function activeLowongan(){
		$id_lowongan =  $this->security->xss_clean($this->input->get('id_lowongan'));
		$data["status"] = 0;
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->update('lowongan', $data); 
	 }
	public function deleteLamaran(){
		$id_lowongan =  $this->security->xss_clean($this->input->get('id_lowongan'));
		$data["status"] = 2;
		$this->db->where('id_lowongan', $id_lowongan);
		return $this->db->update('lowongan_member', $data); 
	 }
	 function getListMember()
	{
		$this->db->select('member.id_member,
							member.username,
							member.`status`,
							member.firstname,
							member.lastname,
							member.alamat,
							member.dob,
							member.picture,
							member.id_category,
							member.pendidikan');
		$this->db->limit(5);
        return  $this->db->get('member');
	}
	
	 function getListPerusahaan()
	{
		$this->db->select('perusahaan.id_perusahaan,
							perusahaan.username,
							perusahaan.`status`,
							perusahaan.nama_perusahaan,
							perusahaan.description,
							perusahaan.dateOpen,
							perusahaan.picture');
		$this->db->limit(5);
        return  $this->db->get('perusahaan');
	}
	public function deleteMember(){
		$id_member =  $this->security->xss_clean($this->input->get('id_member'));
		$data["status"] = 1;
		$this->db->where('id_member', $id_member);
		return $this->db->update('member', $data); 
	 }
	 
	 public function activeMember(){
		$id_member =  $this->security->xss_clean($this->input->get('id_member'));
		$data["status"] = 0;
		$this->db->where('id_member', $id_member);
		return $this->db->update('member', $data); 
	 }
	public function deletePerusahaan(){
		$id_perusahaan =  $this->security->xss_clean($this->input->get('id_perusahaan'));
		$data["status"] = 1;
		$this->db->where('id_perusahaan', $id_perusahaan);
		return $this->db->update('perusahaan', $data); 
	 }
	 
	 public function activePerusahaan(){
		$id_perusahaan =  $this->security->xss_clean($this->input->get('id_perusahaan'));
		$data["status"] = 0;
		$this->db->where('id_perusahaan', $id_perusahaan);
		return $this->db->update('perusahaan', $data); 
	 }
	 
	 function getProfileMemberAdmin()
	{
		$id = $this->security->xss_clean($this->input->get('id_member'));
		$this->db->select('member.id_member,
							member.username,
							member.firstname,
							member.lastname,
							member.alamat,
							member.dob,
							member.picture,
							category.nama_category');
		$this->db->join('category', 'member.id_category = category.id_category');
		$this->db->where('member.id_member', $id); 
        return  $this->db->get('member');
	}
	function getProfilePerusahaanAdmin()
	{
		$id = $this->security->xss_clean($this->input->get('id_perusahaan'));
		$this->db->select('perusahaan.id_perusahaan,
							perusahaan.username,
							perusahaan.`status`,
							perusahaan.nama_perusahaan,
							perusahaan.description,
							perusahaan.dateOpen,
							perusahaan.picture,
							area.name');
		$this->db->join('area', 'perusahaan.alamat = area.id');
		$this->db->where('perusahaan.id_perusahaan', $id); 
        return  $this->db->get('perusahaan');
	}
}