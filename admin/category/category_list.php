<?php include '../../view/header.php'; ?>
<?php include '../../view/menu_admin.php'; ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Category Manager</h1>
    </div>
</section>

<section>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">

                <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                
                <ul class="list-group category_block">
                  <?php foreach ($categories as $category) : ?>
                    
                  <li class="list-group-item">
                    

                    <?php echo htmlspecialchars($category['categoryName']); ?>
                    <form class="delete_product_form"
                          action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_category">
                        <input type="hidden" name="category_id"
                               value="<?php echo $category['categoryID']; ?>">
                        <input type="submit" value="Delete">
                    </form>

                  </li>

                  <?php endforeach; ?>
                </ul>

            </div>

                

                <h2>Add Category</h2>
                <form id="add_category_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="add_category">

                    
                    <input type="input" name="name">
                    <input type="submit" value="Add">
                </form>

            </div>
        </div>
    </div>            
</section>
<?php include '../../view/footer.php'; ?>