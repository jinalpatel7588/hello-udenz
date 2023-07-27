<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'chapter_code',
        'logo',
        'contact_name',
        'contact_mobile_number',
        'type',
        'region_id',
        'date',
        'logo_2',
        'logo_3',
        'monthly_payment',
        'six_months_payment',
        'portal_access_status',
        'expire_at',
        'gst_type'
    ];

    public function chapterEmail(): HasOne
    {
        return $this->hasOne(Admin::class, 'chapter_id');
    }

    public function region(): BelongsTo
    {
        return $this->BelongsTo(Region::class, 'region_id');
    }
}
