<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Return the number of orders created in the last month.
     */
    public function ordersCount(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        return $this->response([
            Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count(),
        ]);
    }

    /**
     * Return the sum of sales in the last month.
     */
    public function ordersSalesSum(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        return $this->response([
            Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->sum('sum'),
        ]);
    }

    /**
     * Return the ratio of orders by delivery method.
     */
    public function deliveryMethodRatio(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        $response = [];

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        $allOrders = Order::query()
            ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
            ->whereRelation('status', 'code', 'closed')
            ->count();

        foreach (DeliveryMethod::all() as $deliveryMethod) {
            $deliveryMethodOrders = $deliveryMethod->orders()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count();

            $response[] = [
                'name' => $deliveryMethod->getTranslations('name'),
                'percentage' => round($deliveryMethodOrders / $allOrders * 100, 2),
                'amount' => $deliveryMethodOrders,
            ];
        }

        return $this->response($response);
    }

    /**
     * Return the number of orders created by day in the last month.
     */
    public function ordersCountByDay(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        $days = CarbonPeriod::create($from, $to);
        $response = new Collection();

        LazyCollection::make($days->toArray()->each(function ($day) use ($from, $to) {
            $count = Order::query()
                ->whereBetween('created_at', [$day->startOfDay(), $day->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count();

            $response[] = [
                'date' => $day->format('Y-m-d'),
                'orders_count' => $count,
            ];
        }));

        return $this->response($response);
    }
}
