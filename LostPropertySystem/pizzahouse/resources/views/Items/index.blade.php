    @extends('layouts.layout')

    @section('content')

    <div class="flex-center position-ref full-height">

        <div class="content">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @if(Auth::check())
                    {
                    {{ Auth::user()->name }} <span class="caret"></span>
                    }
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <div class="title m-b-md">
                Lost items List
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >

                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Item Name </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        @foreach($lostitems as $lostitem)
                            <tr>
                                <td>{{$lostitem->id}}</td>
                                <td>{{$lostitem->category}}</td>

                                <td><a href="{{ route('item.show', [$lostitem->id]) }}" class="btn btn-success btn-mini">View Item</a></td>
                            </tr>
                        </tfoot>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>



    @endsection
