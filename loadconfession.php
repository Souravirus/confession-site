<?php 
    $limit=20;
    $sql=mysqli_query($db,"select max(id) as id from adminperm");
    while($row=mysqli_fetch_assoc($sql)){
        $maxid=$row['id'];
    }
    $pages=ceil($maxid/$limit);
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));
    $start=$maxid-(($page-1)*20);
    if($start<20)
        $end=1;
    else{
        $end=$start-19;
    }
    for($i=$start;$i>=$end;$i--)
    {
        $query="select * from adminperm where permission=1 && id=$i order by id desc";
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
                                <div class="fb-like" data-href="http://exe.nith.ac.in/confess/#like<?php echo $id; ?>" id="like<?php echo $id;?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                                <div class="fb-comments" id="<?php echo $id;?>" data-href="http://exe.nith.ac.in/confess/#<?php echo $id; ?>" data-width="100%" data-numposts="100"></div>
                            </div>
                        </div>
                    </div>    
                <?php       } 
                        }

                $prevlink = ($page > 1) ? ' <a href="?page=' . ($page - 1) . '" title="Previous page"><button class="btn btn-default">Previous Page</button></a>' : ' <span class="disabled"><button class="btn btn-default" disabled="disabled">Previous Page</button></span>';
                $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page"><button class="btn btn-default">Next Page</button></a>' : '<span class="disabled"><button class="btn btn-default" disabled="disabled">Next Page</button></span>';
                ?>
                <div id="direction">
                    <span class="dir" id="prev">
                        <i class="fa fa-angle-double-left faa-passing-reverse animated" style="font-size:24px"></i>
                        <?php echo $prevlink; ?>
                    </span>
                    <span class="dir" id="next">
                        <?php echo $nextlink; ?>
                        <i class="fa fa-angle-double-right faa-passing animated" style="font-size:24px"></i>
                    </span>
                </div>            
                <?php
                mysqli_close($db);
                ?>




  
