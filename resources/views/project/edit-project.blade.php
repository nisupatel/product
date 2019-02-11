@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/styles/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
@endsection
@section('backBtn')
    <a href="javascript:history.go(-1)"><img src="{{ asset('assets/images/back.png') }}"></a>
@endsection
@section('content')
<div class="row AddNewProject">
    <section class="col-sm-12">
        <h1 class="page-header">Edit Project Details</h1>
        <h3 class="smallHeader">Create Project</h3>
        <div class="formAddProj">
            <form id="projectForm" method="POST" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}   
            <div class="firstStep">
                    
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Project Title <span>*</span></label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control fcNew" value="{{ $project->name }}" placeholder="">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Project Number <span>*</span></label>
                        <div class="col-sm-6">
                            <input type="text" name="project_number" id="project_number" class="form-control fcNew" value="{{ $project->project_number }}" placeholder="">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Assessment Completed by <span>*</span></label>
                        <div class="col-sm-6">
                            <input type="text" name="assessment_completed_by" id="assessment_completed_by" class="form-control fcNew" value="{{ $project->assessment_completed_by }}" placeholder="">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Project Year</label>
                        <div class="col-sm-6">
                        <select name="estimated_timeline_PCN_year" class="form-control fcNew">
                            <option value="0"></option>
                            @for ($i = date('Y'); $i < date('Y')+5; $i++)
                                <option value="{{ $i }}" @if($i == $project->estimated_timeline_PCN_year) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        </div>
                        </div>
                        <!-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Estimated timeline for PCN Quarter</label>
                        <div class="col-sm-6">
                            <select name="estimated_timeline_PCN_quarter" class="form-control fcNew">
                            <option selected value="">- None -</option>
                            <option value="Q1" @if('Q1' == $project->estimated_timeline_PCN_quarter) selected @endif>Q1</option>
                            <option value="Q2" @if('Q2' == $project->estimated_timeline_PCN_quarter) selected @endif>Q2</option>
                            <option value="Q3" @if('Q3' == $project->estimated_timeline_PCN_quarter) selected @endif>Q3</option>
                            <option value="Q4" @if('Q4' == $project->estimated_timeline_PCN_quarter) selected @endif>Q4</option>
                            </select>
                        </div>
                        </div> -->
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-6">
                            <div class="btnGrp">
                                <button type="button" class="btnNext" onclick="onNext();">Next</button>
                                <a href="{{route('home')}}" class="btnCancel" >Cancel</a>
                            </div>
                        </div>
                        </div>
                    
                </div>
                <div class="secondStep">
                    <div class="row">
                        <div class="col-sm-9 projectRegion" style="display: none;">
                            <h4>PROJECT REGION / COUNTRY</h4>
                            <div id="countries" class="e">
                                    <div class="form-group row regionDiv" id="firstRegion">
                                        <label class="col-sm-4 col-form-label">Region</label>
                                        <div class="col-sm-6 div1">
                                            <select name="region_id[]" id="region_id" class="region_id form-control fcNew">
                                                <option value="47" selected>Sub-Saharan Africa</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="countryDiv">
                                    <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Country</label>
                                        <div class="col-sm-6">
                                            <select name="country_id[]" class="form-control fcNew country_id">
                                                <option value="233" selected>Uganda</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                           </div>
                               <!-- <div id="countries">
                                   @forelse($countries as $data)
                                    <div class="form-group row regionDiv" id="firstRegion">
                                        <label class="col-sm-4 col-form-label">Region</label>
                                        <div class="col-sm-6 div1">
                                            <select name="region_id[]" id="region_id" class="region_id form-control fcNew">
                                            <option value="">- Select any region -</option>
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}" @if($data['region_id'] == $region->id) selected @endif>{{ $region->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="countryDiv">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Country</label>
                                            <div class="col-sm-6">
                                                <select name="country_id[]" class="form-control fcNew country_id">
                                                <option value="">- Select Country -</option>
                                                    @foreach($data['countries'] as $country)
                                                        <option value="{{ $country->id }}" @if($data['country_id'] == $country->id) selected @endif>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="form-group row regionDiv" id="firstRegion">
                                        <label class="col-sm-4 col-form-label">Region</label>
                                        <div class="col-sm-6 div1">
                                            <select name="region_id[]" id="region_id" class="region_id form-control fcNew">
                                            <option value="">- Select any region -</option>
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="countryDiv"></div>
                                @endforelse
                               </div> -->
                               
                            <!-- <div class="form-group">
                                <div class="btnGrp">
                                <button type="button" id="addCountry" class="btnSave">Add  another Project Region / Country</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <form class="">
                        <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Project Team Leader</label>
                        <div class="col-sm-6">
                            <input type="text" name="project_ttl" class="form-control fcNew" value="{{ $project->project_ttl }}" placeholder="">
                        </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Screening Tool Type <span>*</span></label>
                        <div class="col-sm-6">
                        <select name="tool_id" id="tool_id" class="form-control fcNew" disabled>
                            @foreach($tools as $tool)
                                <option value="{{ $tool->id }}" @if($tool->id == $project->tool_id) selected @endif>{{ $tool->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="tool_id" value="{{$project->tool_id}}">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Project Document</label>
                        <div class="col-sm-6">
                        <div class="form-control fileInpt fcNew">
                            <input type="file" id="customFile" name="concept_note">
                            </div>
                            <div class="row">
                        <div class="col-sm-12 concept_note_file">
                            <a href="{{ route('project.download', $project->id) }}">{{$project->concept_note}}</a>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Brief Description of Project or Goals/ Objectives</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control fcAria" rows="5" cols="60" maxlength="1500">{{ $project->description }}</textarea>
                            <div class="counterChar">
                            <span id="counterChar">1500</span> 
                            Characters remaining (1500 maximum).
                        </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Funding Source</label>
                        <div class="col-sm-6">
                            <input type="text" name="funding_source" class="form-control fcNew" value="{{ $project->funding_source }}" placeholder="">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-6">
                            <div class="btnGrp">
                                <button type="button" class="btnPrev" onclick="onPrev();">Back</button>
                                <button type="submit" class="btnSave" id="projectSubmit">Save</button>
                                <a href="{{route('home')}}" class="btnCancel" >Cancel</a>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/scripts/validation.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#addCountry').click(function(){
            var regionHtml = $('#firstRegion').html();
            
            var html = `<div class="form-group row regionDiv">`+regionHtml+`</div>
                        <div class="countryDiv"></div>`;
            $( '#countries' ).append(html);
            $( ".region_id option:selected" ).last().remove();
        });

        /*$('body').on('change', '.region_id', function(){
            var region_id = $(this).val();
            var currentEle = $(this).parents('.regionDiv').next();
            $.ajax({
                type:'GET',
                data: {region_id: region_id},
                dataType:'html',
                url:'{{ route("ajax.country") }}',
                success:function(data){
                    $(currentEle).html(data);
                }
            });
        });*/

        var $txtLenLeft = $('#counterChar'); // lets cache this
        var maxLen = 1500;
        var currLen = $('#description').val().length;
        $txtLenLeft.html(maxLen - currLen);
        $('#description').keydown(function(e){
        var Length = $(this).val().length;
        //alert(Length);
        var AmountLeft = maxLen - Length;
        $txtLenLeft.html(AmountLeft);
        if(Length >= maxLen && e.keyCode != 8){
            e.preventDefault(); // will cancel the default action
        }
        });
    });
</script>
@endsection