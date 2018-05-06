<?php include '../../view/header.php'; ?>
<?php include '../../view/menu_admin.php'; ?>

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Product Manager</h1>
            <p class="lead text-muted mb-0">To view, edit, or delete a product, select the product.</p>
            <br/>
            <span class="btn btn-light"><a href="index.php?action=show_add_edit_form">Add Products</a></span>
        </div>
    </section>

    <div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                
                <ul class="list-group category_block">
                  <?php foreach ($categories as $category) : ?>
                    
                  <li class="list-group-item">
                    <a href="<?php echo $app_path . 'admin/product' .
                        '?action=list_products' .
                        '&amp;category_id=' . $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                    </a>
                  </li>

                  <?php endforeach; ?>
                </ul>

            </div>
        </div>

        <div class="col">
          <h2><?php echo $current_category['categoryName']; ?></h2>
            <div class="row">
              <?php foreach ($products as $product) :
                      // Get product data
                      $list_price = $product['listPrice'];
                      $discount_percent = $product['discountPercent'];
                      $description = $product['description'];
                      
                      // Calculate unit price
                      $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
                      $unit_price = $list_price - $discount_amount;

                      // Get first paragraph of description
                      $description_with_tags = add_tags($description);
                      $i = strpos($description_with_tags, "</p>");
                      $description_paragraph = substr($description_with_tags, 3, $i-3);
                  ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <img class="card-img-top" src="../../images/<?php echo $product['productCode']; ?>_s.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">
                              <a href="?action=view_product&amp;product_id=<?php
                                      echo $product['productID']; ?>">
                                <?php echo $product['productName']; ?>
                            </a>
                            </h4>

                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo '$' . $list_price; ?></p>
                                </div>
                                <div class="col">

                                  <form action="<?php echo $app_path . 'cart' ?>" method="post">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="product_id"
                                           value="<?php $product_id; ?>">
                                    <input type="submit" class="btn btn-success btn-block" value="Add to Cart">
                                  </form>
                                </div>
                                <br/>
                                  <div id="desc-summary" class="desc-summary">
                                      <p><?php echo $description_paragraph; ?></p>
                                  </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php endforeach; ?>

            </div>
        </div>

    </div>
</div>

<?php include '../../view/footer.php'; ?>