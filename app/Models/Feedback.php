<?php

namespace App\Models;

use App\Notifications\ContactFormNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Feedback extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'message',
    ];

    public function sendContactFormFeedback()
    {
        $this->notify(new ContactFormNotification($this->feedback));
    }
}
