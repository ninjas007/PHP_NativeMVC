<div class="container mt-5">
	
	<div class="row justify-content-center">
		<div class="col-6">
			<h3 class="text-center">Daftar Buku</h3>
			<hr>
			<a href="<?php echo BASEURL; ?>/buku/tambah" class="btn btn-sm btn-success">Tambah</a>
			<hr>
			<ul class="list-group">
				<?php foreach ($data['buku'] as $buku): ?>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				  		<?= strtoupper($buku['judul']) ?>
				  		<a href="<?php echo BASEURL; ?>/buku/detail/<?php echo $buku['id'] ?>" class="badge badge-dark badge-pill">Detail</a>
				  </li>
				<?php endforeach ?>
			</ul>

		</div>
	</div>

</div>