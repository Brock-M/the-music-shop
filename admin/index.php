<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:../login');
}
?>
<?php  include '../util/main.php'; ?>
<?php  include '../view/header.php'; ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Website Manager</h1>
        <p>Welcome <?php echo $_SESSION['username']; ?></p>
        <p class="lead text-muted mb-0">Admin tools:</p>
        <br/>
        <span class="btn btn-light"><a href="product">Product Manager</a></span>
        <span class="btn btn-light"><a href="category">Category Manager</a></span>
    </div>
</section>

<?php include '../view/footer.php'; ?>
