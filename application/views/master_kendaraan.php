<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Service Record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						Master Kendaraan
					</div>
					<div class="card-body">
						<form method="post" action="<?php echo base_url('masterkendaraan/save') ?>">
							<div class="mb-3">
							  	<label for="jenis_id" class="form-label">Jenis Kendaraan</label>
							  	<select class="form-select" aria-label="Default select example" name="jenis_id" id="jenis_id">
								  	<option selected disabled>-- Pilih --</option>
								  	<?php foreach($data_jenis_kendaraan as $jenis_kendaraan): ?>
								  		<option value="<?php echo $jenis_kendaraan->id ?>"><?php echo $jenis_kendaraan->jenis ?></option>
								  	<?php endforeach ?>
								</select>
								<?php echo form_error('jenis_id'); ?>
							</div>
							<div class="mb-3">
							  	<label for="nama" class="form-label">Nama Kendaraan</label>
							  	<input type="text" name="nama" id="nama" class="form-control">
							  	<?php echo form_error('nama'); ?>
							</div>
							<div class="mb-3 text-end">
							  	<button class="btn btn-primary" type="submit" onclick="javascript:confirm('Anda Yakin ?')">Save</button>
							  	<button class="btn btn-danger">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>