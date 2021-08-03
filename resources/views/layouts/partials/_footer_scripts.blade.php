<!-- jQuery -->
<script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/dist/js/adminlte.min.js"></script>


<!-- data table -->
<script src="{{asset('admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('admin')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('admin')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('admin')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- sweet alert -->
<script src="{{asset('js')}}/sweetalert.min.js"></script>
<script src="{{asset('js')}}/notify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.min.js"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script src="{{asset('admin')}}/dist/js/jquery.validate.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
     // image show javascript
     $("#imgload").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myForm").validate({
          rules:{
            "fee_category_id":{
              required: true,
            },
            "student_class_id[]":{
              required: true,
            },
            "amount[]":{
              required: true,
            }
          },
          messages:{

          },
          errorElement:'span',
          errorPlacement:function(error,element){
            error:addClass('invalid-feedback');
            element:closest('.form-group').append(errpr);
          },
          hightlight:function(element,errorClass,validClass){
            element:addClass('is-invalid')
          }
          unhightlight:function(element,errorClass,validClass){
            element:removeClass('is-invalid')
          }
          

         });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myRollGenerateForm").validate({
          rules:{
            "roll[]":{
              required: true
          
          },
          messages:{

          },
          errorElement:'span',
          errorPlacement:function(error,element){
            error:addClass('invalid-feedback');
            element:closest('.form-group').append(errpr);
          },
          highlight:function(element,errorClass,validClass){
            element:addClass('is-invalid')
          }
           unhighlight:function(element,errorClass,validClass){
            element:addClass('is-invalid')
          }
          

         });
  })
</script>
<script>
  $(function () {
  	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(".sa-delete").on('click',function(){
    	let form_id = $(this).data("form-id");
    	swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$('#'+form_id).submit();
			  	
			  }
			});
    	});

    

    var counter = 0;
        $(document).on("click",".addeventmore",function(){
          var whole_extra_item_add = $("#whole_extra_item_add").html();
          $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });

         $(document).on("click",".removeeventmore",function(event){
          
          $(this).closest("#delete_whole_extra_item_add").remove();
            counter-=1;
        });
      
      
         
  });
</script>


<script type="text/javascript">

  $(document).on("click","#search",function(){
    var year_id = $("#year_id").val();
    var student_class_id = $("#student_class_id").val();
    if(year_id == ''){
      $.notify("Year Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(student_class_id == ''){
      $.notify("Class Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
  
    $.ajax({
        url:"{{route('student.roll.gen.get_student')}}",
        type: "GET",
        data:{'year_id':year_id,'student_class_id':student_class_id},
        success:function(data){
          $('#roll-generat').removeClass('d-none');
          var html = '';
          $.each(data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student.id+'" <td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.f_name+'</td>'+
            '<td><input type="number" required="" name="roll[]" class="form-controll sm-form-controll" value="'+v.roll+'" <td>'+
            '</tr>';
          });
            html = $('#roll-generate-tr').html(html);
        }
    });


  });
</script>
 <script type="text/javascript">
   // registration fee javascript
   $(document).on("click","#roll_reg_search",function(){
    var year_id = $("#year_id").val();
    var student_class_id = $("#student_class_id").val();
    if(year_id == ''){
      $.notify("Year Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(student_class_id == ''){
      $.notify("Class Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
  
    $.ajax({
        url:"{{route('student.reg.fee.getStudent')}}",
        type: "GET",
        data:{'year_id':year_id,'student_class_id':student_class_id},
        beforeSend:function(data){

        },
        success:function(data){
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $("#DocumentResults").html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
    });


  });
 </script>

  <script type="text/javascript">
   // Monthly fee javascript
   $(document).on("click","#month_search",function(){
    var year_id = $("#year_id").val();
    var student_class_id = $("#student_class_id").val();
    var month = $("#month").val();
    if(year_id == ''){
      $.notify("Year Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(student_class_id == ''){
      $.notify("Class Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(month == ''){
      $.notify("Month Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
  
    $.ajax({
        url:"{{route('student.monthly.fee.getStudent')}}",
        type: "GET",
        data:{'year_id':year_id,'student_class_id':student_class_id,'month':month},
        beforeSend:function(data){

        },
        success:function(data){
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $("#DocumentResults").html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
    });


  });
 </script>


  <script type="text/javascript">
   // Exam fee javascript
   $(document).on("click","#exam_search",function(){
    var year_id = $("#year_id").val();
    var student_class_id = $("#student_class_id").val();
    var exam_type_id = $("#exam_type_id").val();
    if(year_id == ''){
      $.notify("Year Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(student_class_id == ''){
      $.notify("Class Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(exam_type_id == ''){
      $.notify("Exam Type Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
  
    $.ajax({
        url:"{{route('student.exam.fee.getStudent')}}",
        type: "GET",
        data:{'year_id':year_id,'student_class_id':student_class_id,'exam_type_id':exam_type_id},
        beforeSend:function(data){

        },
        success:function(data){
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $("#DocumentResults").html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
    });


  });
 </script>


<script type="text/javascript">
  //  monthly attendance javascript
  $(document).on("click","#month_attendance",function(){
    var employee_id = $("#employee_id").val();
    var date = $("#date").val();
    if(employee_id == ''){
      $.notify("Employee Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
     if(date == ''){
      $.notify("Date Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
   


    $.ajax({
        url:"{{route('monthly.attendance')}}",
        type: "GET",
        data:{'employee_id':employee_id,'date':date},
        success:function(data){
          $('#attendance-row').removeClass('d-none');
          var html = '';
          $.each(data, function(key, v){
            var key = key+1;
            html +=
            '<tr>'+
              '<td>'+key+'</td>'+
              '<td>'+v.user.name+'</td>'+
              '<td>'+v.date+'</td>'+
              '<td>'+v.attendance_status+'</td>'+
              
            '</tr>';
          });
            html = $('#attendance_row').html(html);
        }
    });


  });
</script>

<script type="text/javascript">
  //  monthly Salary javascript
  $(document).on("click","#montly_salary",function(){
    var date = $("#date").val();
   
     if(date == ''){
      $.notify("Date Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
   


      $.ajax({
        url:"{{route('monthly.salary.get')}}",
        type: "GET",
        data:{'date':date},
        beforeSend:function(data){

        },
        success:function(data){
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $("#DocumentResults").html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
    });


  });
</script>

<script type="text/javascript">
  // marks entry javascript
  $(document).on("click","#getMark",function(){
    var year_id = $("#year_id").val();
    var student_class_id = $("#student_class_id").val();
    var assign_subject_id = $("#assign_subject_id").val();
    var exam_type_id = $("#exam_type_id").val();

    if(year_id == ''){
      $.notify("Year Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(student_class_id == ''){
      $.notify("Class Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
      if(assign_subject_id == ''){
      $.notify("Assing Subject Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(exam_type_id == ''){
      $.notify("Exam Type Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
  
    $.ajax({
        url:"{{route('get.student.mark')}}",
        type: "GET",
        data:{'year_id':year_id,'student_class_id':student_class_id},
        success:function(data){
          $('#roll-generat').removeClass('d-none');
          var html = '';
          $.each(data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student.id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.f_name+'</td>'+
            '<td><input type="number" required="" name="marks[]" class="form-controll sm-form-controll" value="" <td>'+
            '</tr>';
          });
            html = $('#roll-generate-tr').html(html);
        }
    });


  });
</script>

<script type="text/javascript">
  // marks entry javascript
  $(document).on("click","#getEdit",function(){
    var year_id = $("#year_id").val();
    var student_class_id = $("#student_class_id").val();
    var assign_subject_id = $("#assign_subject_id").val();
    var exam_type_id = $("#exam_type_id").val();

    if(year_id == ''){
      $.notify("Year Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(student_class_id == ''){
      $.notify("Class Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
      if(assign_subject_id == ''){
      $.notify("Assing Subject Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
    if(exam_type_id == ''){
      $.notify("Exam Type Required",{golbalPosition:'top right',className:'error'});
      return false;
    }
  
    $.ajax({
        url:"{{route('get.edit.student.mark')}}",
        type: "GET",
        data:{'year_id':year_id,'student_class_id':student_class_id,'assign_subject_id':assign_subject_id,'exam_type_id':exam_type_id},
        success:function(data){
          $('#roll-generat').removeClass('d-none');
          var html = '';
          $.each(data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student.id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.f_name+'</td>'+
            '<td><input type="number" required="" name="marks[]" class="form-controll sm-form-controll" value="'+v.marks+'" <td>'+
            '</tr>';
          });
            html = $('#roll-generate-tr').html(html);
        }
    });


  });
</script>
<script type="text/javascript">
  //  Get Subject Javascript
  $(document).on("change","#student_class_id",function(){
    var student_class_id = $("#student_class_id").val();
    
      $.ajax({
        url:"{{route('get.subject')}}",
        type: "GET",
        data:{student_class_id:student_class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each(data,function(key,v){
            html += '<option value="'+v.id+'">'+v.subject.name+' </option>';
          });
          $("#assign_subject_id").html(html);
        }
    });


  });
</script>
<script type="text/javascript">
$(document).ready(function () {
 
 
 
$('#studentForm').validate({ // initialize the plugin
 
    rules: {
 
        name: {
 
            required: true
 
        },
 
        f_name: {
 
            required: true
 
 
        },
 
        m_name: {
 
            required: true,
 
 
        },
        mobile: {
 
            required: true,
            digits: true
 
 
        },
          religion_id: {
 
            required: true,
 
 
        },
        address: {
 
            required: true,
 
 
        },
        gender_id: {
 
            required: true,
 
 
        },
        join_date: {
 
            required: true,
            date:true,
 
 
        },
         dob: {
 
            required: true,
             date:true,
 
 
        },
        designation_id: {
 
            required: true,
 
 
        },
        salary: {
 
            required: true,
             digits: true
 
        },

    
    
 
    }

 
});
 
});
 
</script>

@stack('scripts')