<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberStoreRequest;
use App\Repository\SubscriberRepository;

class SubscriberController extends Controller
{
    private $subscriberRepository;
    public  function  __construct(SubscriberRepository $subscriberRepository)
    {
        $this->subscriberRepository=$subscriberRepository;

    }
    public  function index()
    {

    }
    public function store(SubscriberStoreRequest $subscriberStoreRequest)
    {
        try {
            $this->subscriberRepository->createSubscriber($subscriberStoreRequest);
            $this->setSuccessMessage(' Successfully Subscribe ');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }
}
