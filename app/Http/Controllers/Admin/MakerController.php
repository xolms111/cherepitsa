<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Maker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maker = Maker::with('product')->get();
        return view('admin.maker.index', ['maker' => $maker]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('id', 'name')->get();
        return view('admin.maker.add', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alias = $this->tourl($this->translite($request->alias));
        $request->alias = $alias;
        $empty = Maker::where('alias', $alias)->first();

        if (isset($empty)) {
            Session::flash('error', 'Такой alias уже занят');
            return redirect()->back()->withInput();
        }
        $this->validate($request, [
            'alias' => 'required|unique:makers,alias|min:2|max:60',
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'country' => 'required',
            'category_id' => 'required',
            'text' => 'required'
        ]);
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));

        $status = Maker::create($input);
        $category = array();
        $category['category_id'] = $request->category_id;
        $status->category()->attach($category);
        if ($status) {
            Session::flash('flash_message', 'Категория успешно добавлена');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::select('id', 'name')->get();
        $maker = Maker::findOrFail($id);
        return view('admin.maker.edit', ['category' => $category, 'maker' => $maker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $maker = Maker::findOrFail($id);
        $alias = $this->tourl($this->translite($request->alias));

        if ($alias != $maker->alias) {
            $empty = Maker::where('alias', $alias)->first();
            if (isset($empty)) {
                Session::flash('error', 'Такой alias уже занят');
                return redirect()->back()->withInput();
            }
        }
        $this->validate($request, [
            'alias' => 'required|min:2|max:60',
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'text' => 'required'
        ]);
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));
        $status = $maker->fill($input)->save();
        if($status) {
            Session::flash('flash_message', 'Успешно обновлено');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maker = Maker::findOrFail($id);
        $status = $maker->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
}