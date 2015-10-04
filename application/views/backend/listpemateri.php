<div class="row-fluid">
	<h3 class="header smaller lighter blue">Semua Data Pemateri</h3>
	<div class="table-header">
		Berikut adalah data semua data pemateri yang ada pada database.
	</div>

	<table id="tabelblog" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Pemateri</th>
				<th>Biodata</th>
				<th>Pekerjaan</th>
				<th>Pengalaman</th>
				<th>Sosmed</th>
				<th>Foto</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?
				if($konten->num_rows!=0)
				{
					$x=1;
					foreach ($konten->result() as $k) {
						?>
							<tr>
								<td class="center span1">
									<?echo $x?>
								</td>

								<td>
									<?echo $k->nama?>
								</td>
								<td>
									<?
										$bio = explode(" ", strip_tags($k->biodata));
										if(count($bio) > 30)
										{
											for ($i=0; $i < 30 ; $i++) { 
												echo $bio[$i]." ";
											}
											echo "...";
											?>
												<br><a id="selengkapnya" href="#" value="<?echo strip_tags($k->biodata)?>">[Lihat Selengkapnya]</a>
											<?
										}
										else
										{
											echo strip_tags($k->biodata);
										}
									?>
								</td>
								<td><?echo $k->pekerjaan?></td>
								<td><?echo $k->pengalaman?></td>
								<td><?echo $k->facebook?></br><?echo $k->twitter?></td>
								<td>
									<img src="<?
										list($a,$b) = explode(".", $k->foto);
										echo $this->config->item('thumb').$a."_thumb.".$b;
									?>" style="width:100px;">
								</td>

								<td>
									<div class="hidden-phone visible-desktop action-buttons">
										<a class="green" href="<?echo $this->config->item('backend')?>bindingpemateri/<?echo $k->id_speaker?>">
											<i class="icon-pencil bigger-130"></i>
										</a>
										<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)) { ?>
										<a class="red" id="alert" href="<?echo $this->config->item('backend')?>deletepemateri/<?echo $k->id_speaker?>">
											<i class="icon-trash bigger-130"></i>
										</a>
										<?php } ?>
									</div>
								</td>
							</tr>
						<?
						$x++;
					}
				}
			?>
			
		</tbody>
	</table>
</div>

<!-- JS dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/bootstrap.min.js"></script>

<!-- bootbox code -->
<script src="<?echo $this->config->item('css')?>backend/assets/js/bootbox.min.js"></script>
<script>
    $(document).on("click", "#alert", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Are you sure?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });

    $(document).on("click", "#selengkapnya", function(e) {
    	var link = $(this).attr("value");
           bootbox.dialog(link, {
			    "label": "OK",
			    "callback": function() {
			        console.log("callback");
			    }
			});
        });
</script>


<script src="<?echo $this->config->item('css')?>backend/assets/js/jquery.dataTables.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
	$(document).ready(function($) {
		var oTable1 = $('#tabelblog').dataTable( {
		"aoColumns": [
	      { "bSortable": false },
	      null, null,null,null,null,null,
		  { "bSortable": false }
		] } );
		

		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();
	
			var off2 = $source.offset();
			var w2 = $source.width();
	
			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}
	});
</script>