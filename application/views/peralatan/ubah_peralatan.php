<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-lg-6">
			<?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert" >Nama Kategori tidak bolek Kosong</div>');
                redirect('peralatan/ubahperalatan/' . $k['id']);
            } ?>
			<?php foreach ($peralatan as $p ) { ?>
			<form action="<?= base_url('peralatan/ubahperalatan'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="id" id="id" value="<?php echo $p['id']; ?>">
					<input type="text" class="form-control form-control-user" id="nama_alat" name="nama_alat" placeholder="Masukkan nama alat" value="<?=$p['nama_alat']; ?>">
				</div>
				<div class="form-group">
					<select name="id_kategori" class="form-control form-control-user">
						<option value="<?= $id; ?>" selected="selected"><?= $k; ?></option>
						<?php
						foreach ($kategori as $k) {?>
						<option value="<?= $k['id']; ?>"><?= $k['kategori'];?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<select name="tahun" class="form-control form-control-user">
					<option value="<?= $p['tahun_buat']; ?>"><?=$p['tahun_buat'];?></option>
					<?php
					for ($i=date('Y'); $i>1500; $i--) { ?>
						<option value="<?= $i; ?>"><?=$i; ?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?=$p ['stok']; ?> ">
				</div>
				<div class="form-group">
					<?php
					if (isset($p['image'])) { ?>

						<input type="hidden" name="old_pict" value="<?= $p['image']; ?>">

						<picture>
							<source srcset="" type="image/svg+xml">
								<img src="<?= base_url('assets/img/upload/').$p['image'];?>" class="rounded mx-auto mb-3 d-blok" alt="..." width="2000" height="2500">
						</picture>
					<?php } ?>

					<input type="file" class="orm-control form-control-user" ig="image" name="image">
				</div>
					<div class="form-group">
						<input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
						<input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
					</div>
			</form> 
			<?php } ?>
		</div>
	</div>
</div>