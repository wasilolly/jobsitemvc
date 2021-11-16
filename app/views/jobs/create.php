
<div class="container">
<h2 class="page-header">Create Job Listing</h2>
<form action="<?php echo URLROOT.'jobs/store'; ?>" method="post">
    
    <div class="row flex">
    <div class="form-group">
        <label for="title">Job Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="form-group">
        <label for="company">Company Name</label>
        <input type="text" class="form-control" name="company" required>
    </div>
    </div>
    
    <div class="form-group">
        <label for="category">Job Category</label>
        <select name="category" class="form-control" id="form-group">
            <option value="0">Choose a Category</option>
            <?php foreach ($data['categories'] as $category) : ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" cols="20" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" class="form-control" name="salary" required>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" name="location" required>
    </div>
    <div class="form-group">
        <label for="phone">Contact</label>
        <input type="text" class="form-control" name="contact" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <input type="submit" class="btn btn-success mt-1" value="Submit" name="submit">
</form>

<br>
<br>
<a href="<?php echo URLROOT; ?>">Go Back</a>
<br><br>
</div>
