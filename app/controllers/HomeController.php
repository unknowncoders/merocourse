<?php

class HomeController extends BaseController {
         
        public function showhome()
          {
               return View::make('home/home');
          }
}
