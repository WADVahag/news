<?php 
namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\FileService;

class NewsController extends Controller {

    public function __construct(){
      $this->fileService = new FileService("public");  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $news = News::all();

        return view("admin.news.index")->with("news", $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view("admin.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            "title" => "required|min:3",
            "body" => "required|min:10", 
            "image" => "required|image|max:4096",
            "categories" => "required|array|min: 1",
            "categories.*" => "required|string",
        ]);

        $filename = $this->fileService->storeFileGetUrl($request, "image", "images");
      
        $data = $request->all();
        $data["image"] = $filename;

        $news = News::create($data);

        $news->categories()->sync($request->categories);

        return back()->withSuccess("News created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news) {
        return view("news_show")->with("news", $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news) {
        $news->load("categories");
        $category_ids = $news->categories->pluck("id")->toArray();

        return view("admin.news.edit")->with(compact("news", "category_ids"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news) {
        $this->validate($request, [
            "title" => "required|min:3",
            "body" => "required|min:10", 
            "image" => "nullable|image|max:4096",
            "categories" => "required|array|min: 1",
            "categories.*" => "required|string",
        ]);
      
        $data = $request->all();

        if($request->hasFile("image")){
            $this->fileService->deleteFile("images/{$news->image}");
            $filename = $this->fileService->storeFileGetUrl($request, "image", "images");
            $data["image"] = $filename;
        }

        $news->update($data);

        $news->categories()->sync($request->categories);

        return redirect()->route("admin.news.index")->withSuccess("News updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news) {
        $this->fileService->deleteFile("images/{$news->image}");

        $news->delete();

        return back()->withSuccess("News item was deleted successfully");
    }
}