<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\BaseController;

use App\Http\Requests\IT\ReplyRequest;
use App\Http\Resources\IT\ReplyResource;
use App\Interfaces\ReplyRepositoryInterface;
use App\Traits\HttpResponses;
use App\Helpers\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReplyController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(ReplyRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function store(ReplyRequest $request)
    {
        try {
            $reply = $this->crudRepository->create($request->validated());
            DB::table('replies')->where('id', $reply->id)->update(['user_id' => Auth::user()->id]);

            return response()->json([
                'status' => true,
                'message' => trans(JsonResponse::MSG_ADDED_SUCCESSFULLY),
                'data' => new ReplyResource($reply->fresh(['user'])),
            ]);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
