@extends ('../layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if( \Session::has('success'))
                        <div class="alert alert-success">
                         {{ \Session::get('success')}}
                        </div>
                @endif
                   
                <div class="card-header bg-dark text-white">Student Info
                @can('isAdmin')
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="float-right">
                    @csrf
                    <div>
                        <input type="file" name="file" required accept=".xls,.xlsx,.xlsm,.xltx,.xltm,.xlt">
                        <button class="btn btn-success">Import Student Data</button>
                        <a class="btn btn-primary" href="{{ route('export') }}">Export Student Data</a>
                    </div>                   
                </form>
                @endcan
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-bordered" id="table">
                        <thead class="bg-secondary">
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Roll No</th>
                                <th class="text-center">Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key=>$student)
                            <tr>
                               <td>{{ $key+1 }}</td>
                               <td>{{ $student->name }}</td>
                               <td>{{ $student->roll_no }}</td>
                               <td>{{ $student->class }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endsection
