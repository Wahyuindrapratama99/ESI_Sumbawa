<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_winner extends Model
{
    use HasFactory;

    protected $table = 'event_winners';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_event_winner';

    protected $fillable =  ["id_event_winner", "event_id", "squad_id", "created_at", "updated_at",];
}