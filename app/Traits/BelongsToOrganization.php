<?php
namespace App\Traits;

trait BelongsToOrganization{

    protected static function bootBelongsToOrganization()
    {
        static::addGlobalScope( new \App\Scopes\OrganizationScope );

        static::creating( function($model)
        {
            if( session()->has('organization_id') ){
                $model->organization_id == session()->get('organization_id');
            }
        });
    }

    public function organization()
    {
        return $this->belongsTo( \App\Models\Organization::class );
    }
}