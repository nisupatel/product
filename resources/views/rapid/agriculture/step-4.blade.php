@extends('layouts.app')
@section('styles')
<link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<h1 class="page-header">
   &nbsp;
   <div class="dt_top_btn"><a href="{{ route('rapid.dashboard',$project_id) }}">Back to Screening Dashboard</a></div>
</h1>
<div class="Content mt10">
<div class="">
<div class="contentDiv">
<div class="previous-rating-container step4-upper-container">
@if('physical' == $decisionTree->component_type)
<div class="prev-rating-sub-container sub-cont-exp col-md-6">
@else
<div class="prev-rating-sub-container sub-cont-exp col-md-4">
   @endif
   <div class="prev-step-label" style="display: inline-block; ">
      <h4 style="display:inline-block;"> Step 1: Exposure of the project location</h4>
   </div>
   <div class="prev-step-rating" style="background-color: {{ config('colors.colors')[$decisionTree->exposure_rating] }}; padding: 2px 5px; text-align: center; width: 123px;">{{ config('colors.colors_text')[$decisionTree->exposure_rating] }}</div>
   <div class="step4-edit-links">
      <a href="{{ route('rapid.steps',[$id,'step-1', 'redirect' => true]) }}"><img src="{{ asset('/assets/images/edit.png') }}" alt="edit button"></a>
   </div>
</div>
@if('physical' == $decisionTree->component_type)
<div class="prev-rating-sub-container sub-cont-impact col-md-6">
   <div class="prev-step-label" style="display: inline-block; width: 100%;">
      <h4 style="display:inline-block;">Step 2: Impacts on the project's physical infrastructure and assets</h4>
   </div>
   <div class="prev-step-rating" style="background-color: {{ config('colors.colors')[$decisionTree->impact_rating] }}; padding: 2px 5px; text-align: center; width: 123px;">{{ config('colors.colors_text')[$decisionTree->impact_rating] }}</div>
   <div class="step4-edit-links">
      <a href="{{ route('rapid.steps',[$id,'step-2', 'redirect' => true]) }}"><img src="{{ asset('/assets/images/edit.png') }}" alt="edit button"></a>
   </div>
</div>
@endif
@if('physical' == $decisionTree->component_type)
<div class="prev-rating-sub-container sub-cont-mod-soft col-md-6">
   @else
   <div class="prev-rating-sub-container sub-cont-mod-soft col-md-4">
      @endif  
      <div class="prev-step-label" style="display: inline-block; width: 100%;">
         <h4 style="display:inline-block;">
            @if('physical' == $decisionTree->component_type)
            Step 3A: Modulation of risks by soft components
            @else
            Step 2A: Modulation of risks by soft components
            @endif
         </h4>
      </div>
      <div class="prev-step3-rating" style=""><span>
         @if('Reduce Risk' == $decisionTree->softcom_rating)
         <img src="{{ asset('/assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk">
         @else
         <img src="{{ asset('/assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increases Risk">
         @endif
         </span><br>
      </div>
      <div class="step4-edit-links">
         <a href="{{ route('rapid.steps',[$id,'step-3a', 'redirect' => true]) }}"><img src="{{ asset('/assets/images/edit.png') }}" alt="edit button"></a>
      </div>
   </div>
   @if('physical' == $decisionTree->component_type)
   <div class="prev-rating-sub-container sub-cont-mod-dev col-md-6">
      @else
      <div class="prev-rating-sub-container sub-cont-mod-dev col-md-4">
         @endif  
         <div class="prev-step-label" style="display: inline-block; width: 100%;">
            <h4 style="display:inline-block;">
               @if('physical' == $decisionTree->component_type)
               Step 3B: Modulation of risks by the project's development context
               @else
               Step 2B: Modulation of risks by the project’s development context
               @endif
            </h4>
         </div>
         <div class="prev-step3-rating" style=""><span class="dt-rating-icon">
            @if('Reduce Risk' == $decisionTree->context_rating)
            <img src="{{ asset('/assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk">
            @else
            <img src="{{ asset('/assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increases Risk">
            @endif
            </span><br>
         </div>
         <div class="step4-edit-links">
            <a href="{{ route('rapid.steps',[$id,'step-3b', 'redirect' => true]) }}"><img src="{{ asset('/assets/images/edit.png') }}" alt="edit button"></a>
         </div>
      </div>
   </div>
   <div class="step-separator"></div>
   @if('physical' == $decisionTree->component_type)
   <h3>Step 4:Overall Risk to the Outcome/Service Delivery of the Project</h3>
   @else
   <h3>Step 3: Risk to the Outcome/Service Delivery of the Project</h3>
   @endif
   <p class="step_desc">In this step you will consider the overall level of risk to the outcome/service delivery that your project is aiming to provide.</p>
   <form class="cpf-custom-dt" id="step4PhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <div>
         <div class="notes_rating_wrapper">
            <div class="step2_ques2">
               <div class="step2head">
                  <p><b>a. Rate the level of risk to the outcome/service delivery of your project.</b> Base this rating on your previous assessment of the project's exposure to climate and geophysical hazards, the extent to which relevant hazards have been incorporated into your project design, and the development context.</p>
               </div>
            </div>
            <div class="dt_rating_container">
               <div class="dt_rating_left">
                  <div class="form-type-select form-item-dt-step4-rating form-item form-group">
                     <label for="edit-dt-step4-rating">Select Outcome Rating:&nbsp;&nbsp;&nbsp;<img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#select-outcome-dt-info-icon"> </label>
                     <select class="form-control form-select" id="edit-dt-step4-rating" name="outcome_rating">
                     <option value="0" @if('NULL' == $decisionTree->outcome_rating) selected @endif>Please select rating</option>
                     <option value="1" @if('1' == $decisionTree->outcome_rating) selected @endif>Insufficient Understanding</option>
                     <option value="2" @if('2' == $decisionTree->outcome_rating) selected @endif>No / Low</option>
                     <option value="4" @if('4' == $decisionTree->outcome_rating) selected @endif>Moderate</option>
                     <option value="5" @if('5' == $decisionTree->outcome_rating) selected @endif>High</option>
                     </select>
                  </div>
                  <div class="rating_dropdown_suffix">
                     <ul class="dt_rating_button_step4">
                        <li id="dt_rating_high" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#high-exposer">High</li>
                        <!--<li id="dt_rating_slight" class="dt_rating_button_item">Slightly Exposed</li>-->
                        <li id="dt_rating_moderate" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#moderate-exposer">Moderate</li>
                        <li id="dt_rating_not_exposed" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#no-low-exposer">No / Low</li>
                        <li id="dt_rating_insufficient" class="dt_rating_button_item last tooltip_matrix tooltipstered" data-tooltip-content="#insufficient-exposer">Insufficient Understanding</li>
                     </ul>
                  </div>
               </div>
               <div class="dt_rating_right">
                  <div class="form-type-textarea form-item-dt-step4-notes form-item form-group">
                     <label for="edit-dt-step4-notes">You can capture your analysis here. </label>
                     <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step4-notes" name="outcome_notes" cols="9" rows="7" placeholder="Sample Text:The overall potential impact on investments is low. While the soft components slightly reduce the level of impact, the development context will significantly increase impacts as there are very low levels of adaptive capacity. This elevates the overall risk rating from Low to Moderate.">{{ $decisionTree->outcome_notes }}</textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="saveBtnBlock">
            <button type="submit" class="SaveBtn" id="step4PhysicalSubmit">Submit</button>
         </div>
      </div>
   </form>
   <div class="tooltip_templates" style="display: none;">
      <span id="no-low-exposer">
      <strong>No / Low:</strong> The level of potential risk to the outcome/service delivery of the project is very limited. Soft components and development context may reduce the level of risk or may not increase it. 
      </span>
      <span id="moderate-exposer">
      <strong>Moderate:</strong> The level of potential risk to the outcome/service delivery of the project is moderate. The level of risk may be low but soft components and development context may increase it. Or: The level of risk may be moderate to high but soft components and development context may reduce it.</span>
      <span id="high-exposer">
      <strong>High:</strong> The level of potential risk to the outcome/service delivery of the project is high. The level of risk may be moderate to high and soft components and development context do not substantially reduce it. </span>
      <span id="insufficient-exposer">
      <strong>Insufficient Understanding:</strong> There is not sufficient knowledge about the project or not sufficient understanding of how to interpret the climate information to make an assessment.
      </span>
      <span id="select-outcome-dt-info-icon">
      You can mouseover each rating to see a description.
      </span>
      <span id="step4-sample-text-dt-info-icon">
      The project will prioritize rehabilitation of dams and reservoirs. This will be based on the probability and impact of failure, both in terms of population impacted and socio economic infrastructure, including structural risk and economic costs. The potential risk to the dam infrastructure due to increased river flow is greatly reduced by the existence of awareness raising activities and the putting in place of evacuation drills for communities downstream. However, lack of emergency response systems to bring critical supplies for communities in case of extreme weather events, moderately increases such risk. Therefore, the overall risk to the outcome of the project is considered to be Moderate.
      </span>
   </div>
</div>
@endsection
@section('scripts')
@endsection