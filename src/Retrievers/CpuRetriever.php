<?php

namespace WebduoNederland\LaravelHealth\Retrievers;

class CpuRetriever
{
    public function getAvgLoad(): array
    {
        $result = sys_getloadavg();

        if (! $result) {
            return [];
        }

        return [
            '1min' => $result[0],
            '5min' => $result[1],
            '15min' => $result[2],
        ];
    }
}
