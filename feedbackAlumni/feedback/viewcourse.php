<?php
include("header.php");
include("sidebar.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM `course` where course_id  ='".$_GET['delid']."' ";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Course record deleted successfully...');</script>";
		echo "<script>window.location='viewcourse.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>
<style>
	
    .card-header{
        background-color:#9b2928;
        color:white;
    }
   
	.card-title{
		text-transform: uppercase;
		font-weight: bold;
	}
	.btn-info {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
	display:flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
     .btn-info:hover{
         background-color:#630606;
          border-color:#630606;
     }
	 .btn-danger {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
	display:flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
     .btn-danger:hover{
         background-color:#630606;
          border-color:#630606;
     }
	 th{
        color:#9b2928;
        /* display:flex;
        flex-direction:row */
        align-items: center;
        justify-content:center;
    }
    .table th {
        background-color:#FFC4C4;
        text-align:center;
    }
     .table td {
        background-color:#FFECEC;
        text-align:center;
    }
    .table-bordered td, .table-bordered th {
    border: 1px solid #9b2928;
}
.table{
    /* /vertical-align: bottom;/ */
    border: 2px solid #9b2928;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #9b2928;
}
@media (max-width:350px) and (min-width:300px){
    	    .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}
	    .table{
	        display: block;
      max-width: -moz-fit-content;
      max-width: fit-content;
      margin: 0 auto;
      overflow-x: auto;
      white-space: nowrap;
	    }
	    .table thead th {
    vertical-align: middle;
        text-align: center;
    border-bottom: 1px solid #9b2928;
    font-size: 12px;
}
.table td {
    text-align: center;
    font-size: 12px;
}
.btn-info {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
}
.btn-danger {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
    /* padding: 9px;
    margin: 5px; */
}
	}
		@media (max-width:400px) and (min-width:350px){
    	    .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}
	    .table{
	        display: block;
      max-width: -moz-fit-content;
      max-width: fit-content;
      margin: 0 auto;
      overflow-x: auto;
      white-space: nowrap;
	    }
	    .table thead th {
    vertical-align: middle;
        text-align: center;
    border-bottom: 1px solid #9b2928;
    font-size: 12px;
}
.table td {
    text-align: center;
    font-size: 12px;
}
.btn-info {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
}
.btn-danger {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
    /* padding: 9px;
    margin: 5px; */
}
	}
	@media (max-width:645px) and (min-width:400px){
    	    .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}
	    .table{
	         display: block;
      max-width: -moz-fit-content;
      max-width: fit-content;
      margin: 0 auto;
      overflow-x: auto;
      white-space: nowrap;
	    }
	    .table thead th {
    vertical-align: middle;
        text-align: center;
    border-bottom: 1px solid #9b2928;
    font-size: 12px;
}
.table td {
    text-align: center;
    font-size: 12px;
}
.btn-info {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
}
.btn-danger {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
    /* padding: 9px;
    margin: 5px; */
}
	}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<br>
    <!-- Main content -->
    <section class="content">
<form method="post" action="">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">View Course record</h3>
        </div>
        <div class="card-body">
<table id="myTable"  class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Course title</th>
			<th>Course description</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM course ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
				<td>$rs[course_title]</td>
				<td>$rs[course_description]</td>
				<td>$rs[course_status]</td>
				<td><a href='course.php?editid=$rs[0]' class='btn btn-info'>Edit</a> <br> <a href='viewcourse.php?delid=$rs[0]' onclick='return validatedel()'  class='btn btn-danger' >Delete</a></td>
			</tr>";
	}
	?>
	</tbody>
</table>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->
</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include("footer.php");
?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
<script src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
function validatedel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>