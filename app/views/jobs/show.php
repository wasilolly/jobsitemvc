<h2 class="page-header"><?php if(isset($_SESSION['job'])){
                            $job  = $_SESSION['job'];
                        }else{
                            $job = $data['job'];
                        }
                        echo ucfirst($job->title); 
                    ?>
</h2>
<p><?php echo $job->location ?></p>
<small>Posted By <?php echo $job->contact ?> on <?php echo $job->created_at ?></small>
<hr>
<p class="lead"><?php echo $job->description ?></p>
<ul class="list-group">
    <li class="list-group-item"><strong>Company: </strong>
        <?php echo $job->company; ?>
    </li>
    <li class="list-group-item"><strong>Salary: </strong>
        <?php echo $job->salary; ?>
    </li>
    <li class="list-group-item"><strong>Email: </strong>
        <?php echo $job->email; ?>
    </li>
</ul>
<br>
<br>
<a href="index">Go Back</a>
<br><br>
<div class="well">
    <a href="edit?id=<?php echo $job->id;  ?>" class="btn btn-success">Edit</a>
    <form action="destroy" method="post" style="display: inline;">
        <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
        <input type="submit" name="submit" class="btn btn-danger" value="delete">
    </form>
</div>