<?php
include 'conn.php';
session_start();
if(!isset($_POST['search'])){
  header("Location: index.php");
  exit;
}
if (isset($_POST['search'])) {
  $buku = $_POST['search'];
  $hasil = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%{$buku}%'");
}
while ($value = mysqli_fetch_assoc($hasil)) { ?>
  <div class="col-md-3 me-2 my-1 bg-light rounded shadow details col-5" data-id="<?php echo $value['id_buku']; ?>" data-bs-toggle="modal" data-bs-target="#modalDetail">
    <img src="bookimg/<?php echo $value['gambar'] ?>" width="100%" height="250px" class="my-3 rounded shadow d-inline-block mx-auto">
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