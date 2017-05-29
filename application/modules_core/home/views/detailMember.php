<?php $this->load->view('headerPerusahaan');  $data = $data_profile->result_array();$data = $data[0];?>


       <div class="container">
       
       		<div class="row page-title text-center"  data-wow-delay="1s">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
          	</ul>
            </div>
             <div class="tab-content">
    	  <div id="home" class="tab-pane fade in active">
          <div align="center">
           <img src="<?php echo base_url()."asset/profile/image/".$data["picture"]; ?>" class="img-circle" alt="<?php echo $data["firstname"]; ?>" width="304" height="236"> </div>
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
               <label class="control-label col-sm-6" for="firstname"><?php echo $data["firstname"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="lastname">Lastname:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="lastname"><?php echo $data["lastname"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="dob">Date of Birth:</label>
              <div class="col-sm-4">          
                <label class="control-label col-sm-6" for="dob"><?php echo $data["dob"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="address">Address:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="alamat"><?php echo @$data["alamat"];  ?></label><br>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-6" for="nama_category">Category:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="nama_category"><?php echo $data["nama_category"];  ?></label><br>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-6" for="nama_category">File Lamaran:</label>
              <div class="col-sm-4">          
              <a href="<?php echo base_url();?>asset/lowongan/file/<?php echo $data["file_lamaran"];  ?>">Download</label><br>
              </div>
            </div>
            
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-8"><br>
                  <label><input class="form-control" type="radio" name="optradio" value="1">Terima</label>
                  <label><input class="form-control" type="radio" name="optradio" value="2">Tolak</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-12">     
              <input type="hidden" name="id_lowongan" value="<?php echo $data_id["id_lowongan"];  ?>">
              <input type="hidden" name="id_member" value="<?php echo $data["id_member"];  ?>">
              <input type="submit" value="Submit"></div><br>
              </div>
            </div>
            </form>
          </div>
          </div>
          
          
            </div>
       </div>
<?php $this->load->view('footer'); ?>