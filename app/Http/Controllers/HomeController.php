<?php

namespace App\Http\Controllers;

use Foo\Bar\A;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Article;
use TCG\Voyager\Models\Category;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use TCG\Voyager\Models\Page;
use Carbon\Carbon;
use App;
use URL;

class HomeController extends Controller
{


    public function index()
    {
        $page = page_cache('index');
        $latest_news = latest_articles_cache();
        return view('index',compact('page','latest_news'));
    }

    public function about_us($slug)
    {
        $page = page_cache($slug);
        return view('about',compact('page'));
    }

    public function service($slug)
    {
        $page = page_cache($slug);
        return view('service',compact('page'));
    }

    public function contact_us()
    {
        $page = page_cache('contact-us');
        return view('contact_us',compact('page'));
    }

    public function articles($slug)
    {
        $categories = Category::all();
//        $category = Category::whereSlug($slug)->firstOrFail();
        $category = $categories->where('slug',$slug)->first();
        $articles = Article::where('category_id',$category->id)->where('published_at','<',Carbon::now())->orderBy('published_at', 'desc')->select('name','slug','image','excerpt','featured','published_at')->paginate(12);

        return view('articles',compact('categories','category','articles'));
    }

    public function article($slug)
    {
        $categories = Category::all();
        $article = article_cache($slug);
        $category = $categories->where('id',$article->category_id)->first();

        return view('article',compact('article','categories','category'));
    }

    public function product_category($slug)
    {
        $product_category = ProductCategory::whereSlug($slug)->firstOrFail();
        $products = Product::where('product_category_id',$product_category->id)->orderBy('featured', 'desc')->orderBy('updated_at', 'desc')->select('name','slug','image','featured')->paginate(12);
//        $featured_products = Product::whereFeatured(1)->orderBy('updated_at', 'desc')->select('name','slug','image','featured')->take(9)->get();
        return view('products',compact('product_category','products'));
    }
    public function product($slug)
    {
        $product = product_cache($slug);
        $related_products = Product::where('product_category_id',$product->product_category_id)->where('id', '<>', $product->id)->orderBy('featured', 'desc')->orderBy('order', 'asc')->select('name','slug','image','order','featured')->take(3)->get();
//        $featured_products = featured_products_cache();

        return view('product',compact('product','related_products'));
    }

//    public function product_categories($slug)
//    {
//        return view('product_categories',compact('slug'));
//    }



//    public function galleries()
//    {
//        $galleries = Gallery::all();
//
//        return view('gallery',compact('galleries'));
//    }
//
//    public function gallery($slug)
//    {
//        $gallery = Gallery::whereSlug($slug)->firstOrFail();
//        $related_galleries = Gallery::where('product_category_id',$gallery->product_category_id)->where('id', '<>', $gallery->id)->orderBy('featured', 'desc')->orderBy('updated_at', 'desc')->select('name','slug','image','product_code','featured')->paginate(8);
//
//        return view('gallery',compact('gallery','related_galleries'));
//    }

    public function sitemap()
    {
        $sitemap = App::make('sitemap');
        $sitemap->setCache('laravel.sitemap', 1440);

        if (!$sitemap->isCached()) {
            $last_article = Article::orderBy('updated_at', 'desc')->firstOrFail();
            $last_product = Product::orderBy('updated_at', 'desc')->firstOrFail();
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(URL::to('/'), $last_article->updated_at, '1.0', 'daily');
            $sitemap->add(URL::to('about_us'), page_cache(2)->updated_at, '0.9', 'monthly');
            $sitemap->add(URL::to('contact_us'), page_cache(3)->updated_at, '0.9', 'monthly');
            $sitemap->add(URL::to('service'), page_cache(4)->updated_at, '0.9', 'monthly');
            $sitemap->add(URL::to('news'), $last_article->updated_at, '0.9', 'daily');

            $articles = Article::where('published_at','<',Carbon::now())->orderBy('published_at', 'desc')->select('name','slug','published_at','updated_at')->get();
            foreach ($articles as $article){
                $sitemap->add(URL::to('article/'.$article->slug),$article->updated_at,'0.8','monthly');
            }

            $sitemap->add(URL::to('products'), $last_product->updated_at, '0.9', 'weekly');
            $sitemap->add(URL::to('functions'), $last_product->updated_at, '0.9', 'weekly');

            $products = Product::orderBy('updated_at','desc')->select('name','slug','updated_at')->get();
            foreach ($products as $product){
                $sitemap->add(URL::to('product/'.$product->slug),$product->updated_at,'0.9','weekly');
            }
        }

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }


//    public function search(Request $request)
//    {
//        $search_words = $request->input('search_words');
//
//        return redirect('/search_result')->with('search_words', $search_words);
//    }
//
//    public function search_result()
//    {
//        $search_words = session('search_words');
//        $products = Product::search($search_words,null,true)->select('name','slug','image','product_code')->paginate(20);
//        $featured_products = Product::whereFeatured(1)->orderBy('updated_at', 'desc')->select('name','slug','image','product_code','featured')->take(9)->get();
//
//        return view('search_products',compact('products','search_words','featured_products'));
//    }

}
