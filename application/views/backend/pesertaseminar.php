<?php $info = "";?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">Semua Data Peserta Seminar</h3>
	<div class="table-header">
		Berikut Merupakan Semua Data Peserta Seminar yang telah membayar dan konfirmasi
	</div>

	<table id="tabelblog" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?
				if($seminar->num_rows!=0)
				{
					$x=1;
					foreach ($seminar->result() as $k) {
						if($k->status_peserta==1||$k->status_peserta==2) {
						?>
							<tr>
								<td class="center span1">
									<?php echo $x?>
								</td>

								<td>
									<?php echo $k->firstname?>
								</td>
								<td>
									<?php echo $k->lastname?>
								</td>
								<td>
									<?php echo $k->email?>
								</td>

								<td>
									<div class="hidden-phone visible-desktop action-buttons">
										<?php if(($k->status_peserta==2)&&($k->tiket_barcode=='')){ ?>
										<a class="green" id="alert2" href="<?echo $this->config->item('backend')?>generateBarcode/<?echo $k->id_peserta?>">
											<i class="icon-barcode bigger-130"></i>
										</a><?php } ?>
										<?php if($k->status_peserta==1){ ?>
										<a class="green" id="alert" href="<?echo $this->config->item('backend')?>sudahBayar/<?echo $k->id_peserta?>/<?echo $k->status_peserta?>">
											<i class="icon-check bigger-130"></i>
										</a>
										<?php } ?>
										<?php 
										$barcode = $this->config->item("uploads")."/barcode/".$k->tiket_barcode;
										$info = "
										<table>
										<tr>
											<td>Nama  : </td><td>$k->firstname $k->lastname</td>
										</tr>
										<tr>
											<td>Email : </td><td>$k->email</td> 
										</tr>
										<tr>
											<td>Barcode : </td>
											<td>
												<img src='$barcode'/>
											</td>
										</tr>"
										?>
										<a class="green" id="selengkapnya" href="#" value="<?php echo $info?>">
											<i class="icon-info-sign bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
						<?
						$x++;
					}
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
            bootbox.confirm("Sudah Bayar?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
	$(document).on("click", "#alert2", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Generate Tiket ?", function(result) {    
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