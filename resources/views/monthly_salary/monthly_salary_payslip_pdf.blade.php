
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
	<?php
		 $date = date('Y-m',strtotime($data['date']));
	       if($date != ''){
	            $where[] = ['date','like',$date.'%'];
	        }

	     
	       $attendance = \App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$data->employee_id)->get();
         
           $absentCount = count($attendance->where('attendance_status','Absent'));
           $presentCount = count($attendance->where('attendance_status','Present'));
		   $salary           = (float)$data['user']['salary'];
           $salaryPerday     = (float)$salary/30;
           $totalPaySalary   = $presentCount*(float)$salaryPerday;
        
          
	?>

		<h1 style="text-align: center;">Monthly Salary Payslip of  {{$date}};</h1>
		
		<br>
		<br>
	
	<table style="width:100%">
		<tr>
			<th>Name</th>
			<td>{{$data->user->name}}</td>
		</tr>
		<tr>
			<th>ID No.</th>
			<td>{{$data->user->id_no}}</td>
		</tr>
		
		<tr>
			<th>Father's Name</th>
			<td>{{$data->user->f_name}}</td>
		</tr>
		<tr>
			<th>Total Absent</th>
			<td>{{$absentCount}}</td>
		</tr>
		<tr>
			<th>Basic Salary</th>
			<td>{{$data->user->salary}}</td>
		</tr>
		<tr>
			<th>Payable Salary</th>
			<td>{{$totalPaySalary}}</td>
		</tr>

	
		
	</table>
	<br>
	<br>
	<small>Authority Signature</small>
	<i style="font-size:10px;float: right;">Print Date:{{date('d-M-Y')}}</i>
	
	
	
</body>
</html>
