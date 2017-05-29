<?php $this->load->view('header'); $data = $data_profile->result_array();$data = $data[0];?>


       <div class="container">
       
       		<div class="row page-title text-center"  data-wow-delay="1s">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
          	</ul>
            </div>
             <div class="tab-content">
    	  <div id="home" class="tab-pane fade in active">
          <div align="center">
           <img src="<?php echo base_url()."asset/lowongan/image/".$data["picture"]; ?>" class="img-circle" alt="<?php echo $data["title"]; ?>" width="304" height="236"> </div>
         <div class="row page-title text-center">
         <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/Terima" role="form" method="post">
            <div class="form-group">
              <label class="control-label col-sm-6" for="title">Title:</label>
              
              <div class="col-sm-4">
                <label class="control-label col-sm-6" for="title"><?php echo $data["title"];  ?></label>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-6" for="firstname">Location:</label>
              <div class="col-sm-4">          
               <label class="control-label col-sm-6" for="firstname"><?php echo $data["location"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="pendidikan">Pendidikan:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="pendidikan"><?php echo $data["pendidikan"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="dob">Pengalaman :</label>
              <div class="col-sm-4">          
                <label class="control-label col-sm-6" for="pengalaman"><?php echo $data["pengalaman"];  ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="salary">Salary:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="salary"><?php echo @$data["salary"];  ?></label><br>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-6" for="status">Status:</label>
              <div class="col-sm-4">          
              <label class="control-label col-sm-6" for="status"><?php if($data["status"] == 0 ) echo "Belum Di konfirmasi";else if($data["status"] == 1 ) echo "Diterima"; else echo "Ditolak"  ?></label><br>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-12">     
              
              </div>
            </div>
            </form>
          </div>
          </div>
          
          
            </div>
       </div>
<?php $this->load->view('footer'); ?>