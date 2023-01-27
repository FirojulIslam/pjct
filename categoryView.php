<?php include "config/config.php"; ?>
<?php include "lib/Database.php"; ?>
<?php
$db = new Database();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $quarry="SELECT * FROM category WHERE id='$id'";
    $show = $db->select($quarry);
    if ($show) {
        while ($result = $show->fetch_assoc()) {
            $title = $result["category_name"];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>
<body>
  <div class="flex flex-row">
    <div class="bg-green-300">
      <ul>
        <?php
            $quarry="SELECT * FROM product WHERE category_name='$title'";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
                    ?>
                <img src="./admin/upload/<?php echo $result['image']?>" alt="">
                <li><?php echo $result['product_name']?></li>
                <?php
            }
          }
            ?>
      </ul>
    </div>
  </div>
</body>
</html>