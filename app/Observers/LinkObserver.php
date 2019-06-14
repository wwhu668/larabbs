<?php

namespace App\Observers;

use App\Models\Link;
use Cache;
use Hashids\Hashids;

class LinkObserver
{
    // 在保持时清空 cache_key 对应的缓存
    public function saved(Link $link)
    {
        Cache::forget($link->cache_key);
    }
}