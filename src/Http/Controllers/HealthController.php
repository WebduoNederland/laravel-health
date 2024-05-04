<?php

namespace WebduoNederland\LaravelHealth\Http\Controllers;

use Illuminate\Http\JsonResponse;
use WebduoNederland\LaravelHealth\Retrievers\CpuRetriever;
use WebduoNederland\LaravelHealth\Retrievers\DiskRetriever;
use WebduoNederland\LaravelHealth\Retrievers\MemoryRetriever;

class HealthController
{
    public function __construct(
        protected CpuRetriever $cpuRetriever,
        protected MemoryRetriever $memoryRetriever,
        protected DiskRetriever $diskRetriever,
    ) {
        //
    }

    public function __invoke(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => [
                'cpu' => [
                    'avg' => $this->cpuRetriever->getAvgLoad(),
                ],
                'memory' => [
                    'used_mbs' => $this->memoryRetriever->getUsed(),
                    'total_mbs' => $this->memoryRetriever->getTotal(),
                ],
                'disk' => [
                    'used_percentage' => $this->diskRetriever->getUsedPercentage(),
                    'used_mbs' => $this->diskRetriever->getUsedMbs(),
                    'total_mbs' => $this->diskRetriever->getTotalMbs(),
                ],
            ],
        ]);
    }
}
