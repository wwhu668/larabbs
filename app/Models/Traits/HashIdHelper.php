<?php

namespace App\Models\Traits;


use Vinkla\Hashids\Facades\Hashids;

trait HashIdHelper
{
    private $hashId;

    public function getHashIdAttribute()
    {
        if ( !$this->hashId) {
            $this->hasId = Hashids::encode($this->id);
        }

        return $this->hasId;
    }

    public function resolveRouteBinding($value)
    {
        if (!is_numeric($value)) {
            $value = current(Hashids::decode($value));
            if ( !$value) {
                return null;
            }
        }

        return $this->where($this->getRouteKeyName(), $value)->first();
    }

    public function getRouteKey()
    {
        return $this->hash_id;
    }
}