<script>
	function logout()
	{
		var r = confirm("Apakah Yakin Akan Logout ?");
        if (r == true) {
            window.location.href = "<?php echo site_url('frontend/logout');?>";
        } else {
		
        }
	}
</script>
<header class="top-bar" id="topbar">
  <div class="container">
    <div class="row">
      <div class="span12"><!-- logo link --><a class="logo pull-left" href="#intro" title="CCIT EXPO 2015"><span></span></a>
        <div class="navbar main-nav pull-right">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <nav>
            <div class="nav-collapse collapse">
              <ul id="mainnav" class="nav">
				<?php if(!$this->session->userdata('isLoginPeserta')) { ?>

        <?
            if(isset($speakers) && $speakers->num_rows!=0)
            {
              ?>
                <li><a href="#speakers">Speakers</a> </li>
              <?
            }
        ?>

        <?
            if(isset($eventday) && $eventday->num_rows!=0)
            {
              ?>
                <li><a href="#schedule">Schedule</a> </li>
              <?
            }
        ?>

        <?
            if(isset($workshops) && $workshops->num_rows!=0)
            {
              ?>
                <li><a href="#workshops">Seminar</a> </li>
              <?
            }
        ?>

        <?
            if(isset($game) && $game->num_rows!=0)
            {
              ?>
                <li><a href="#game">Game</a> </li>
              <?
            }
        ?>
                <li><a href="#sponsors">Procom</a> </li>

        <?
            if(isset($bazaar) && $bazaar->num_rows!=0)
            {
              ?>
                <li><a href="#bazaar">Bazaar</a> </li>
              <?
            }
        ?>

        <?
            if(isset($blog) && $blog->num_rows!=0)
            {
              ?>
                <li><a href="#news">News</a> </li>
              <?
            }
        ?>
                <li><a href="#contact">Register/Login</a> </li>
				<?php
				}
				if($this->session->userdata('isLoginPeserta')) { ?>
                <li><a href="#daftarevent">Daftar Event!</a></li>
                <li><a href="#akunsaya">Akun</a></li>
                <li><a href="#eventsaya">Event Saya</a></li>
				<?php } ?>
              </ul>
				<?php if($this->session->userdata('isLoginPeserta')) { ?>
					<a href="<?php echo $this->config->item('frontend')?>logout" style="margin-left:5px;" class="btn btn-danger" target="" onclick="logout()">Logout</a>
				<?php } ?>
            </div>
          </nav>
        </div>
        <!-- end navbar --> 
      </div>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</header>