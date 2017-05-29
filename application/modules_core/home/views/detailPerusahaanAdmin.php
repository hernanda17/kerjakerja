<?php $this->load->view('headerAdmin');  $data = $data_profile->result_array();$data = $data[0];?>
       <div class="container">
       
       		<div class="row page-title text-center"  data-wow-delay="1s">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
          	</ul>
            </div>
             <div class="tab-content">
    	  <div id="home" class="tab-pane fade in active">
          <div align="center">
           <img src="<?php echo base_url()."asset/perusahaan/image/".$data["picture"]; ?>" class="img-circle" alt="<?php echo $data["nama_perusahaan"]; ?>" width="304" height="236"> </div>
         <div class="row page-title text-center">
         <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/Terima" role="form" method="post">
            <div class="form-group">
              <label class="control-label col-sm-6" for="email">Email:</label>
              
              <div class="col-sm-4">
                <label class="control-label col-sm-6" for="email"><?php echo $data["username"];  ?></label>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-6" for="firstname">Firstname:</label>
              <div class="col-sm-4">          
               <label class="control-label col-sm-6" for="firstname"><?php echo $data["nama_perusahaan"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="lastname">Lastname:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="lastname"><?php echo $data["description"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="dob">Date of Birth:</label>
              <div class="col-sm-4">          
                <label class="control-label col-sm-6" for="dob"><?php echo $data["dateOpen"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="address">Address:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="alamat"><?php echo @$data["name"];  ?></label><br>
              </div>
            </div>
            
            
            </div>
            </form>
          </div>
          </div>
          
          
            </div>
       </div>
<?php $this->load->view('footer'); ?>