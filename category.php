<?php include "header.php"; ?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category=$_POST['name'];
    $quarry = "INSERT INTO category(category_name) VALUES('$category')";
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
    <form action="" method="post">
        <input type="text" name='name'>
        <input type="submit" value="Submit">
    </form>
</div>