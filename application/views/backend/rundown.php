<div class="row-fluid">
	<h3 class="header smaller lighter blue">Semua Data Rundown Event</h3>
	<div class="table-header">
		Berikut Merupakan Semua Data Rundown Event
	</div>

	<table id="tabelblog" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Event</th>
				<th>Jam Mulai</th>
				<th>Event Day</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?
				if($event->num_rows!=0)
				{
					$x=1;
					foreach ($event->result() as $k) {
						?>
							<tr>
								<td class="center span1">
									<?php echo $x?>
								</td>

								<td>
									<?php echo $k->nama_kegiatan?>
								</td>
								<td>
									<?php echo $k->jam_mulai?>
								</td>
								<td>
									<?php echo $k->jenis?>
								</td>
								<td>
									<div class="hidden-phone visible-desktop action-buttons">
										<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)) { ?>
										<a class="red" id="alert" href="<?echo $this->config->item('backend')?>deleteeventday/<?echo $k->id_rundown?>">
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
	      null, null,null,
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