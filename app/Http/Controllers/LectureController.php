<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\LectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use App\Services\LectureServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    protected LectureServiceInterface $service;

    public function __construct(LectureServiceInterface $service)
    {
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $lectures = $this->service->getAll();

        return response()->json(LectureResource::collection($lectures));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LectureRequest $request): JsonResponse
    {
       $lecture=$this->service->create($request->validated());
        return response()->json(LectureResource::make($lecture));
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture): JsonResponse
    {
        return response()->json(LectureResource::make($lecture));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LectureRequest $request, Lecture $lecture): JsonResponse
    {
        $this->service->update($request->validated(),$lecture);
        return response()->json(LectureResource::make($lecture));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture): JsonResponse
    {
        $this->service->delete($lecture);
        return response()->json();
    }
}
