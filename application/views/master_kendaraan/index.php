<div class="container mt-5">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Master Kendaraan
				</div>
				<div class="card-body">
					<a class="btn btn-primary btn-sm" href="<?php echo base_url('masterkendaraan/tambah') ?>">Tambah Kendaraan</a>
					<table class="table table-striped table-hover mt-3">
						<thead>
							<tr>
								<th width="60%">Kendaraan</th>
								<th width="40%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $dt): ?>

							<tr>
								<td><?php echo $dt->jenis." - ".$dt->nama_kendaraan ?></td>
								<td>
									<a href="<?php echo base_url('masterkendaraan/edit/'.$dt->id) ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="<?php echo base_url('masterkendaraan/delete/'.$dt->id) ?>" class="btn btn-danger btn-sm" onClick="javascript:confirm('Hapus Data ?')">Delete</a>
								</td>
							</tr>

							<?php endforeach ?>
						</tbody>
					</table>
					<?php echo $pagination ?>
				</div>
			</div>
		</div>
	</div>
</div>