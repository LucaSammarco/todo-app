<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'created_by',
        'assigned_to',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // ✅ L'utente può vedere se manager o assegnato a sé
    public function canBeAccessedBy($user)
    {
        return $user->hasRole('manager') || $this->assigned_to === $user->id;
    }

    // ✅ L'utente può modificare/eliminare se:
    // - è manager e il creatore è manager o employee
    // - è employee e il creatore è lui stesso
    public function canBeModifiedBy($user)
    {
        if ($user->hasRole('manager')) {
            return true;
        }

        return $user->id === $this->created_by;
    }

    // ✅ L'utente può assegnare task solo se:
    // - è manager → a tutti
    // - è employee → solo a sé stesso
    public static function canAssignTo($authUser, $targetUserId)
    {
        if ($authUser->hasRole('manager')) {
            return true;
        }

        return $authUser->id === $targetUserId;
    }
}
