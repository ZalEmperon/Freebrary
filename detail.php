<?php
include "conn.php";
session_start();
if (isset($_POST["id_buku"])) {
  $id_buku = $_POST["id_buku"];
  $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
  $result = mysqli_query($conn, $query);
  while ($hasil = mysqli_fetch_assoc($result)) { ?>
    <div class="modal-body">
      <img width="70%" height="70%" src="bookimg/<?php echo $hasil['gambar']; ?>" class="rounded mx-auto d-block border shadow">
      <h5 class="mt-2 ms-5"><b>Judul : <?php echo $hasil['judul']; ?></b></h5>
      <h5 class="mt-2 ms-5"><b>Pengarang :<?php echo $hasil['pengarang']; ?></b></h5>
      <h5 class="mt-2 ms-5"><b>Penerbit : <?php echo $hasil['penerbit']; ?></b></h5>
      <h5 class="mt-2 ms-5"><b>Genre : <?php echo $hasil['genre']; ?></b></h5>
    </div>
    <div class="modal-footer">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <?php if (!isset($_SESSION['username'])) { ?>
            <p class="fw-bold"><a href="" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a> Untuk Print</p>
          <?php } elseif ($_SESSION['status'] != "Admin") { ?>
            <a href="print.php?id_buku=<?php echo $hasil['id_buku']; ?>" type="btn" class="btn btn-info mx-2 mb-2">Print</a>
          <?php } else { ?>
            <a href="print.php?id_buku=<?php echo $hasil['id_buku']; ?>" type="btn" class="btn btn-info mx-2 mb-2">Print</a>
            <button class="btn btn-warning mx-2 mb-2 editbuku" data-bs-toggle="modal" data-bs-target="#modalEdit" id="<?php echo $hasil['id_buku']; ?>">Edit</button>
            <a class="btn btn-danger mx-2 mb-2 hapusbuku" id="<?php echo $hasil['id_buku']; ?>" href="javascript:void(0)">Hapus</a>
          <?php } ?>
          <button type="button" class="btn btn-primary mx-2 mb-2" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {

        //HAPUS DATA
        $('.hapusbuku').click(function() {
          var id = $(this).attr('id');
          Swal.fire({
            title: 'Yakin Ingin Menghapus?',
            text: "Data Buku tidak dapat dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
          }).then((result) => {
            if (result.isConfirmed) {
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
            }
          })
        });

        //AMBIL DATA EDIT
        $('.editbuku').click(function() {
          var id_buku = $(this).attr("id");
          $.ajax({
            url: "ambildata_update.php",
            method: "POST",
            data: {
              id_buku: id_buku
            },
            dataType: "json",
            success: function(data) {
              $('#id').val(data.id_buku);
              $('#juduledit').val(data.judul);
              $('#pengarangedit').val(data.pengarang);
              $('#penerbitedit').val(data.penerbit);
              $('#genreedit').val(data.genre);
              $('#edit').val("Update");
              $('#modalEdit').modal('show');
            }
          });
        });
      });
    </script>
<?php }
} ?>