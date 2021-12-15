<!-- Begin Page Content --> 
<div class="container-fluid"> 
    
    <?= $this->session->flashdata('pesan'); ?> 
    <div class="row"> 
        <div class="col-lg-12"> 
            <?php if(validation_errors()){?> 
                <div class="alert alert-danger" role="alert"> 
                    <?= validation_errors();?> 
                </div> 
            <?php }?> 
            <?= $this->session->flashdata('pesan'); ?> 
            <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#peralatanBaruModal"><i class="fas fa-file-alt"></i> Tambah Peralatan</a> 
            <table class="table table-hover bg-gradient-light"> 
                <thead> 
                    <tr> 
                        <th scope="col">#</th> 
                        <th scope="col">nama</th> 
                        <th scope="col">Tahun Buat</th> 
                        <th scope="col">Stok</th> 
                        <th scope="col">DiPinjam</th> 
                        <th scope="col">DiBooking</th> 
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    
                    <?php 
                        $a = 1; 
                        foreach ($peralatan as $p) { ?> 
                    <tr> 
                        <th scope="row"><?= $a++; ?></th> 
                        <td><?= $p['nama_alat']; ?></td>  
                        <td><?= $p['tahun_buat']; ?></td>  
                        <td><?= $p['stok']; ?></td> 
                        <td><?= $p['dipinjam']; ?></td> 
                        <td><?= $p['dibooking']; ?></td> 
                        <td> 
                            <picture> 
                                <source srcset="" type="image/svg+xml"> 
                                <img src="<?= base_url('assets/img/upload/') . $p['image'];?>" class="img-fluid img-thumbnail" alt="..."> 
                            </picture></td> 
                        <td> 
                            <a href="<?= base_url('peralatan/ubahPeralatan/').$p['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a> 
                            <a href="<?= base_url('peralatan/hapusperalatan/').$p['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$p['nama_alat'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a> 
                        </td> 
                    </tr> 
                    <?php } ?>
                </tbody> 
            </table> 
        </div> 
    </div>


</div> 
<!-- /.container-fluid --> 

</div> 
<!-- End of Main Content --> 

<!-- Modal Tambah buku baru--> 
<div class="modal fade" id="peralatanBaruModal" tabindex="-1" 
role="dialog" aria-labelledby="peralatanBaruModalLabel" aria-
hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="peralatanBaruModalLabel">Tambah Peralatan</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <form action="<?= base_url('peralatan'); ?>" method="post" enctype="multipart/form-data"> 
                <div class="modal-body"> 
                    <div class="form-group"> 
                        <input type="text" class="form-control form-control-user" id="nama_alat" name="nama_alat" placeholder="Masukkan nama Alat"> 
                    </div> 
                    <div class="form-group"> 
                        <select name="id_kategori" class="form-control form-control-user"> 
                            <option value="">Pilih Kategori</option> 
                            <?php 
                            foreach ($kategori as $k) { ?> 
                                <option value="<?= $k['id'];?>"><?= $k['kategori'];?></option> 
                            <?php } ?> 
                        </select> 
                    </div>  
                    <div class="form-group"> 
                        <select name="tahun" class="form-control form-control-user"> 
                            <option value="">Pilih Tahun</option> 
                            <?php 
                            for ($i=date('Y'); $i > 1000 ; $i--) { ?> 
                                <option value="<?= $i;?>"><?=$i;?></option> 
                            <?php } ?> 
                        </select> 
                    </div>  
                    <div class="form-group"> 
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok"> 
                    </div> 
                    <div class="form-group"> 
                        <input type="file" class="form-control form-control-user" id="image" name="image"> 
                    </div> 
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button> 
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> 
                </div> 
            </form>
        </div> 
    </div> 
</div> 
<!-- End of Modal Tambah Mneu -->