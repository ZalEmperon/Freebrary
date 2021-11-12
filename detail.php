<?php
include "conn.php";
session_start();
if (isset($_POST["id_buku"])) {
  $id_buku = $_POST["id_buku"];
  $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
  $result = mysqli_query($conn, $query);
  foreach ($result as $hasil) { ?>
    <div class="modal-body text-center">
      <img width="70%" src="gambar/<?php echo $hasil['gambar']; ?>" class="rounded mx-auto d-block">
      <h5 class="mt-2"><b><?php echo $hasil['judul']; ?></b></h5>
      <h5 class="mt-2"><b><?php echo $hasil['pengarang']; ?></b></h5>
      <h5 class="mt-2"><i><?php echo $hasil['penerbit']; ?></i></h5>
    </div>
    <div class="modal-footer">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
         <?php if (!isset($_SESSION['username'])) { ?>
            <p class="fw-bold">Login Untuk Print</p>
          <?php } elseif ($_SESSION['status'] != "Admin") { ?>
            <a href="print.php?id_buku=<?php echo $hasil['id_buku']; ?>" type="btn" class="btn btn-info mx-2 mb-2">Print</a>
          <?php } else { ?>
            <a href="print.php?id_buku=<?php echo $hasil['id_buku']; ?>" type="btn" class="btn btn-info mx-2 mb-2">Print</a>
            <button class="btn btn-warning mx-2 mb-2">Edit</button>
            <button class="btn btn-danger mx-2 mb-2 hapus_data" id="<?php echo $hasil['id_buku']; ?>">Hapus</button>
          <?php } ?>
          <button type="button" class="btn btn-primary mx-2 mb-2" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {

        //HAPUS DATA
        $('.hapus_data').click(function() {
          var id = $(this).attr('id');
          $.ajax({
            type: 'POST',
            url: "hapus.php",
            data: {
              id: id
            },
            success: function() {
              location.reload()
            }
          });
        });

      });
    </script>
<?php }
} ?>