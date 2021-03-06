<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ApiRequest;
use App\Models\Activity;
use App\Models\GoodsType;
use App\Models\TaskType;
use App\Services\ApiLog;
use App\Services\GameServerNew;
use Illuminate\Http\Request;
use Exception;
use App\Models\Tasks;

class ActivitiesController extends Controller
{
    public function showActivities(ApiRequest $request)
    {
        try {
            $activities = Activity::all();

            return [
                'result' => true,
                'data' => $activities,
            ];
        } catch (Exception $exception) {
            throw new ApiException($exception->getMessage());
        }
    }

    public function addActivities(ApiRequest $request)
    {
        try {
            $aid = $this->getNewestAid();
            $params = $request->only([
                'name', 'open_time', 'end_time', 'reward_refresh_time', 'reward', 'open', 'task',
            ]);
            $params['aid'] = $aid;
            $result = GameServerNew::request('activity', 'modify', $params);

            return [
                'result' => true,
                'data' => $result,
            ];
        } catch (Exception $exception) {
            throw new ApiException($exception->getMessage());
        }
    }

    //获取最新的活动id, （新建活动需要传入新的aid）
    protected function getNewestAid()
    {
        $lastActivity = Activity::orderBy('aid', 'desc')->first();
        if (empty($lastActivity)) {
            return 1;
        } else {
            return $lastActivity->aid + 1;
        }
    }

    public function updateActivities(ApiRequest $request)
    {
        try {
            $params = $request->only([
                'aid', 'name', 'open_time', 'end_time', 'reward_refresh_time', 'reward', 'open', 'task',
            ]);
            $result = GameServerNew::request('activity', 'modify', $params);

            return [
                'result' => true,
                'data' => $result,
            ];
        } catch (Exception $exception) {
            throw new ApiException($exception->getMessage());
        }
    }

    public function deleteActivities(ApiRequest $request)
    {
        try {
            $params = $request->only([
                'aid',
            ]);
            $result = GameServerNew::request('activity', 'remove', $params);

            return [
                'result' => true,
                'data' => $result,
            ];
        } catch (Exception $exception) {
            throw new ApiException($exception->getMessage());
        }
    }
}
