<?php

namespace App\Http\Controllers;

use App\Models\Todos;
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
            $todo = $this->todos->where('user_id',auth()->user()->id)->select('*');
            $todo->when(isset($request->status),function($query) use ($request) {
                $query->where('status', $request->status);
            });
            return Datatables::of($todo)
                    ->addIndexColumn()
                    ->addColumn('status_flag', function($todo){
                        return  $todo->status ? '<span class="badge text-bg-success">Completed</span>' : '<span class="badge text-bg-warning">Pending</span>';
                    })
                    ->addColumn('action', function($todo){
                        $status_text =  $todo->status ? 'Mark as pending' : 'Mark as completed';
                        return '
                            <div>
                                <button class="btn btn-light border-0 btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="'.route('todo.edit',$todo->id).'">Edit</a></li>
                                    <li><a class="dropdown-item btn-change-status" data-id="'.$todo->id.'" href="#">'.$status_text.'</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item btn-delete text-danger" data-id="'.$todo->id.'" href="#">Delete</a></li>
                                </ul>
                            </div>
                        ';
                    })
                    ->rawColumns(['action','status_flag'])
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


    public function update_status(Request $request, $id)
    {
        $todos = $this->todos->findOrFail($id);
        $todos->update([
            'status'   => !$todos->status
        ]);
        return response([
            "status"  => true,
            "message" => __('app.todo_updated')
        ]);
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
