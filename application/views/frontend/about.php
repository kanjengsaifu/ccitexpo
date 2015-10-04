<section id="about">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="module-header about-header">
          <img style="width:300px;" src="<?echo $this->config->item('gambarblog')?>LogoCCITExpo.PNG">
        </div>
        <!-- end module-header --> 
      </div>
      <div class="span12 hero-unit text-center">
        <?
          if(isset($aboutdesc) && $aboutdesc->num_rows!=0)
          {
            ?>
              <h1><?echo $aboutdesc->row('namaevent')?></h1>
              <h4><?echo $aboutdesc->row('temaevent')?></h4>
               <h3>
                <?
                  $tglmulai = substr($aboutdesc->row('tanggalmulai'), 8,2);
                  
                  $tglselesai = substr($aboutdesc->row('tanggalselesai'), 8,2);
                  $tahun = substr($aboutdesc->row('tanggalselesai'), 0,4);        
                  $wd = date('M',strtotime($aboutdesc->row('tanggalselesai')));
                  echo $tglmulai." - ".$tglselesai." ".$wd." ".$tahun.", ".$aboutdesc->row('tempat');
                ?>
              </h3>
            <?
          }
        ?>
      </div>
      <!-- end hero-unit -->
      <div class="span12">
        <div class="divider-space"></div>
      </div>
      <?
        if(isset($about) && $about->num_rows!=0)
        {
          $x = 1;
          foreach ($about->result() as $k) {
            ?>
              <div class="span3 text-center">
                <div class="icon-wrap large color<?echo $x;?>"><i class="<?echo $k->logo?>"></i> </div>
                <h3><?echo $k->nama?></h3>
                <p>
                  <?echo strip_tags($k->deskripsi)?>
                </p>
              </div>
            <?
            $x++;
          }
        }
      ?>
    </div>
    <!-- end row --> 
  </div>
  <!--end container--> 
</section>