<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $app_path; ?>">The Music Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $app_path . 'admin/product' ?>">Products</a>
                </li>
                <li class="nav-item">
                      <a class="nav-link text-white" href="<?php echo $app_path . 'admin/category' ?>">Categories<span class="caret"></span></a>
                </li>
                <li class="nav-item">
                	<a class="nav-link text-white" href="<?php echo $app_path . 'login/logout.php' ?>">Logout</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-success btn-sm ml-3" href="<?php echo $app_path . 'cart'; ?>">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light">0</span>
                </a>
            </form>
        </div>
    </div>
</nav>