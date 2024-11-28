<?php

namespace App\Http\Controllers;

use App\Models\admin\AboutUs;
use App\Models\admin\Blog;
use App\Models\admin\CategoryBlog;
use App\Models\admin\CategoryService;
use App\Models\admin\servicesService;
use App\Models\admin\Configuration;
use App\Models\admin\Contact;
use App\Models\admin\OurTeam;
use App\Models\admin\Partner;
use App\Models\admin\Pricing;
use App\Models\admin\Service;
use App\Models\admin\Slider;
use App\Models\admin\Superiority;
use App\Models\admin\TestimonialClient;
use App\Models\admin\Price;
use App\Models\admin\Video;
use App\Models\admin\WhyUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $categoryservices = CategoryService::all();
        $sliders = Slider::all();
        $services = Service::all();
        $partners = Partner::all();
        $whyus = WhyUs::first();
        $pricings = Pricing::all();
        $superioritys = Superiority::all();
        $videos = Video::take(8)->get();
        $configuration = Configuration::first();
        $testimonialClients = TestimonialClient::take(5)->get();
        return view('frontend.index', compact('categoryservices', 'sliders', 'services', 'partners', 'whyus', 'pricings', 'superioritys', 'videos', 'configuration', 'testimonialClients', 'contact', 'about'));
    }

    public function about()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $categoryservices = CategoryService::all();
        $services = Service::all();
        $configuration = Configuration::first();
        $superioritys = Superiority::all();
        $testimonialClients = TestimonialClient::take(5)->get();
        $partners = Partner::all();
        $ourteam = OurTeam::all();
        return view('frontend.about', compact('categoryservices', 'services', 'configuration', 'about', 'superioritys', 'testimonialClients', 'partners', 'ourteam', 'contact'));
    }

    public function price()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $configuration = Configuration::first();
        $categoryservices = CategoryService::all();
        $services = Service::all();
        $price = Pricing::take(4)->get();
        return view('frontend.price', compact('configuration', 'services', 'categoryservices', 'price', 'contact', 'about'));
    }

    public function services()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $categoryservices = CategoryService::all();
        $services = Service::all();
        $configuration = Configuration::first();
        return view('frontend.services', compact('services', 'categoryservices', 'configuration', 'contact', 'about'));
    }

    public function DetailService($category_id)
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $configuration = Configuration::first();
        $categoryservices = CategoryService::all();
        $services = Service::where('category_id', $category_id)->get();

        if ($services->isEmpty()) {
            abort(404, 'Layanan tidak ditemukan untuk kategori ini');
        }

        return view('frontend.services-detail', compact('configuration', 'categoryservices', 'services', 'contact', 'about'));
    }

    public function blog()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $categoryservices = CategoryService::all();
        $services = Service::all();
        $configuration = Configuration::first();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        $categoryBlogs = CategoryBlog::all();
        return view('frontend.blog', compact('categoryservices', 'services', 'configuration', 'blogs', 'categoryBlogs', 'contact', 'about'));
    }

    public function search(Request $request)
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $categoryBlogs = CategoryBlog::all();
        $categoryservices = CategoryService::all();
        $configuration = Configuration::first();
        $query = $request->input('query');
        $blogs = Blog::where('title', 'LIKE', "%{$query}%")->orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.blog-list', compact('blogs', 'categoryBlogs', 'categoryservices', 'configuration', 'contact', 'about'))->with('query', $query);
    }

    public function detailblog($id)
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $blogs = Blog::all();
        $services = Service::all();
        $configuration = Configuration::first();
        $blog = Blog::findOrFail($id);
        $categoryservices = CategoryService::all();
        $previousBlog = Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-detail', compact('blogs', 'blog', 'configuration', 'services', 'categoryservices', 'previousBlog', 'nextBlog', 'contact', 'about'));
    }

    public function notFound()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        return view('frontend.not-found', compact('contact', 'about'));
    }

    public function contact()
    {
        $contact = Contact::first();
        $about = AboutUs::first();
        $configuration = Configuration::first();
        $categoryservices = CategoryService::all();
        $services = Service::all();
        return view('frontend.contact', compact('configuration', 'services', 'categoryservices', 'contact', 'about'));
    }
}
