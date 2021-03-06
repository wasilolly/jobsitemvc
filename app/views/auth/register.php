<div class="container">
  <form action="<?php echo URLROOT . 'users/register'; ?>" method="post">
    <div class="row d-flex justify-content-center align-items-center h-auto">
      <div class="col-xl-6">
        <h1 class="mb-4 text-center">Register</h1>
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Username</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="text" class="form-control" id="username" name="name" required/>
              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com"  required/>
              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">password</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" onkeyup="check()" required/>
              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0"> Repeat password</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="password" class="form-control" id="repeatpass" placeholder="password" onkeyup="check()" required/>
              </div>
            </div>
            <hr class="mx-n3">
            <div class="px-5 py-4">
              <button type="submit" name="register" id="register" class="btn btn-primary btn-lg disabled">Register</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
