    <?
        if(isset($bazaar) && $bazaar->num_rows!=0)
        {
          ?>
<section id="bazaar">
  <div class="container">

            <div class="row">
              <div class="span12">
                <div class="module-header sponsors-header">
                  <h4>Bazaar</h4>
                </div>
              </div>
              <!-- end module-header -->
              <div class="span12 hero-unit text-center">
                <p style="padding-bottom:50px;">
                    Berikut adalah produk-produk yang tersedia pada Bazaar CCIT EXPO 2015.
                </p>
              </div>
              <!-- end hero-unit --> 
           
              <?
                if(isset($bazaar) && $bazaar->num_rows!=0)
                {
                  foreach ($bazaar->result() as $k) {
                    ?>
                      <div class="span3 text-center"> 
                        <a href="<?echo $k->link?>"> 
                          <img src="<?echo $this->config->item('gambarblog').$k->foto?>" alt="" class="sponsor-logo"> 
                        </a> 
                      </div>
                    <?
                  }
                }
              ?>
            </div>
          
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end sponsors -->

<?
        }
    ?>