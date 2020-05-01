
<link rel="stylesheet" type="text/css" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


<?php
global $wpdb;
$msg = '';
$table_name = $wpdb->prefix . "my_products";

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";

$row_details = $wpdb->get_row(
        $wpdb->prepare(
                "SELECT * from $table_name WHERE id = %d", $id
        ), ARRAY_A
);


if (isset($_POST['saveButton'])) {

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";
    $id = isset($_GET['id']) ? intval($_GET['id']) : "";

    if (!empty($action)) {
        $wpdb->update($table_name, array(
            "product_name" => htmlspecialchars(trim($_POST['product_name'])),
            "product_model" => htmlspecialchars(trim($_POST['product_model'])),
            "product_description" => htmlspecialchars(trim($_POST['product_description']))
                ), array(
            "id" => $id
        ));

        $msg = "Product data updated successfully.";
        print '<script>document.location="'.$_SERVER['PHP_SELF'].'?page=products";</script>';


    } else {

        $wpdb->insert($table_name, array(
            "product_name" => htmlspecialchars(trim($_POST['product_name'])),
            "product_model" => htmlspecialchars(trim($_POST['product_model'])),
            "product_description" => htmlspecialchars(trim($_POST['product_description']))
        ));

		$msg = ($wpdb->insert_id > 0) ? "Product data saved successfully." : "Failed to save data";
    }
}
?>
<h1>Add Product</h1>
<p><?php echo $msg; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF'].'?page=addProduct'; if (!empty($action)) { echo '&action=edit&id=' . $id; } ?>" method="post">
    
  <div class="form-group">
    <label for="productName">Product name</label>
    <input id="productName" type="text" name="product_name" class="form-control" value="<?php echo isset($row_details['product_name']) ? $row_details['product_name'] : ""; ?>" placeholder="Enter product name"/>
  </div>
  <div class="form-group">
    <label for="productModel">Product Model</label>
    <input id="productModel" type="text" name="product_model" class="form-control" value="<?php echo isset($row_details['product_model']) ? $row_details['product_model'] : ""; ?>" placeholder="Enter product model"/>
  </div>
  <div class="form-group">
    <label for="productDescription">Product Description</label>
    <input id="productDescription" type="text" name="product_description" class="form-control" value="<?php echo isset($row_details['product_description']) ? $row_details['product_description'] : ""; ?>" placeholder="Enter product description"/>
  </div>
  <button type="submit" name="saveButton" class="btn btn-primary">Save</button>
</form>