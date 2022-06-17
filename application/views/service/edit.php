<div class="container mt-5">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Edit Data Service
				</div>
				<div class="card-body">
					<form method="post" action="<?php echo base_url('service/update/'.$detail->id) ?>">
						<div class="mb-3">
						  	<label for="id_kendaraan" class="form-label">Kendaraan</label>
						  	<select class="form-select" aria-label="Default select example" name="id_kendaraan" id="id_kendaraan">
							  	<option selected disabled>-- Pilih --</option>
							  	<?php foreach($kendaraan as $k): ?>
							  		<?php 

							  			$selected = $k->id == $detail->id_kendaraan ? 'selected' : '';

							  		?>
							  		<option value="<?php echo $k->id ?>" <?php echo $selected ?>><?php echo $k->nama_kendaraan ?></option>
							  	<?php endforeach ?>
							</select>
							<?php echo form_error('jenis_id'); ?>
						</div>
						<div class="mb-3">
						  	<label for="id_itemservice" class="form-label">Item Service</label>
						  	<select class="form-select" aria-label="Default select example" name="id_itemservice" id="id_itemservice">
							  	<option selected disabled>-- Pilih --</option>
							  	<?php foreach($item_service as $k): ?>
							  		<?php 

							  			$selected = $k->id == $detail->id_itemservice ? 'selected' : '';

							  		?>
							  		<option value="<?php echo $k->id ?>" <?php echo $selected ?>><?php echo $k->itemservice ?></option>
							  	<?php endforeach ?>
							</select>
							<?php echo form_error('jenis_id'); ?>
						</div>
						<div class="mb-3">
						  	<label for="tanggal" class="form-label">Tanggal Service</label>
						  	<input type="text" name="tanggal" id="tanggal" class="form-control" data-provide="datepicker" value="<?php echo $detail->tanggal ?>">
						  	<?php echo form_error('tanggal'); ?>
						</div>
						<div class="mb-3">
						  	<label for="kilometer" class="form-label">Kilometer</label>
						  	<input type="number" name="kilometer" id="kilometer" class="form-control" value="<?php echo $detail->kilometer ?>">
						  	<?php echo form_error('kilometer'); ?>
						</div>
						<div class="mb-3">
						  	<label for="keterangan" class="form-label">Keterangan</label>
						  	<textarea id="keterangan" name="keterangan" class="form-control"><?php echo $detail->keterangan ?></textarea>
						  	<?php echo form_error('keterangan'); ?>
						</div>
						<div class="mb-3 text-end">
						  	<button class="btn btn-primary" type="submit" onclick="javascript:confirm('Anda Yakin ?')">Update</button>
						  	<a class="btn btn-danger" href="<?php echo base_url('service') ?>">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#tanggal').datepicker({
			format: "dd-mm-yyyy"
		});
	})
</script>