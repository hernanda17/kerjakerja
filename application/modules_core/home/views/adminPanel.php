<?php $this->load->view('headerAdmin'); ?>

<div class="container">
       		<div class="row page-title text-center"  data-wow-delay="1s">
                <h2>Admin Panel</h2>
                
                <div class="row page-title text-center"  data-wow-delay="1s">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#lowongan">Lowongan</a></li>
                        <li><a data-toggle="tab" href="#member">Member</a></li>
                         <li><a data-toggle="tab" href="#perusahaan">Perusahaan</a></li>
                    </ul>
                    <div class="tab-content">
                          <div id="lowongan" class="tab-pane fade in active">
                          <div class="row page-title text-center"  data-wow-delay="0.1s">
                            <div class="row jobs">
                                <div class="col-md-10">
                                    <div class="job-posts table-responsive">
                                        <table class="table">
                                        <?php $data_list=$data_list->result_array();for($i = 0 ; $i<count($data_list);$i++){ ?>
                                            <tr class="odd wow fadeInUp" >
                                                <td class="tbl-logo"><img src="<?php echo base_url();?>asset/lowongan/image/<?php echo $data_list[$i]["picture"] ?>" height="100" width="100" alt=""></td>
                                                <td class="tbl-title"><h4><span style="max-height:110"><strong><?php echo $data_list[$i]["title"] ?></strong></span> 
                                                <br><span class="job-type"><?php if($data_list[$i]["status"] == 0)echo "Aktif"; else echo "Tidak Aktif";  ?></span></h4></td>
                                                <td><p><?php echo $data_list[$i]["nama_perusahaan"] ?></p></td>
                                                <td><p><i class="icon-location"></i><?php echo $data_list[$i]["location"] ?></p></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/home/<?php if($data_list[$i]["status"] == 0)echo "deleteLowongan"; else echo "activeLowongan";  ?>?id_lowongan=<?php echo  $data_list[$i]["id_lowongan"] ?>"><?php if($data_list[$i]["status"] == 0)echo "Delete"; else echo "Active";  ?></a></td>
                                                <td class="tbl-apply"><a href="<?php echo base_url(); ?>index.php/home/detailLowonganAdmin?id_lowongan=<?php echo  $data_list[$i]["id_lowongan"] ?>">Detail</a></td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
            			</div>
                        </div>
                        <div id="member" class="tab-pane fade in active">
                        <div class="row page-title text-center"  data-wow-delay="0.2s">
                            <div class="row jobs">
                                <div class="col-md-10">
                                    <div class="job-posts table-responsive">
                                        <table class="table">
                                        <?php $data_member=$data_member->result_array();for($i = 0 ; $i<count($data_member);$i++){ ?>
                                            <tr class="even wow fadeInUp" >
                                                <td class="tbl-logo"><img src="<?php echo base_url();?>asset/profile/image/<?php echo $data_member[$i]["picture"] ?>" height="100" width="100" alt=""></td>
                                                <td class="tbl-title"><h4><span style="max-height:110"><strong><?php echo $data_member[$i]["username"] ?></strong></span> 
                                                <br><span class="job-type"><?php if($data_member[$i]["status"] == 0)echo "Aktif"; else echo "Tidak Aktif";  ?></span></h4></td>
                                                <td><p><?php echo $data_member[$i]["firstname"]." ".$data_member[$i]["lastname"] ?></p></td>
                                                <td><p><i class="icon-location"></i><?php echo $data_member[$i]["alamat"] ?></p></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/home/<?php if($data_member[$i]["status"] == 0)echo "deleteMember"; 
												else echo "activeMember";  ?>?id_member=<?php echo  $data_member[$i]["id_member"] ?>">
												<?php if($data_member[$i]["status"] == 0)echo "Delete"; else echo "Active";  ?></a></td>
                                                <td class="tbl-apply"><a href="<?php echo base_url(); ?>index.php/home/detailMember?id_member=<?php echo  $data_member[$i]["id_member"] ?>">Detail</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
            			</div>
                        </div>
                        <div id="perusahaan" class="tab-pane fade in active">
                        <div class="row page-title text-center"  data-wow-delay="0.3s">
                            <div class="row jobs">
                                <div class="col-md-10">
                                    <div class="job-posts1 table-responsive">
                                        <table class="table">
                                        <?php $data_perusahaan=$data_perusahaan->result_array();for($i = 0 ; $i<count($data_perusahaan);$i++){ ?>
                                            <tr class="even wow fadeInUp" >
                                                <td class="tbl-logo"><img src="<?php echo base_url();?>asset/perusahaan/image/<?php echo $data_perusahaan[$i]["picture"] ?>" height="100" width="100" alt=""></td>
                                                <td class="tbl-title"><h4><span style="max-height:110"><strong><?php echo $data_perusahaan[$i]["username"] ?></strong></span> 
                                                <br><span class="job-type"><?php if($data_perusahaan[$i]["status"] == 0)echo "Aktif"; else echo "Tidak Aktif";  ?></span></h4></td>
                                                <td><p><?php echo $data_perusahaan[$i]["nama_perusahaan"] ?></p></td>
                                                <td><p><i class="icon-location"></i><?php echo $data_perusahaan[$i]["description"] ?></p></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/home/<?php if($data_perusahaan[$i]["status"] == 0)echo "deletePerusahaan"; 
												else echo "activePerusahaan";  ?>?id_perusahaan=<?php echo  $data_perusahaan[$i]["id_perusahaan"] ?>">
												<?php if($data_member[$i]["status"] == 0)echo "Delete"; else echo "Active";  ?></a></td>
                                                <td class="tbl-apply"><a href="<?php echo base_url(); ?>index.php/home/detailPerusahaan?id_perusahaan=<?php echo  $data_perusahaan[$i]["id_perusahaan"] ?>">Detail</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
            			</div>
                        </div>
                    </div>
            </div>
                
            </div>
 </div>   
 
<?php $this->load->view('footer'); ?>