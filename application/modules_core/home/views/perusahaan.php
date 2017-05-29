<?php $this->load->view('headerPerusahaan'); ?>

<div class="container">
<h2 align="center">Login to Your Account</h2>
  <form role="form" method="post" action="<?php echo base_url();?>index.php/home/process_login_perusahaan">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="username" name="username" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <a href="<?php echo base_url(); ?>index.php/home/daftarPerusahaan" class="btn btn-default">Create Perusahaan</a>
  </form>
 </div>
 <br>

<?php $this->load->view('footer'); ?>