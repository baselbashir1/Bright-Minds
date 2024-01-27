<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\ProgressRequest;
use App\Http\Services\ProgressService;
use App\Http\DTOs\Requests\ProgressRequestDTO;

class ProgressController extends Controller
{
    private ProgressService $progressService;
    public function __construct(ProgressService $progressService)
    {
        $this->progressService = $progressService;
    }

    public function getProgressById($id)
    {
        $progress = $this->progressService->getProgressById($id);

        return $progress
            ? response()->json($progress, 200)
            : response()->json(['message' => 'Progress not found'], 404);
    }

    public function getProgressByUserId($userId)
    {
        $progress = $this->progressService->getProgressByUserId($userId);

        return $progress
            ? response()->json($progress, 200)
            : response()->json(['message' => 'Progress not found'], 404);
    }

    public function getProgressByGameId($gameId)
    {
        $progress = $this->progressService->getProgressByGameId($gameId);

        return $progress
            ? response()->json($progress, 200)
            : response()->json(['message' => 'Progress not found'], 404);
    }

    public function getProgressByUserIdAndGameId($userId, $gameId)
    {
        $progress = $this->progressService->getProgressByUserIdAndGameId($userId, $gameId);

        return $progress
            ? response()->json($progress, 200)
            : response()->json(['message' => 'Progress not found'], 404);
    }

    public function addProgress(ProgressRequest $progressRequest)
    {
        $progressRequestDTO = new ProgressRequestDTO($progressRequest);
        try {
            $this->progressService->addProgress($progressRequestDTO);
            return response()->json(['success' => 'Progress added successfully.'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
