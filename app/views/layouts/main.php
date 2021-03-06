<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Lister</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
    <link rel="stylesheet" href="<?php echo URLROOT.'public/css/style.css' ?>">

</head>
<main>
    <div class="container py-4">
        <header class="brand d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="<?php echo URLROOT; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4"><?php echo SITENAME; ?></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="<?php echo URLROOT.'jobs/create'; ?>" class="nav-link">New Listing</a></li>
                <?php if(AUTH): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Profile</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo URLROOT.'users/profile'; ?>">Dashboard</a></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading4">New Listing</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo URLROOT.'users/logout'; ?>">Logout</a></li>
                    </ul>
                </li>
                <?php else: ?>
                    <li class="nav-item"><a href="<?php echo URLROOT.'users/register'; ?>" class="nav-link">Register</a></li>
                    <li class="nav-item"><a href="/jobsite/users/login" class="nav-link">Login</a></li>
                <?php endif; ?>
            </ul>
        </header>
        <?php displayMessage(); ?>

        {{content}}

        <footer class="footer pt-3 mt-4 text-muted border-top">
           <p> &copy; JOBSITE 2022</p>
        </footer>
    </div>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT.'public/js/app.js' ?>"></script>

</body>
</html>