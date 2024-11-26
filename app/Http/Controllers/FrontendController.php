<?php

namespace App\Http\Controllers;

use App\Models\admin\AboutUs;
use App\Models\admin\Blog;
use App\Models\admin\Configuration;
use App\Models\admin\Partner;
use App\Models\admin\Pricing;
use App\Models\admin\Service;
use App\Models\admin\Slider;
use App\Models\admin\Superiority;
use App\Models\admin\TestimonialClient;
use App\Models\admin\TypeService;
use App\Models\admin\Video;
use App\Models\admin\WhyUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $typeServices = TypeService::all();
        $partners = Partner::all();
        $whyus = WhyUs::first();
        $pricings = Pricing::all();
        $superioritys = Superiority::all();
        $videos = Video::take(8)->get();
        $configuration = Configuration::first();
        $testimonialClients = TestimonialClient::take(5)->get();
        return view('frontend.index', compact('sliders', 'typeServices', 'partners', 'whyus', 'pricings', 'superioritys', 'videos', 'configuration', 'testimonialClients'));
    }

    public function about()
    {
        $typeServices = TypeService::all();
        $configuration = Configuration::first();
        $about = AboutUs::first();
        $superioritys = Superiority::all();
        $testimonialClients = TestimonialClient::take(5)->get();
        $partners = Partner::all();
        return view('frontend.about', compact('typeServices', 'configuration', 'about', 'superioritys', 'testimonialClients', 'partners'));
    }

    public function price()
    {
        $typeServices = TypeService::all();
        return view('frontend.price', compact('typeServices'));
    }

    public function movie()
    {
        $typeServices = TypeService::all();
        return view('frontend.movie', compact('typeServices'));
    }

    public function services()
    {
        $typeServices = TypeService::all();
        return view('frontend.services', compact('typeServices'));
    }

    public function DetailService($category_id)
    {
        $typeServices = TypeService::all();
        $services = Service::where('category_id', $category_id)->get();
        return view('frontend.services-detail', compact('typeServices', 'services'));
    }

    public function blog()
    {
        $typeServices = TypeService::all();
        return view('frontend.blog', compact('typeServices'));
    }

    public function detailblog($id)
    {
        $typeServices = TypeService::all();
        $blog = Blog::findOrFail($id);
        return view('frontend.blog-detail', compact('blog', 'typeServices'));
    }

    public function notFound()
    {
        return view('frontend.not-found');
    }

    public function contact()
    {
        $typeServices = TypeService::all();
        return view('frontend.contact', compact('typeServices'));
    }
}
