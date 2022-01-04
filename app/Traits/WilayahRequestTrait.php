<?php


namespace App\Traits;


trait WilayahRequestTrait
{
    public function getWilayahId()
    {
        if ($this->has('wilayah')) {
            return $this->get('wilayah')['id'];
        }
        return $this->get('wilayah_id') ?? null;
    }

    public function getWilayahIds()
    {
        if ($this->has('wilayah')) {
            return $this->get('wilayah');
        }
        return null;
    }
}