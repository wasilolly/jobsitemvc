<div class="container">
    <h2 class="page-header">Edit: <?php
                                    $job = $data['job'];
                                    $categories = $data['categories'];
                                    echo ucfirst($job->title); 
                                ?>
    </h2>
    <form action="update?id=<?php echo $job->id; ?>" method="post">
        <div class="row flex">
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $job->title; ?>">
            </div>
            <div class="form-group">
                <label for="company">Company Name</label>
                <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="category">Job Category</label>
            <select name="category" class="form-control" id="form-group">
                <option value="0">Choose a Category</option>
                <?php foreach ($categories as $category) : ?>
                    <?php if ($job->category_id == $category->id) : ?>
                        <option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" cols="20" rows="5"><?php echo $job->description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Contact</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $job->contact; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $job->email; ?>">
        </div>
        <input type="submit" class="btn btn-success mt-1" value="Submit" name="submit">
    </form>

    <br>
    <br>
    <a href="index.php">Go Back</a>
    <br><br>
</div>