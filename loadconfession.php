<?php 
    if (isset($_GET['pageno'])){
      $pageno = $_GET['pageno'];
    } else{
      $pageno = 1;
    }
    $no_of_records_per_page=10;
    $offset = ($pageno-1) * $no_of_records_per_page;
    $result=mysqli_query($db,"select count(*) from adminperm");
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM adminperm order by id desc LIMIT $offset, $no_of_records_per_page";
    $result = mysqli_query($db, $sql);
    while($row=mysqli_fetch_assoc($result)){
?>
                    <div class="demo-card">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                    <h3 class="panel-title">#<?php echo $row['id'];?><span style="float: right"><?php echo $row['date'];?></span></h3>
                            </div>
                            <div class="panel-body">
                                <?php echo htmlspecialchars_decode(stripslashes($row['message'])); ?>
                            </div>
                            <?php $id=$row['id'];?>
                            <div class="panel panel-success">
                            <div class="panel-heading">
                            Admin - <?php echo htmlspecialchars_decode(stripslashes($row['cmnt'])); ?>
                            </div></div>
                            <div class="panel-footer">
                                <div class="fb-like" data-href="http://3.16.127.164/confession-site/index.php/#like<?php echo $id; ?>" id="like<?php echo $id;?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                                <div class="fb-comments" id="<?php echo $id;?>" data-href="http://3.16.127.164/confession-site/index.php/#<?php echo $id; ?>" data-width="100%" data-numposts="100"></div>
                            </div>
                        </div>
                    </div>    
<?php } ?>
<div align="center">
  <ul class="pagination ">
          <li><a href="?pageno=1">First</a></li>
          <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
          </li>
          <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
          </li>
          <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
</div>
                <?php
                  mysqli_close($db);
                ?>
