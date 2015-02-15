<?php

class HomeController extends BaseController {
         
        public function showhome()
        {
        $user = Auth::user();
        $faculty  = Faculty::all();
        $semester = Semester::all();
        $semester1 = Semester::take(8)->get();
        return View::make('home/home')->with('faculty',$faculty)->with('semester',$semester)->with('semester1' , $semester1)->with('user', $user) ;
        }

        public function showsubject($facultyname, $semestername)
        {
            $facultyid = Faculty::where('faculty_name', $facultyname)->pluck('id'); 
            $semesterid =Semester::where('semester_name', $semestername)->pluck('id'); 
            $faculty = Faculty::find($facultyid)->subject()->wherePivot('semester_id',$semesterid)->get();
            $user = Auth::user();
            return View::make('home/subject')->with('faculty', $faculty)->with('user',$user);
    
        }
           
        public function showreview($subjectname)
        {
                $subjectid = Subject::where('subject_name', $subjectname)->pluck('id');
                $user = Auth::user();
              
           $urs =   Urs::where('subject_id',$subjectid)->where('user_id',$user->id)->get();   


           $review = Subject::find($subjectid)->review()->get();
           $username = Subject::find($subjectid)->user()->get();
           $subjectname = Subject::find($subjectid);
              

           return View::make('home/review')->with('urs',$urs)->with('username',$username)->with('review',$review)->with('subjectname',$subjectname)->with('user',$user);
 
        }
        
        public function newreview($subjectname)
        {
                      
        $subjectid = Subject::where('subject_name', $subjectname)->pluck('id');
        $user = Auth::user();
         
        $getrate = Input::get('rate');
        $review=  Review::create(array(
                    'content' =>Input::get('name')
          ));
              
         Sur::create(array(
                 'subject_id' => $subjectid,
                 'user_id' => $user->id,
                 'review_id'=> $review->id 
         ));

          
        $rate = Subject::where('subject_name', $subjectname)->pluck('rate');
        $number = Subject::where('subject_name', $subjectname)->pluck('number');
    
        $newrate = (($rate * $number)+ $getrate)/($number+1);
          
          Subject::where('subject_name', $subjectname)->update(array('rate'=>$newrate, 'number' =>( $number+1)));      
    
        return "your review has been successfully posted";
                    
        }
        
        public function like($reviewid)
        {
                $userid = Auth::user()->id;
                $getstatus = Input::get('name');
                $subjectid = Input::get('sid');

               $status = Urs::where('user_id', $userid)->where('review_id',$reviewid)->pluck('status'); 
               $up = Review::where('id',$reviewid)->pluck('up');
               $down = Review::where('id',$reviewid)->pluck('down');

                if($status == NULL)
                {

                Urs::create(array(
                     'subject_id' =>$subjectid,   
                     'review_id' => $reviewid,
                      'user_id' => $userid,
                      'status' => $getstatus
              ));

                if($getstatus == 1)
                      Review::where('id',$reviewid)->update(array('up' => ($up + 1)));
                 else
                       Review::where('id', $reviewid)->update(array('down' => ($down +1))); 
             
                }
                else if($status != $getstatus)
                {
                     Urs::where('user_id',$userid)->where('review_id',$reviewid)->update(array('status' => $getstatus));            
      
                         if($getstatus == 1)
                         {
                             Review::where('id',$reviewid)->update(array('up' => ($up + 1), 'down' =>($down -1)));
                         }
                         else
                         {
                                 Review::where('id', $reviewid)->update(array('down' => ($down +1),'up' =>($up -1))); 
                         }   
                } 
                   else
                   {
                       Urs::where('user_id',$userid)->where('review_id',$reviewid)->delete();
                       
                       
                if($getstatus == 1)
                      Review::where('id',$reviewid)->update(array('up' => ($up - 1)));
                 else
                       Review::where('id', $reviewid)->update(array('down' => ($down -1))); 
             
                

                   }
        }
}
