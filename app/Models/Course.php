<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];


    /**
     * Get corresponding school plans in School Plan model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function school_plans(): HasMany
    {
        return $this->hasMany(SchoolPlan::class);
    }


    /**
     * Get corresponding prices in Price model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }


    /**
     * Get the rows in this model
     * @param mixed $pages
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function items($pages = 8): LengthAwarePaginator
    {
        return self::orderBy('name', 'asc')->paginate($pages);
    }


    /**
     * Store the data from request to this model
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public static function store($request): array
    {
        if (self::create($request->all())) {
            return [
                'status' => true,
                'message' => 'Curso registado',
                'type' => 'success'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao registar',
                'type' => 'error'
            ];
        }
    }


    /**
     * Update the data from request to this model
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function _update($request): array
    {
        if ($this->update(attributes: $request->all())) {
            return [
                'status' => true,
                'message' => 'Curso actualizado',
                'type' => 'success'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao actualizar',
                'type' => 'error'
            ];
        }
    }


    /**
     * Destroy the models for given IDs
     * @return array
     */
    public function _destroy(): array
    {
        if ($this->delete()) {
            return [
                'status' => true,
                'message' => 'Curso eliminado',
                'type' => 'success'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao aliminar',
                'type' => 'error'
            ];
        }
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
