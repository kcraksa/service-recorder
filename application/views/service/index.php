<div class="container mt-5">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Service
				</div>
				<div class="card-body">
					<a class="btn btn-primary btn-sm" href="<?php echo base_url('service/tambah') ?>">Tambah Data Service</a>
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
								<td>
									<span><i class="fa-solid fa-car"></i> <?php echo $dt->nama_kendaraan ?></span> <br>
									<span><i class="fa-solid fa-wrench"></i> <?php echo $dt->itemservice ?></span> <br>
									<span><i class="fa-solid fa-gauge"></i> <?php echo $dt->kilometer ?></span> <br>
									<span><i class="fa-solid fa-calendar-days"></i> <?php echo date('d-m-Y', strtotime($dt->tanggal)) ?></span> <br>
									<span><i class="fa-solid fa-note-sticky"></i> <?php echo $dt->keterangan ?></span> <br>
								</td>
								<td>
									<a href="<?php echo base_url('service/edit/'.$dt->id) ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="<?php echo base_url('service/delete/'.$dt->id) ?>" class="btn btn-danger btn-sm" onClick="javascript:confirm('Hapus Data ?')">Delete</a>
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