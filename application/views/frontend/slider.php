<section id="intro">
  <div class="container">
    <div class="flexslider">
      <ul class="slides">
        <?
          if(isset($slider) && $slider->num_rows!=0)
          {
            foreach ($slider->result() as $k) {
              ?>
                <li> 
                  <!-- slide 1 -->
                  <div class="row jumbotron">
                    <div class="span12 text-center">
                      <h1><?echo $k->judul?></h1>
                      <h3 style="font-size:30px;font-weight:bold;">
                        <?echo $k->isi?>
                      </h3>
                    </div>
                    <!-- end span12 --> 
                  </div>
                  <!-- end row --> 
                </li>
                <!-- endslide 1 -->

              <?
            }
          }
        ?>
      </ul>
    </div>
    <!-- end flexslider --> 
  </div>
  <!-- end container --> 
</section>