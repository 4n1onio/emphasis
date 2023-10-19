<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

class CreatedClass extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;


    /**
     * Get all records
     * @param int $pages
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function items(int $pages = 8): LengthAwarePaginator
    {
        return self::orderBy('id', 'desc')->paginate($pages);
    }


    /**
     * Get all school years from School Year model
     */
    public static function current_year()
    {
        return SchoolYear::orderBy('id', 'desc')->first();
    }


    /**
     * Get all classes in Classe model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    static function school_classes(): Collection
    {
        return SchoolClass::orderBy('level', 'asc')->get();
    }


    /**
     * Get all courses in Course model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    static function courses(): Collection
    {
        return Course::orderBy('name', 'asc')->get();
    }


    /**
     * Store the data from request to this model
     * @param \App\Http\Requests\StoreCreatedClassRequest $request
     * @return array
     */
    public static function store($request): array
    {
        if (self::create($request->all())) {
            return [
                'status' => true,
                'message' => 'Turma registada',
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
     * @param \App\Http\Requests\UpdateCreatedClassRequest $request
     * @return array
     */
    public function _update($request): array
    {
        if ($this->update(attributes: $request->all())) {
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
     * Destroy the models for given IDs
     * @return array
     */
    public function _destroy(): array
    {
        if ($this->delete()) {
            return [
                'status' => true,
                'message' => 'Turma eliminada',
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
     * get specific school year by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school_year(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }


    /**
     * get specific school class by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school_class(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class);
    }


    /**
     * get specific course by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
