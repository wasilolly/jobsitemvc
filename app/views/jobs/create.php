
<div class="container">
<h2 class="page-header">Create Job Listing</h2>
<form action="create.php" method="post">
    <div class="row flex">
    <div class="form-group">
        <label for="title">Job Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="company">Company Name</label>
        <input type="text" class="form-control" name="company">
    </div>
    </div>
    
    <div class="form-group">
        <label for="category">Job Category</label>
        <select name="category" class="form-control" id="form-group">
            <option value="0">Choose a Category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" cols="20" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" class="form-control" name="salary">
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" name="location">
    </div>
    <div class="form-group">
        <label for="phone">Contact</label>
        <input type="text" class="form-control" name="phone">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <input type="submit" class="btn btn-success mt-1" value="Submit" name="submit">
</form>

<br>
<br>
<a href="index.php">Go Back</a>
<br><br>
</div>
