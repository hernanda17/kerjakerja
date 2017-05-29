<?php $this->load->view('headerPerusahaan'); $data_member = $data_member->result_array();?>

       <div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Member</a></li>
          	</ul>
            </div>
             <ul class="list-group">
                <?php for($i = 0; $i<count($data_member);$i++){?>
                    <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>index.php/home/profile_member?id_member=<?php echo $data_member[$i]["id_member"]?>&id_lowongan=<?php echo $data_member[$i]["id_lowongan"]?>" class="badge glyphicon glyphicon-pencil">View</a>
					<?php echo $data_member[$i]["firstname"]." ".$data_member[$i]["lastname"]; ?> </li>
                 <?php }?> 
             </ul>
       </div>
<?php $this->load->view('footer'); ?>