<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\Paginator;

class SchoolYear extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;


    /**
     * Get corresponding prices in Price model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'school_year_id');
    }


    /**
     * Get the rows of this model
     * @param int $pages
     * @return \Illuminate\Pagination\Paginator
     */
    public static function items(int $pages = 8): Paginator
    {
        return self::orderBy('id', 'desc')
                    ->simplePaginate($pages);
    }


    /**
     * Store data from request to this model
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public static function store($request): array
    {
        if (self::create($request->all())) {
            return [
                'status' => true,
                'message' => 'Ano lectivo registado',
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
     * Update data from request to this model
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function _update($request): array
    {
        if ($this->update($request->all())) {
            return [
                'status' => true,
                'message' => 'Dados actualizados',
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
     * Destroy the model for given IDs
     * @return array
     */
    public function _destroy(): array
    {
        if ($this->delete()) {
            return [
                'status' => true,
                'message' => 'Dados eliminados',
                'type' => 'success'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao eliminar',
                'type' => 'error'
            ];
        }
    }


    /**
     * Set the given string to specific format
     * @param string $date string represents a date
     * @return string The string in specific date format
     */
    public function date_format(string $date): string
    {
        $date = explode(separator: '-', string: $date);
        $date = implode(separator: '/', array: [$date[2], $date[1], $date[0]]);
        return $date;
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
