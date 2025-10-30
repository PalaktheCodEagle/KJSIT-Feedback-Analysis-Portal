<?php
include("header.php");
include("sidebar.php");
?>
<style>
    .bs-example{
    	margin: 20px;
    }
	.card-title{
		font-weight: bolder;
		color:white;
		text-transform: uppercase;
	}
	.card-header{
		background-color: #9b2928;
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
.btn-primary {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
}
.btn-primary:hover {
    color: #fff;
    background-color: #630606;
    border-color: #630606;
    box-shadow: none;
}
.btn-warning {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
}
.btn-warning:hover {
	color: #fff;
    background-color: #630606;
    border-color: #630606;
    box-shadow: none;
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
.btn-primary {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
}
.btn-warning {
    color: #fff;
    background-color: #9b2928;
    border-color:#9b2928;
    box-shadow: none;
    font-size: 10px;
    padding: 9px;
    margin: 5px;
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
.btn-primary {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
}
.btn-warning {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
    padding: 9px;
    margin: 5px;
}
	}
	@media (max-width:635px) and (min-width:400px){
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
    background-color:#9b2928;
    border-color: #9b2928;
    box-shadow: none;
    font-size: 10px;
    padding: 9px;
    margin: 5px;
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
          <h3 class="card-title">View Feedback Questions</h3>
        </div>
        <div class="card-body">
<table id="example"  class="table table-striped table-bordered" >
	<thead>
		<tr>			
		
			<th>Feedback Topic</th>
			<th>Published On</th>
			<th>Status</th>
			<th>No. of Questions</th>
			<th>Action</th>
			<th>Report</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM feedbacktopic WHERE feedbacktopicid!='0' ";
	if($_GET['qtype'] == "All")
	{
		$sql = $sql . " AND feedbacktopic_status='Approved'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	$img="";
	while($rs = mysqli_fetch_array($qsql))
	{
if(file_exists("imgfeedback_icon/".$rs['feedback_icon']))
{
	$img = "imgfeedback_icon/".$rs['feedback_icon'];
}
else
{
		$img = "images/defaultimageicon.png";
}
		echo "<tr>";
	//	echo "<td>";
//echo "<img src='$img' style='width: 100px;height:70px;'>";
	//	echo "</td>";

		echo "<td>$rs[feedback_topic]</td>";
		echo "<td>" . date("d-M-Y",strtotime($rs['feedbacktopic_date'])) ."<br>". date("h:i A",strtotime($rs['feedbacktopic_date'])) . "</td>";
		echo "<td>$rs[feedbacktopic_status]</td>";
?>
		<td style='width:70px;'>
		<center>
		<?php
			$sqlqz ="SELECT * FROM feedbackquestion WHERE feedbacktopicid='$rs[0]'";
			$qsqlqz  = mysqli_query($con,$sqlqz);
			echo mysqli_num_rows($qsqlqz);
		?>
		</a></center>
		</td>
<?php
		echo "<td>
		<a href='feedbacktopicadmin.php?feedbacktopicid=$rs[0]' class='btn btn-primary'  >Edit</a>
		</td>";

		echo "<td>
		<a href='viewfeedbackreport.php?feedbacktopicid=$rs[0]' class='btn btn-warning'  >Report</a>
		</td>";

		echo "</tr>";
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="iexampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="idocspaper"></div>
    </div>
  </div>
</div>
<script>
function funloadtestseries(feedbacktopicid,qpaper_title)
{
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
	{
      if (this.readyState == 4 && this.status == 200) 
	  {
		document.getElementById("iexampleModalLabel").innerHTML = qpaper_title;
		document.getElementById("idocspaper").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","ajaxtestserieslist.php?feedbacktopicid="+feedbacktopicid,true);
    xmlhttp.send();
	return false;
}
</script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    // $('#example thead tr').clone(true).appendTo( '#example thead' );
    // $('#example thead tr:eq(0) th').each( function (i) {
	// 	if( i ==  0)
	// 	{
	// 		var title = $(this).text();
	// 		$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
	 
	// 		$( 'input', this ).on( 'keyup change', function () {
	// 			if ( table.column(i).search() !== this.value ) {
	// 				table
	// 					.column(i)
	// 					.search( this.value )
	// 					.draw();
	// 			}
	// 		} );
	// 	}
	// 	else
	// 	{
			
	// 		var title = $(this).text();
	// 		$(this).html( '' );
	 
	// 		$( 'input', this ).on( 'keyup change', function () {
	// 			if ( table.column(i).search() !== this.value ) {
	// 				table
	// 					.column(i)
	// 					.search( this.value )
	// 					.draw();
	// 			}
	// 		} );
	// 	}
    // } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>



<!-- <script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script> -->