<?php


namespace App\Http\Controllers\Api\v1\Gampe;

use App\Contracts\Gampe\NotifyTicketRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class NotifyTicketChangeEventController extends Controller
{
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotifyTicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $body = $request->all();

        $data = $this->repository->notifyTicketAttributeValueChangeEvent($body);

        return response()->json($data);



    }

}
