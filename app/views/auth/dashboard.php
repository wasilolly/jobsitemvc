
<h1> Job Listings Applications</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Job Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Applicant's CV</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['apps'] as $app): ?>
      <tr>
        <th scope="row"><a href="<?php echo URLROOT.'jobs/job?id='.$app->jobId; ?>">Show</a> </th>
        <td><?php echo $app->name ?></td>
        <td><?php echo $app->email ?></td>
        <td><a href=<?php echo $app->cv_path ?> download="<?php echo $app->name ?>CV">
          <span style="font-size: 2em; color:blue;">
              <i class="fas fa-file"></i>
          </span>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>    
</table>
<section class="noapps">
  <?php if($data['apps'] == null): ?>
    <p>No Applications for your listed Jobs!</p>
  <?php endif ?>
</section>
