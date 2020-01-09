<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use App\Http\Traits\UtilTrait;
use App\Restaurant;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{
    use ResponseTrait, UtilTrait;

    /**
     * @var Request
     */
    private $request;

    /**
     * RestaurantController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Restaurant Listing API Call
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $restaurants = Restaurant::orderByDesc('open')->sorting($this->request)->search($this->request)->paginate(10);
            return $this->successResponse($restaurants->appends($this->request->except('page')));
        }catch (Exception $exception){
            Log::error($this->getLogArray($exception));
        }
        return $this->failResponse();
    }
}
