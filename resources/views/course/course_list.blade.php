@section('course_view_student', 'active')
@section('course_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card" style="overflow-y: scroll; height: 100%; margin-left: -15px;">
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3">
                <div class="mx-auto pull-right">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navbar navbar-light bg-light ">
                                <input class="form-control sm-4 quicksearch" name="quicksearch" type="text"
                                    placeholder="Search" aria-label="Search" id="quicksearch" autofocus>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Newly Added --}}
            <div class="item d-flex flex-wrap">
                <div class="card-body item-material d-flex flex-wrap" id="item">
                    @foreach ($data as $key => $course)
                        @if ($course != '')
                            @foreach ($course->orders as $key => $orders)
                                @if ($orders->user_id == auth()->user()->id && $orders->esewa_status != 'failed' && $orders->esewa_status != 'unverified')
                                    <div class="card-deck" style="width: 20rem;">
                                        <div class="card mt-2 mb-2 mr-4 px-2">
                                            <iframe height="225px" width="100%" src="/storage/{{ $course->image }}"
                                                style="border:none;">
                                            </iframe>
                                            <div class="card-body">
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $course->course_name }}</small>
                                                </p>
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $course->created_at }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center">No data found</th>
                            </tr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#quicksearch").on("input", function() {
            var value = $(this).val();
            $("#item div").filter(function() {
                $(this).toggle($(this).text().indexOf(value) > -1)
            });
        });
    });
</script>
</body>

</html>
