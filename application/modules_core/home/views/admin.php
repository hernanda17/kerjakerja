<?php $this->load->view('headerAdmin'); ?>

<div class="container">
<h2 align="center">Admin Login</h2>
  <form role="form" method="post" action="<?php echo base_url();?>index.php/home/process_login_admin">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
 </div>
 <br>

<?php $this->load->view('footer'); ?>