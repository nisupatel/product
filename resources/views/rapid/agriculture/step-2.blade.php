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
<div class="Content">
   <div class="">
      <div class="contentDiv">
         <div class="previous-rating-container">
            <div class="prev-step-label">
               <h4> Rating for Step 1: Exposure of the project location</h4>
            </div>
            <div class="prev-step-exposure-types">
               Selected climate and geophysical hazards: 
               <ul>
                  @foreach($decisionTree->exposure_types as $exposure)
                  <li>{{ $exposure }}</li>
                  @endforeach
               </ul>
            </div>
            <div class="prev-step-rating" style="background-color: {{ config('colors.colors')[$decisionTree->exposure_rating] }}; padding: 2px 5px; text-align: center; width: 123px;">{{ config('colors.colors_text')[$decisionTree->exposure_rating] }}</div>
         </div>
         <div class="step-separator"></div>
         <h3>Step 2: Impacts on the Project's Physical Infrastructure and Assets</h3>
         <p class="step_desc">Infrastructure and physical assets in agriculture projects can be impacted by climate and geophysical hazards in a variety of ways. For instance, extreme precipitation and flooding can cause heavy soil erosion and can wash out feeder roads that connect smallholders farmers to market.Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step2-info-icon"> </p>
         <form class="cpf-custom-dt" id="step2PhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div>
               <div class="form-type-checkboxes form-item-dt-step2-impacts form-item form-group">
                  <label for="edit-dt-step2-impacts">a. Select the subsectors that pertain to your project.  </label>
                  <div id="edit-dt-step2-impacts" class="form-checkboxes">
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Irrigation-&amp;-Drainage form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-irrigation-drainage" name="impact_sectors[]" value="Irrigation &amp; Drainage" class="form-checkbox" @if(in_array("Irrigation & Drainage", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-irrigation-drainage">Irrigation &amp; Drainage </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Livestock form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-livestock" name="impact_sectors[]" value="Livestock" class="form-checkbox" @if(in_array("Livestock", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-livestock">Livestock </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Storage-and-Processing form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-storage-and-processing" name="impact_sectors[]" value="Storage and Processing" class="form-checkbox" @if(in_array("Storage and Processing", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-storage-and-processing">Storage and Processing </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Crops-and-land-management form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-crops-and-land-management" name="impact_sectors[]" value="Crops and land management" class="form-checkbox" @if(in_array("Crops and land management", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-crops-and-land-management">Crops and land management </label>
                     </div>
                     <div class="form-type-checkbox form-item-dt-step2-impacts-Rural-Transport form-item checkbox">
                        <input type="checkbox" id="edit-dt-step2-impacts-rural-transport" name="impact_sectors[]" value="Rural Transport" class="form-checkbox" @if(in_array("Rural Transport", $decisionTree->impact_sectors)) checked @endif>  <label for="edit-dt-step2-impacts-rural-transport">Rural Transport </label>
                     </div>
                     <input type="hidden" id="ss_limit" value="0">
                  </div>
               </div>
               <div class="step2_ques2">
                  <div class="step2head"><strong>b. Reflect on your project's infrastructure and assets as currently designed under your selected subsectors.</strong></div>
                  <div class="step2head">
                     <ul style="padding-top: 6px;">
                        <li>Consider whether the design takes into account recent trends and future projected changes in the climate and geophysical hazards you have identified.</li>
                        <li>Consider how the structural integrity, materials, siting, longevity and overall effectiveness of your investments may be impacted. </li>
                        <li>Consider in particular, whether the design “locks in” certain decisions for the future. </li>
                     </ul>
                  </div>
               </div>
               <div class="notes_rating_wrapper">
                  <div class="step2_ques2">
                     <p><b>c. Rate the impact of climate and geophysical hazards on your project's infrastructure and physical assets as currently designed.</b> Please note: If infrastructure and assets may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.</p>
                  </div>
                  <div class="dt_rating_container">
                     <div class="dt_rating_left">
                        <div class="form-type-select form-item-dt-step2-rating form-item form-group">
                           <label for="edit-dt-step2-rating">Select Impact Rating:&nbsp;&nbsp;&nbsp;<img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#select-impact-dt-info-icon"> </label>
                           <select class="form-control form-select" id="edit-dt-step2-rating" name="impact_rating">
                           <option value="0" @if('NULL' == $decisionTree->impact_rating) selected @endif>Please select rating</option>
                           <option value="1" @if('1' == $decisionTree->impact_rating) selected @endif>Insufficient Understanding</option>
                           <option value="2" @if('2' == $decisionTree->impact_rating) selected @endif>No / Low</option>
                           <option value="4" @if('4' == $decisionTree->impact_rating) selected @endif>Moderate</option>
                           <option value="5" @if('5' == $decisionTree->impact_rating) selected @endif>High</option>
                           </select>
                        </div>
                        <div class="rating_dropdown_suffix">
                           <ul class="dt_rating_button_step2">
                              <li id="dt_rating_high" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#high-exposer">High</li>
                              <!--<li id="dt_rating_slight" class="dt_rating_button_item">Slightly Exposed</li>-->
                              <li id="dt_rating_moderate" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#moderate-exposer">Moderate</li>
                              <li id="dt_rating_not_exposed" class="dt_rating_button_item tooltip_matrix tooltipstered" data-tooltip-content="#no-low-exposer">No / Low</li>
                              <li id="dt_rating_insufficient" class="dt_rating_button_item tooltip_matrix last tooltipstered" data-tooltip-content="#insufficient-exposer">Insufficient Understanding</li>
                           </ul>
                        </div>
                     </div>
                     <div class="dt_rating_right">
                        <div class="form-type-textarea form-item-dt-step2-notes form-item form-group">
                           <label for="edit-dt-step2-notes">You can capture your analysis here. </label>
                           <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step2-notes" name="impact_notes" cols="9" rows="7" placeholder="Sample Text:The key hazards for crops in the project location are droughts and irregular rainfall, which have significantly disrupted crop production in the past. Under this project, drought-resistant and flood-resistant seeds will be disseminated, which are expected to be much less sensitive to changes in temperature and rainfall patterns. Yields from these drought-resistant crops are expected to be largely unaffected by drought in most years, but extreme dry years may reduce productivity. The impact rating is set as Moderate as projections indicate that the number of days without rain may increase slightly during the growing season. In addition, the impacts of other climate hazards, such as temperature and wind, may increase">{{$decisionTree->impact_notes}}</textarea></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="saveBtnBlock">
                  <button type="submit" class="SaveBtn" id="step2PhysicalSubmit">Save</button>
               </div>
            </div>
         </form>
         <div class="tooltip_templates" style="display: none;">
            <span id="no-low-exposer">
            <strong>No / Low:</strong> Climate and geophysical hazards are not likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
            </span>
            <span id="moderate-exposer">
            <strong>Moderate:</strong> Climate and geophysical hazards are likely to impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future.
            </span>
            <span id="high-exposer">
            <strong>High:</strong> Climate and geophysical hazards are likely to significantly impact the structural integrity, materials, siting, longevity and overall effectiveness of project investments. Remember, if any of these aspects may be highly impacted by even one hazard either in the present or in the future, then select the High rating. Also select a High rating if impacts are low/moderate in the present but are projected to become High in the future. 
            </span>
            <span id="insufficient-exposer">
            <strong>Insufficient Understanding:</strong> There is insufficient knowledge about the project or insufficient understanding of how to interpret information on climate and geophysical hazards to make a rating.
            </span>
            <span id="step2-info-icon">
               <strong>Irrigation &amp; Drainage</strong>
               <ul>
                  <li>High temperatures can cause ground water tables to fall.</li>
                  <li>Storm surge can cause soil erosion and sedimentation in irrigation and drainage systems.</li>
               </ul>
               <strong>Crops and land management:</strong>
               <ul>
                  <li>High temperatures can increase rates of evapotranspiration, reducing soil moisture.</li>
                  <li>Extremely high temperatures can cause drought, shift or change the length of growing season, adversely affect ground cover and cause crops yields to fall dramatically; high temperatures can also increase the prevalence of pests and invasive species.</li>
                  <li>Extreme precipitation can cause heavy soil erosion in plains and coastal areas, inundation of low-lying areas, landslides in mountainous and hilly areas and loss of crops and vegetation; flooding can also increase runoff of pollutant or introduce pests and invasive species</li>
                  <li>Strong winds can blow away top soil and can uproot vegetation and directly damage crops</li>
               </ul>
               <strong>Livestock: </strong>
               <ul>
                  <li>Higher temperatures  increase heat stress on livestock, reducing their productivity.</li>
                  <li>Extreme precipitation and flooding can cause loss of livestock.</li>
                  <li>Drought can reduce or eliminate sources of water for livestock.</li>
               </ul>
               <strong>Rural Transport:</strong>
               <ul>
                  <li>Flooding can wash out feeder roads that connect smallholder farmers to markets.</li>
                  <li>Storm surge can damage infrastructure associated with the value chain, such as transport systems.</li>
                  <li>Landslides can destroy large agriculture areas and infrastructure, including roads, that is key for agricultural service delivery.</li>
               </ul>
               <strong>Storage &amp; processing: </strong>
               &nbsp;
               <ul>
                  <li>Flooding can wash out facilities for storage and processing of agricultural goods. </li>
                  <li>Storm surge can damage storage facilities and processing equipment.</li>
               </ul>
            </span>
            <span id="select-impact-dt-info-icon">
            You can mouseover each rating to see a description.
            </span>
            <span id="step2-sample-text-dt-info-icon">
            Projections for the high flow volume in the river indicate an increase in future decades. The dam has experienced cracks during periods of high flow that have significantly increased the cost of maintenance in the past. Under this project, the dam will be reinforced with additional concrete to improve resilience but given future projections of increased flow, the potential impact is Moderate.
            </span>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
@section('scripts')
@endsection