<?php $this->load->view('headerPerusahaan'); ?>
      
       <div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
                <h2>Create Lowongan</h2>
            </div><br clear="all">

            <div class="row page-title text-center">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/createLowongan" role="form" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">Title:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
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
                <input type="text" class="form-control" name="pengalaman" placeholder="pengalaman">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pendidikan">Pendidikan:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="pendidikan" placeholder="pendidikan">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="salary">Salary:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="salary" placeholder="salary">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="type">Type:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="type" placeholder="Full time, Half Time">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="age">Max Age:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="age" placeholder="age">
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
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
          </form>
          </div>
       </div>
       <?php $this->load->view('footer'); ?>