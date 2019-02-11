<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DecisionTree extends Model
{
     protected $fillable = ['project_id', 'component_type',
     'exposure_types', 'exposure_rating', 'exposure_notes',
      'impact_sectors', 'impact_rating','impact_notes',
    'softcom_types', 'softcom_rating', 'softcom_vulnerability',
     'softcom_vul_alleviate','softcom_notes','context_rating',
     'context_notes','outcome_rating','outcome_notes'];

    public function tool()
    {
        return $this->belongsTo('App\Models\Tool');
    }
}
