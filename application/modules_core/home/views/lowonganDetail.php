<?php $this->load->view('headerPerusahaan'); $data = $data_lowongan->result_array();$data_lowongan = $data[0];
 $data_image = $data_image->result_array();?>

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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/update_lowongan" role="form" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">Title:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value=<?php echo $data_lowongan["title"]; ?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="location">Location:</label>
              <div class="col-sm-10">          
                 <select name="location" id="location" class="form-control">
                  <option>Select Your City</option>
                  <?php
                      
                      for($i = 0 ;$i<count($data_area);$i++)
                      {
                          echo "<option value=".$data_area[$i]['id'].">".$data_area[$i]['name']."</option>";
                      }
                  ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pengalaman">Pengalaman:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="pengalaman" value=<?php echo $data_lowongan["pengalaman"]; ?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pendidikan">Pendidikan:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="pendidikan" value=<?php echo $data_lowongan["pendidikan"]; ?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="salary">Salary:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="salary" value=<?php echo $data_lowongan["salary"]; ?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="type">Type:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="type" value=<?php echo $data_lowongan["typeTime"]; ?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="age">Max Age:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="age" value=<?php echo $data_lowongan["maxAge"]; ?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="cat">Category :</label>
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
              <input type="hidden" class="form-control" name="id_lowongan" value=<?php echo $data_lowongan["id_lowongan"]; ?>>
                <button type="submit" class="btn btn-default">Submit</button>
                
              </div>
            </div>
            
          </form>
          </div>
          </div>
          
          <div id="upload" class="tab-pane fade">
          <div align="center">
          <?php if (count($data_image)>0){
			for ($i = 0; $i< count($data_image);$i++)
			{
		   ?>
          <img src="<?php echo base_url()."asset/lowongan/image/".$data_image[$i]["picture"]; ?>" class="img-circle" alt="<?php echo $data_lowongan["title"]; ?>" width="304" height="236"> 
          
		  <?php }
		  
		  }else { echo "<br>Gambar Tidak Ada Silahkan Upload :)";}?>
          <br>
			<?php echo form_open_multipart('home/uploadLowongan');?>
        	<input type="hidden" name="id_lowongan" value="<?php echo $data_lowongan["id_lowongan"] ?>">
            <input type="file" name="userfile"  />
            <input type="submit" id="submit-button" value="Upload" />
         </form>
         </div>
        </div>
            </div>
       </div>
<?php $this->load->view('footer'); ?>