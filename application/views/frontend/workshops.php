    <?
      if(isset($workshops) && $workshops->num_rows!=0)
      {
        ?>
<section id="workshops">
  <div class="container">


           <div class="row">
            <div class="span12">
              <div class="module-header workshops-header">
                <h4>Seminar & Workshops</h4>
              </div>
            </div>
            <!-- end span12 -->
            <ul class="event-items">
              <?
                if(isset($workshops) && $workshops->num_rows!=0)
                {
                  foreach ($workshops->result() as $k) {
                    ?>
                      <li class="event-item clearfix span4">
                        <div class="event-date">
                          <time datetime="2014-09-23">
                          <?
                            $wd = date('l',strtotime($k->tanggal));
                            $mth = date('M',strtotime($k->tanggal));
                            $dt = date('d',strtotime($k->tanggal));
                            echo $wd." ".$mth.", ".$dt.".";  
                          ?></time>
                        </div>
                        <!-- end event-date -->
                        <div class="share-widget"> <a target="_blank" href="http://facebook.com/<?php echo $k->facebook?>"><i class="iconf-facebook"></i></a> <a target="_blank"href="http://twitter.com/<?php echo $k->twitter?>"><i class="iconf-twitter"></i> </a> 
                          <!-- end share-widget --> 
                        </div>
                        <br class="clearfix">
                        <div class="event-entry text-center">
                          <h3 class="entry-title"><?echo $k->judul?></h3>
                          <p class="lead">Speaker: <?echo $k->nama?></p>
                          <div class="event-image"> <img src="<?echo $this->config->item('gambarblog').$k->fotos?>" class="img-circle"> </div>
                          <div class="entry-content">
                            <h4>
                              <time datetime="09:00"><?echo $k->jam_mulai?> - <?echo $k->jam_selesai?></time>
                            </h4>
                            <h4><?echo $k->tempat?></h4>
                            <p>
                                <?echo $k->deskripsi?>
                            </p>
                          </div>
                          <!-- end event-entry --> 
                        </div>
                        <!-- end span4 --> 
                      </li>
                    <?
                  }
                }
              ?>
              
              
            </ul>
          </div>
       
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>

 <?
      }
    ?>
