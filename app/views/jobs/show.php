<h2 class="page-header">
    <?php
    if (isset($_SESSION['job'])) {
        $job  = $_SESSION['job'];
    } else {
        $job = $data['job'];
    }
    echo ucfirst($job->title);
    ?>
</h2>

<!-- Apply modal trigger -->
<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply</button>

<!--Job Info -->
<section>
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
</section>

<br><br>

<a href="<?php echo URLROOT; ?>">Go Back</a>
<br><br>

<!--Action Buttons-->
<div class="well">
    <a href="<?php echo URLROOT . 'jobs/edit?id=' . $job->id; ?>" class="btn btn-success">Edit</a>
    <form action="<?php echo URLROOT . 'jobs/destroy' ?>" method="post" style="display: inline;">
        <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
        <input type="submit" name="submit" class="btn btn-danger" value="delete">
    </form>
</div>

<!--Apply modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Applying for : <?php echo ucfirst($job->title);   ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo URLROOT . 'jobs/apply'; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $job->id; ?>">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload your CV</label>
                        <input type="file" name="cv" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Apply" name="apply" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>