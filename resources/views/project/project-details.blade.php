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
        <h1 class="page-header">Project Details</h1>
        <div class="projDetails">
        <table class="table">
        <tbody>
            <tr>
            <th>Project Title:</th>
            <td>{{ $project->name }}</td>
            </tr>
            <tr>
            <th scope="row">Project Number:</th>
            <td>{{ $project->project_number }}</td>
            </tr>
            <tr>
            <th scope="row">Type of Assessment:</th>
            <td>{{ $project->tool_type }}</td>
            </tr>
            <tr>
            <th scope="row">Assessment Completed by:</th>
            <td>{{ $project->assessment_completed_by }}</td>
            </tr>
            <tr>
            <th scope="row">Project Year:</th>
            <td>{{ $project->estimated_timeline_PCN_year }}</td>
            </tr>
            <tr>
            <th scope="row">Funding Source:</th>
            <td>{{ $project->funding_source }}</td>
            </tr>
            <tr>
            <td colspan="2">
                <div class="project-details-buttons">
                <div class="edit-project-link" style="">
                    <a href="{{ route('project.edit', $project->id) }}">Edit Project Details</a>
                </div>
                <div class="start-proj">
                    <a href="{{ route('rapid.projectType', $project->id) }}">Start Rapid Screening Assessment</a>
                </div>
                </div>
            </td>
            </tr>

        </tbody>
        </table>
        </div>
    </section>
</div>
@endsection
