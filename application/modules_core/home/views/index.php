<?php $this->load->view('header'); ?>

        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
                 
                  <div class="item"><img src="asset/home/img/slider-image-3.jpg" alt="Mirror Edge"></div>
                  <div class="item"><img src="asset/home/img/slider-image-2.jpg" alt="The Last of us"></div>
                 
                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2 >Cari Kerja, Disini Aja ! </h2>
                        <p>Disini banyak perusahaan besar dan para pencari kerja yang kompeten.</p>
                        <div>
                            <form class=" form-inline" method="post" action="<?php echo base_url();?>index.php/home/SearchlistKerja">
                                <div class="form-group">
                                    <input type="text" name="like" class="form-control" placeholder="Job Key Word">
                                </div>
                                <div class="form-group">
                                    <select name="tempat" id="" class="form-control">
                                        <option value="9999999">Select Your City</option>
                                        <?php
											
											for($i = 0 ;$i<count($data_area);$i++)
											{
												echo "<option value=".$data_area[$i]['id'].">".$data_area[$i]['name']."</option>";
											}
										?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <select name="category" id="" class="form-control">
                                        <option value="9999999">Select Your Category</option>
                                        <?php
											
											for($i = 0 ;$i<count($data_category);$i++)
											{
												echo "<option value=".$data_category[$i]['id_category'].">".$data_category[$i]['nama_category']."</option>";
											}
										?>
                                    </select>
                                </div>
                                <input type="submit" class="btn" value="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-area">
            <div class="container">
                <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s">
                    <h2>Cara Mencari Kerja/ Pekerja di sini MUDAH !</h2>
                 </div>
                <div class="row how-it-work text-center">
                    <div class="col-md-4">
                        <div class="single-work wow fadeInUp" data-wow-delay="0.8s">
                            <img src="asset/home/img/how-work1.png" alt="">
                            <h3>Mencari Kerja</h3>
                            <p>Category Keahlian anda sudah kami Filter agar anda mudah mencari pekerjaan sesuai dengan keahian anda.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-work  wow fadeInUp"  data-wow-delay="0.9s">
                            <img src="asset/home/img/how-work2.png" alt="">
                            <h3>Mengirimkan Lamaran</h3>
                            <p>Lamaran kerja dan CV anda dapat di kirim langsung di dalam web ini.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-work wow fadeInUp"  data-wow-delay="1s">
                            <img src="asset/home/img/how-work3.png" alt="">
                            <h3>Mencari Pekerja</h3>
                            <p>Pekerja yang terdaftar disini telah di verivikasi terlebih dahulu oleh admin sebelum terdaftar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Recent Jobs</h5>
                    <h2><span>54716</span> Available jobs for you</h2>
                </div>
                <div class="row jobs">
                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">
                               <?php $data_list=$data_list->result_array();for($i = 0 ; $i<count($data_list);$i++){ ?>
                                <tr class="even wow fadeInUp" >
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
                        <div class="more-jobs">
                            <a href=""> <i class="fa fa-refresh"></i>View more jobs</a>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div>
                            <h2>Seeking a job?</h2>
                            <a href="#">Create a Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php $this->load->view('footer'); ?>