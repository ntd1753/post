<?php

namespace App\Http\Controllers;

use App\Models\Locate;
use App\Models\Post;
use App\Models\PostTransation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        return view('post.index',['posts'=>Post::all()]);
    }
    public function add(){
        $locates=Locate::where('name','!=','vi')->get();
        return view('post.add',['locates'=>$locates]);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'content' => 'required|string',
            'translations' => 'required|array',
            'translations.*.locale_id' => 'required|exists:locates,id',
            'translations.*.name' => 'required|string|max:100',
            'translations.*.content' => 'required|string',
        ]);
        $localeIds = array_column($request->input('translations'), 'locale_id');
        if(count($localeIds) !== count(array_unique($localeIds))){
            return response()->json(['message' => 'One language can only have one translation']);
        };
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();  // Trả lại dữ liệu nhập trước đó cho form
        }
        $post = Post::create([
            'author_id' => Auth::user()->id,
            'name' => $request->name,
            'content' => $request['content'],
        ]);


        foreach ($request->translations as $translationData) {
            $postTr = PostTransation::create([
                'post_id' => $post->id,
                'locale_id' => $translationData['locale_id'],
                'name' => $translationData['name'],
                'content' => $translationData['content'],
            ]);
        }

        return redirect()->route('post.index');
    }
}
