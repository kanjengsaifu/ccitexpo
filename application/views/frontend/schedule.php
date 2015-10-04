
    <?
      if(isset($eventday) && $eventday->num_rows!=0)
      {
        ?>

<section id="schedule">
  <div class="container">

            <div class="row">
              <div class="span12">
                <div class="module-header schedule-header">
                  <h4>Schedule</h4>
                </div>
                <!-- end module-header --> 
              </div>
              <!-- end span12 -->
              <div class="span12"> 
                <!-- Tabs -->
                <ul id="schedule-tabs" class="nav nav-pills tab-fillspace ">
                  <?
                    $data = ['dayone','daytwo','daythree','dayfour','dayfive','daysix','dayseven'];
                    if(isset($eventday) && $eventday->num_rows!=0)
                    {
                      $x=0;
                      foreach ($eventday->result() as $k) {
                        if($x==0)
                        {
                          ?>
                            <li class="active"><a href="#<?echo $data[$x]?>" data-toggle="tab"><?
                                $wd = date('M',strtotime($k->tanggal));
                                $dt = date('d',strtotime($k->tanggal));
                                if(substr($dt, 0, 1)=="0")
                                {
                                  $dta = substr($dt, 1);
                                  echo $wd." ".$dta;
                                }
                                else
                                {
                                  echo $wd." ".$dt;
                                }

                                if(substr($dt, 1)=="1" && $dt!="11")
                                {
                                  echo "<sup>st</sup>";
                                }
                                else if(substr($dt, 1)=="2" && $dt!="12")
                                {
                                  echo "<sup>nd</sup>";
                                }
                                else if(substr($dt, 1)=="3" && $dt!="13")
                                {
                                  echo "<sup>rd</sup>";
                                }
                                else
                                {
                                  echo "<sup>th</sup>";
                                }
                            ?>
                          </a> </li>
                          <?
                          $x++;
                        }
                        else
                        {
                          ?>
                            <li><a href="#<?echo $data[$x]?>" data-toggle="tab"><?
                                $wd = date('M',strtotime($k->tanggal));
                                $dt = date('d',strtotime($k->tanggal));
                                if(substr($dt, 0, 1)=="0")
                                {
                                  $dta = substr($dt, 1);
                                  echo $wd." ".$dta;
                                }
                                else
                                {
                                  echo $wd." ".$dt;
                                }

                                if(substr($dt, 1)=="1" && $dt!="11")
                                {
                                  echo "<sup>st</sup>";
                                }
                                else if(substr($dt, 1)=="2" && $dt!="12")
                                {
                                  echo "<sup>nd</sup>";
                                }
                                else if(substr($dt, 1)=="3" && $dt!="13")
                                {
                                  echo "<sup>rd</sup>";
                                }
                                else
                                {
                                  echo "<sup>th</sup>";
                                }
                            ?>
                          </a> </li>
                          <?
                          $x++;
                        }
                      }
                      
                    }
                  ?>
                </ul>
                <!-- end tabs --> 
              </div>
              <!-- end span12 -->
              <div class="tab-content">
                <?
                  $ardate = ['First','Second','Third','Fourth','Fifth','Sixth','Seventh'];
                  if(isset($eventday) && $eventday->num_rows!=0)
                  {
                    $x=0;
                    foreach ($eventday->result() as $k) {
                      if($x==0)
                      {
                        ?>
                          <div class="tab-pane wo-tab-pane fade in active" id="<?echo $data[$x]?>"> 
                            <!-- DAY ONE -->
                            <div class="span4">
                              <h2>
                                <?
                                  if(substr($k->jenis, 0, 1) == 1)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 2)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 3)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 4)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 5)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 6)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 7)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else
                                  {
                                    echo "~ Day";
                                  }
                                ?>
                              </h2>
                              <p>
                                <?
                                  echo $k->deskripsi;
                                ?>
                              </p>
                              <div class="schedule-download"><a href="#" class="btn"><i class="iconf-acrobat"></i>
                                <p>Full Schedule</p>
                                </a> </div>
                            </div>
                            <!-- end span4 -->
                            <div class="span8"> 
                              <!-- TIMELINE -->
                              <section class="timeline toggle-shortcode toggles"> 
                                <!-- EVENT 1 -->
                                <?
                                  $q = "select * from tb_rundown where tb_eventday_id_eventday = $k->id_eventday";
                                  $get = $this->db->query($q);
                                  if($get->num_rows!=0)
                                  {
                                    foreach ($get->result() as $z) {
                                      ?>
                                        <article class="event">
                                          <div class="timeline-icon">
                                            <div class="timeline-icon-container"><i class="iconf-right-open"></i> </div>
                                          </div>
                                          <div class="time-box">
                                            <time><?echo substr($z->jam_mulai, 0, 5);?></time>
                                          </div>
                                          <div class="timeline-content">
                                            <div class="event-content">
                                              <div class="toggle-item-title event-title" data-count="1">
                                                <h3 style="text-transform:initial;"><?echo $z->nama_kegiatan?><span></span></h3>
                                              </div>
                                              <div class="toggle-item-body" style="display: none;">
                                                <p>
                                                  <?echo $z->deskripsi?>
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                        </article>
                                      <?
                                    }
                                  }
                                ?>
                                <!-- end EVENT 1 --> 
                              </section>
                            </div>
                            <!-- end span8 --> 
                            <!-- --> 
                          </div>
                        <?
                        $x++;
                      }
                      else
                      {
                        ?>
                          <div class="tab-pane wo-tab-pane fade" id="<?echo $data[$x]?>"> 
                            <!-- DAY ONE -->
                            <div class="span4">
                              <h2>
                                <?
                                  if(substr($k->jenis, 0, 1) == 1)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 2)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 3)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 4)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 5)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 6)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else if(substr($k->jenis, 0, 1) == 7)
                                  {
                                    echo $ardate[$x]." Day";
                                  }
                                  else
                                  {
                                    echo "~ Day";
                                  }
                                ?>
                              </h2>
                              <p>
                                <?
                                  echo $k->deskripsi;
                                ?> 
                              </p>
                              <div class="schedule-download"><a href="#" class="btn"><i class="iconf-acrobat"></i>
                                <p>Full Schedule</p>
                                </a> </div>
                            </div>
                            <!-- end span4 -->
                            <div class="span8"> 
                              <!-- TIMELINE -->
                              <section class="timeline toggle-shortcode toggles"> 
                                <!-- EVENT 1 -->
                                <?
                                  $q = "select * from tb_rundown where tb_eventday_id_eventday = $k->id_eventday";
                                  $get = $this->db->query($q);
                                  if($get->num_rows!=0)
                                  {
                                    foreach ($get->result() as $z) {
                                      ?>
                                        <article class="event">
                                          <div class="timeline-icon">
                                            <div class="timeline-icon-container"><i class="iconf-right-open"></i> </div>
                                          </div>
                                          <div class="time-box">
                                            <time><?echo substr($z->jam_mulai, 0, 5);?></time>
                                          </div>
                                          <div class="timeline-content">
                                            <div class="event-content">
                                              <div class="toggle-item-title event-title" data-count="1">
                                                <h3 style="text-transform:initial;"><?echo $z->nama_kegiatan?><span></span></h3>
                                              </div>
                                              <div class="toggle-item-body" style="display: none;">
                                                <p>
                                                  <?echo $z->deskripsi?>
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                        </article>
                                      <?
                                    }
                                  }
                                ?>
                                <!-- end EVENT 1 --> 
                              </section>
                            </div>
                            <!-- end span8 --> 
                            <!-- --> 
                          </div>
                        <?
                        $x++;
                      }
                    }
                  }
                ?>
                
              </div>
              <!-- end tabs --> 
              <!-- --> 
            </div>
      
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>

  <?
      }
    ?>