<?php

namespace App\Events;

use App\Models\Item;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ItemPurchased
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public Item $item;

    public function __construct(User $user, Item $item)
    {
        $this->user = $user;
        $this->item = $item;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
