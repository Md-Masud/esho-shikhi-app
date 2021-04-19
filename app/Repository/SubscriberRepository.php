<?php


namespace App\Repository;


use App\Models\Subscriber;

class SubscriberRepository
{
    public  function getSubscriberOfIndex()
    {
        return $subscribers=Subscriber::all();
    }
    public  function  createSubscriber($request)
    {

        $subscribers=Subscriber::create([

            'email'=>$request->email,
        ]);
        return $subscribers;
    }
}
