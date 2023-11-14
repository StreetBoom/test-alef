<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Http\Resources\ClassroomResource;
use App\Http\Resources\LectureResource;
use App\Models\Classroom;
use App\Services\ClassroomServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    protected ClassroomServiceInterface $service;

    public function __construct(ClassroomServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $classrooms = $this->service->getAll();
        return response()->json(ClassroomResource::collection($classrooms));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request): JsonResponse
    {
        $classroom = $this->service->create($request->validated());

        return response()->json(ClassroomResource::make($classroom));
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom): JsonResponse
    {
        return response()->json(ClassroomResource::make($classroom));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, Classroom $classroom): JsonResponse
    {
        $this->service->update($request->validated(), $classroom);
        return response()->json(ClassroomResource::make($classroom));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom): JsonResponse
    {
        $this->service->delete($classroom);
        return response()->json();
    }

    public function lectures(Classroom $classroom): JsonResponse
    {
        $lectures = $this->service->getLectures($classroom);
        return response()->json(LectureResource::collection($lectures));

    }
}
