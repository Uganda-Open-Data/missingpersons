<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Victim extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'x_handle',
        'gender',
        'notes',
        'nick_name',
        'photo',
        'holding_location_id',
        'status',
        'status_date',
        'security_organ_id',
        'confirmed',
        'photo',
        'remanded_from_id',
        'remanded_by',
        'remanded_to_id',
        'remanded_on',
        'remanded_until',
        'released_on',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'confirmed' => 'boolean',
        'gender' => Gender::class,
        'status' => Status::class,
        'status_date' => 'datetime',
        'remanded_on' => 'date',
        'released_on' => 'date',
        'remanded_until' => 'date',
    ];

    public function getPhotoUrlAttribute(): string {
        return \Storage::disk('media')->url($this->photo);
    }

    public function holdingLocation(): BelongsTo {
        return $this->belongsTo(HoldingLocation::class);
    }

    public function securityOrgan(): BelongsTo {
        return $this->belongsTo(SecurityOrgan::class);
    }

    public function remandedFrom(): BelongsTo {
        return $this->belongsTo(HoldingLocation::class);
    }

    public function remandedTo(): BelongsTo {
        return $this->belongsTo(HoldingLocation::class);
    }

    public function getTwitterAttribute(): string {
        return "https:://x.com/".Str::remove("@", $this->x_handle);
    }

}
