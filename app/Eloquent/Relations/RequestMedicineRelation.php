<?php

namespace App\Eloquent\Relations;

use App\Eloquent\User;
use App\Eloquent\Image;
use App\Eloquent\ItemPrescription;

trait RequestMedicineRelation
{
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getItemPrescription()
    {
        return $this->belongsTo(ItemPrescription::class, 'item_prescription_id');
    }

    public function getAllImages()
    {
        return $this->hasMany(Image::class, 'request_medicines_id');
    }
}
