@extends('layouts.app')
@section('styles')
<link href="{{ asset('../assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div id="top-container">
   <div class="main-container container">
      <div class="row">
         <section class="col-sm-12">
            <h1 class="page-header">
               &nbsp;
               <div class="dt_top_btn"><a href="{{ route('rapid.dashboard',$project_id) }}">Back to Screening Dashboard</a></div>
            </h1>
            <div class="Content">
               <div class="">
                  <div class="contentDiv">
                     <div class="previous-rating-container">
                        <div class="prev-step1">
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
                        @if('physical' == $decisionTree->component_type)
                        <div class="prev-step2">
                           <div class="prev-step-label">
                              <h4>Rating for Step 2: Impacts on the project's physical infrastructure and assets</h4>
                           </div>
                           <div class="prev-step-impact-types">
                              Selected subsectors: 
                              <ul>
                                 @foreach($decisionTree->impact_sectors as $impact)
                                 <li>{{ $impact }}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="prev-step-rating" style="background-color: {{ config('colors.colors')[$decisionTree->impact_rating] }}; padding: 2px 5px; text-align: center; width: 123px;">{{ config('colors.colors_text')[$decisionTree->impact_rating] }}</div>
                        </div>
                        @endif  
                     </div>
                     <div class="step-separator"></div>
                     @if('physical' == $decisionTree->component_type)
                     <h3>Step3B: Modulation of Risks by the Project's Development Context</h3>
                     @else
                     <h3>Step 2B: Sector and country context of the project</h3>
                     @endif
                     <p class="step_desc">The development context in which natural resources projects operate may be divided into two broad areas of influence: the natural resources sector in the project area, and the set of social, economic, and political resources and forces at work.</p>
                     <div class="form-item-dt-softcom-types">
                        <p style="padding-top: 0 !important;padding-bottom: 0 !important;"><b>a. Reflect on the natural resources sector context in the project country and on how it may modulate risks from climate and geophysical hazards. </b> For instance, if the capacity and systems are in place to identify and respond to disruptions from climate and geophysical hazards, this can lessen hazard's duration and severity. Click here for more examples. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon1"> </p>
                     </div>
                     <div class="form-item-dt-softcom-types">
                        <p style="padding-top: 0 !important;padding-bottom: 0 !important;"><b>b. Reflect on the social, economic and political factors in the project country and on how these may modulate risks from climate and geophysical hazards.</b> Examples of factors to consider include access to technology, prices (particularly food and energy), financial resources, conflict, political instability, legal enforcement, population growth, urbanization, pollution, land ownership issues, land and soil quality, nutrition, education, and life expectancy. Click here for more examples. <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon2"> </p>
                        <p>Factors relating to <b>particularly vulnerable groups in the project's country context, namely gender, migrants and displaced people</b> may also modulate risks from climate and geophysical hazards.For example, women's knowledge of water management and other natural resource management practices can reduce gender disparities in terms of time poverty as women are the primary users and managers of water and other natural resources for household activities. <span>Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon3"> </span> </p>
                     </div>
                     <form class="cpf-custom-dt" id="step3bPhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        <div>
                           <div class="form-type-checkboxes form-item-dt-step4-ques1 form-item form-group">
                              <label for="edit-dt-step4-ques1">c. Indicate how the project's natural resources sector and social, economic and political context may together reduce or increase the risks from climate and geophysical hazards.</label>
                              <div id="edit-dt-step4-ques1" class="form-checkboxes">
                                 <div class="form-type-checkbox form-item-dt-step4-ques1-Reduce-Risk form-item checkbox">
                                    <input type="checkbox" id="edit-dt-step4-ques1-reduce-risk" name="context_rating" value="Reduce Risk" class="form-checkbox" @if('Reduce Risk' == $decisionTree->context_rating) checked @endif>  <label for="edit-dt-step4-ques1-reduce-risk">Reduce Risk </label>
                                 </div>
                                 <div class="form-type-checkbox form-item-dt-step4-ques1-Increases-Risk form-item checkbox">
                                    <input type="checkbox" id="edit-dt-step4-ques1-increases-risk" name="context_rating" value="Increases Risk" class="form-checkbox" @if('Increases Risk' == $decisionTree->context_rating) checked @endif>  <label for="edit-dt-step4-ques1-increases-risk">Increases Risk </label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-type-textarea form-item-dt-step4-notes form-item form-group">
                              <label for="edit-dt-step4-notes">You can capture your analysis here. </label>
                              <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step4-notes" name="context_notes" cols="9" rows="7" placeholder="Sample text. In the project country’s natural resources sector, there is limited institutional capacity to identify and respond to disruptions from climate and geophysical hazards. This, combined with a lack of emergency response systems in place to bring in food and clean water in case of extreme weather events, increases the risk from climate and geophysical hazards.">{{$decisionTree->context_notes}}</textarea></div>
                           </div>
                           <div class="saveBtnBlock">
                              <button type="submit" class="SaveBtn" id="step3bPhysicalSubmit">Save</button>
                           </div>
                        </div>
                     </form>
                     <div class="tooltip_templates" style="display: none;">
                              <span id="step4-info-icon1">
                              Other examples of how the natural resources sector can influence climate and disaster risks include: 
                              <ul> 
                                  <li>The institution with oversight of the sector may be monitoring climate change impacts and taking steps to communicate and address these impacts, thereby reducing risk. </li> 
                                  <li>Strong sustainable natural resource use policies can increase natural resource stocks and provide continued ecosystem services to local communities, thereby reducing risk. </li> 
                                  <li>The impacts of climate change may not be broadly incorporated into the sector’s programs and policies, thereby increasing risk. </li> 
                                  <li>If the capacity of natural resource institutions is weak, this can result in a limited budget for operations and maintenance, increasing the vulnerability of the system to climate and geophysical hazards.</li> 
                                  <li>Design standards for coastal buildings and assets may be based solely on historical events, thereby increasing risk. </li> 
                              </ul>
                              
                              </span>
                              
                              <span id="step4-info-icon2">
                                 Other examples of how social, economic and political factors in the project country can influence climate and disaster risks include:
                                   <ul> 
                                  <li>Development in low-lying coastal areas, such as those used for tourism, can increase the number of assets and people at risk from coastal storms and surges.</li>
                                  <li>Broader land-use planning and zoning laws can worsen the risk from climate and geophysical hazards.</li>
                                  <li>Impacts of climate and geophysical hazards can cut off connections between coastal zones and other areas, making it more difficult to access essential goods and services.</li>
                                  <li>Population growth can significantly increase the demand and competition for resources.</li>
                                  <li>Natural resources are subject to severe environmental degradation from pollution and overexploitation that worsens the impacts of climate and geophysical hazards.</li>
                                  <li>Access to technology can enhance the dissemination of information on emergencies and service disruptions related to climate and geophysical hazards.</li>
                                  <li>Emergency response systems are in place to bring in food and clean water after extreme weather events, thereby reducing risk. </li>
                                  <li>Populations at risk have access to financial savings or loans that can enable their recovery after an extreme event, thereby reducing risk.</li>
                                </ul>
                              </span>
                              
                              <span id="step4-info-icon3">
                              Other examples of how factors relating to particularly vulnerable groups in the project’s country context, namely gender and migrants, may influence climate and disaster risks include:
                                  <ul> 
                                      <li>Equal access to information and communication technologies (ICT) including radio, TV, and mobile devices to easily access weather forecasts can reduce the impacts of extreme events on women.</li>
                                      <li>Developing and enforcing urban planning and zoning for slums and refugee camps can facilitate local governments to provide adequate public services in the future.</li>
                              
                                 </ul>
                              </span>
                              
                              <span id="step3b-sample-text-dt-info-icon">In the project country’s water sector, there is a limited access to water-use monitoring technologies and information. This, combined with the lack of emergency response systems in place to bring in critical supplies for isolated communities and relief services in case of extreme weather events, increases the risk from climate and geophysical hazards.</span>
                        </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
   </div>
</div>
@endsection
@section('scripts')
@endsection