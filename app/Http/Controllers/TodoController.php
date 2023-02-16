<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Models\User;
use Illuminate\Http\Request;

use DataTables;

class TodoController extends Controller
{
    public $todos;

    public function __construct(Todos $todos)
    {
        $this->todos = $todos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) { 
            return Datatables::of($this->todos->select('*'))
                    ->addIndexColumn()
                    ->addColumn('action', function($todo){
                        return '
                            <a href="'.route('todo.edit',$todo->id).'" class="btn btn-outline-primary btn-sm"> 
                                <i class="bi bi-pencil me-1"></i> 
                            </a>
                            <a>
                            <i class="bi bi-trash btn btn-sm btn-danger btn-delete" data-id="'.$todo->id.'"></i>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:350'
        ]); 

        $this->todos->create([
            'title'   => $request->title,
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('todo.index'))->withSuccess(__('app.todo_created'));
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
        $todo = $this->todos->findOrFail($id);
        return view('todo.edit',compact('todo'));
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
        $request->validate([
            'title' => 'required|max:350'
        ]); 

        $this->todos->findOrFail($id)->update([
            'title'   => $request->title
        ]);

        return redirect(route('todo.index'))->withSuccess(__('app.todo_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todos->findOrFail($id)->delete();

        return response([
            "status"  => true,
            "message" => __('app.todo_deleted')
        ]);
    }
}
