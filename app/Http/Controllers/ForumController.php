<?php namespace App\Http\Controllers;


use Illuminate\Http\Requests;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Addpost;
use App\FreeSlots;
use App\newsfeed;
use App\comments;
use App\PanelMember;
use App\PresentationPanel;
use App\Project;
use App\Student;
use DB;
use Crypt;
use Input, Redirect, Hash, Mail, URL, Response;
use Carbon;



class ForumController extends Controller {



    public function getPost(){


        $posts=newsfeed::orderBy('datetime','desc')->paginate(5);
        $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

        return view('groupForum', ['posts'=>$posts ],['uname'=>$username]);

    }

    public function prevComments()
    {
        $com=comments::all();
        return $com;
        //return view('groupForumdisplay/{id}')->with('comments',$com);


    }

    public function __construct()
    {

        notificationController::showNotificationAccordingToCurrentUser();
    }

    public function getComment(){

        $comments=comments::all();

        return view('groupForum{id?}',['comments'=>$comments]);

    }


    public function viewQuestion($po)
    {

        $p=newsfeed::find($po);
        $v= DB::table('newsfeed')
            ->select('views')
            ->where('id',$p)
            ->first();


        $v++;
        $p->views = $v;
        $p->save();
        $com=comments::where('post_id',$po)->get();
        $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;


      return view('groupForumdisplay',compact('p'))->with('com',$com)->with('uname',$username);


    }

    public function editPost($po)
    {

        $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

        if($po == $username){
            return true;
        }
        else
            return false;
    }



    public function viewPost(){


        $posts=newsfeed::all();

        return view('viewPost',['forum'=>$posts]);

    }




    public function add_new_post()
    {

        $posts=newsfeed::all();
        return view('groupForum' , ['posts'=>$posts]);
    }

   public function editPostView($id)
    {
       $p = newsfeed::find($id);
        return view('editPost',compact('p'));
    }


    public function editPostN()
    {
        if (isset($_POST['toEdit'])) {

            $topic=Input::get('e_topic');
            $msg = Input::get('e_detail');
            $date = new DateTime("now", new DateTimeZone('Asia/Colombo') );
            $file = Input::file('file');


            if ($file != null) {

                //check whether a file is choosen

                $postid=$_POST['toEdit'];
                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $destinationPath = '/uploads/forum/' . $name;
                $file->move(public_path() . '/uploads/forum/', $name);


                if ($ext == 'docx' || $ext == 'pdf' || $ext == 'zip') {

                    $t = newsfeed::find($_POST['toEdit']);
                    $t->topic = $topic;
                    $t->message=$msg;
                    $t->datetime=$date;
                    $t->link=$destinationPath;
                    $t->file_name=$name;
                    $t->save();
                    \Session::flash('message_success', 'Post Updated Successfully!!');
                    $posts=newsfeed::orderBy('id','desc')->paginate(5);
                    $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

                    return view('groupForum', ['posts'=>$posts ],['uname'=>$username]);



                } elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'JPG') {

                    $t = newsfeed::find($_POST['toEdit']);
                    $t->topic = $topic;
                    $t->message=$msg;
                    $t->datetime=$date;
                    $t->file=$destinationPath;
                    $t->file_name=$name;
                    $t->save();
                    \Session::flash('message_success', 'Post Updated Successfully!!');


                    $posts=newsfeed::orderBy('id','desc')->paginate(5);
                    $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

                    return view('groupForum', ['posts'=>$posts ],['uname'=>$username]);

                }

            } else {

                $postid=$_POST['toEdit'];
                $t = newsfeed::find($_POST['toEdit']);
                $t->topic = $topic;
                $t->message=$msg;
                $t->datetime=$date;
                $t->save();
                \Session::flash('message_success', 'Post Updated Successfully!!');
                $posts=newsfeed::orderBy('id','desc')->paginate(5);
                $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

                return Redirect::to('/groupForumdisplay/'.$postid);


            }


        }
        elseif (isset($_POST['delete'])) {
            $postid=$_POST['toEdit'];

            $u = comments::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Post Deleted Successfully!!');

            return Redirect::to("/groupForumdisplay/".$postid);


        }

    }

    public function deleteandgetpost(Addpost $post){



        if (isset($_POST['delete'])) {

            $u = newsfeed::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Post Deleted Successfully!!');
            return Redirect::to('/groupForum');


        }


//        $search = DB::table('newsfeed')->where('topic', 'LIKE', '%' . $query . '%')->paginate(10);
//        return view('groupForum', compact('query', 'search'));

        else {


            $unique = true;
            $topic = $post->topic;
            $msg = $post->message;
            $date = new DateTime("now", new DateTimeZone('Asia/Colombo') );
            $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;
            $file = Input::file('file');


            if ($file != null) {

                //check whether a file is choosen


                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $destinationPath = '/uploads/forum/' . $name;
                $file->move(public_path() . '/uploads/forum/', $name);


                if ($ext == 'docx' || $ext == 'pdf' || $ext == 'zip') {

                    newsfeed::create(['topic' => $topic, 'message' => $msg, 'link' => $destinationPath, 'file_name' => $name, 'datetime' => $date, 'username' => $username]);
                    \Session::flash('message_success', 'Post Added Successfully!!');

                    return Redirect::to("/groupForum");

                } elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'JPG') {


                    newsfeed::create(['topic' => $topic, 'message' => $msg, 'file' => $destinationPath, 'file_name' => $name, 'datetime' => $date, 'username' => $username]);
                    \Session::flash('message_success', 'Post Added Successfully!!');
                    return Redirect::to("/groupForum");

                }

            } else {


                $dt = Carbon\Carbon::now();
                $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;


                newsfeed::create(['topic' => $topic, 'message' => $msg, 'datetime' => $dt, 'username' => $username]);
                \Session::flash('message_success', 'Post Added Successfully!!');

                return Redirect::to("/groupForum");


            }
        }
    }



    public function search(){
        $query = Input::get('search');

        $search = DB::table('newsfeed')->where('topic', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('groupForum', compact('query', 'search'));

    }

    /* public function destroy( $id, Request $request ) {
         $post = Product::findOrFail( $id );

         if ( $request->ajax() ) {
             $post->delete( $request->all() );

             \Session::flash('message_success', 'Post Updated Successfully!!');
         }
         return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
     }*/

}


