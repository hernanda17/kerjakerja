<?php $this->load->view('header'); ?>
      
       <div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
                <h2>Create Account</h2>
            </div><br clear="all">

            <div class="row page-title text-center">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/signUpProses" role="form" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="auth">Password:</label>
              <div class="col-sm-10">          
                <input type="password" class="form-control" name="auth" placeholder="Enter password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="firstname">Firstname:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="firstname" placeholder="firstname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="lastname">Lastname:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="lastname" placeholder="Lastname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
              <div class="col-sm-10">          
                <input type="date" class="form-control" name="dob" placeholder="dob">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="address">Address:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" name="address" placeholder="Address">
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
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
          </form>
          </div>
       </div>
       <?php $this->load->view('footer'); ?>