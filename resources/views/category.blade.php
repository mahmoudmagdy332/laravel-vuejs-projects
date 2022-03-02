<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
{{--    <script src="{{ asset('js/vue-resource.min.js') }}"></script>--}}
    <link href="{{ asset('fontawesome-free-6.0.0-web/css/all.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
   <div>
              <div class=" mb-5">


       <a href="{{route('addCategory')}}" class="btn btn-info">add main category</a>
              </div>
       <ui>
           @foreach($mainCategories as $i=>$mainCategory)


                   @include('subCategory', ['child_category' => $mainCategory,'i'=>$i,'margin'=>0])

           @endforeach
       </ui>
   </div>

</div>
</body>
</html>

