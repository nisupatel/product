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
                     <p class="step_desc">The development context in which energy projects operate may be divided into two broad areas of influence: the energy sector in the project area, and the set of social, economic, and political resources and forces at work.</p>
                     <div class="form-item-dt-softcom-types">
                        <p style="padding-top: 0 !important;padding-bottom: 0 !important;"><b>a. Reflect on the current energy sector context in your project country and on how it may modulate risks from climate and geophysical hazards. </b> For instance, policies to promote less centralized energy systems may reduce the ripple effects of extreme weather events. Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon1"> </p>
                     </div>
                     <div class="form-item-dt-softcom-types">
                        <p style="padding-top: 0 !important;padding-bottom: 0 !important;"><b>b. Reflect on the current social, economic and political factors in your project country and on how these may modulate risks from climate and geophysical hazards.</b> Examples of factors to consider include access to technology, prices (particularly food and energy), financial resources, conflict, political instability, legal enforcement, population growth, urbanization, pollution, land ownership issues, land and soil quality, nutrition, education, and life expectancy. Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon2"> </p>
                        <p>Factors relating to particularly vulnerable groups in your project’s country context, <b>namely gender, migrants and displaced people </b>may also modulate risks from climate and geophysical hazards. For example, ensuring the liberation of the energy market provides equal opportunities for incomes for women. <span>Click here for more examples <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#step4-info-icon3"> </span> </p>
                     </div>
                     <form class="cpf-custom-dt" id="step3bPhysicalForm" method="POST" action="{{ route('rapid.update', $id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        <div>
                           <div class="form-type-checkboxes form-item-dt-step4-ques1 form-item form-group">
                              <label for="edit-dt-step4-ques1">c. Indicate how your project’s energy sector and social, economic and political context may together reduce or increase the risk from the climate and geophysical hazards you have identified.  </label>
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
                              <div class="form-textarea-wrapper"><textarea class="form-control form-textarea" id="edit-dt-step4-notes" name="context_notes" cols="9" rows="7" placeholder="Sample Text: Recent population growth triggering increased economic growth has significantly and rapidly increased demand for energy which in turn has put additional stress on the energy system.">{{$decisionTree->context_notes}}</textarea></div>
                           </div>
                           <div class="saveBtnBlock">
                              <button type="submit" class="SaveBtn" id="step3bPhysicalSubmit">Save</button>
                           </div>
                        </div>
                     </form>
                     <div class="tooltip_templates" style="display: none;">
                        <div class="tooltip_templates" style="display: none;">
                              <span id="step4-info-icon1">
                                     
                              Other examples of how the energy sector can influence climate and disaster risks include:
                                   <ul> 
                              <li>Lack of resources for maintenance and repair may increase the impacts of climate and geophysical hazards on the energy system. </li>
                              <li>Policies and programs that create incentives for using climate-resilient or energy-efficient technologies may help overcome existing market barriers.</li> 
                              <li>Having back-up systems in place and redundancy within the electricity system may increase the capacity to cope with extreme weather events and geophysical hazards.</li> 
                              <li>Strategic planning that considers how climate and geophysical hazards may affect key assets, system reliability, and demand may help improve long-term climate resilience. </li>
                              
                                    </ul>
                              
                              </span>
                              
                              <span id="step4-info-icon2">
                                  Other examples of how social, economic and political factors in the project country can influence climate and disaster risks include:
                                   <ul>  
                              <li>Population and economic growth may significantly and rapidly increase demand for energy, putting additional stress on the energy system. </li>
                              <li>Legal enforcement of proper building codes and zoning regulations may reduce the vulnerability of energy infrastructure to extreme weather events.
                              ns, maintenance and repairs.</li>
                                  </ul>
                              </span>
                              
                              <span id="step4-info-icon3">
                                  Other examples of how factors relating to particularly vulnerable groups in your project’s country context, namely gender and migrants,  may influence climate and disaster risks include:
                                  <ul> 
                              <li>Increasing women’s knowledge and access to renewable energy will reduce gender disparities particularly in terms of time poverty for women as there is a direct linkage between women’s access to energy and socio-economic advancement.</li>
                              <li>Tariff-setting or energy subsidies offer an opportunity to increase energy access, particularly for women-led households.</li>
                              <li>Equal access to renewable energy technology markets in a holistic approach can reduce the impacts of energy scarcity and improve the social and economic status of women.</li>
                              <li>Introducing cooking stoves may prevent women refugees to be affected by gender based violence when collecting fuel wood.
                              </li>
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