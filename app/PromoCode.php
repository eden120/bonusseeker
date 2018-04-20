<?php

namespace App;

class PromoCode extends Base
{
    protected $fillable = [
        'casino_id', 'is_active', 'is_featured', 'sort_by', 'permalink', 'name', 'slug', 'start_date', 'end_date', 'promo_code', 'max_promo_amount', 'banner', 'description', 'terms_and_conditions', 'seo_title', 'seo_description', 'seo_keywords', 'promo_type_id', 'entry_instruction_id',
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function promoType()
    {
        return $this->belongsTo(PromoType::class, 'promo_type_id');
    }

    public function promoEntry()
    {
        return $this->belongsTo(PromoEntryInstruction::class, 'entry_instruction_id');
    }

    public function casino()
    {
        return $this->belongsTo(Casino::class);
    }
}