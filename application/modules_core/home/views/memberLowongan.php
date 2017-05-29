<?php $this->load->view('header'); ?>

<div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
            	<h5>Lowongan</h5><br>

                <?php   if($banyak = $data_lowongan->num_rows>0){ $data_lowongan= $data_lowongan->result_array();?>
                <ul class="list-group">
                <?php for($i = 0; $i<count($data_lowongan);$i++){?>
                    <li class="list-group-item">
                    <a href="<?php echo base_url(); ?>index.php/home/applyDetail?id_lowongan=<?php echo $data_lowongan[$i]["id_lowongan"]; ?>" class="badge glyphicon glyphicon-pencil"> <?php if($data_lowongan[$i]["status"] == 0 ) echo "Belum Di konfirmasi";else if($data_lowongan[$i]["status"] == 1 ) echo "Diterima"; else echo "Ditolak"  ?></a>                
                    <span class="badge"></span> <?php echo  $data_lowongan[$i]["title"]?> </li>
                 <?php }?> 
                </ul>
                <?php }else { echo "Tidak Ada Lowongan :)";} ?>
               
            </div>
 </div>   
 
<?php $this->load->view('footer'); ?>