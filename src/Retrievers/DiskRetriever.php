<?php

namespace WebduoNederland\LaravelHealth\Retrievers;

use Illuminate\Support\Facades\Process;

class DiskRetriever
{
    public function getUsedPercentage(): int
    {
        $result = Process::run('df -P .');

        preg_match('/(\d+)%/', $result->output(), $matches);

        return (int) $matches[1];
    }

    public function getUsedMbs(): int
    {
        $total = intval(round(disk_total_space('/') / 1024 / 1024));

        return intval(round($total - (disk_free_space('/') / 1024 / 1024)));
    }

    public function getTotalMbs(): int
    {
        return intval(round(disk_total_space('/') / 1024 / 1024));
    }
}
