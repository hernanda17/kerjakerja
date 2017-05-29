<?php $this->load->view('header'); $data = $data_profile->result_array();$data = $data[0];?>


       <div class="container">
       
       		<div class="row page-title text-center"  data-wow-delay="1s">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                <li><a data-toggle="tab" href="#upload">Upload Photo</a></li>
          	</ul>
            </div>
             <div class="tab-content">
    	  <div id="home" class="tab-pane fade in active">
         <div class="row page-title text-center">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateProfile" role="form" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              
              <div class="col-sm-10">
                <label class="control-label col-sm-2" for="email"><?php echo $data["username"];  ?></label>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="firstname">Firstname:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="firstname" value=" <?php echo $data["firstname"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="lastname">Lastname:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="lastname" value=" <?php echo $data["lastname"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
              <div class="col-sm-10">          
                <input type="date" class="form-control" name="dob" value=" <?php echo $data["dob"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="address">Address:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="address" value=" <?php echo $data["alamat"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="cat">Job Function:</label>
              <div class="col-sm-10">          
                <select name="cat" class="form-control">
                <?php
					for($i = 0 ;$i<count($data_category);$i++)
					{
						echo "<option value=".$data_category[$i]['id_category'].">".$data_category[$i]['nama_category']."</option>";
					}
				?>
                </select>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">Update</button>
              </div>
            </div>
          </form>
          </div>
          </div>
          
          <div id="upload" class="tab-pane fade">
          <div align="center">
          <img src="<?php echo base_url()."asset/profile/image/".$data["picture"]; ?>" class="img-circle" alt="<?php echo $data["firstname"]; ?>" width="304" height="236"> 
          <br>
			<?php echo form_open_multipart('home/upload');?>
        	<input type="hidden" name="idProduk" value="<?php echo $data["id_member"] ?>">
            <input type="file" name="userfile"  />
            <input type="submit" id="submit-button" value="Upload" />
         </form>
         </div>
        </div>
            </div>
       </div>
<?php $this->load->view('footer'); ?>