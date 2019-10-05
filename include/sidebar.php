<?php
if(isset($_POST['submit']))
{
   $search=$_POST['search'];
  $query="SELECT * FROM post WHERE post_tags LIKE '%$search%'";
 $select=mysqli_query($connection,$query);
    if(!$select)
{
    echo "we are not connect";
}
    $count = mysqli_num_rows($select); 
    
     if(!$count)
{
    echo "nothing got";
}
    else
    {
        echo "some result";
    } 
}
?>
                <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="index.php" method="post">
                    <div class="input-group">
                        <input name = "search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name= "submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <?php
$query="SELECT * FROM categories";
 $select=mysqli_query($connection,$query);
 
                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                              <?php
while($row= mysqli_fetch_assoc($select))
 {$cat_title=$row["cat_title"];
  echo "<li><a href = '#'>{$cat_title}</a></li>";
                    }
                     ?>          
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- Side Widget Well -->
                   <?php include "widget.php"?>
            </div>
        </div>
        <!-- /.row -->
        <hr>
