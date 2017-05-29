<?php $this->load->view('headerPerusahaan'); ?>

<div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
            	<h5>Lowongan</h5>
                <?php if($banyak = $data_lowongan->num_rows>0){ $data_lowongan= $data_lowongan->result_array();$data_lowongan= $data_lowongan[0];?>
                <ul class="list-group">
                <?php for($i = 0; $i<$banyak;$i++){?>
                    <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>index.php/home/lowonganMember?id_lowongan=<?php echo $data_lowongan["id_lowongan"]; ?>" class="badge glyphicon glyphicon-pencil">View</a>
                    <a href="<?php echo base_url(); ?>index.php/home/lowonganDetail?id_lowongan=<?php echo $data_lowongan["id_lowongan"]; ?>" class="badge glyphicon glyphicon-pencil">Edit</a>
					<a href="<?php echo base_url(); ?>index.php/home/hapus_lowongan?id_lowongan=<?php echo $data_lowongan["id_lowongan"]; ?>" class="badge glyphicon glyphicon-pencil">Hapus</a>                   
                    <span class="badge"><?php echo $data_lowongan["jumlah"];?></span> <?php echo  $data_lowongan["title"]?> </li>
                 <?php }?> 
                </ul>
                <?php }else { echo "Tidak Ada Lowongan :)";} ?>
                <a  href="<?php echo base_url(); ?>index.php/home/daftarLowongan" class="btn btn-primary btn-block" >Daftar Lowongan</a>
            </div>
 </div>   
 
<?php $this->load->view('footer'); ?>