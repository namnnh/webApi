<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joke;
use App\Models\User;
use App\Http\Requests;

class JokesController extends Controller
{
    public function __CONSTRUCT(){
        $this->middleware('jwt.auth');
    }

    public function index(Request $request){
        $search_term = $request->input('search');
        $limit = $request->input('limit')?$request->input('limit'):5;
        if($search_term){
            $jokes = Joke::orderBy('id','DESC')->where('body','LIKE',"%$search_term%")->with(
                array('User'=>function($query){
                    $query->select('id','username');
                })
            )->select('id', 'body', 'user_id')->paginate($limit);
        }else{
             $jokes = Joke::with(
                array('User'=>function($query){
                    $query->select('id','username');
                })
            )->select('id', 'body', 'user_id')->paginate(5); 
        }
        return response()->json($this->transformCollection($jokes), 200);
    }

    public function show($id){
        $joke = Joke::with(array('User'=>function($query){
                $query->select('id','username');
        }))->find($id);
        if(!$joke){
            return response()->json(['error'=>['message'=> 'Joke does not exist']],404);
        }
        $previous = Joke::where('id','<',$joke->id)->max('id');
        $next = Joke::where('id','>',$joke->id)->min('id');
        return response()->json(['previous_joke_id'=> $previous,'next_joke_id'=> $next,'data' =>$this->transform($joke)], 200);
    }

    public function store(Request $request){
        if(!$request->body or !$request->user_id){
            return response()->json(['error'=>['message'=>'Please Provide Both body and user_id']], 422);
        }
        $joke = Joke::create($request->all());
        return response()->json([
                'message' => 'Joke Created Successfully',
                'data' => $this->transform($joke)
            ], 200);
    }

    public function destroy($id){
        Joke::destroy($id);
    }

    public function update(Request $request,$id){
        if(!$request->body or !$request->user_id){
            return response()->json(['error' => ['message'=>'Please Provide Both body and user_id']], 422);
        }
    }

   private function transformCollection($jokes){
        $jokesArray = $jokes->toArray();
        return [
            'total' => $jokesArray['total'],
            'per_page' => intval($jokesArray['per_page']),
            'current_page' => $jokesArray['current_page'],
            'last_page' => $jokesArray['last_page'],
            'next_page_url' => $jokesArray['next_page_url'],
            'prev_page_url' => $jokesArray['prev_page_url'],
            'from' => $jokesArray['from'],
            'to' =>$jokesArray['to'],
            'data' => array_map([$this, 'transform'], $jokesArray['data'])
        ];
    }
    
    private function transform($joke){
        $joke = Joke::find($joke['id']);
        return [
            'joke_id' => $joke['id'],
            'joke' => $joke['body'],
            'submitted_by' => $joke['user']['username']
            ];
    }
   
}
