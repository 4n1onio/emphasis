<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClass extends Model
{
    use HasFactory;

    public $timestamps = false;


    /**
     * Get corresponding school plans in School Plan model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function school_plans(): HasMany
    {
        return $this->hasMany(SchoolPlan::class, 'school_class_id');
    }

    /**
     * Get corresponding prices in Price model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'class_id');
    }


    /**
     * Get a correspondig last month of payment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function last_month_payment(): HasMany
    {
        return $this->hasMany(LastMonthPayment::class, 'school_class_id');
    }


    /**
     * get all classes created by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function created_classes(): HasMany
    {
        return $this->hasMany(CreatedClass::class);
    }


    /**
     * get all registrations by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}
