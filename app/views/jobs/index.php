
<div class="bg-light rounded-3">
    <div class="container-fluid py-5">
        <h2 class="display-5">Job Search</h2>
        <form method="GET" action="/jobsite/jobs/index">
            <select name="category" class="form-control" id="form-group">
                <option value="0">Choose a Category</option>
                <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" class="btn btn-small btn-info mt-1" value="Submit">
        </form>
    </div>
</div>

<div class="container px-4 py-5">
    
    <h2 class="pb-2 border-bottom"><?php echo $data['title']; ?></h2>
    <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
        <?php foreach ($data['jobs'] as $job) : ?>
            <div class="col d-flex align-items-start">
                <div>
                    <h2>
                        <a href="job?id=<?php echo $job->id; ?>">
                             <?php echo ucfirst($job->title);   ?>
                        </a>                     
                    </h2>
                    <p><?php echo $job->description  ?></p>
                </div>               
            </div>
        <?php endforeach; ?>
    </div>

