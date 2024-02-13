
<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/beranda.svg">
        <div id="judul-text">
            <h2 class="text-green">BERANDA</h2>
            Halamanan Utama Administrator
        </div>
    </div>
</div>
<?php
				if (isset($_SESSION['error'])) {
				?>
					<div class="alert alert-warning" role="alert">
						<?php echo $_SESSION['error'] ?>
					</div>
				<?php
				}
				?>
                	<?php
				if (isset($_SESSION['message'])) {
				?>
					<div class="alert alert-success" role="alert">
						<?php echo $_SESSION['message'] ?>
					</div>
				<?php
				}
				?>
<!-- judul -->
<div class="panel">
    <div class="panel-middle text-center">
        <h1>
            Selamat Datang, <span class="text-green"><?php echo $_SESSION['nama']?></span><br>
        </h1>
    </div>
    <div class="panel-bottom"></div>
</div>