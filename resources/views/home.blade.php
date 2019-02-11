@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/styles/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@if($errors->has('token_error'))
<div class="alert alert-danger alert-dismissible" role="alert">
   <span class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
   <strong>Error!</strong> {{ $errors->first('token_error') }}
</div>
@endif
<div class="row ProjectHeader">
   <section class="col-sm-4">
      <div class="selectProj">
         <div class="custom-select11">
            <select name="tool_id" id="toolId" class="form-control">
               <option value="0">Select Screening Tool Type</option>
               @foreach($tools as $tool)
                    <option value="{{ $tool->id }}" @if($tool_id == $tool->id) selected @endif @if(!in_array($tool->id, [1, 2, 3, 4, 5] )) disabled @endif>{{ $tool->name }}</option>
               @endforeach
            </select>
         </div>
      </div>
   </section>
   <section class="col-sm-8">
      <div class="actionBtns">
         <div class="divsharedp">
            <a href="#" class="sharedp">Project Dashboard</a>
         </div>
         <div class="divaddp">
            <a href="{{ route('project.add-project') }}" class="addpbtn">Add new Project</a>
         </div>
      </div>
   </section>
</div>
<div class="row ProjectTable">
   <section class="col-sm-12">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
         <thead>
            <tr>
               <th>Type of Assessment</th>
               <th>Country</th>
               <th>Project Title</th>
               <th>Assessment Completed By</th>
               <th>Last Saved</th>
               {{-- <th style="display:none">Id</th> --}}
               <th class="no-sort">Operations</th>
            </tr>
         </thead>
         <tbody >
            <tr style="height:60px">
               <td colspan="6"></td>
            </tr>
         </tbody>
      </table>
   </section>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/scripts/moment.min.js') }}"></script>
<script src="{{ asset('assets/scripts/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/scripts/datetime-moment.js') }}"></script>

<script>
   $(document).ready(function(){
    $.fn.dataTable.moment( 'MMM D, YYYY' );
       var d = $('#example').DataTable({
           processing: true,
           language: {
               processing: "<img src='{{asset('assets/images/loading.gif')}}'>"
           },
           searching: false, 
           serverSide: true,
           paging: true,
           pageLength: 10,
           bInfo : false,
           ordering: true,
           order: [[ 4, "desc" ]],
           ajax: "{{ url('/project/ajax/'.$tool_id) }}",
           columns: [
               {data: 'tool', name: 'tool'},
               {data: 'countries', name: 'countries'},
               {data: 'name', name: 'name'},
               {data: 'assessment_completed_by', name: 'assessment_completed_by'},
               {data: 'updated_at', name: 'updated_at'},
               //{data: 'id', name: 'id'},
               {data: 'action', name: 'action', orderable: false, searchable: false}
           ]
       });
       //d.column(5).visible(false);

       $('#toolId').change(function(){
           var filter_value = $(this).val();
           var new_url = "{{ url('/project/ajax') }}/"+filter_value;
           d.ajax.url(new_url).load();
       });
   
       $('.close').click(function(){
           $(".alert").css("display", "none");
       });
   })
   
</script>
@endsection