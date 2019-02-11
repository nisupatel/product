<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['id', 'name', 'project_number', 'assessment_completed_by', 'estimated_timeline_PCN_year', 'estimated_timeline_PCN_quarter', 'project_ttl',
    'tool_id', 'concept_note', 'description', 'funding_source'];

    public function countries()
    {
        return $this->belongsToMany('App\Models\Country', 'project_countries', 'project_id', 'country_id')->with('region');
    }

    public function tool()
    {
        return $this->belongsTo('App\Models\Tool');
    }

    public function rapid()
    {
        return $this->hasOne('App\Models\DecisionTree');
    }
}
