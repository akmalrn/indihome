<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\Service;
use App\Models\admin\TestimonialClient;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalTestimonials = TestimonialClient::count();
        $visits = Visit::selectRaw('DATE(visited_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $todayVisit = Visit::whereDate('visited_at', now()->format('Y-m-d'))->count();
        $yesterdayVisit = Visit::whereDate('visited_at', now()->subDay()->format('Y-m-d'))->count();

        $onlineVisitorsCount = Visit::where('visited_at', '>=', now()->subMinutes(5))->count();

        $totalVisits = Visit::count();

        $percentageChange = 0;
        if ($yesterdayVisit > 0) {
            $percentageChange = (($todayVisit - $yesterdayVisit) / $yesterdayVisit) * 100;
        }
        $totalBlog = Blog::count();

        return view('backend.index', compact('totalServices', 'totalTestimonials', 'totalBlog', 'visits', 'todayVisit', 'percentageChange', 'onlineVisitorsCount', 'totalVisits'));
    }

}
