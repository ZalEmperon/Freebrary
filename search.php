<?php
include 'conn.php';
session_start();
if (isset($_POST['search'])) {
  $buku = $_POST['search'];
  $hasil = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%{$buku}%'");
}
while ($value = mysqli_fetch_assoc($hasil)) { ?>
  <div class="col-md-3 m-2 bg-info rounded col-5 shadow details" data-id="<?php echo $value['id_buku']; ?>" data-bs-toggle="modal" data-bs-target="#modalDetail">
    <p><?php echo $value['judul'] ?></p>
    <p><?php echo $value['pengarang'] ?></p>
    <p><?php echo $value['penerbit'] ?></p>
  </div>
  <script>
    $(document).ready(function() {
      
      // DETAIL SEARCHING
      $('.details').click(function() {
          var id_buku = $(this).data("id")
          $.ajax({
            url: "detail.php",
            method: "POST",
            data: {
              id_buku: id_buku
            },
            success: function(data) {
              $("#data-buku").html(data)
              $("#modalDetail").modal('show')
            }
          });
        });
    });
  </script>
<?php } ?>