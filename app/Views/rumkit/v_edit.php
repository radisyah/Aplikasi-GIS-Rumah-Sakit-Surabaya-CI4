<div class="col-sm-7">
  <div class="panel panel-default">
    <div class="panel-heading">Lokasi</div>
    <!-- /.panel-heading -->
    <div class="panel-body">
      <div id="map" style="height: 530px;"></div>
    </div>
  </div>
</div>

<div class="col-sm-5">
  <div class="panel panel-default">
    <div class="panel-heading">Edit Data Rumah Sakit</div>
    <!-- /.panel-heading -->
    <div class="panel-body">
      <?php if (!empty(session()->getFlashdata('errors'))) : ?>
        <div class="alert alert-danger" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('errors'); ?>
        </div>
      <?php endif; ?>
      
      <?php echo form_open_multipart('rumahSakit/save_edit/'.$detail['id_rumkit']); ?>
      <div class="form-group">
        <label>Nama Rumah Sakit</label>
        <input name = "nama_rumkit"  value="<?= $detail['nama_rumkit'] ?>" class="form-control" placeholder="Nama Rumah Sakit" >
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input name = "alamat" value="<?= $detail['alamat'] ?>"  class="form-control" placeholder="Alamat">
      </div>
      <div class="form-group">
        <label>No Telp</label>
        <input name = "no_telpon"  value="<?= $detail['no_telpon'] ?>" class="form-control" placeholder="No Telp">
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control"    name="deskripsi" rows="5"><?= $detail['deskripsi'] ?></textarea>
      </div>
      <div class="form-group">
        <label>Latitude</label>
        <input name = "latitude" id="lat"  value="<?= $detail['latitude'] ?>"  class="form-control" placeholder="Latitude">
      </div>
      <div class="form-group">
        <label>Longitude</label>
        <input name = "longtitude" id="long"  value="<?= $detail['longtitude'] ?>"  class="form-control" placeholder="Longitude">
      </div>
      <div class="form-group">
        <label>Foto</label>
        <input name = "foto" class="form-control" type="file" >
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= base_url('rumahSakit') ?>" class="btn btn-primary">Kembali</a>
      <?php echo form_close(); ?>

    </div>
  </div>
</div>

<script>

  var curLocation = [0,0];
  if (curLocation[0]==0 && curLocation[1]==0) {
    curLocation=[-7.257378, 112.752072];
  }

  var map = L.map('map').setView([-7.257378, 112.752072], 13  );

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation,{
    draggable:'true',
  });

  marker.on('dragend',function(event){
    var position = marker.getLatLng();
    marker.setLatLng(position,{
      draggable : 'true'
    }).bindPopup(position).update();
    $("#lat").val(position.lat);
    $("#long").val(position.lng).keyup();
  });

 
  map.addLayer(marker);


  
</script>

