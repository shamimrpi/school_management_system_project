@extends('layouts.master')
@section('content')

<html>
<head>
	<meta charset="utf-8">
	<title>Student Detail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
		.container{
			width: 70%;
			margin: 0 auto;
			background: #eee;
			border: 1px solid green;
		}
		.table_over{
			margin-top: 100px;
		}
		tr{
			border: 1px solid #848383;
			color: gray;
			font-size: 22px;
		}
		td{
			border: 1px solid #848383;
			padding: 3px;
			margin: 10px;
		}
		
		.heading{
			position: relative;
			width: 100%;
			text-align: center;

		}
		.box{
			float: left;
			margin: 0;
			padding: 10px;
			width: 30%;
		}

	</style>

	<div class="container">
		<div class="table_over">

		</div>
		<div class="heading">
			<div class="box">
				<img src="{{(!empty($all_data->student->image))?url('upload/studentImage/'.$all_data->student->image):''}}" style="height: 100px;width: 100px">
			</div>
			<div class="box">
				<h1>Sk School </h1>
				<h3>Dhaka,Mohakhali,1212</h3>
				<p>Mobile:963434734</p>
				<p>Gmail:sample@gmail.com</p>
			</div>
			<div class="box">
				<img src="{{(!empty($all_data->student->image))?url('upload/studentImage/'.$all_data->student->image):''}}" style="height: 100px;width: 100px">
			</div>
		</div>

	
		<table id="example1" width="100%" class="table table-bordered table-striped">
			<thead></thead>
			<tr>
				<th style="text-align: right;padding-right: 50px;">Student Name</th>
				<th style="text-align: left;">{{$all_data->student->name}}</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th style="text-align: right;right;padding-right: 50px;">student Father Name</th>
				<th style="text-align: left;">{{$all_data->student->f_name}}</th>
			</tr>
			<tr>
				<th style="text-align: right;right;padding-right: 50px;">student Father Name</th>
				<th style="text-align: left;">{{$all_data->student->m_name}}</th>
			</tr>
			<tr>
				<th style="text-align: right;padding-right: 50px;">Class Name</th>
				<th style="text-align: left;">{{$all_data->studentClass->name}}</th>
			</tr>
			<tr>
				<th style="text-align: right;right;padding-right: 50px;">Mobile Number</th>
				<th style="text-align: left;">{{$all_data->student->mobile}}</th>
			</tr>

			<tr>
				<th style="text-align: right;right;padding-right: 50px;">Gender</th>
				<th style="text-align: left;">{{$all_data->student->gender->name}}</th>
			</tr>

			<tr>
				<th style="text-align: right;right;padding-right: 50px;">Religion</th>
				<th style="text-align: left;">{{(@$all_data->student->religion->name != NULL)?$all_data->student->religion->name:'' }}</th>
			</tr>

			<tr>
				<th style="text-align: right;right;padding-right: 50px;">Shift</th>
				<th style="text-align: left;">{{(@$all_data->shift->name != NULL)?$all_data->shift->name:'' }}</th>
			</tr>

			<tr>
				<th style="text-align: right;right;padding-right: 50px;">Group</th>
				<th style="text-align: left;">{{(@$all_data->group->name != NULL)?$all_data->group->name:'' }}</th>
			</tr>
			<tr>
				<th style="text-align: right;right;padding-right: 50px;">Year</th>
				<th style="text-align: left;">{{(@$all_data->year->name != NULL)?$all_data->year->name:'' }}</th>
			</tr>
			</tbody>
		</table>
		<div class="heading" style="margin-top:100px">
		</div>
	</div>

@endsection