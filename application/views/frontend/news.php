    <?
      if(isset($blog) && $blog->num_rows!=0)
      {
        ?>
<!-- end sponsors -->
<section id="news">
  <div class="container">

          <div class="row">
            <div class="span12">
              <div class="module-header news-header">
                <h4>News</h4>
              </div>
              <!-- --> 
            </div>
            <!-- end span12 -->
            <ul class="news-items hfeed">
              <?
                if(isset($blog) && $blog->num_rows!=0)
                {
                  foreach ($blog->result() as $k) {
                    ?>
                      <li class="news-item clearfix span4">
                        <div class="news-date"> 
                          <span class="month">
                            <?
                              $wd = date('M',strtotime($k->tanggal));
                              echo $wd;
                            ?>
                          </span> 
                          <span class="day">
                            <?
                              $dt = date('d',strtotime($k->tanggal));
                              echo $dt;
                            ?>
                          </span>
                        </div>
                        <!-- end news-date -->
                        <div class="share-widget"> <a href="#"><i class="iconf-facebook"></i></a> <a href="#"><i class="iconf-twitter"></i> </a> 
                          <!-- end share-widget --> 
                        </div>
                        <br class="clearfix">
                        <div class="news-entry">
                          <h3 class="entry-title"><?echo $k->judul?></h3>
                          <div class="entry-image"> <img src="<?echo $this->config->item('css')?>gambar_blog/<?echo $k->gambar?>" alt="News Image"> </div>
                          <div class="entry-content">
                            <p>
                              <?
                                $desk = explode(" ", strip_tags($k->isi));
                                if(count($desk) > 25)
                                {
                                  for ($i=0; $i < 25 ; $i++) { 
                                    echo $desk[$i]." ";
                                  }
                                  echo "...";
                                }
                                else
                                {
                                  echo strip_tags($k->isi);
                                }
                              ?> 
                            </p>
                            <?
                              if(count($desk) > 25)
                              {
                                ?>
                                  <a id="selengkapnya" value="<?echo $k->isi?>">Read full story <i class="iconf-angle-right"></i> </a> </div>
                                <?
                              }
                            ?>
                          <!-- end news-entry --> 
                        </div>
                        <!-- end span4 --> 
                      </li>
                      <!-- end news-item -->
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