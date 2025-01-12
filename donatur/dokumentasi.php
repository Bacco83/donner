<?php include "header.php"; 

if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

?>

<style>
  .image-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .image-item {
    flex: 0 0 calc(33.33% - 10px);
    margin-bottom: 20px;
  }

  .image-item img {
    width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 8px;
  }

  .image-caption {
    text-align: center;
    margin-top: 10px;
  }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gallery</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="image-container">
            <div class="image-item">
                <img src="../img/download (7).jpg" alt="Image 1">
                <div class="image-caption">Sembako</div>
            </div>
            <div class="image-item">
                <img src="../img/OIP (6).jpg" alt="Image 2">
                <div class="image-caption">Image 2</div>
            </div>
            <div class="image-item">
                <img src="../img/OIP (7).jpg" alt="Image 3">
                <div class="image-caption">Image 3</div>
            </div>
        </div>
    </div>
    </section>
</div>



<?php include "footer.php"; ?>
