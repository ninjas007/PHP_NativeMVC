<div class="container mt-5">
	
		<h3><?php echo $data['judul'] ?></h3>
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title"> JUDUL : <?php echo strtoupper($data['buku']['judul'])?></h5>
	    <hr>
	    <p>Deskripsi :</p>
	    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	    <hr>
	    <ul>
	    	<li>Penulis : <?php echo $data['buku']['penulis'] ?></li>
	    	<li>Warna : <?php echo $data['buku']['warna'] ?></li>
	    	<li>Jumlah Hal : <?php echo $data['buku']['halaman'] ?></li>
	    </ul>
	  </div>
	</div>

</div>