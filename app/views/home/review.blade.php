@extends('layouts.default')

@section('title')

   Merocourse | review
@stop

 @section('header') 

  @include('resources/subject_header')
 
  @stop


@section('content')

  {{HTML::style('css/responsive-tabs.css')}}
  {{HTML::style('css/style.css')}}

<div class ="container">

         <div class ="thumbnail">
          <h3>Welcome {{$user->name}} ! </h3>
        </div>    
 
          <div id="horizontalTab">
        <ul>
            <li><a href="#tab-1">Responsive Tab-1</a></li>
            <li><a href="#tab-2">Responsive Tab-2</a></li>
            <li><a href="#tab-3">Responsive Tab-3</a></li>
        </ul>

        <div id="tab-1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu scelerisque eros. Fusce ante orci, hendrerit sit amet metus sit amet, venenatis sodales felis. Morbi vel mi in leo dignissim convallis in a neque. Suspendisse sollicitudin nibh non dapibus condimentum. Etiam sit amet arcu ultricies, porttitor justo eget, scelerisque urna. Praesent non ligula nec ligula euismod condimentum eget sed augue. Ut feugiat, turpis id sollicitudin vestibulum, tellus massa adipiscing nisl, quis cursus nisl arcu vel ipsum.</p>
        </div>
        <div id="tab-2">
            <p>Quisque sodales sodales lacus pharetra bibendum. Etiam commodo non velit ac rhoncus. Mauris euismod purus sem, ac adipiscing quam laoreet et. Praesent vulputate ornare sem vel scelerisque. Ut dictum augue non erat lacinia, sed lobortis elit gravida. Proin ante massa, ornare accumsan ultricies et, posuere sit amet magna. Praesent dignissim, enim sed malesuada luctus, arcu sapien sodales sapien, ut placerat eros nunc vel est. Donec tristique mi turpis, et sodales nibh gravida eu. Etiam odio risus, porttitor non lacus id, rhoncus tempus tortor. Curabitur tincidunt molestie turpis, ut luctus nibh sollicitudin vel. Sed vel luctus nisi, at mattis metus. Aenean ultricies dolor est, a congue ante dapibus varius. Nulla at auctor nunc. Curabitur accumsan feugiat felis ut pretium. Praesent semper semper nisi, eu cursus augue.</p>
        </div>
        <div id="tab-3">
            <p>Mauris facilisis elit ut sem eleifend accumsan molestie sit amet dolor. Pellentesque dapibus arcu eu lorem laoreet, vitae cursus metus mattis. Nullam eget porta enim, eu rutrum magna. Duis quis tincidunt sem, sit amet faucibus magna. Integer commodo, turpis consequat fermentum egestas, leo odio posuere dui, elementum placerat eros erat id augue. Nullam at eros eget urna vestibulum malesuada vitae eu mauris. Aliquam interdum rhoncus velit, quis scelerisque leo viverra non. Suspendisse id feugiat dui. Nulla in aliquet leo. Proin vel magna sed est gravida rhoncus. Mauris lobortis condimentum nibh, vitae bibendum tortor vehicula ac. Curabitur posuere arcu eros.</p>
        </div>
    </div>



         <p class ="info"></div>
</div>
  
  {{HTML::script('js/jquery-2.1.0.min.js')}}
  {{HTML::script('js/jquery.responsiveTabs.js')}}


    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').responsiveTabs({
          });

        

        });
    </script>
            
            @stop
