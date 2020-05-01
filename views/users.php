
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<h1>3rd Party Users</h1>
<table id="usersTable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
		</tr>
	</tfoot>
</table>

<script type="text/javascript" language="javascript" >
jQuery(document).ready( function () {
    jQuery('#usersTable').DataTable({
        "processing": true,
        "ajax": 
        {
          url: "http://jsonplaceholder.typicode.com/users",
          dataSrc: ""
      },
        columns: [ {"data": "name"}, {"data": "username"}, {"data": "email"}]
    });
} );
</script>