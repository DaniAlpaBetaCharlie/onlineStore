<?php

namespace App\Models;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * - $this->id          : int        → primary key
     * - $this->total       : int|float  → total order
     * - $this->user_id     : int        → foreign key ke users
     * - $this->created_at  : timestamp
     * - $this->updated_at  : timestamp
     * - $this->user        : User       → relasi User
     * - $this->items       : Item[]     → relasi Item
     */

    protected $fillable = ['total', 'user_id'];

    /** 🔹 Validation */
    public static function validate($request): void
    {
        $request->validate([
            'total'   => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);
    }

    /** 🔹 Getters & Setters */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal(): int|float
    {
        return $this->attributes['total'];
    }

    public function setTotal(int|float $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    // public function getCreatedAt(): string
    // {
    //     return $this->attributes['created_at'];
    // }

    // public function setCreatedAt(string $createdAt): void
    // {
    //     $this->attributes['created_at'] = $createdAt;
    // }

    // public function getUpdatedAt(): string
    // {
    //     return $this->attributes['updated_at'];
    // }

    // public function setUpdatedAt(string $updatedAt): void
    // {
    //     $this->attributes['updated_at'] = $updatedAt;
    // }

    /** 🔹 Relationships */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
