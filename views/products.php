
<?php
global $wpdb;
$table_name = $wpdb->prefix . "my_products";
$products = $wpdb->get_results($wpdb->prepare("SELECT * from $table_name"), ARRAY_A);
?>
<h1>Products</h1>
<table id="productsTable">
	<thead>	
		<tr>
			<th>Product Name</th>
			<th>Product Model</th>
			<th>Product Description</th>
		</tr>
	</thead>
	<tbody>	
		<?php 
		foreach ($products as  $product) {
			print '<tr>
			<td><a href="'.$_SERVER['PHP_SELF'].'?page=addProduct&action=edit&id='.$product['id'].'">'.$product['product_name'].'</a></td>
			<td>'.$product['product_model'].'</td>
			<td>'.$product['product_description'].'</td>
		</tr>';
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th>Product Name</th>
			<th>Product Model</th>
			<th>Product Description</th>
		</tr>
	</tfoot>
</table>

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	
<script type="text/javascript" >
jQuery(document).ready( function () {
    jQuery('#productsTable').DataTable();
});
</script>