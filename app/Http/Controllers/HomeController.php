<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\Post, App\Tag, App\Req, App\Question, App\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect, Input, Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function questions(){

        $results = Question::where('sender_id', Auth::user()->_id)->get();
        return view('questions')->with('results', $results);
    }

    public function addQuestion(Request $request){

        $rules = [
            'question'   => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {

            $ques = new Question();
            $ques->sender_id = Auth::user()->_id;
            $ques->question = $data['question'];

            if($ques->save()){
                return redirect()->route('questions')
                    ->with('success', 'Question added successfully!');
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to add question!');
            }
        }
    }

    public function deleteQuestion($id){

        $ques = Question::findOrFail($id);
        
        if($ques->delete()){
            return redirect()->route('questions')
                ->with('success', 'Question deleted successfully');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to delete question!');
        }
    }

    public function search(){

        return view('search');
    }

    public function searchResults(Request $request){

        $rules = [
            'name'   => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {

            $q = $data['name'];

            $searchTerms = explode(' ', $q);

            foreach($searchTerms as $term)
            {
                $query = User::where('name', 'LIKE', '%'. $term .'%');
            }

            $results = $query->get();

            return view('search')->with('results', $results);
        }
    }

    public function profile($id){
        
        $already = Req::where('sender_id', Auth::user()->_id)->where('receiver_id', $id)->get();
        $result = User::findOrFail($id);
        return view('profile')->with('result', $result)->with('already', $already);
    }

    public function send($id){

        $req = new Req();
        $req->sender_id = Auth::user()->_id;
        $req->receiver_id = $id;
        $req->status = 0;

        if($req->save()){
            return redirect()->route('home')
                ->with('success', 'Request sent successfully!');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to send request!');
        }
    }

    public function requests(){

        $has = Req::where('receiver_id', Auth::user()->_id)->where('status', 0)->get();
        $i = 0;
        if(count($has)){
            foreach ($has as $key) {
                $reqs[$i] = $key['_id'];
                $id[$i++] = User::where('_id', $key['sender_id'])->get();
            }
            return view('requests')->with('id', $id)->with('reqs', $reqs);
        }
        else{
            
            $reqs = [];
            $id[] = [];

            return view('requests')->with('id', $id)->with('reqs', $reqs);
        }
    }

    public function page($id){
        
        $id = Req::findOrFail($id);
        $ques = Question::where('sender_id', $id->sender_id)->get();
        return view('page')->with('id', $id)->with('ques', $ques);
    }

    public function store(Request $request){

        $data = $request->all();
        $ques = Question::where('sender_id', $data['sender_id'])->get();
        $req = Req::where('_id', $data['request_id'])->first();

        if(!empty($ques)){
            foreach ($ques as $key) {
                $q = 'Ques' . $key->_id;
                $req->$q = $key->question;
                $a = 'Ans' . $key->_id;
                $req->$a = $data[$key->_id];
                $req->save();
            }
        }
             
        $req->status = 1;

        if($req->save()){
            return redirect()->route('home')
                ->with('success', 'Slambook filled successfully!');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to post!');
        }

    }

    public function delete($id){

        $req = Req::findOrFail($id);
        
        if($req->delete()){
            return redirect()->route('home')
                ->with('success', 'Request deleted successfully');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to delete request!');
        }
    }

    public function slams(){
        $requests = Req::where('sender_id', Auth::user()->_id)->where('status', 1)->first();
        
        if(!empty($requests)){
            $next = Req::where('sender_id', Auth::user()->_id)->where('status', 1)->where('_id', '>', $requests->_id)->min('_id');
            
            $questions = Question::where('sender_id', Auth::user()->_id)->get();
            
            return view('slams')->with('requests', $requests)->with('questions', $questions)->with('next', $next);
        }
        else
            return view('slams')->with('requests', $requests);
    }

    public function postSlams($id){
        
        $requests = Req::where('_id', $id)->where('status', 1)->first();
        $questions = Question::where('sender_id', Auth::user()->_id)->get();
        $next = Req::where('sender_id', Auth::user()->_id)->where('status', 1)->where('_id', '>', $requests->_id)->min('_id');
        $prev = Req::where('sender_id', Auth::user()->_id)->where('status', 1)->where('_id', '<', $requests->_id)->max('_id');

        return view('slams')->with('requests', $requests)->with('questions', $questions)->with('next', $next)->with('prev', $prev);
    }

    public function edit($id){

        $has = Req::where('_id', $id)->first();
        $has->status = 0;

        if($has->save()){
            return redirect()->route('home')
                ->with('success', 'Request sent successfully!');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to send request!');
        }
    }

}
