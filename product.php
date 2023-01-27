<?php include "header.php"; ?>
<?php
$quarry="SELECT * FROM category ORDER BY category_name ASC";
$show = $db->select($quarry);
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name=$_POST['product_name'];
    $category_name=$_POST['category_name'];
    $file_name = $_FILES['img']['name'];
    $file_size = $_FILES['img']['size'];
    $file_temp = $_FILES['img']['tmp_name'];
        
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "upload/" . $unique_image;
    move_uploaded_file($file_temp, $uploaded_image);
    $quarry = "INSERT INTO product(product_name,category_name,image) VALUES('$product_name','$category_name','$unique_image')";
    $data = $db->insert($quarry);
    if ($data) {
        echo "submit";
    }
    else {
        echo "faild";
    }
}
?>
<div class="">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="product_name">
        <select name="category_name" id="">
            <?php
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
            <option value="<?php echo $result['category_name']?>"><?php echo $result['category_name']?></option>
            <?php
                }
            }
            ?>
        </select>
        <input type="file" name="img">
        <input type="submit" value="submit">
    </form>
</div>