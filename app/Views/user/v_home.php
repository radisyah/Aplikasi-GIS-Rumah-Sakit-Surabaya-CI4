<!-- Default box -->
<?php foreach ($rumkit as $key => $value) { ?>
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="col-12">
          <img
            src="<?= base_url('img/'.$value['foto']) ?>"
            class="product-image"
            alt="Product Image"
          />
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3"><?= $value['nama_rumkit'] ?></h3>
        <p align="justify" >
          <?= $value['deskripsi'] ?>
        </p>

        <hr />
        <h4>Alamat</h4>
        <p class="my-3"><?= $value['alamat'] ?></p>

        <h4>No Telepon</h4>
        <p class="my-3"><?= $value['no_telpon'] ?></p>

        <a href="<?= base_url('allUser/lokasi') ?>" class="btn btn-primary btn-block"><i class="fas fa-map-marker-alt mr-1"> Lihat Lokasi</i></a>

      </div>
    </div>
  </div>
</div>
<?php } ?>
