<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class ArticleController extends Controller
{
    public function show()
    {

        return view('Admin.Aticle.createArticle');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile("image")) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path("AdminAssets/Aticles-image"), $imageName);

            Article::create([
                'title' => $request->title,
                'user_id' => Auth::id(),
                'content' => $request->content,
                'status' => $request->status,
                'image' => $imageName,
            ]);

            Alert::success('موفقیت', 'مقاله با موفقیت اضافه شد');
            return redirect()->route("Account.Article.Articles");
        }

        Alert::error('خطا', 'تصویر محصول بارگذاری نشد.');
        return redirect()->back();
    }

    public function Articles()
    {
        $user = Auth::user();

        if ($user->role == 'super_admin') {

            $articles = Article::orderBy('created_at', 'desc')->get();

        } else {

            $userId = $user->id;
            $articles = Article::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        }

        return view("Admin.Aticle.Atricles", compact("articles"));
    }
    public function Edit($id){

        $article= Article::find($id);
        return view("Admin.Aticle.edit",compact("article"));
}
public function update(Request $request, $id) {
    $article = Article::find($id);


    $dataForm = $request->except('image');


    if ($request->hasFile('image')) {
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path("AdminAssets/Aticles-image"), $imageName);
        $dataForm['image'] = $imageName;


        $picture = public_path("AdminAssets/Aticles-image/") . $article->image;
        if (File::exists($picture)) {
            File::delete($picture);
        }
    }

    $article->update($dataForm);

    Alert::success('موفقیت', 'مقاله با موفقیت ویرایش شد');
    return redirect()->route("Account.Article.Articles");
}

public function Delete($id){
    $article=Article::find($id);
       // حذف تصویر قبلی اگر وجود داشت
       $picture = public_path("AdminAssets\Aticles-image/") . $article->image;
       if(File::exists($picture)){
           File::delete($picture);
       }
     $article->delete();
     Alert::success('موفقیت', 'مقاله  با موفقیت حذف شد');
     return redirect()->route("Account.Article.Articles");
}
    public function index(Request $request)
{
    $user = Auth::user();
    $query = Article::query();


    if ($request->has('Id_article') && $request->Id_article != '') {
        $query->where('id', $request->Id_article);
    }


    if ($request->has('status') && $request->status !== '') {
        if ($request->status == 'active') {
            $query->where('status', 1);
        } elseif ($request->status == 'inactive') {
            $query->where('status', 0);
        }
    }



    if ($user->role == 'super_admin') {

        $articles = $query->get();
    } else {
        $userId = $user->id;
        $articles = Article::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    }

    return view('Admin.Aticle.Atricles', [
        'articles' => $articles,
        'search' => $request->search,
        'status' => $request->status,
        'Id_article' => $request->Id_article
    ]);
}
}
