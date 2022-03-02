
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

    <li class="nav-item" style="margin-right: {{40*$margin}}px;" >
            <div class=" row ui buttons mb-2" >

                <div>
                <span class="ui menu-title col-5" data-i18n="nav.dash.main" style="font-size:20px; ">{{$i+1 .'-'.$child_category->name}} </span>
                    <div class=" d-inline dropdown  ">

                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-edit"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a href="{{route('addCategory',$child_category->id)}}" class="dropdown-item">add sub category</a>
                                <a href="{{route('delete',$child_category->id)}}" class="dropdown-item">delete</a>
                                <a href="{{route('edit',$child_category->id)}}" class="dropdown-item">edit</a>
                            </div>

                    </div>
                </div>



</div>
        @if ($child_category->categories != '[]')
            @foreach ($child_category->categories as $i=> $childCategory)
                @include('subCategory', ['child_category' => $childCategory,'i'=>$i,'margin'=>$margin+1])
            @endforeach

        @endif

    </li>
</ul>
