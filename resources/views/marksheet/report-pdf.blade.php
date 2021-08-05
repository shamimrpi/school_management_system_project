@extends('layouts.master')
@section('content')

  <div class="card-body">
      <div class="card-body">
        <div style="border: 1px solid black; padding: 20px;">
              <h1 style="text-align:center; margin-top: 30px;">SK School</h1>
              <h3 style="text-align:center;">Middle Badda,Dhaka</h3>
              @php

                 $assign_student =  \App\Models\AssignStudent::where('student_class_id',$student_class_id)->where('year_id',$year_id)->first();
               
               
              @endphp
              <br><br>
              <div class="row">
                <div class="col-md-6">
                     <table style="width:100%;border-collapse: collapse" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                            <td>Student ID</td>
                            <td>{{$allMarks['0']['id_no']}}</td>
                        </tr>
                      
                        <tr>
                            <td>Name</td>
                            <td>{{$allMarks['0']['student']['name']}}</td>
                            
                        </tr>
                        <tr>
                            <td>Roll</td>
                             <td>{{$assign_student->roll}}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                             <td>{{$allMarks['0']['studentClass']['name']}}</td>
                        </tr>
                        <tr>
                            <td>Session</td>
                            <td>{{$allMarks['0']['year']['name']}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                       <table style="width:100%; border-collapse: collapse;" border="1" class="text-center">
                            <thead>
                              <tr>
                                <th>Letter Grade</th>
                                <th>Mark Enterval</th>
                                <th>Grade Point</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($allGrades as $mark)
                              <tr>
                                <td>{{$mark->grade_name}}</td>
                                <td>{{$mark->start_marks}}-{{$mark->end_marks}}</td>
                                 <td>{{$mark->grade_point}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                    </table>
                      
                </div>
              </div>
              <br><br>
                  <div class="row">
                    <div class="col-lg-12">
                      <table border="1" cellpadding="1" cellpadding="1" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Full Marks</th>
                                    <th class="text-center">Get Marks</th>
                                    <th class="text-center">Letter  Grade</th>
                                    <th class="text-center">Grade Point</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @php
                                    $total_marks = 0;
                                    $total_point = 0;

                                  @endphp
                                  @foreach($allMarks as $key=> $mark)
                                  @php
                                    $get_marks = $mark->marks;
                                    $total_marks = (float)$total_marks+(float)$get_marks;
                                    $total_subject = \App\Models\StudentMark::where('year_id',$mark->year_id)->where('student_class_id',$mark->student_class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->count();
                                    
                                  @endphp
                                  
                                <tr>
                                  <td class="text-center">{{$key+1}}</td>
                                  <td class="text-center">{{$mark['assign_subject']['subject']['name']}}</td>
                                  <td class="text-center">{{$mark['assign_subject']['full_mark']}}</td>
                                  <td class="text-center">{{$get_marks}}</td>

                                  @php
                                    $grade_marks = \App\Models\MarksGrade::where([['start_marks','<=',(int)$get_marks],['end_marks','>=',(int)$get_marks]])->first();
                                      $grade_name = $grade_marks->grade_name;
                                      $grade_point = number_format((float)$grade_marks->grade_point,2);
                                      $total_point = (float)$total_point + (float)$grade_point; 
                                  @endphp
                                   <td class="text-center">{{$grade_point}}</td>
                                  <td class="text-center">{{$grade_name}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td colspan="3" style="padding-left: 70px;"><strong>Total Marks =</strong></td>
                                  <td colspan="3" style="padding-left: 90px">{{$total_marks}}</td>
                                </tr>
                              </tbody>
                      </table>
                      
                    </div>
                  </div>
                  <br><br>
                <div class="row">
                  <div class="col-lg-12">
                    <table border="1" cellpadding="1" cellpadding="1" width="100%">
                         <tbody>
                            @php
                              $total_grade = 0;
                              $point_for_leter_grade = (float)$total_point/(float)$total_subject;

                                
                              $total_grade = \App\Models\MarksGrade::where([['start_point','<=',$point_for_leter_grade],['end_point','>=',$point_for_leter_grade]])->first();
                               

                              
                                $grade_point_average = (float)$total_point/(float)$total_subject; 

                            @endphp
                            <tr>
                                <td width="50%" class="text-center">Grade Point Average</td>
                                <td width="50%" class="text-center">
                                  
                                  {{number_format((float)$grade_point_average,2)}}
                                  
                                </td>
                            </tr>
                             <tr>
                                <td width="50%" class="text-center">Letter Grade</td>
                                <td width="50%" class="text-center">
                                 
                                  {{$total_grade->grade_name}}
                                 
                                </td>
                            </tr>
                             <tr>
                                <td width="50%" class="text-center">Remarks</td>
                                <td width="50%" class="text-center">
                                 
                                  {{$total_grade->remarks}}
                                 
                                </td>
                            </tr>
                         </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
             </div>
              
      
               
   </div>

@endsection