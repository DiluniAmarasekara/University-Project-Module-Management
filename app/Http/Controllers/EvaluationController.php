<?php namespace App\Http\Controllers;

use App\EvaluationMarks;
use DB;
use Request;
use Input;
class EvaluationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
         
        public function __construct() 
        {
            notificationController::showNotificationAccordingToCurrentUser();
        }

        public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
                /*Get all supervisor names acording to the supervisor id*/
                $supervisaornames = DB::select("SELECT name,id 
		 FROM panelmembers
		 WHERE id = any (SELECT supervisorId 
		 FROM projects
		 WHERE status = 'Approved')");
                
                /*Get all group ids*/
                $groupids = DB::select("SELECT groupID 
		 FROM research_groups");
 
                /*Get all student actual id acording to the auto generated id*/
                $studentid = DB::select("SELECT id,regId 
		 FROM students
		 WHERE id = any (SELECT studentId 
		 FROM projects
		 WHERE status = 'Approved')");
                                
                /*filtering projects according to the groups*/
		$students = DB::select("SELECT id,title,studentId,supervisorId 
		 FROM projects
		 WHERE status = 'Approved' and groupIDforTitle = any (SELECT groupID 
		 FROM research_groups)");
                
              
            return view('evaluation.evaluationform', compact('students', 'supervisaornames', 'studentid', 'groupids'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
        {
           // dd(Request::get('cmntmem'));
            if(Request::get('cmntmem0') != null)
            {        
                EvaluationMarks::create([
  
                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem0'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab1'),
                    'proposalreport' => Request::get('marksforproposalreporttab1'),
                    'srsreport' => Request::get('marksforsrstab1'),
                    'protopresent' => Request::get('marksforprototab1'),
                    'midpresent' => Request::get('marksformidpresentab1'),
                    'midreport' => Request::get('marksfomidreporttab1'),
                    'finalprsent' => Request::get('marksforfinalpresnttab1'),
                    'finalreport' => Request::get('marksforfinalreporttab1'),
                    'viva' => Request::get('marksforvivatab1'),
                    'researchbook' => Request::get('marksforresearchbooktab1'),
                    'researchpaper' => Request::get('marksforresearchpapertab1'),
                    'website' => Request::get('marksforwebsitetab1'),
                    'status' => Input::get('statustab1')

               ]);
            }
            
            if(Request::get('cmntmem1') != null)
            {
                EvaluationMarks::create([

                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem1'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab2'),
                    'proposalreport' => Request::get('marksforproposalreporttab2'),
                    'srsreport' => Request::get('marksforsrstab2'),
                    'protopresent' => Request::get('marksforprototab2'),
                    'midpresent' => Request::get('marksformidpresentab2'),
                    'midreport' => Request::get('marksfomidreporttab2'),
                    'finalprsent' => Request::get('marksforfinalpresnttab2'),
                    'finalreport' => Request::get('marksforfinalreporttab2'),
                    'viva' => Request::get('marksforvivatab2'),
                    'researchbook' => Request::get('marksforresearchbooktab2'),
                    'researchpaper' => Request::get('marksforresearchpapertab2'),
                    'website' => Request::get('marksforwebsitetab2'),
                    'status' => Input::get('statustab2')

                   ]);
            }
            
            if(Request::get('cmntmem2') != null)
            {
//                EvaluationMarks::create([
//
//                    'stugrpid' => Input::get('selectid'),
//                    'stuid' => Request::get('cmntmem1')
////                    'proposalpresent' => Request::get('marksforproposalpresenttab2'),
////                    'proposalreport' => Request::get('marksforproposalreporttab2'),
////                    'srsreport' => Request::get('marksforsrstab2'),
////                    'protopresent' => Request::get('marksforprototab2'),
////                    'midpresent' => Request::get('marksformidpresentab2'),
////                    'midreport' => Request::get('marksfomidreporttab2'),
////                    'finalprsent' => Request::get('marksforfinalpresnttab2'),
////                    'finalreport' => Request::get('marksforfinalreporttab2'),
////                    'viva' => Request::get('marksforvivatab2'),
////                    'researchbook' => Request::get('marksforresearchbooktab2'),
////                    'researchpaper' => Request::get('marksforresearchpapertab2'),
////                    'website' => Request::get('marksforwebsitetab2'),
////                    'status' => Input::get('statustab2')

//                   ]);
            }

            return redirect('evaluationform');
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
