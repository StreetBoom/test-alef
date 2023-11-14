<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\ShowStudentResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\StudentServiceInterface;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    protected StudentServiceInterface $service;

    public function __construct(StudentServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $students = $this->service->getAll();

        return response()->json(StudentResource::collection($students));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): JsonResponse
    {
        $student = $this->service->create($request->validated());

        return response()->json(ShowStudentResource::make($student));
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
