<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Traits\Api\SendResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsFaqTncController extends Controller
{
    use SendResponse;

    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slug' => 'required'
        ], [
            'slug.required' => 'Event slug is required.'
        ]);

        if ($validator->fails()) {
            $this->setError('422', $validator->errors()->toArray());
            return $this->sendAPIResponse();
        }

        $rootAssetPath = env('CDN_ROOT_PATH');
        $event = $this->eventRepository->getEventDataThroughSlug($request->get('slug'));
        $faq = $event->faq;

        $this->setResponseData([
            'data' => [
                'success' => true,
                'event' => $event,
                'faq' => $faq ?? null,
                'rootAssetPath' => $rootAssetPath
            ]
        ]);

        return $this->sendAPIResponse();
    }
}
