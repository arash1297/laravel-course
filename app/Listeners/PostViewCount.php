<?php

namespace App\Listeners;

use App\Events\PostViewEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostViewCount implements shouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostViewEvent  $event
     * @return void
     */
    public function handle(PostViewEvent $event)
    {
        $post=$event->post;
        $post->count_id+=1;
        $post->save();
    }
}
