
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<h1>3rd Party Comments</h1>
<table id="commentsTable">
	<thead>
		<tr>
			<th>Title</th>
			<th>Body</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Title</th>
			<th>Body</th>
		</tr>
	</tfoot>
</table>

<script type="text/javascript" language="javascript" >
jQuery(document).ready( function () {
    jQuery('#commentsTable').DataTable({
        "processing": true,
        "ajax": 
        {
          url: "http://jsonplaceholder.typicode.com/posts",
          dataSrc: ""
      },
        columns: [ {"data": "title"}, {"data": "body"}]
    });
} );
</script>