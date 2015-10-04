<?
  if(isset($speakers) && $speakers->num_rows!=0)
  {
    ?>

<section id="speakers">
  <div class="container">
             <div class="row">
                <div class="span12">
                  <div class="module-header speakers-header">
                    <h4>Speakers</h4>
                  </div>
                  <!-- end module-header --> 
                </div>
                <div class="span12 hero-unit text-center white">
                  <h2>Ikuti Pembahasan Menarik Dari Mereka</h2>
                  <p>Ayo ajak teman-teman mu untuk mengikuti materi menarik yang akan disampaikan pada Seminar dan Workshop di CCIT EXPO 2015.</p>
                </div>
                <!-- end hero-unit -->
                <div class="span12">
                  <div class="divider-space"></div>
                </div>
                <div class="span12">
                  <div id="speakerscarousel" class="carouselslider speakers-carousel item-4">
                    <ul>
                      <?
                          if(isset($speakers) && $speakers->num_rows!=0)
                          {
                              foreach ($speakers->result() as $k) {
                                ?>
                                    <li> 
                                      <!-- carousel item -->
                                      <div class="item">
                                        <div class="photo-wrap hover_colour"> <img src="<?echo $this->config->item('css')?>gambar_blog/<?echo $k->foto?>" alt=" "> </div>
                                        <div class="text-wrap white">
                                          <h3><?echo $k->nama?></h3>
                                          <h5><?echo $k->pekerjaan?></h5>
                                          <hr class="divider-short center">
                                          <p class="description">
                                            <?
                                              $desk = explode(" ", strip_tags($k->biodata));
                                              if(count($desk) > 25)
                                              {
                                                for ($i=0; $i < 25 ; $i++) { 
                                                  echo $desk[$i]." ";
                                                }
                                                echo "...";
                                              }
                                              else
                                              {
                                                echo strip_tags($k->biodata);
                                              }
                                            ?>
                                          </p>
                                        </div>
                                        <div class="social"> 
                                          <a href="
                                            <?
                                              if(strlen($k->facebook)!=0)
                                              {
                                                echo $k->facebook;
                                              }
                                              else
                                              {
                                                ?>
                                                  #
                                                <?
                                              }
                                            ?>
                                          " target="_blank" title="Facebook" class="icon-wrap small facebook"> <i class="iconf-facebook"></i> </a> 
                                          <a href="
                                            <?
                                              if(strlen($k->twitter)!=0)
                                              {
                                                echo $k->twitter;
                                              }
                                              else
                                              {
                                                ?>
                                                  #
                                                <?
                                              }
                                            ?>
                                          " target="_blank" title="Twitter" class="icon-wrap small twitter"> <i class="iconf-twitter"></i> </a> 
                                        </div>
                                      </div>
                                      <!-- end carousel item --> 
                                    </li>
                                <?
                              }
                          }
                      ?>
                    </ul>
                  </div>
                  <!-- end speakerscarousel --> 
                </div>
              </div>
       
   
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>

 <?
      }
    ?>