<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Weekly Revenue',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Weekly Orders',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));

        chart.draw(data, options);
      }
    </script> -->
<?php include 'inc/nav.php'; ?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Dashboard</h2>
						<!-- <p>You can order products from here</p> -->
            <form name="bwdatesdata" action="" method="post" action="">
  <table width="100%" height="117"  border="0">
<tr>
    <th width="27%" height="63" scope="row">From Date :</th>
    <td width="73%">
<input type="date" name="fdate" class="form-control" id="fdate">
    	</td>
  </tr>
  <tr>
    <th width="27%" height="63" scope="row">To Date :</th>
    <td width="73%">
    	<input type="date" name="tdate" class="form-control" id="tdate"></td>
  </tr>
  <tr>
    <th width="27%" height="63" scope="row">Request Type :</th>
    <td width="73%">
         <input type="radio" name="requesttype" value="mtwise" checked="true">Month wise
          <input type="radio" name="requesttype" value="yrwise">Year wise</td>
  </tr>
<tr>
    <th width="27%" height="63" scope="row"></th>
    <td width="73%">
    <button class="btn-primary btn" type="submit" name="submit">Submit</button>
  </tr>
</table>
     </form>
     <div class="row">
      <div class="col-xs-12">
      	 <?php
      	 if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$rtype=$_POST['requesttype'];
?>
<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
<h4 class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
<hr >
<div class="row">
 <table class="table table-bordered" width="100%"  border="0" style="padding-left:40px">
<thead>
<tr>
<th>Sale No.</th>
<th>Month / Year </th>
<th>Sales</th>
</tr>
</thead>
<?php
$ret=mysqli_query($db,"select month(timestamp) as lmonth,year(timestamp) as lyear,
    orderitems.productprice,orderitems.pquantity from orders 
    join orderitems on (orders.id=orderitems.orderid) WHERE orders.timestamp BETWEEN '$fdate' AND '$tdate'");
$num=mysqli_num_rows($ret);
$ftotal=0;
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
 
?>
<tbody>
<tr>
        <td><?php echo $cnt;?></td>
        <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
        <td><?php  echo $total=$row['productprice']*$row['pquantity'];?></td>
</tr>
<?php
$ftotal+=$total;
$cnt++;
}?>
<tr>
              <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>
                </tr>             
               </tbody>
</table>
<?php } } else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
?>
<h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
        <hr >
<div class="row">
<table class="table table-bordered" width="100%"  border="0" style="padding-left:40px">
<thead>
<tr>
<th>S.NO</th>
<th>Year </th>
<th>Sales</th>
</tr>
</thead>
<?php
// $reqsql = "SELECT month(timestamp) as lmonth,year(timestamp) as lyear, product.price, orderitems.pquantity, FROM orders JOIN product JOIN orderitems ON product.productID=orderitems.productID WHERE date(orders.timestamp) between '$fdate' AND '$tdate' GROUP by lyear";
$ret=mysqli_query($db,"select month(timestamp) as lmonth,year(timestamp) as lyear,
orderitems.productprice,orderitems.pquantity from orders 
join orderitems on (orders.id=orderitems.orderid) WHERE orders.timestamp BETWEEN '$fdate' AND '$tdate'
 ");

$num=mysqli_num_rows($ret);
$ftotal=0;
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
<tbody>
<tr>
<td><?php echo $cnt;?></td>
<td><?php  echo $row['lyear'];?></td>
<td><?php  echo $total=$row['productprice']*$row['pquantity'];?></td>
</tr>
<?php
$ftotal+=$total;
$cnt++;
}?>
<tr>
<td colspan="2" align="center">Total </td>
<td><?php  echo $ftotal;?></td>
</tr>             
 </tbody>
</table>  <?php } } }?>  
</div>
      </div>
    </div>  
  </div>


					</div>
					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart" style="width: 550px; height: 300px"></div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart1" style="width: 550px; height: 300px"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
