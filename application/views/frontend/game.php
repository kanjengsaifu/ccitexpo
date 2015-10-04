
    <?
        if(isset($game) && $game->num_rows!=0)
        {
          ?>
<section id="game" class="white">
  <div class="container">

            <div class="row">
              <div class="span12">
                <div class="module-header venue-header">
                  <h4 style="color:white;">Game Competition</h4>
                </div>
              </div>
              <!-- end span12 -->
              <div class="span12 hero-unit text-center white">
                <h4>Siapa yang akan memenangkan kompetisi ini?</h4>
                <h2>Daftarkan Tim Kamu Segera!</h2>
              </div>
              <!-- end hero-unit -->
              <!-- end span12 -->
              <!-- end span12 -->
              <div class="span12" style="padding-bottom:30px;"></div>
              <?
                if(isset($game) && $game->num_rows!=0)
                {
                  foreach ($game->result() as $k) {
                    ?>
                       <div class="span6 text-center">
                          <div>
                          <img <?
                            if($k->nama=="DOTA 2")
                            {
                              echo "style='width:240px;'";
                            }
                            else
                            {
                              echo "style='width:300px;'";
                            }
                          ?>
                         src="<?echo $this->config->item('uploads')."game/".$k->foto?>">
                          </div>
                          <div class="span6" style="padding-bottom:30px;"></div>
                          <p>
                            <?echo $k->deskripsi;?>
                          </p>
                        </div>
                    <?
                  }
                }
              ?>
              <div class="span12" style="padding-bottom:30px;"></div>
              <div class="span12 text-center">
                <a href="#contact" class="btn btn-large btn-inverse ui-link">Daftar Sekarang!</a>
              </div>
          </div>
          

  <!-- end container --> 
</section>
<!-- end venue -->
<?
        }
    ?>