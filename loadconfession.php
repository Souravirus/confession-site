<?php 
                $query="select * from adminperm
                        where permission=1 order by id desc";
                $result=mysqli_query($db, $query);
                $counter=-1;
                if(!$result)die ("Database access failed:". mysql_error());
                while($row=mysqli_fetch_array($result))
                {
                    ?>
                    <?php 
                        if($counter==-1)
                        $counter=$row['id']
                    ?>
                    <div class="demo-card">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                    <h3 class="panel-title">Confession #<?php echo $row['id'];?><span style="float: right"><?php echo $row['dat'];?></span></h3>
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
                                <div class="fb-like" data-href="http://exe.nith.ac.in/confess/#like<?php echo $id; ?>" id="<?php echo $id;?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                                <div class="fb-comments" id="<?php echo $id;?>" data-href="http://exe.nith.ac.in/confess/#<?php echo $id; ?>" data-width="100%" data-numposts="100"></div>
                            </div>
                        </div>
                    </div>                 
                <?php }
                    mysqli_close($db);
                ?>




  
