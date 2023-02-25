<div class="col-sm-12">
  <div id="map" style="height: 530px;"></div>
</div>


<script>
  var map = L.map('map').setView([-7.257378, 112.752072], 13);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

 
  // var marker = L.marker([-7.242661370344711, 112.7518916130066]).addTo(map)
  // .bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
  <?php foreach ($rumkit as $key => $value) { ?>
  L.marker([<?= $value['latitude']?>, <?= $value['longtitude']?>]).addTo(map).
    bindPopup("<h5><?= $value['nama_rumkit']?></h5>" +
    "<img src='<?= base_url('img/'. $value['foto'])?>' width='200px' >"+
    "<h5><?= $value['alamat']?></h5>" +
    "<h5><?= $value['no_telpon']?></h5><br>"
    ).openPopup();
  <?php } ?>
 


  
</script>



