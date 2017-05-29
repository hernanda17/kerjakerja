<?php $this->load->view('header'); ?>

<div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
            	<h2>List Kerja</h2>
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                </div>
                <div class="row jobs">
                    <div class="col-md-10">
                        <div class="job-posts table-responsive">
                            <table class="table">
                            <?php $data_list=$data_list->result_array();for($i = 0 ; $i<count($data_list);$i++){ ?>
                                <tr class="odd wow fadeInUp" >
                                    <td class="tbl-logo"><img src="<?php echo base_url();?>asset/lowongan/image/<?php echo $data_list[$i]["picture"] ?>" height="100" width="100" alt=""></td>
                                    <td class="tbl-title"><h4><span style="max-height:110"><strong><?php echo $data_list[$i]["title"] ?></strong></span> <br><span class="job-type"><?php echo $data_list[$i]["typeTime"] ?></span></h4></td>
                                    <td><p><?php echo $data_list[$i]["nama_perusahaan"] ?></p></td>
                                    <td><p><i class="icon-location"></i><?php echo $data_list[$i]["location"] ?></p></td>
                                    <td><p>&dollar; <?php echo $data_list[$i]["salary"] ?></p></td>
                                    <td class="tbl-apply"><a href="<?php echo base_url(); ?>index.php/home/upApply?id_lowongan=<?php echo  $data_list[$i]["id_lowongan"] ?>">Apply now</a></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div align="center">
                <ul class="pagination">
                <?php for($i=1;$i<=10;$i++){ ?>
                  <li><a href="<?php echo base_url(); ?>index.php/home/listkerja?page=<?php echo $i;?>".><?php echo $i;?></a></li>
                  <?php }?>
                </ul>
            </div>
 </div>   
 
<?php $this->load->view('footer'); ?>