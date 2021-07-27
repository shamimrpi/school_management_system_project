
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
		$registrationFee = \App\Models\FeeCategoryAmount::where('fee_category_id','1')->where('student_class_id',$alldata->student_class_id)->first();
		
	       $originalfee = $registrationFee['amount'];
           $discount = $alldata->discount->discount;
           $discountablefee = $discount/100*$originalfee;
           $finalfee = (float)$originalfee-(float)$discountablefee;

            $exam = \App\Models\ExamType::where('id',$exam_type_id)->first()['name'];
            
	?>

		<h1 style="text-align: center;">Exam Fee Payslip </h1>
		
		 <strong class="text-right">Office Copy</strong>
		<br>
	
	<table style="width:100%">
		<tr>
			<th>Name</th>
			<td>{{$alldata->student->name}}</td>
		</tr>
		<tr>
			<th>ID No.</th>
			<td>{{$alldata->student->id_no}}</td>
		</tr>
		<tr>
			<th>Roll</th>
			<td>{{$alldata->roll}}</td>
		</tr>
		<tr>
			<th>Father's Name</th>
			<td>{{$alldata->student->f_name}}</td>
		</tr>
		<tr>
			<th>Mother's Name</th>
			<td>{{$alldata->student->m_name}}</td>
		</tr>
		<tr>
			<th>Year</th>
			<td>{{$alldata->year->name}}</td>
		</tr>
		<tr>
			<th>Class</th>
			<td>{{$alldata->studentClass->name}}</td>
		</tr>

		<tr>
			<th>Discount Fee</th>
			<td>{{$discountablefee}}%</td>
		</tr>

		<tr>
			<th>Original Fee</th>
			<td>{{$originalfee}}TK</td>
		</tr>
		<tr>
			<th>Payable Fee of {{$exam}}</th>
			<td>{{$finalfee}}TK</td>
		</tr>
	</table>
	<br>
	<br>
	<small>Authority Signature</small>
	<i style="font-size:10px;float: right;">Print Date:{{date('d-M-Y')}}</i>
	
	<br>
	<br>
	<div class="dot_box">
	</div>
	
		<h1 style="text-align: center;">Exam Fee Payslip </h1>
		<strong class="text-right">Student Copy</strong>

	
	<table style="width:100%">
		<tr>
			<th>Name</th>
			<td>{{$alldata->student->name}}</td>
		</tr>
		<tr>
			<th>ID No.</th>
			<td>{{$alldata->student->id_no}}</td>
		</tr>
		<tr>
			<th>Roll</th>
			<td>{{$alldata->roll}}</td>
		</tr>
		<tr>
			<th>Father's Name</th>
			<td>{{$alldata->student->f_name}}</td>
		</tr>
		<tr>
			<th>Mother's Name</th>
			<td>{{$alldata->student->m_name}}</td>
		</tr>
		<tr>
			<th>Year</th>
			<td>{{$alldata->year->name}}</td>
		</tr>
		<tr>
			<th>Class</th>
			<td>{{$alldata->studentClass->name}}</td>
		</tr>

		<tr>
			<th>Discount Fee</th>
			<td>{{$discountablefee}}%</td>
		</tr>

		<tr>
			<th>Original Fee</th>
			<td>{{$originalfee}}TK</td>
		</tr>
		<tr>
			<th>Payable Fee of {{$exam}}</th>
			<td>{{$finalfee}}TK</td>
		</tr>
	</table>
	<br>
	<br>
	<small>Authority Signature</small>
	<i style="font-size:10px;float: right;">Print Date:{{date('d-M-Y')}}</i>
	
</body>
</html>
