<?php
namespace App\Repositories\Dashboard\Messages;

use App\Models\Form;
use Carbon\Carbon;

class MessagesRepository implements IMessagesRepository{

    public function getMessages(){

        $messages = Form::select('id', 'name', 'city', 'phone', 'created_at' , 'email' , 'message')
        ->get();
        return $messages;

    }

    public function countMessages(){

        $todayMessagesCount = Form::whereDate('created_at', today())->count();
        return $todayMessagesCount;

    }

    public function getLastThreeMessages(){

        $startOfDay = Carbon::today();

    return Form::where('created_at', '>=', $startOfDay)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get(['name', 'phone', 'created_at']);
}
}
