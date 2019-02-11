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
               Summary
               <div class="dt_top_btn"><a href="{{ route('rapid.dashboard',$project_id) }}">Back to Screening Dashboard</a></div>
            </h1>
            <div class="Content">
               <div class="">
                  <div class="contentDiv">
                     <div class="dt-summary-container">
                        <div class="dt-summary-step1">
                           <h3>Step 1: Exposure of the project location</h3>
                           <div class="dt-summary-exposure-types">
                              <b>Exposure Types: </b>
                              <ul>
                                 @foreach($decisionTree->exposure_types as $exposure)
                                 <li>{{ $exposure }}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="dt-summary-rating-notes">
                              @if('5' == $decisionTree->exposure_rating)
                              <div class="dt-summary-rating-box" style="background-color: #ff0000; padding: 2px 5px; text-align: center; width: 123px;">High</div>
                              @elseif ('4' == $decisionTree->exposure_rating)
                              <div class="dt-summary-rating-box" style="background-color: #f79646; padding: 2px 5px; text-align: center; width: 123px;">Moderate</div>
                              @elseif ('2' == $decisionTree->exposure_rating)
                              <div class="dt-summary-rating-box" style="background-color: #92d050; padding: 2px 5px; text-align: center; width: 123px;">No / Low</div>
                              @else
                              <div class="dt-summary-rating-box" style="background-color: #c0c0c0; padding: 2px 5px; text-align: center; width: 123px;">Insufficient Understanding</div>
                              @endif
                           </div>
                           @if($decisionTree->exposure_notes)
                           <div class="dt-summary-notes-box"><b>Notes: </b>{{ $decisionTree->exposure_notes }}</div>
                           @endif
                        </div>
                        @if(!in_array($decisionTree->exposure_rating, [1, 2]))
                        @if('physical' == $decisionTree->component_type)
                        <div class="dt-summary-step2">
                           <h3>Step 2: Impacts on the project's physical infrastructure and assets</h3>
                           <div class="dt-summary-impact-types">
                              <b>Subsectors: </b>
                              <ul>
                                 @foreach($decisionTree->impact_sectors as $impact)
                                 <li>{{ $impact }}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="dt-summary-rating-notes">
                              @if('5' == $decisionTree->impact_rating)
                              <div class="dt-summary-rating-box" style="background-color: #ff0000; padding: 2px 5px; text-align: center; width: 123px;">High</div>
                              @elseif ('4' == $decisionTree->impact_rating)
                              <div class="dt-summary-rating-box" style="background-color: #f79646; padding: 2px 5px; text-align: center; width: 123px;">Moderate</div>
                              @elseif ('2' == $decisionTree->impact_rating)
                              <div class="dt-summary-rating-box" style="background-color: #92d050; padding: 2px 5px; text-align: center; width: 123px;">No / Low</div>
                              @else
                              <div class="dt-summary-rating-box" style="background-color: #c0c0c0; padding: 2px 5px; text-align: center; width: 123px;">Insufficient Understanding</div>
                              @endif
                           </div>
                           @if($decisionTree->impact_notes)
                           <div class="dt-summary-notes-box"><b>Notes: </b>{{ $decisionTree->impact_notes }}</div>
                           @endif
                        </div>
                        @endif
                        @if($decisionTree->impact_rating != 1)
                        <div class="dt-summary-step3">
                           @if('physical' == $decisionTree->component_type)
                           <h3>Step 3A: Modulation of Risks by Soft Components</h3>
                           @else
                           <h3>Step 2A: Modulation of Risks by Soft Components</h3>
                           @endif
                           <div class="dt-summary-softcom-types">
                              <b>Soft Components: </b>
                              <ul>
                                 @foreach($decisionTree->softcom_types as $softcomponet)
                                 <li>{{ $softcomponet }}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="dt-summary-softcom-result">
                              <span class="dt-rating-label"><strong>Modulation of risks by project soft components:</strong></span>
                              <span>
                              @if('Reduce Risk' == $decisionTree->softcom_rating)
                              <img src="{{ asset('/assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk">
                              @else
                              <img src="{{ asset('/assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increases Risk">
                              @endif
                              </span>
                              <br>
                              <span class="dt-rating-label"><strong>Women identified as particularly vulnerable:</strong></span>
                              <span>
                              @if('No' == $decisionTree->softcom_vulnerability)
                              <img src="{{ asset('/assets/images/x-arrow-red.png') }}" style="height: 15px; width: 20px;" title="No">
                              @else
                              <img src="{{ asset('/assets/images/tic-mark-arrow.png') }}" style="height: 15px; width: 20px;" title="Yes">
                              @endif
                              </span>
                              <br>
                              <span class="dt-rating-label"><strong>Components designed to help alleviate risks to women:</strong></span>
                              <span>
                              @if('No' == $decisionTree->softcom_vul_alleviate)
                              <img src="{{ asset('/assets/images/x-arrow-red.png') }}" style="height: 15px; width: 20px;" title="No">
                              @else
                              <img src="{{ asset('/assets/images/tic-mark-arrow.png') }}" style="height: 15px; width: 20px;" title="Yes">
                              @endif
                              </span>
                              <br>
                           </div>
                           @if($decisionTree->softcom_notes)
                           <div class="dt-summary-notes-box"><b>Notes: </b>{{ $decisionTree->softcom_notes }}</div>
                           @endif
                        </div>
                        <div class="dt-summary-step4">
                           @if('physical' == $decisionTree->component_type)
                           <h3>Step 3B: Modulation of Risks by the Project's Development Context</h3>
                           @else
                           <h3>Step 2B: Modulation of Risks by the Project's Development Context</h3>
                           @endif
                           <div class="dt-summary-context-result"><b>Modulation of risks by project development context:</b>   
                              @if('Reduce Risk' == $decisionTree->context_rating)
                              <img src="{{ asset('/assets/images/down-arrow.png') }}" style="height: 15px; width: 20px;" title="Reduce Risk">
                              @else
                              <img src="{{ asset('/assets/images/up-arrow.png') }}" style="height: 15px; width: 20px;" title="Increases Risk">
                              @endif
                              <br>
                           </div>
                           @if($decisionTree->context_notes)
                           <div class="dt-summary-notes-box"><b>Notes: </b>{{ $decisionTree->context_notes }}</div>
                           @endif
                        </div>
                        <div class="dt-summary-step4">
                           @if('physical' == $decisionTree->component_type)
                           <h3>Step 4: Risk to the Outcome/Service Delivery of the Project</h3>
                           @else
                           <h3>Step 3: Risk to the Outcome/Service Delivery of the Project</h3>
                           @endif
                           <div class="dt-summary-rating-notes">
                              @if('5' == $decisionTree->outcome_rating)
                              <div class="dt-summary-rating-box" style="background-color: #ff0000; padding: 2px 5px; text-align: center; width: 123px;">High</div>
                              @elseif ('4' == $decisionTree->outcome_rating)
                              <div class="dt-summary-rating-box" style="background-color: #f79646; padding: 2px 5px; text-align: center; width: 123px;">Moderate</div>
                              @elseif ('2' == $decisionTree->outcome_rating)
                              <div class="dt-summary-rating-box" style="background-color: #92d050; padding: 2px 5px; text-align: center; width: 123px;">No / Low</div>
                              @else
                              <div class="dt-summary-rating-box" style="background-color: #c0c0c0; padding: 2px 5px; text-align: center; width: 123px;">Insufficient Understanding</div>
                              @endif
                           </div>
                           @if($decisionTree->outcome_notes)
                           <div class="dt-summary-context-notes"><b>Notes: </b>{{ $decisionTree->outcome_notes }}
                           </div>
                           @endif
                        </div>
                        @endif
                        @endif
                     </div>
                     <div class="tooltip_templates" style="display: none;"> 
                        <span id="submit-survey-info-icon">
                        Submit feedback on your experience using the Climate and Disaster Risk Screening Tools via an online survey.
                        </span>
                        <span id="view-pdf-report-info-icon">
                        View the PDF report for your screening assessment (also accessible via your <a href="{{ route('home') }}">project dashboard</a>).
                        </span>
                     </div>
                     <div class="smry-pg-bottom-btn">
                        <!-- <div class="google-sur-dt-n"><a class="next-step-dt google-sur-dt-btn btn" href="https://docs.google.com/forms/d/e/1FAIpQLSe08IQuZ9UfZw3BP3sHvMGzSeodhG1OBYfDvtkDEZOSUiH3Rg/viewform?c=0&amp;w=1&amp;usp=mail_form_link" target="_blank">Submit a Survey</a> -->
                        <!-- <img src="" class="tooltip_matrix tooltipstered" data-tooltip-content="#submit-survey-info-icon" style="padding: 5px;"></div> -->
                        <div class="view_dt_pdf">
                           <a href="{{ route('project.pdf', $decisionTree->project_id) }}" target="_blank">View PDF Report</a>
                           <img src="{{ asset('/assets/images/tooltip_i.png') }}" class="tooltip_matrix tooltipstered" data-tooltip-content="#view-pdf-report-info-icon" style="padding: 5px;">
                        </div>
                     </div>
                     <div class="dt-summary-next">
                        <a id="pgnxtwtr" href="{{ route('rapid.steps',['id '=> $decisionTree->id,'stepname'=>'summary-next']) }}" class="page-next-wtr" title="Go to next page">
                              <span>Next</span>
                              <img id="nextimg" src="{{ asset('/assets/images/next.png') }}">
                        </a>
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