<?php
    $output = '';
    $rating = 0;

    if (isset($decisionTree->id) && $decisionTree->id != "") {
        if ($decisionTree->component_type == "physical") {
            if (in_array($decisionTree->exposure_rating, array(1, 2))) {
                $rating = $decisionTree->exposure_rating;	
            }
            elseif ($decisionTree->impact_rating == 1) {
                $rating = $decisionTree->impact_rating;
            }
            else {
                $rating = $decisionTree->outcome_rating;
            }
        }
        elseif ($decisionTree->component_type == "soft") {
            if (in_array($decisionTree->exposure_rating, array(1, 2))) {
                $rating = $decisionTree->exposure_rating;	
            }
            else {
                $rating = $decisionTree->outcome_rating;
            }
        }
    }

    if ($rating == 5 || $rating == 4) {
        $output .= '<div class="overall-rating-text">';
        $output .= '<div><b>Given that your project may be moderately/highly affected by climate and geophysical hazards, here are some suggested next steps:</b></div>';
        $output .= '<ul style="padding-top: 5px; padding-bottom: 10px !important; margin-top: 0px !important;"><li>Save your assessment.</li><li>For areas of High Risk, conduct a more detailed risk assessment to explore measures to manage or reduce risk.</li><li>For areas of Moderate Risk, build on this screening through additional studies, consultation, and dialogue to inform your project design.</li><li>Identify potential resilience-enhancing measures where risks exist.</li></ul>';
        $output .= '<div><b>RESOURCES:</b><br /><ul style="padding-top: 5px;"><li>For a more guided screening of your project Use the In-Depth Screening Assessment</li><li>If you need further assistance:<ul><li>Visit the Screening Resources section of the landing page for additional guidance and a list of useful resources.</li><li>Contact the Help Desk at Climate Help Desk at <strong>climatescreeninghelpdesk@worldbankgroup.org</strong> for advice and assistance on how to build on the results of this risk screening.</li></ul></li></ul></div>';
        $output .= '</div>';
    }
    elseif ($rating == 2) {
        $output .= '<div class="overall-rating-text">';
        $output .= '<div><b>Given that your project may not or only slightly be affected by climate and geophysical hazards, here are some suggested next steps:</b></div>';
        $output .= '<ul style="padding-top: 5px; padding-bottom: 10px !important; margin-top: 0px !important;"><li>Save your assessment.</li><li>If you are confident that climate and geophysical hazards pose no or low risk to the project, continue with project development. However, keep in mind that this is a high-level risk screening at an early stage of project development. Therefore, you are encouraged to monitor the level of climate and geophysical risks to the project as it is developed and implemented.</li></ul>';
        $output .= '<div><b>RESOURCES:</b><br /><ul style="padding-top: 5px;"><li>For a more guided screening of your project Use the In-Depth Screening Assessment</li><li>If you need further assistance:<ul><li>Visit the Screening Resources section of the landing page for additional guidance and a list of useful resources.</li><li>Contact the Help Desk at Climate Help Desk at <strong>climatescreeninghelpdesk@worldbankgroup.org</strong> for advice and assistance on how to build on the results of this risk screening.</li></ul></li></ul></div>';
        $output .= '</div>';
    }
    elseif ($rating == 1) {
        $output .= '<div class="overall-rating-text">';
        $output .=  '<div><b>Given that you have an insufficient understanding of how to assess climate and disaster risks for your project, here are some suggested next steps:</b><br /><ul><li>Save your assessment.</li><li>Gather more information to improve your understanding of climate and geophysical hazards and their relationship to your project.</li><li>Conduct a more guided screening of your project using the In-Depth Screening Assessment.</li><li>Visit the Screening Resources section of the landing page for additional guidance and a list of useful resources.</li><li>Contact the Help Desk at Climate Help Desk at <strong>climatescreeninghelpdesk@worldbankgroup.org</strong> for advice and assistance on how to build on the results of this risk screening.</li></ul></div>';
        $output .= '</div>';
    }
?>
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
                    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                        <div class="field-items">
                        <div class="field-item even">
                            <div class="dt-final-summary">
                                <div class="dt-overall-rating" style="background-color: {{ (($rating != 0) ? config('colors.colors')[$rating]: '') }}; width: 400px; padding-top: 20px; padding-bottom: 20px; text-align: center;">{{ (($rating != 0) ? config('colors.colors_text')[$rating] : '') }}</div>
                                {!! $output !!}
                            </div>
                        </div>
                        </div>
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