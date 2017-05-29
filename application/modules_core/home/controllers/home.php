<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class home extends MX_Controller {
    
     function __construct() {
        parent::__construct();
        $this->load->model('model');$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		
     }
   public function index()
   {
      $list = $this->model->getListKerjaAll();
	  $data['data_list'] = $list;
      $category = $this->model->getCategory();
	  $area = $this->model->getArea(null);$data['data_area'] = $area;
	  $data['data_category'] = $category;
	  
      $this->load->view('index',$data);
   }
   public function openView($data)
   {
      
      $this->load->view($data);
   }
   public function sukses()
   {
      
      $this->load->view('createMemberSukses');
   }
   
   public function listKerja()
   {
	  $page = $this->security->xss_clean($this->input->get('page'));
      $list = $this->model->getListKerja($page);
	  $data['data_list'] = $list;
      $this->load->view('listKerja',$data);
   }
   
    public function SearchlistKerja()
   {
      $list = $this->model->getListKerjaSearch();
	  $data['data_list'] = $list;
      $this->load->view('listKerja',$data);
   }
   
   public function gagal()
   {
      
      $this->load->view('createMemberGagal');
   }
   
    public function suksesValidasi()
   {
      
      $this->load->view('validasiSukses');
   }
   public function admin()
   {
       $sess = $this->session->userdata('logged_in_admin');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
      			$this->AdminPanel();
		  }else
		  {
			  $this->load->view('admin');
		  }
   }
   public function gagalValidasi()
   {
      
      $this->load->view('validasiGagal');
   }
   public function lowongan()
   {
	  $sess = $this->session->userdata('logged_in_perusahaan');
	  $session_id = $sess["id_perusahaan"];
      $lowongan = $this->model->getAllLowongan($session_id);
	  $data['data_lowongan'] = $lowongan;
      $this->load->view('lowongan',$data);
   }
   public function memberLowongan()
   {
	  $sess = $this->session->userdata('logged_in');
	  $session_id = $sess["id_member"];
      $lowongan = $this->model->getMemberApply($session_id);
	  $data['data_lowongan'] = $lowongan;
      $this->load->view('memberLowongan',$data);
   }
   
   public function lowonganMember()
   {
	  $sess = $this->session->userdata('logged_in_perusahaan');
      $lowongan = $this->model->getLowonganMember();
	  $data['data_member'] = $lowongan;
      $this->load->view('lowonganMember',$data);
   }
   
   public function status($status,$status2)
   {
      $data["status1"]= $status;
	  $data["status2"]= $status2;
      $this->load->view('status',$data);
   }
   
   public function statusAdmin($status,$status2)
   {
      $data["status1"]= $status;
	  $data["status2"]= $status2;
      $this->load->view('statusAdmin',$data);
   }
   
   public function statusPerusahaan($status,$status2)
   {
      $data["status1"]= $status;
	  $data["status2"]= $status2;
      $this->load->view('statusPerusahaan',$data);
   }
   
   public function daftar()
   {
	  $category = $this->model->getCategory();
	  $data['data_category'] = $category;
      $this->load->view('daftar',$data);
   }
   
    public function daftarPerusahaan()
   {
	  $category = $this->model->getCategory();
	  $data['data_category'] = $category;
      $this->load->view('daftarPerusahaan',$data);
   }
   
   public function daftarLowongan()
   {
	  $category = $this->model->getCategory();
	  $data['data_category'] = $category;
	  $area = $this->model->getArea(null);
	  $data['data_area'] = $area;
      $this->load->view('daftarLowongan',$data);
   }
   
    public function email($subjek, $pesan,$email,$nama)
   {
		$url = $_SERVER['HTTP_REFERER'];
	
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'kerjaku4@gmail.com', //isi dengan gmailmu!
		  'smtp_pass' => 'bebas123', //isi dengan password gmailmu!
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
	
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from("kerjaku4@gmail.com");
		$this->email->to($email); //email tujuan. Isikan dengan emailmu!
		$this->email->subject($subjek);
		$this->email->message($pesan);
		if($this->email->send())
		{
		   redirect('home/sukses');
		}
		else
		{
			redirect('home/gagal');
		}
		
   }
   
   	public function signUpProses(){
        // Validate the user can login
        $result = $this->model->CreateMember();
        // Now we verify the result
        if($result == 0 ){
            // If user did not validate, then show them login page again
            redirect('home/gagal');
        }else{
			$subject = "Verification Member Kerjaku.com";
            $pesan = " Silahkan Konfirmasi Klik: ".base_url()."index.php/home/validate_email/".$result["id_member"];
			$this->email($subject, $pesan,$result["username"],$result["firstname"]);
        }        
    }
	
	public function createLowongan(){
        // Validate the user can login
		$sess = $this->session->userdata('logged_in_perusahaan');
	    $session_id = $sess["id_perusahaan"];
        $result = $this->model->CreateLowongan($session_id);
        // Now we verify the result
        if($result == 0 ){
            // If user did not validate, then show them login page again
            redirect('home/gagal');
        }else{
			$subject = "Terima Kasih";
            $pesan = "Lowongan Anda Telah di daftarkan Di KerjaEnak.com<br> Untuk Gambar dan Photo Silahkan Update Lowongan anda";
			$this->status($subject,$pesan);
			//$this->email($subject, $pesan,$result["username"],$result["firstname"]);
        }        
    }
	
	public function signUpPerusahaan(){
        // Validate the user can login
        $result = $this->model->CreatePerusahaan();
        // Now we verify the result
        if($result == 0 ){
            // If user did not validate, then show them login page again
            redirect('home/gagal');
        }else{
			$subject = "Verification Perusahaan Kerjaku.com";
            $pesan = " Silahkan Konfirmasi Klik: ".base_url()."index.php/home/validate_perusahaan/".$result["id_perusahaan"];
			$this->email($subject, $pesan,$result["username"],$result["name"]);
        }        
    }
	
   public function validate_email()
   {
	   $id = $this->uri->segment(3);
	   
	   $data["status"] = 0;
	   $res = $this->model->autoUpdateEmail('member',$data, $id);
	   if($res)
	   {
		   redirect('home/suksesValidasi');
	   }else
	   {
		   redirect('home/gagalValidasi');
	   }
   }
   
   public function validate_perusahaan()
   {
	   $id = $this->uri->segment(3);
	   
	   $data["status"] = 0;
	   $res = $this->model->autoUpdateEmailPerusahaan('perusahaan',$data, $id);
	   if($res)
	   {
		   redirect('home/suksesValidasi');
	   }else
	   {
		   redirect('home/gagalValidasi');
	   }
   }
   
     public function process_login(){
        
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
	
	public function process_login_perusahaan(){
        
        $result = $this->model->validatePerusahaan();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			echo $this->db->last_query();
            //$this->status("Gagal", "Gagal Login");
        }else{
            // If user did validate, 
            // Send them to members area
			$this->profilePerusahaan();
        }        
    }
	
	public function process_login_admin(){
        
        $result = $this->model->validateAdmin();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			echo $this->db->last_query();
            //$this->status("Gagal", "Gagal Login");
        }else{
            // If user did validate, 
            // Send them to members area
			$this->AdminPanel();
        }        
    }
	
	public function AdminPanel()
   {
	   $kerja = $this->model->getListKerjaAll2();
	  $data['data_list'] = $kerja;
	  $member = $this->model->getListMember();
	  $data['data_member'] = $member;
	  $perusahaan = $this->model->getListPerusahaan();
	  $data['data_perusahaan'] = $perusahaan;
      $this->load->view('adminPanel',$data);
   }
	 public function profile()
   {
	  $sess = $this->session->userdata('logged_in');
	  $session_id = $sess["id_member"];
	  $category = $this->model->getCategory();
	  $data['data_category'] = $category;
	  $profile = $this->model->getProfile($session_id);
	  $data["data_profile"]= $profile;
      $this->load->view('profile',$data);
   }
   
    public function profile_member()
   {
	  $d["id_member"] = $this->security->xss_clean($this->input->get('id_member'));
	  $d["id_lowongan"]= $this->security->xss_clean($this->input->get('id_lowongan'));
	  $profile = $this->model->getProfile($d["id_member"]);
	  $data["data_profile"]= $profile;
	  $data["data_id"]=$d;
      $this->load->view('detailMember',$data);
   }
   
   
   public function lowonganDetail()
   {
	  $sess = $this->session->userdata('logged_in_perusahaan');
	  $session_id = $sess["id_perusahaan"];
	  $category = $this->model->getCategory();
	  $data['data_category'] = $category;
	  $profile = $this->model->getDetailLowongan($session_id);
	  $area = $this->model->getArea(null);$data['data_area'] = $area;
	  $data["data_lowongan"]= $profile;
	  $img = $this->model->getImgLowongan($session_id);
	  $data["data_image"]= $img;
      $this->load->view('lowonganDetail',$data);
   }
   
   public function profilePerusahaan()
   {
	  $sess = $this->session->userdata('logged_in_perusahaan');
	  $session_id = $sess["id_perusahaan"];
	  $category = $this->model->getCategory();
	  $data['data_category'] = $category;
	  $profile = $this->model->getProfilePerusahaan($session_id);
	  $data["data_profile"]= $profile;
      $this->load->view('profilePerusahaan',$data);
   }
   
   public function updateProfile(){
        // Validate the user can login
		$session_id = $this->session->userdata('logged_in');
        $result = $this->model->UpdateProfile($session_id["id_member"]);
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$this->status("Update Profile","Update Profile Anda Gagal");
        }else{
            // If user did validate, 
            // Send them to members area
			 $this->status("Update Profile","Update Profile Anda Berhasil");
        }        
    }
	public function updateProfilePerusahaan(){
        // Validate the user can login
		$session_id = $this->session->userdata('logged_in_perusahaan');
        $result = $this->model->UpdateProfile($session_id["id_perusahaan"]);
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$this->status("Update Profile","Update Profile Anda Gagal");
        }else{
            // If user did validate, 
            // Send them to members area
			 $this->status("Update Profile","Update Profile Anda Berhasil");
        }        
    }
	public function update_lowongan(){
        // Validate the user can login
        $result = $this->model->UpdateDetailLowongan();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$this->statusPerusahaan("Update Lowongan","Update Lowongan Anda Gagal");
        }else{
            // If user did validate, 
            // Send them to members area
			 $this->statusPerusahaan("Update Lowongan","Update Lowongan Anda Berhasil");
        }        
    }
	public function hapus_lowongan(){
        // Validate the user can login
        $result = $this->model->hapusDetailLowongan();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$this->status("Hapus Lowongan","Hapus Lowongan Anda Gagal");
        }else{
            // If user did validate, 
            // Send them to members area
			 $this->status("hapus Lowongan","Hapus Lowongan Anda Berhasil");
        }        
    }
   public function do_logout(){
        $this->session->sess_destroy();
        $this->status("Sign Out","Sign out Berhasil");
    }
	
    public function perusahaan(){ 
	  $sess = $this->session->userdata('logged_in_perusahaan');
	  if($sess["validated"]==0)
	  {
      	$this->load->view('perusahaan');
	  }else
	  {
		  $this->profilePerusahaan();
	  }
   }
   
   function upload()
   {
	   $session_id = $this->session->userdata('logged_in');
	  $config['upload_path'] = './asset/profile/image';
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
		    $this->model->updataFotoProfile($data["file_name"],$session_id["id_member"]);
			$this->profile();
		}
	}
	
	function uploadPerusahaan()
   {
	   $session_id = $this->session->userdata('logged_in_perusahaan');
	  $config['upload_path'] = './asset/perusahaan/image';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$session_id = $this->session->userdata('logged_in_perusahaan');
			$data = $this->upload->data();
		    $this->model->updataFotoProfilePerusahaan($data["file_name"],$session_id["id_perusahaan"]);
			$this->profilePerusahaan();
		}
	}
   
   function uploadLowongan()
   {
	   $session_id = $this->session->userdata('logged_in_perusahaan');
	  $config['upload_path'] = './asset/lowongan/image';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$session_id = $this->session->userdata('logged_in_perusahaan');
			$data = $this->upload->data();
		    $this->model->updataFotoLowongan($data["file_name"]);
			$this->profilePerusahaan();
		}
	}
   
   public function Terima()
   {
       // Validate the user can login
        $result = $this->model->updateStatusLowongan();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$this->statusPerusahaan("Update Lowongan","Update Lowongan Anda Gagal");
        }else{
            // If user did validate, 
            // Send them to members area
			 $this->statusPerusahaan("Update Lowongan","Update Lowongan Anda Berhasil");
        }        
   }
   
   public function applyDetail()
   {
	  $sess = $this->session->userdata('logged_in');
	  $sess_id = $sess["id_member"]; 
	  $profile = $this->model->getMemberApply2($sess_id);
	  $data["data_profile"]= $profile;
      $this->load->view('ApplyMemberDetail',$data);
   }
   
   public function applyNow()
   {
	  $sess = $this->session->userdata('logged_in');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
			  $lis = $this->model->uploadLamaran();
			  $list = $this->model->applyNow();
			  $status = "Lamaran Sukses";
			  $status2 = "Lamaran anda Telah Diterima";
			  $this->status($status,$status2);
		  }
		  else
		  {
		   $status = "Lamaran Gagal";
		   $status2 = "Lamaran anda Gagal, Login Terlebih dahulu";
	  	   $this->status($status,$status2);
		  }
   }
   
   function uploadLamaran()
   {
	   $sess = $this->session->userdata('logged_in');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
	  $config['upload_path'] = './asset/lowongan/file';
		$config['allowed_types'] = 'doc|docx|pdf';

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
		    $this->model->updataLamaran($data["file_name"],$session_id["id_member"]);
			$status = "Lamaran Sukses";
			$status2 = "Lamaran anda Telah Diterima";
			$this->status($status,$status2);
		}
		  }else
		  {
			  $status = "Lamaran Gagal";
		   $status2 = "Lamaran anda Gagal, Login Terlebih dahulu";
	  	   $this->status($status,$status2);
		  }
	}
	
	public function upApply()
   {
	  $sess = $this->session->userdata('logged_in');
	  $sess_id = $sess["id_member"]; 
	  $profile = $this->model->getMemberApply3($sess_id);
	  $data["data_profile"]= $profile;
      $this->load->view('ApplyDetail',$data);
   }
   
   public function detailLowonganAdmin()
   {
	  $profile = $this->model->getMemberApply3();
	  $data["data_profile"]= $profile;
      $this->load->view('detailLowonganAdmin',$data);
   }
   
   public function deleteLowongan()
   {
	  $sess = $this->session->userdata('logged_in_admin');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
			  $list = $this->model->deleteLowongan();
			  $list = $this->model->deleteLamaran();
			  $status = "Lamaran Sukses";
			  $status2 = "Lamaran anda Telah Diterima";
			  $this->statusAdmin($status,$status2);
		  }
		  else
		  {
		   $status = "Lamaran Gagal";
		   $status2 = "Lamaran anda Gagal, Login Terlebih dahulu";
	  	   $this->statusAdmin($status,$status2);
		  }
   }
   
   public function activeLowongan()
   {
	  $sess = $this->session->userdata('logged_in_admin');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
			  $list = $this->model->activeLowongan();
			  $status = "Lowongan Sukses";
			  $status2 = "Lowongan Telah Diaktifkan Kembali";
			  $this->statusAdmin($status,$status2);
		  }
		  else
		  {
		   $status = "Lamaran Gagal";
		   $status2 = "Lamaran anda Gagal, Login Terlebih dahulu";
	  	   $this->statusAdmin($status,$status2);
		  }
   }
   public function deleteMember()
   {
	  $sess = $this->session->userdata('logged_in_admin');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
			  $list = $this->model->deleteLamaran();
			  $status = "Lamaran Sukses";
			  $status2 = "Lamaran anda Telah Diterima";
			  $this->statusAdmin($status,$status2);
		  }
		  else
		  {
		   $status = "Lamaran Gagal";
		   $status2 = "Lamaran anda Gagal, Login Terlebih dahulu";
	  	   $this->statusAdmin($status,$status2);
		  }
   }
   
   public function activeMember()
   {
	  $sess = $this->session->userdata('logged_in_admin');
	  $session_id = $sess["validated"];
	  if($session_id)
		  {
			  $list = $this->model->activeLowongan();
			  $status = "Lowongan Sukses";
			  $status2 = "Lowongan Telah Diaktifkan Kembali";
			  $this->statusAdmin($status,$status2);
		  }
		  else
		  {
		   $status = "Lamaran Gagal";
		   $status2 = "Lamaran anda Gagal, Login Terlebih dahulu";
	  	   $this->statusAdmin($status,$status2);
		  }
   }
   
   public function detailMember()
   {
	 
	  $profile = $this->model->getProfileMemberAdmin();
	  $data["data_profile"]= $profile;
      $this->load->view('detailMemberAdmin',$data);
   }
   
   public function detailPerusahaan()
   {
	 
	  $profile = $this->model->getProfilePerusahaanAdmin();
	  $data["data_profile"]= $profile;
      $this->load->view('detailPerusahaanAdmin',$data);
   }
   
}
 
/* End of file hmvc.php */
