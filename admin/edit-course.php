
<!-- like handle-add-category.php -->

<?php include("includes/header.php") ?>





<?php 



//to edit with the matched id
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from courses where id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $course = mysqli_fetch_assoc($result);
    }
}




//to get all categories
$sql = "select id, name from cats";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $cats = [];
    }





?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">

            <div class="col-8">
                <?php include("includes/errors.php") ?>
                <form action="handlers/handle-edit-course.php?id=<?= $course['id']; ?>&imgOldName=<?= $course['img']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $course['name']; ?>">
                    </div>



                    <div class="form-group">
                      <label >Description </label>
                      <textarea class="form-control rounded-0" name="desc" rows="3"><?= $course['desc']; ?></textarea>
                    </div>




                    <div class="form-group">
                      <label for="spec">Category:</label>
                      <select class="form-control valid" name="cat_id" id="cat_id">
                      <?php foreach($cats as $cat){ ?>
                        <!-- to fetch the selected option with the matched course id -->
                          <option 
                            <?php if($cat['id'] == $course['cat_id']) {echo "selected";} ?>
                            value="<?= $cat['id']; ?>"><?= $cat['name']; ?>
                          </option>                                        
                      <?php } ?>                                            
                      </select>                
                    </div>




                    <img src="../uploads/courses/<?= $course['img']; ?>" height="50px">


                    <div class="form-group">
                    <label >Img</label>
                      <div class="input-group">
                      
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="img">
                          <label class="custom-file-label" >Choose file</label>
                        </div>
                      </div>

                    </div>
                    



                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>

            </div>
    
        


          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("includes/footer.php") ?>

 