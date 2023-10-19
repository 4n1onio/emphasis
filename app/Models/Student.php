<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;


    /**
     * Get all rows of this model
     * @param int $pages
     * @return \Illuminate\Pagination\Paginator
     */
    public static function items(int $pages = 6): Paginator
    {
        return self::orderBy('id', 'desc')
            ->simplePaginate($pages);
    }


    /**
     * Get paginated rows for select2
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function search($request): LengthAwarePaginator
    {
        return self::select('id', 'name')
            ->where('name', 'like', '%' . $request->searchItem . '%')
            ->paginate(5, ['*'], 'page', $request->page);
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
                'message' => 'ALuno registado',
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
                'message' => 'Aluno eliminado',
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
     * Get a student by a specified ID
     * @param int $id
     * @return array
     */
    public static function take(int $id): array
    {
        $student = self::find($id);
        if ($student) {
            return [
                'status' => true,
                'student' => $student,
                'message' => 'Aluno encontrado',
                'type' => 'success'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Aluno não registado',
                'type' => 'info'
            ];
        }
    }


    /**
     * Set a age of student
     * @return int|null
     */
    public function age(): int|null
    {
        $date = $this->birthDate;

        if ($date) {
            $date = explode('-', $date);

            return date('Y') - $date[0];
        } else {
            return null;
        }
    }


    /**
     * Get the county of school
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }


    /**
     * Format date to dd-mm-yyyy
     * @param string $date
     * @return string
     */
    public function dateFormat(string $date): string
    {
        if ($date) {
            $date = explode('-', $date);
            $date = implode('/', [$date[2], $date[1], $date[0]]);

            return $date;
        } else {
            return null;
        }
    }


    /**
     * Count all records
     * @return int Total records
     */
    public static function records(): int
    {
        return self::all('id')->count();
    }


    /**
     * Get all registrations by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}
