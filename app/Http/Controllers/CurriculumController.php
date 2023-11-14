<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\CurriculumResource;
use App\Http\Resources\ShowStudentResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\CurriculumServiceInterface;
use App\Services\StudentServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{  protected CurriculumServiceInterface $service;

    public function __construct(CurriculumServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $curriculum = $this->service->getAll();

        return response()->json(CurriculumResource::collection($curriculum));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): JsonResponse
    {
        $curriculum = $this->service->create($request->validated());

        return response()->json(CurriculumResource::make($curriculum));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): JsonResponse
    {
        return response()->json(ShowStudentResource::make($student));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student): JsonResponse
    {

        $this->service->update($request->validated(), $student);

        return response()->json(ShowStudentResource::make($student));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        $this->service->delete($student);
        return response()->json();
    }
}
