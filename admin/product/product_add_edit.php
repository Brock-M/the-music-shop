<?php include '../../view/header.php'; ?>
<?php include '../../view/menu_admin.php'; ?>
<?php
if (isset($product_id)) {
    $heading_text = 'Edit Product';
} else {
    $heading_text = 'Add Product';
}
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Product Manager - <?php echo $heading_text; ?></h1>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12">

            <form action="index.php" method="post" id="add_edit_product_form">

                <?php if (isset($product_id)) : ?>
                    <input type="hidden" name="action" value="update_product" />
                    <input type="hidden" name="product_id"
                           value="<?php echo $product_id; ?>" />
                <?php else: ?>
                    <input type="hidden" name="action" value="add_product" />
                <?php endif; ?>
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>" />

        <div class="form-group">
            <label for="categorySelect">Category:</label>
            <select name="category_id" class="form-control" id="categorySelect">
              <?php foreach ($categories as $category) : 
                if ($category['categoryID'] == $product['categoryID']) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
            ?>
                <option value="<?php echo $category['categoryID']; ?>" <?php
                          echo $selected ?>>                
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
          </div>

        <div class="form-group">
            <label for="codeInput">Code:</label>
            <input type="text" name="code" class="form-control" id="codeInput" value="<?php echo htmlspecialchars(
                       $product['productCode']); ?>">
        </div>

        <div class="form-group">
            <label for="nameInput">Name:</label>
            <input type="text" name="name" class="form-control" id="nameInput" value="<?php echo htmlspecialchars(
                       $product['productName']); ?>">
        </div>

        <div class="form-group">
            <label for="listPriceInput">List Price:</label>
            <input type="text" name="price" class="form-control" id="listPriceInput" value="<?php echo $product['listPrice']; ?>">
        </div>

        <div class="form-group">
            <label for="discountPriceInput">Discount Percent:</label>
            <input type="text" name="discount_percent" class="form-control" id="discountPriceInput" value="<?php echo $product['discountPercent']; ?>">
        </div>

        <div class="form-group">
            <label for="descriptionTextarea">Description:</label>
            <textarea name="description" class="form-control" id="descriptionTextarea" rows="10"><?php echo htmlspecialchars(
                            $product['description']); ?></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Submit">
    
    </form>
            <br/><hr/><br/>
            <div id="formatting_directions">
                <h2>How to format the Description entry</h2>
                <ul>
                    <li>Use two returns to start a new paragraph.</li>
                    <li>Use an asterisk to mark items in a bulleted list.</li>
                    <li>Use one return between items in a bulleted list.</li>
                    <li>Use standard HMTL tags for bold and italics.</li>
                </ul>
            </div>

        </div>
    </div>
</div>

<?php include '../../view/footer.php'; ?>