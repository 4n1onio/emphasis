<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\Paginator;

class Registration extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get paginated records
     * @param mixed $pages
     * @return \Illuminate\Pagination\Paginator
     */
    public static function items($pages = 8): Paginator
    {
        return self::latest()->simplePaginate($pages);
    }


    /**
     * Search for specific registration
     * @param int $key1 school year ID
     * @param int $key2 student ID
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function search(int $key1, int $key2): Collection
    {
        return self::where('school_year_id', $key1)
            ->where('student_id', $key2)->get();
    }


    /**
     * Get paginate records in student model
     * @return \Illuminate\Pagination\Paginator
     */
    public static function students(): Paginator
    {
        return Student::items();
    }


    /**
     * Get student by ID
     * @param int $id
     * @return array
     */
    public static function find_student(int $id): array
    {
        $student = Student::find($id);

        if ($student) {
            return array($student);
        } else {
            return [];
        }
    }


    /**
     * Get record by ID
     * @param int $id student id
     * @return \App\Models\Student
     */
    public static function get_student(int $id): Student
    {
        return Student::find($id);
    }


    /**
     * Count students
     * @return int number of students
     */
    public static function nb_students(): int
    {
        return Student::all()->count();
    }


    /**
     * Get all school years from School Year model
     */
    public static function current_year()
    {
        return SchoolYear::orderBy('id', 'desc')->first();
    }


    /**
     * Get school years
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function school_years(): Collection
    {
        return SchoolYear::orderBy('id','desc')->get();
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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public static function store($request): array
    {
        if (self::create($request->all())) {
            return [
                'status' => true,
                'message' => 'Matrícula realizada',
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
                'message' => 'Dados eliminados',
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


    /**
     * get specific student by the relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
