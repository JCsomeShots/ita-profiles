<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdditionalTraining extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = ['id'];

    public function resumes(): BelongsToMany
    {
         // As a guide, we implement Laravel naming conventions for relationships.
        // See: https://laravel.com/docs/10.x/eloquent-relationships#many-to-many        
        return $this->belongsToMany(Resume::class);        
    }

}
