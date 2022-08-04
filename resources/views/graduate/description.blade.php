@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายชื่อบัณฑิต <a href="#">{{$description}}</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/graduate/branchs">ตาม สาขาปริญญา</a></li>
                    <li class="breadcrumb-item active">{{$description}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">รายการรายชื่อบัณฑิต <a href="#">{{$description}}</a></h3>
                </div>
                <div class="card-body">
                {{$graduates->links()}}
                    <form action="/graduate/branch/{{$description}}/prints" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i> Print</button>
                        <div class="table-responsive p-0">
                            <table id="example1" class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>
                                            <label>
                                                <input type="checkbox" id="select-all">
                                                ทั้งหมด
                                            </label>
                                        </th>
                                        <th>no</th>
                                        <th>name</th>
                                        <th>studentCode</th>
                                        <th>description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($graduates as $graduate)
                                    <tr class="text-center">
                                        <td>
                                            <label>
                                                <input name="ids[]" class="checkbox_id" type="checkbox" value="{{$graduate->id}}">
                                                เลือก
                                            </label>
                                        </td>
                                        <td>{{$graduate->numberGraduate}}</td>
                                        <td>{{$graduate->name}}</td>
                                        <td>{{$graduate->studentCode}}</td>
                                        <td>{{$graduate->description}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    {{$graduates->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('header')
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('footer')
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.checkbox_id').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkbox_id').each(function() {
                this.checked = false;
            });
        }
    });
    $(function() {
        $('#example1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection