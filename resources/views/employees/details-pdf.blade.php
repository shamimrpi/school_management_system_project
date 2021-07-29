
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		.box{
			width: 100%;
			margin: 0 auto;
			background: #eee;
			border: 1px solid green;
		}
		.table_over{
			margin-top: 100px;
		}
		table{
			border-collapse: collapse;
			margin: 0 auto;
		}
		th,td{
			border: 1px dotted #848383;
			color: gray;
			font-size: 15px;
			padding: 5px;
			text-align: left;
			padding-left: 20px;
		}
		.text-right{
			text-align: right;
		}
		.dot_box{
			width: 100%;
			height: 0px;
			border-bottom: 1px dotted gray;
		}

	</style>
</head>
<body>
	

		<h1 style="text-align: center;">Employee Details</h1>
		
	
		<br>
	
	<table style="width:100%">
		<tr>
			<th>Name</th>
			<td>{{$employee->name}}</td>
		</tr>
		<tr>
			<th>Father's Name</th>
			<td>{{$employee->f_name}}</td>
		</tr>
		<tr>
			<th>Mother's Name</th>
			<td>{{$employee->m_name}}</td>
		</tr>
		<tr>
			<th>Designation</th>
			<td>{{$employee['designation']['name']}}</td>
		</tr>
		<tr>
			<th>ID NO.</th>
			<td>{{$employee->id_no}}</td>
		</tr>
		<tr>
			<th>Join Date</th>
			<td>{{$employee->join_date}}</td>
		</tr>
		<tr>
			<th>Date Of Birth</th>
			<td>{{$employee->dob}}</td>
		</tr>
		<tr>
			<th>Salary</th>
			<td>{{$employee->salary}}</td>
		</tr>
	
		<tr>
			<th>Address</th>
			<td>{{$employee->address}}</td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td>{{$employee->mobile}}</td>
		</tr>

		<tr>
			<th>Gender</th>
			<td>{{$employee->gender->name}}</td>
		</tr>

		
	</table>
	<br>
	<br>
	<small>Authority Signature</small>
	<i style="font-size:10px;float: right;">Print Date:{{date('d-M-Y')}}</i>
	
	
	
</body>
</html>
