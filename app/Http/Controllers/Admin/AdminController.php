<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Node;
use App\Exceptions;
use App\Repository\TreeRepositoryInterface;

class AdminController extends Controller
{
	private $model;

	/**
	 * @return mixed
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @param mixed $model
	 */
	public function setModel($model)
	{
		$this->model = $model;
	}
	/**
	 * AdminController constructor.
	 */
	public function __construct(TreeRepositoryInterface $Repository)
	{
		$this->middleware('auth');
		$model=$Repository->getModel();
		$this->setModel($model);
		//var_dump($model);
	}

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }




    public function listtree($model=null,$id = 0)
    {

			$model=$this->getModel();

			if (!$id)
				$pages = $model::getRoots()->get();
			else{
				$current_page = $model::find((int)$id);
				$pages = $current_page->nodes;
				}
				
			//$root = pages::all();
			
			
			//$root = pages::getRoots()->get()->toArray();
			
			//print_r($root);

			$pages_array = [];
			foreach($pages as $k => $page){					
					//var_dump($page);
					//$pages_array[] = array_merge($page->toArray(),["sort"=>$k]);
					$pages_array[] = array_merge($page->toArray(),["nodes"=>[]]);									
			}		
			
			//print_r($pages_array);
			
			return response()->json(
			
					//['objects'=>['id' => 1, "title"=> "node1","nodes"=>[]]]
					$pages_array
			
			);
    }

    public function listnode($id = 0)
    {
			if (!$id)
				throw new \Exception('Node ID is undefined');
			
			
			$current_page = page::find((int)$id);
			
			//var_dump($current_page);
			
			$items = $current_page->node;
			

			if ($items)
					$nodes_array = $items->toArray();
			else
					$nodes_array = [];
			
			return response()->json(
			
					
					$nodes_array
			
			);
			
    }

	
    public function getnode($id = 0)
    {
			if (!$id)
				throw new \Exception('Node ID is undefined');
			

			
			$current_node = Node::find((int)$id);
			
			$nodes_array = [];
			
			if ($current_node){
			
					$getColumn = (new Node)->getAllColumnsNames();			
					//var_dump($getColumn);
					
					$fieldsValue = $current_node->toArray();
			
					$nodes_array = array_map(function($field) use($fieldsValue){
			
							$field['value'] = $fieldsValue[$field['name']];
							return $field;
			
					},$getColumn);
			

			}
			
			return response()->json(
			
					
					$nodes_array
			
			);
			
    }	

	

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
