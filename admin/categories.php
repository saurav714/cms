<?php include "includes/header.php";?>
    <div id="wrapper">
        <!-- Navigation -->
          <?php include "includes/navigation.php";?>
        <div id="page-wrapper">
<div class="container-fluid">
 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>
            <div class="col-xs-6">
                            <? php
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)) {
                     echo "This Field should not be empty";
    } 
        else {
    $stmt = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?) ");
    mysqli_stmt_bind_param($stmt, 's', $cat_title);
    mysqli_stmt_execute($stmt);
        if(!$stmt) {
        die('QUERY FAILED'. mysqli_error($connection));
                  }
             }
    mysqli_stmt_close($stmt);
       }
            ?>
       <form action="" method="post">
      <div class="form-group">
         <label for="cat-title">Add Category</label>
          <input type="text" class="form-control" name="cat_title">
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
      </div>
                            </form>
                        </div>
                         <div class="col-xs-6">
<?php
$query="SELECT * FROM categories";
 $select=mysqli_query($connection,$query);
?>
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                          <th>Categories</th>
                                 </tr>
                                 <tbody>
                                     <?php
while($row= mysqli_fetch_assoc($select))
 {$cat_title=$row["cat_title"];
  $cat_id=$row["cat_id"];
  echo "<tr>";
  echo "<td>{$cat_id}</td>";
  echo "<td>{$cat_title}</td>";
  echo "<td><a href='categories.php?delete={$cat_title}'>delete</a></td>";
  echo "</tr>";
                    }
                     ?> 
                            <?php
                                     
            if(isset($_GET['delete']))
{
     $the_cat_id =$_GET['delete'];
    $query = "DELETE FROM categories WHERE  cat_id = {$the_cat_id}";
    $delete = mysqli_query($connection,$query);
    header("Location: categories.php");
    }     
                                     ?>              
        </tbody>
    </table>
                </div>        
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php";?>
  