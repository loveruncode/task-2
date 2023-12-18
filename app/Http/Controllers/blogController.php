<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\BlogModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;

class blogController extends Controller
{
    public function insertBlog(Request $request)
    {
        $request->validate([
            'nameblog' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $nameblog = $request->input('nameblog');
        $status = $request->input('status');
        $slug = Str::slug($nameblog);

        $blog = new BlogModel();
        $blog->name = $nameblog;
        $blog->slug = $slug;
        $blog->status = $status;

        if ($blog->save()) {

            return redirect()->back()->with('success', 'Đã Thêm Blog Thành Công');
        } else {
            // Lỗi khi lưu
            Log::error('Có lỗi khi thêm Blog');
            return redirect()->back()->with('error', 'Có lỗi khi thêm Blog');
        }
    }

    public function getValue()
    {

        $blog = BlogModel::latest()->get();

        return view('Blog.home', ['blog' => $blog]);
    }

    public function delete($id)
    {

        $blog = BlogModel::find($id);

        try {

            $blog->delete();
            return redirect()->back()->with('success', 'Đã Xoá thành công');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Có lỗi khi xoá' . $e->getMessage());
        }
    }

    public function update(Request $res, $id)
    {

        $res->validate([
            'nameblog' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $blog = BlogModel::find($id);

        $blog->name = $res->input('nameblog');
        $blog->status = $res->input('status');
        $blog->slug = Str::slug($blog->name);

        $blog->save();
        return redirect('/homepage')->with('succes', 'Đã sửa đổi thành công ');
    }


    public function getvalueUpdate()
    {

        $id = request('id');

        return view('Blog.update', compact('id'));
    }




    public function deleteId(Request $request)
    {


        $ids = $request->ids;
        BlogModel::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Đã xoá các mục đã chọn');


        // $selectId = $request->input('selectedIds');

        // BlogModel::whereIn('id', $selectId)->delete();

        // return response()->json(['success' =>'Đã xoá cac mục']);
    }
}
