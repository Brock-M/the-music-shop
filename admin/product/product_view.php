<?php include '../../view/header.php'; ?>
<?php include '../../view/menu_admin.php'; ?>

<section class="jumbotron text-center">
        <div class="container">
            
            <!-- display buttons -->
    <div class="last_paragraph">
        <form action="." method="post" id="edit_button_form">
            <input type="hidden" name="action" value="show_add_edit_form"/>
            <input type="hidden" name="product_id"
                   value="<?php echo $product['productID']; ?>" />
            <input type="hidden" name="category_id"
                   value="<?php echo $product['categoryID']; ?>" />
            <input type="submit" value="Edit Product" />
        </form>
        <br/>
        <form action="." method="post" >
            <input type="hidden" name="action" value="delete_product"/>
            <input type="hidden" name="product_id"
                   value="<?php echo $product['productID']; ?>" />
            <input type="hidden" name="category_id" 
                   value="<?php echo $product['categoryID']; ?>" />
            <input type="submit" value="Delete Product"/>
        </form>
    </div>
  
        </div>
    </section>

<?php
    // Parse data
    $category_id = $product['categoryID'];
    $product_code = $product['productCode'];
    $product_name = $product['productName'];
    $description = $product['description'];
    $list_price = $product['listPrice'];
    $discount_percent = $product['discountPercent'];

    // Add HMTL tags to the description
    $description_tags = add_tags($description);

    // Calculate discounts
    $discount_amount = round($list_price * ($discount_percent / 100), 2);
    $unit_price = $list_price - $discount_amount;

    // Format discounts
    $discount_percent_f = number_format($discount_percent, 0);
    $discount_amount_f = number_format($discount_amount, 2);
    $unit_price_f = number_format($unit_price, 2);

    // Get image URL and alternate text
    $image_filename = $product_code . '_m.png';
    $image_path = $app_path . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?php echo $product_name; ?></h1>
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
            <!--<div class="card bg-light mb-3">
              
                <div class="card-header bg-success text-white text-uppercase">Featured Product</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff" />
                    <h5 class="card-title"><?php echo $category['categoryName']; ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="bloc_left_price">99.00 $</p>
                </div>

            </div>-->
        </div>

        

        <div class="col">
            <div class="row">
                
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <img class="card-img-top" src="../../images/<?php echo $product['productCode']; ?>_s.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">
                              <a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>"><?php echo $product['productName']; ?> </a></h4>

                            <div class="row">
                                <div class="col">
                                    <p><b>List Price:</b>
                                    <?php echo '$' . $list_price; ?></p>
                                    <!--<p class="btn btn-danger btn-block"><?php echo $product['list_price']; ?></p>-->
                                    <p><b>Discount:</b>
                                        <?php echo $discount_percent_f . '%'; ?></p>
                                    <p><b>Your Price:</b>
                                        <?php echo '$' . $unit_price_f; ?>
                                        (You save <?php echo '$' . $discount_amount_f; ?>)</p>
                                
                                    <form action="<?php echo $app_path . 'cart' ?>" method="post">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="product_id" value="<?php $product_id; ?>">

                                    <b>Quantity:</b>
                                    <input type="text" name="quantity" value="1" size="2">
                                    <br/><br/>
                                    <input class="btn btn-primary" type="submit" value="Add to Cart">
                                    <br/><br/>

                                  </form>

                                  <h2 class="no_bottom_margin">Description</h2>
                                        <?php echo $description_tags; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
</body>

<?php include '../../view/footer.php'; 