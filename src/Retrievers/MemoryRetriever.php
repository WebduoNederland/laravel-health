<?php

namespace WebduoNederland\LaravelHealth\Retrievers;

class MemoryRetriever
{
    public function getTotal(): int
    {
        return (int) match (PHP_OS_FAMILY) {
            'Darwin' => intval(`sysctl hw.memsize | grep -Eo '[0-9]+'` / 1024 / 1024),
            'Linux' => intval(`cat /proc/meminfo | grep MemTotal | grep -E -o '[0-9]+'` / 1024),
            'Windows' => intval(((int) trim(`wmic ComputerSystem get TotalPhysicalMemory | more +1`)) / 1024 / 1024),
            'BSD' => intval(`sysctl hw.physmem | grep -Eo '[0-9]+'` / 1024 / 1024),
            default => 0,
        };
    }

    public function getUsed(): int
    {
        $total = $this->getTotal();

        return (int) match (PHP_OS_FAMILY) {
            'Darwin' => $total - intval(intval(`vm_stat | grep 'Pages free' | grep -Eo '[0-9]+'`) * intval(`pagesize`) / 1024 / 1024),
            'Linux' => $total - intval(`cat /proc/meminfo | grep MemAvailable | grep -E -o '[0-9]+'` / 1024),
            'Windows' => $total - intval(((int) trim(`wmic OS get FreePhysicalMemory | more +1`)) / 1024),
            'BSD' => intval(intval(`( sysctl vm.stats.vm.v_cache_count | grep -Eo '[0-9]+' ; sysctl vm.stats.vm.v_inactive_count | grep -Eo '[0-9]+' ; sysctl vm.stats.vm.v_active_count | grep -Eo '[0-9]+' ) | awk '{s+=$1} END {print s}'`) * intval(`pagesize`) / 1024 / 1024),
            default => 0,
        };
    }
}
