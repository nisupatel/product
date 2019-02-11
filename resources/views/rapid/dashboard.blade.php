@extends('layouts.app')
@section('styles')
    <link href="{{ asset('assets/styles/tooltipster.bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="top-container">
        <div class="main-container container">
            <div class="row">
                <section class="col-sm-12">
                    <h1 class="page-header">
                        Rapid Screening Assessment - {{ Session::get('project')->tool_name }}
                        <div class="dt_top_btn"><a href="{{ route('rapid.projectType', $projectData->id) }}">Edit Project Type</a></div>
                    </h1>
                    <div id="decision-tree-physical" class="decision_tree">
                        @if(Session::get('project')->tool_id == 1)
                            @include('rapid.agriculture.rapid')
                        @elseif(Session::get('project')->tool_id == 2)
                            @include('rapid.water.rapid')
                        @elseif(Session::get('project')->tool_id == 3)
                            @include('rapid.energy.rapid')
                        @elseif(Session::get('project')->tool_id == 4)
                            @include('rapid.natural.rapid')
                        @elseif(Session::get('project')->tool_id == 5)
                            @include('rapid.transportation.rapid')
                        @else
                            <p>Not a valid project.</p>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection