<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class admin extends MX_Controller {
    
     function __construct() {
        parent::__construct();
        $this->load->model('model');$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
     }
   public function index()
   {
       
      $this->load->view('index');
   }
   
    public function sign_up()
   {
       $this->load->helper('url');

      $this->load->view('g/web/signup');
   }
   
   public function search()
   {
	   $cari = $this->security->xss_clean($this->input->post('cari'));
	   $query = $this->model->search($cari);
	   $data["data_produk"]=$query;
	   $this->load->view('g/web/search',$data);
   }
     public function sale()
   {
       $this->load->helper('url');
	   $query = $this->model->getHomeProduk();
	   $z = $query->result_array();
       $data ['data_produk'] = $query;
      $this->load->view('g/web/sale',$data);
   }
        public function cek()
   {
       $this->load->helper('url');
	   $query = $this->model->getHomeProduk();
	   $z = $query->result_array();
       $data ['data_produk'] = $query;
      $this->load->view('g/web/cek_pesanan',$data);
   }
   
   public function tshirt()
   {
       $this->load->helper('url');
	   $query = $this->model->getTshirtProduk();
	   $z = $query->result_array();
       $data ['data_produk'] = $query;
      $this->load->view('g/web/tshirt',$data);
   }
   public function soes()
   {
       $this->load->helper('url');
	   $query = $this->model->getSoesProduk();
	   $z = $query->result_array();
       $data ['data_produk'] = $query;
      $this->load->view('g/web/soes',$data);
   }
      public function acc()
   {
       $this->load->helper('url');
	   $query = $this->model->getAccProduk();
	   $z = $query->result_array();
       $data ['data_produk'] = $query;
      $this->load->view('g/web/acc',$data);
   }
     public function profile()
   {
	   $session_id = $this->session->userdata('logged_in');
       $query = $this->model->getProfile($session_id["id_user"]);
       $data ['data_profile'] = $query->result_array();
      $this->load->view('g/web/profile',$data);
   }
        public function add_produk()
   {
      $this->load->view('g/web/addProduk');
   }
         public function edit_Produk()
   {
	   $cari = $this->security->xss_clean($this->input->post('cari'));
	   $query = $this->model->getAllData();
	   $data["data_produk"]=$query;
	   $this->load->view('g/web/editProduk',$data);
   }
   
    public function edit()
   {
	   $cari = $this->security->xss_clean($this->input->post('idProduk'));
	   $query = $this->model->getDataupdate($cari);
	   $data["data_produk"]=$query;
	   $this->load->view('g/web/edit',$data);
   }
           public function addPhotoProduk($id)
   {
	   $data['id'] = $id;
      $this->load->view('g/web/uploadProduk',$data);
   }
   
        public function checkout()
   {
	   $session_id = $this->session->userdata('logged_in');
       $query = $this->model->getCheckout($session_id["id_user"]);
	   $query2 = $this->model->getHistoryCheckout($session_id["id_user"]);
	   $data ['data_history'] = $query2;
       $data ['data_produk'] = $query;
        $this->load->view('g/web/cek_pesanan',$data);
   }
   
     public function cek_penjualan()
   {
	   $id_pesanan= $this->security->xss_clean($this->input->post('id'));
	   $session_id = $this->session->userdata('logged_in');
       $query = $this->model->getDetailPesanan($session_id["id_user"],$id_pesanan); 
       $data ['data_produk'] = $query;
        $this->load->view('g/web/detail_pesanan',$data);
   }
   function upload()
   {
	  $config['upload_path'] = './asset/ini/images/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			print_r($error);
		}
		else
		{
			$session_id = $this->session->userdata('logged_in');
			$data = $this->upload->data();
		    $this->model->updataFotoProfile($data["file_name"],$session_id["id_user"]);
			$this->profile();
		}
	}
	   function uploadProdukSmall()
   {
			$config['upload_path'] = './asset/ini/images/small/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			
   }
   function uploadProduk()
   {
	    $config['upload_path'] = './asset/ini/images/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload())
		{
			$data = $this->upload->data();
			
			
			if ($this->upload->do_upload())
			{ 
			    $config['upload_path'] = './asset/ini/images/small/';
				$config['allowed_types'] = 'gif|jpg|png';
				$g["id_produk"] = $id;
				$g["url_foto"] =$data["file_name"]; 
				$this->model->AutoInsertCI('foto_produk', $g);
				$this->load->library('upload', $config);
				if ($this->upload->do_upload())
				{
					$this->addPhotoProduk($id);
				}
			}
		}
	
	}
   function admin()
   {
	   $query = $this->model->getDataPesanan();
	   $data ['data_pesanan'] = $query;
	   $this->load->view('g/web/admin_login',$data);
   }
   
      function adminCekBarang()
   {
	   $query = $this->model->getDetailPesananAdm();
	   $data ['data_pesanan'] = $query;
	   $this->load->view('g/web/admPesanan',$data);
   }
   
   function bayar()
   {
	    // Validate the user can login
		$session_id = $this->session->userdata('logged_in');
        $result = $this->model->bayar();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            redirect('index');
        }else{
            // If user did validate, 
            // Send them to members area
			redirect('');
        }        
	   
   }
   
     public function detail()
   {
	  $uri= $this->uri->segment(3);
		
       $this->load->helper('url');
       $query = $this->model->getDetailProduk($uri);
	   $query2 = $this->model->getFotoDetailProduk($uri);
       $data ['data_produk'] = $query->result_array();
	   $data ['data_foto'] = $query2->result_array();
      $this->load->view('g/web/detail',$data);
   }
   
   public function process(){
        // Load the model
        $this->load->model('model');
        // Validate the user can login
        $result = $this->model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $this->profile();
        }else{
            // If user did validate, 
            // Send them to members area
			$this->profile();
        }        
    }
	   public function adminLogin(){
        // Load the model
        $this->load->model('model');
        // Validate the user can login
        $result = $this->model->validateAdmin();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $this->admin();
        }else{
            // If user did validate, 
            // Send them to members area
			$this->admin();
        }        
    }

	public function update_status(){
        // Validate the user can login
		$session_id = $this->session->userdata('logged_in');
        $result = $this->model->update_status();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            redirect('index');
        }else{
            // If user did validate, 
            // Send them to members area
			$this->index();
        }        
    }
	
	public function terima(){
        // Validate the user can login
		if( $this->session->userdata('adminLogin'))
		{
			$result = $this->model->terima();
			// Now we verify the result
			if(! $result){
				// If user did not validate, then show them login page again
				$this->admin();
			}else{
				// If user did validate, 
				// Send them to members area
				$this->admin();
			}        
		}
    }
	
		public function tolak(){
        // Validate the user can login
		if( $this->session->userdata('adminLogin'))
		{
			$result = $this->model->tolak();
			// Now we verify the result
			if(! $result){
				// If user did not validate, then show them login page again
				$this->admin();
			}else{
				// If user did validate, 
				// Send them to members area
				$this->admin();
			}        
		}
    }
	
	public function updateProfile(){
        // Validate the user can login
		$session_id = $this->session->userdata('logged_in');
        $result = $this->model->UpdateProfile($session_id["id_user"]);
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            redirect('index');
        }else{
            // If user did validate, 
            // Send them to members area
			$this->index();
        }        
    }
	
	function addProduk()
	{
		$data["id_produk"] = date('YsHim');$data["timestamp"] = date("Y-m-d H:i:s");
		$data["kategori"] = $this->security->xss_clean($this->input->post('kategori'));
		$data["nama_produk"] = $this->security->xss_clean($this->input->post('nama_produk'));
		$data["ukuran"] = $this->security->xss_clean($this->input->post('ukuran'));
		$data["color"] = $this->security->xss_clean($this->input->post('color'));
		$data["desc_short"] = $this->security->xss_clean($this->input->post('desc_short'));
		$data["harga"] = $this->security->xss_clean($this->input->post('harga'));
		$data["description"] = $this->security->xss_clean($this->input->post('description'));
		$res = $this->model->AutoInsertCI('produk', $data);
		if($res)
		{
			 $this->addPhotoProduk($data["id_produk"]);
		}
	}
	
		function updateProduk()
	{
		$id = $this->security->xss_clean($this->input->post('idProduk'));
		
		$data["nama_produk"] = $this->security->xss_clean($this->input->post('nama_produk'));
		$data["ukuran"] = $this->security->xss_clean($this->input->post('ukuran'));
		$data["color"] = $this->security->xss_clean($this->input->post('color'));
		$data["desc_short"] = $this->security->xss_clean($this->input->post('desc_short'));
		$data["harga"] = $this->security->xss_clean($this->input->post('harga'));
		$data["description"] = $this->security->xss_clean($this->input->post('description'));
		$res = $this->model->autoUpdateproduk('produk',$data, $id);
		if($res)
			$this->edit_Produk();
	}
	
	function hapusProduk()
	{
		$id = $this->security->xss_clean($this->input->post('idProduk'));
		$data["status"] = "1";
		$res = $this->model->autoUpdateproduk('produk',$data, $id);
		if($res)
			$this->edit_Produk();
	}
	function activeProduk()
	{
		$id = $this->security->xss_clean($this->input->post('idProduk'));
		$data["status"] = "0";
		$res = $this->model->autoUpdateproduk('produk',$data, $id);
		if($res)
			$this->edit_Produk();
			
	}
	
	function add()
	{
		$session_id = $this->session->userdata('logged_in');
		$field = array("id_penjualan");
		$where  = "id_user = '".$session_id["id_user"]."' AND status = 1"; 
		$order = array("id_penjualan","desc");
		$result = $this->model->selectRecordTable($field,"penjualan",$where,null,null);
		if(count($result)>0)
		{
			  $data["id_penjualan"] = $result[0]['id_penjualan'];
			  $data["color"] = $this->security->xss_clean($this->input->post('color'));
			  $data["ukuran"] = $this->security->xss_clean($this->input->post('ukuran'));
			  $data["id_Produk"] = $this->security->xss_clean($this->input->post('idProduk'));
			  $data["harga"] = $this->security->xss_clean($this->input->post('harga'));
			  $data["jumlah"] = $this->security->xss_clean($this->input->post('jumlah'));
			  if($data["jumlah"]==0)
			  	$data["jumlah"] = 1;
			  $res = $this->model->AutoInsertCI('detail_penjualan', $data);
			  if($res)
			  {
				   redirect('');
			  }
		}else
		{
			$isi['id_penjualan'] = "531".date('YHmids');
			$isi["id_user"] = $session_id["id_user"];
			$isi['status'] = 1;
			$isi['timestamp'] =date('YmdHis');
			$res = $this->model->AutoInsertCI('penjualan', $isi); 
			if($res)
			{
				$data["id_penjualan"] = $isi['id_penjualan'];
				$data["color"] = $this->security->xss_clean($this->input->post('color'));
        		$data["ukuran"] = $this->security->xss_clean($this->input->post('ukuran'));
				$data["id_Produk"] = $this->security->xss_clean($this->input->post('idProduk'));
				$data["harga"] = $this->security->xss_clean($this->input->post('harga'));
				$data["jumlah"] = $this->security->xss_clean($this->input->post('jumlah'));
				$res = $this->model->AutoInsertCI('detail_penjualan', $data);
				if($res)
				{
					echo "sukses";
				}
			}
		}
	}
	public function signUpProses(){
        // Validate the user can login
        $result = $this->model->CreateMember();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            redirect('index');
        }else{
            // If user did validate, 
            // Send them to members area
			$this->index();
			redirect('index');
        }        
    }
	  public function do_logout(){
        $this->session->sess_destroy();
       redirect('','refresh');
    }
}
 
/* End of file hmvc.php */
