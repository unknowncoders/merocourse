<?php

class SubjectController extends \BaseController {

        protected $subject;

        public function __construct(Subject $subject, Review $review, DifficultyRating $difficulty_rating, InterestRating $interest_rating,Vote $vote,UserResource $user_resource ){

                $this->subject = $subject;
                $this->review = $review; 
                $this->difficulty_rating = $difficulty_rating;
                $this->interest_rating = $interest_rating;
                $this->vote =  $vote;
                $this->user_resource = $user_resource;
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
        public function show(Subject $subject,$filter='recent')
        {
                $courseterms = $subject->courseterms()->get();

                foreach($courseterms as $courseterm)
                {
                        $courses[] = $courseterm->course()->get();
                }
                if( $filter =='recent')
                {
                        $reviews = $subject->reviews()->orderBy('created_at','DESC')->paginate(1);
                }
                elseif($filter == 'popular')
                {
                        $reviews = $subject->reviews()->orderBy('popularity_index','DESC')->paginate(1); 
                }

                $user_resources = $subject->userResources()->where('check',1)->get();
                $admin_resources = $subject->adminResources()->get();

                $diff_rate =  DifficultyRating::where('user_id',Auth::user()->id)->where('subject_id',$subject->id)->first();
                $int_rate = InterestRating::where('user_id', Auth::user()->id)->where('subject_id',$subject->id)->first();

                $already_written = Review::where('user_id', Auth::user()->id)->where('subject_id',$subject->id)->first();

                foreach($user_resources as $user_resource)
                {
                        $user_resource['name'] = User::where('id',$user_resource->user_id)->pluck('name');
                }

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

                $isRelated = false;
                $cnt =0;

                $userCourses = Auth::user()->courses;


                foreach($courses as $course){
                        foreach($userCourses as $userCourse){
                            if($course[$cnt]["id"]== $userCourse->id){
                                $isRelated = true;
                               break; 
                            }
                        }

                        if($isRelated)
                                break;
                        
                }


                return View::make('subjects.show',compact(['subject','courses','already_written','diff_rate','int_rate','reviews','auth_user','user_resources','admin_resources','isRelated']));
        }
        //user to store the rating of the subject

        public function deletereview()

        {
                $id = Input::get('id');
                Review::find(Input::get('id'))->delete();

                Vote::where('review_id',$id)->delete();

                return "Your Review is successfully deleted"; 
        }

        public function postrating()
        {
                $diff_rating = Input::get('diff_rating');
                $int_rating = Input::get('int_rating');
                $subject_id = Input::get('id');
                $user_id = Auth::user()->id;

                $this->difficulty_rating->user_id = $user_id;
                $this->difficulty_rating->subject_id = $subject_id;
                $this->difficulty_rating->rating = $diff_rating;

                $this->interest_rating->user_id  = $user_id;
                $this->interest_rating->subject_id = $subject_id;
                $this->interest_rating->rating = $int_rating;

                $this->difficulty_rating->save();
                $this->interest_rating->save();

                $total_diff_rating = DifficultyRating::avg('rating');   
                $total_int_rating  = InterestRating::avg('rating');

                Subject::where('id', $subject_id)->update(array('difficulty_rating' => $total_diff_rating , 'interest_rating'=> $total_int_rating));
                //here we have to upadte the rating of the subject

                return("Thanks for your Rating"); 
        }

        public function updaterating()
        {        $diff_rate_id  = Input::get('diff_rate_id');
        $int_rate_id = Input::get('int_rate_id');
        $subject_id = Input::get('id');

        DifficultyRating::find($diff_rate_id)->delete();
        InterestRating::find($int_rate_id)->delete();

        $total_diff_rating = DifficultyRating::avg('rating');   
        $total_int_rating  = InterestRating::avg('rating');

        Subject::where('id', $subject_id)->update(array('difficulty_rating' => $total_diff_rating , 'interest_rating'=> $total_int_rating));

        return "Now you can your rate again";
        }
        //used to store the new review data   

        public function store()
        {

                $subjectid = Input::get('id');
                $user = Auth::user();
                $review = Input::get('review');

                //storing the data in the respected table

                $this->review->user_id = $user->id;
                $this->review->subject_id = $subjectid;
                $this->review->content = $review;
                $this->review->save();

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

                $up = Review::where('id',$reviewid)->pluck('upvote');
                $down = Review::where('id',$reviewid)->pluck('downvote');

                Review::where('id', $reviewid)->update(array('popularity_index' => ($up - $down))); 

        }

        //to store the material provided by user

        public function postcontribution()
        {
                $link = Input::get('link');
                $caption = Input::get('caption');
                $subjectid = Input::get('id');

                $this->user_resource->user_id = Auth::user()->id;
                $this->user_resource->subject_id =$subjectid;
                $this->user_resource->caption = $caption;
                $this->user_resource->link = $link;

                $this->user_resource->save();

                return "Thanks for your contribution";
        }
}
