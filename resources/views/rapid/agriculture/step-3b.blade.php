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
                     <p class="step_desc">The development context in which agriculture projects operate may be divided into two broad areas of influence: the agriculture sector in the project area, and the set of social, economic, and political resources and forces at work.</p>
                     <div class="form-item-dt-softcom-types">
                        <p style="padding-top: 0 !important;padding-bottom: 0 !important;"><b>a. Reflect on the current agriculture sector context in your project country and on how it may modulate risks from climate and geophysical hazards. </b> For instance, policies and programs that facilitate diversified agricultural production systems enable farmers to limit the financial damage from localized extreme weather events.<br>Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon1"> </p>
                     </div>
                     <div class="form-item-dt-softcom-types">
                        <p style="padding-top: 0 !important;padding-bottom: 0 !important;"><b>b. Reflect on the current social, economic and political factors in your project country and on how these may modulate risks from climate and geophysical hazards.</b> Examples of factors to consider include access to technology, prices (particularly food and energy), financial resources, conflict, political instability, legal enforcement, population growth, urbanization, pollution, land ownership issues, land and soil quality, nutrition, education, and life expectancy. Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon2"> </p>
                        <p>Factors relating to particularly vulnerable groups in your project's country context, <b>namely gender, migrants and displaced people </b>may also modulate risks from climate and geophysical hazards. For example, strong tenure rights benefiting women increase their incentive to adopt soil management measures on their plots. <span>Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon3"> </span> </p>
                     </div>
                     <form class="cpf-custom-dt" id="step3bPhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        <div>
                           <div class="form-type-checkboxes form-item-dt-step4-ques1 form-item form-group">
                              <label for="edit-dt-step4-ques1">c. Indicate how the project's agriculture sector and social, economic and political context may together reduce or increase the risk from the climate and geophysical hazards you have identified.  </label>
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
                              <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step4-notes" name="context_notes" cols="9" rows="7" placeholder="Sample Text:There has been a lack of sustained investment in the agriculture production sector in recent years. The country suffers from severe land degradation. Many shelterbelts, essential to horticulture production against erosion from winds and rains, were built decades ago and now are severely eroded, illegally deforested or over-grazed. These factors would negatively impact land and soil quality, which in turn affects project outcomes.">{{$decisionTree->context_notes}}</textarea></div>
                           </div>
                           <div class="saveBtnBlock">
                              <button type="submit" class="SaveBtn" id="step3bPhysicalSubmit">Save</button>
                           </div>
                        </div>
                     </form>
                     <div class="tooltip_templates" style="display: none;">
                        <span id="step4-info-icon1">
                           Other examples of how the agriculture sector can influence climate and disaster risks include:
                           <ul>
                              <li>Appropriate agricultural sector policies at the national level, such as pricing and subsidy policies and export promotion policies, can benefit local-level production.</li>
                              <li>Having backup systems in place for transporting, storing, and processing crops enhances the resilience of a commodity value chain and increases capacity to cope with climatic and geophysical hazards. geophysical hazards.</li>
                           </ul>
                        </span>
                        <span id="step4-info-icon2">
                           Other examples of how social, economic and political factors in the project country can influence climate and disaster risks include:
                           <ul>
                              <li>Access to off-farm income such as “food for work” and “cash for work” programs play a crucial role in improving farmer's resiliency and adaptive capacity</li>
                              <li>Having backup systems in place for transporting, storing and processing crops enhances the resilience of a commodity value chain and increases capacity to cope with climatic and geophysical hazards.</li>
                              <li>Population growth can significantly and rapidly increase demand for food, increasing strain on agricultural lands and food insecurity.</li>
                              <li>Strong land tenure and governance systems reduce the likelihood of conflict over land ownership. Such conflicts can hinder both the development of land and growth of smallholder commercial agriculture.</li>
                           </ul>
                        </span>
                        <span id="step4-info-icon3">
                           Other examples of how factors relating to particularly vulnerable groups in your project's country context, namely gender and migrants, may influence climate and disaster risks include:
                           <ul>
                              <li>Supporting enhanced information and access to markets may reduce climate vulnerability of women producers by reducing on-farm storage loss</li>
                              <li>Considering use of both support to individual women farmers, as well as women's community-based agricultural enterprises, in order to distribute risk </li>
                              <li>Ensuring access to land, natural resources and services for both migrants and host communities may reduce potential conflicts.</li>
                              <li>Ensuring that land policies are aligned with labor-market priorities will facilitate the movement of people</li>
                           </ul>
                        </span>
                        <span id="step3b-sample-text-dt-info-icon">In the project country's water sector, there is a limited access to water-use monitoring technologies and information. This, combined with the lack of emergency response systems in place to bring in critical supplies for isolated communities and relief services in case of extreme weather events, increases the risk from climate and geophysical hazards.</span>
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