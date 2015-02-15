<?php

class SubjectController extends \BaseController {

        protected $subject;

        public function __construct(Subject $subject, Review $review, DifficultyRating $difficulty_rating, InterestRating $interest_rating,Vote $vote){

                     $this->subject = $subject;
                     $this->review = $review; 
                     $this->difficulty_rating = $difficulty_rating;
                     $this->interest_rating = $interest_rating;
                     $this->vote =  $vote;
        }


	/**
	 * Display a listing of the resource.
	 * GET /subject
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /subject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Subject $subject)
	{
            $reviews = $subject->reviews()->get();

            $auth_user = Auth::user();
            
            foreach($reviews as $review)
            {
                    $vote = Vote::where('user_id',$auth_user->id)->where('review_id', $review->id)->first();
                    if(empty($vote))
                    {
                       $review['usr_vote'] = -1;
                    }
                    else
                    {
                       $review['usr_vote']= $vote->vote;
                    }
            }

            return View::make('subjects.show',compact(['subject','reviews','auth_user']));
    }
  //used to store the new review data   
    public function store()
    {

            $subjectid = Input::get('id');
            $user = Auth::user();
            $review = Input::get('review');
            $diff_rate = Input::get('diff_rate');
            $int_rate = Input::get('int_rate');
 
         //storing the data in the respected table

            $this->review->user_id = $user->id;
            $this->review->subject_id = $subjectid;
            $this->review->content = $review;
            $this->review->save();

              //         $this->subject = $subject;
              //       $this->review = $review; 
              //     $this->difficulty_rating = $difficulty_rating;
              //       $this->interest_rating = $interest_rating
            

             return "Your Review is successfully posted";
    } 

    //used to do the backend of voting
    public function postvoting()
     {
          $userid = Auth::user()->id; 
          $reviewid = Input::get('review_id');
          $vote = Input::get('vote');
          
          $status = Vote::where('user_id', $userid)->where('review_id',$reviewid)->pluck('vote'); 
          
          $up = Review::where('id',$reviewid)->pluck('upvote');
          $down = Review::where('id',$reviewid)->pluck('downvote');

          if($status == NULL)
          { 
                 
                  $this->vote->user_id = $userid;
                  $this->vote->review_id = $reviewid;
                  $this->vote->vote = $vote;
                  $this->vote->save();
        
          if($vote == 1)
              Review::where('id',$reviewid)->update(array('upvote' => ($up + 1)));
           else
              Review::where('id', $reviewid)->update(array('downvote' => ($down +1))); 
                  
          }       
          
          else if($status != $vote)
                {
                    Vote::where('user_id',$userid)->where('review_id',$reviewid)->update(array('vote' => $vote));            
      
                         if($vote == 1)
                         {
                             Review::where('id',$reviewid)->update(array('upvote' => ($up + 1), 'downvote' =>($down -1)));
                         }
                         else
                         {
                                 Review::where('id', $reviewid)->update(array('downvote' => ($down +1),'upvote' =>($up -1))); 
                         }   
                }
          else
                   {
                       Vote::where('user_id',$userid)->where('review_id',$reviewid)->delete();
                       
                       
                if($vote == 1)
                      Review::where('id',$reviewid)->update(array('upvote' => ($up - 1)));
                 else
                      Review::where('id', $reviewid)->update(array('downvote' => ($down -1))); 
             
                

                   }

    }
}
