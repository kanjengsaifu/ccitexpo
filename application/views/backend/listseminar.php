<div class="row-fluid">
	<h3 class="header smaller lighter blue">List Seminar dan Workshop</h3>
	<div class="table-header">
		Berikut adalah data semua seminar dan workshop yang ada pada database.
	</div>

	<table id="tabelblog" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>Waktu</th>
				<th>Tempat</th>
				<th>Pembicara</th>
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
									<?echo $k->judul?>
								</td>
								<td>
									<?
										if($k->kategori==1)
										{
											echo "Seminar";
										}
										else
										{
											echo "Workshop";
										}
									?>
								</td>
								<td>
									<?
										list($a,$b,$c) = explode("-", $k->tanggal);
										$jammulai = $k->jam_mulai;
										$jamselesai = $k->jam_selesai;
										echo $c."-".$b."-".$a." ".$jammulai."-".$jamselesai;
									?>
								</td>
								<td><?echo $k->tempat?></td>
								<td><?echo $k->nama?></td>

								<td>
									<div class="hidden-phone visible-desktop action-buttons">
									
										<a class="green" href="<?echo $this->config->item('backend')?>bindingseminar/<?echo $k->id_seminar?>">
											<i class="icon-pencil bigger-130"></i>
										</a>
										
										<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)) { ?>
										<a class="red" id="alert" href="<?echo $this->config->item('backend')?>deleteseminar/<?echo $k->id_seminar?>">
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
</script>

<script src="<?echo $this->config->item('css')?>backend/assets/js/jquery.dataTables.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
	$(document).ready(function($) {
		var oTable1 = $('#tabelblog').dataTable( {
		"aoColumns": [
	      { "bSortable": false },
	      null, null,null,null,null,
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