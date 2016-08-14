<?php

namespace App\Http\Controllers\Admin;

use App\Core\HttpHelper;
use App\Models\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $game = new Game();
        $query = $game->newQuery();
        if ($request->has('id')) {
            $query = $query->where('id', $request->input('id'));
        }
        if ($request->has('title')) {
            $query = $query->where('title', 'like', '%' . $request->input('title') . '%');
            //$query->where(DB::raw('title COLLATE latin1_general_ci like \''.$request->isMethod('title').'\' '));
        }
        if ($request->has('from')) {
            $query = $query->where('from', 'like', '%' . $request->input('from') . '%');
        }
        $items = $query->orderBy('id', 'desc')->paginate(15);
        return view('admin/game/index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = \App\Core\Upload::save($request->file('icon_url'), '/images/icon/');
        if ($result) {
            $datas = HttpHelper::isVals($request->all(), [
                'lang', 'title', 'from', 'hot', 'hot_base', 'stars', 'screen_display', 'open', 'recommend', 'path', 'desc'
            ]);
            Game::create(array_merge($datas, ['icon_url' => $result]));
            return redirect('/admin/games')->with('upload_result_class', 'success')->with('upload_result', '新增游戏成功!');
        } else {
            return redirect('/admin/games')->with('upload_result_class', 'danger')->with('upload_result', '上传文件出错，请重新新增!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Game::find($id);
        return view('admin/game/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = \App\Core\Upload::save($request->file('icon_url'), '/images/icon/');
        $datas = HttpHelper::isVals($request->all(), [
            'lang', 'title', 'from', 'hot', 'hot_base', 'stars', 'screen_display', 'open', 'recommend', 'path', 'desc'
        ]);
        Game::where('id', $id)->update(array_merge($datas, ['icon_url' => $result]));
        return redirect('/admin/games')->with('upload_result_class', 'success')->with('upload_result', '修改游戏成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
