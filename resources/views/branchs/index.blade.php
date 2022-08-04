@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">สาขาปริญญา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">สาขาปริญญา</li>
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
                    <h3 class="card-title">รายการสาขาปริญญา</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-block btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-add">เพิ่มสาขาปริญญา</button>
                    </div>
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่มสาขาปริญญา</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/branch" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail3">ชื่อสาขาปริญญา</label>
                                                    <input required type="text" class="form-control" id="description" name="description" placeholder="ชื่อ สาขาปริญญา">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">พื้นหลัง</label> <code>W8.9cm. X H6cm.</code>
                                                    <input type="file" class="form-control" name="background" multiple required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">สถานะ</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1">ใช้งาน</option>
                                                        <option value="0">ยกเลิก</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table id="example1" class="table table-hover text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>รูปพื้นหลัง</th>
                                    <th>ชื่อสาขาปริญญา</th>
                                    <th>สถานะ</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($branchs as $branch)
                                <tr class="text-center">
                                    <td> @if($branch->background)
                                        <a href="#" data-toggle="modal" data-target="#modal-lg{{$branch->id}}"><img src="/storage/{{$branch->background}}" class="elevation-2" width="50px" alt="Visa"></a>
                                        @endif
                                    </td>
                                    <td>{{$branch->description}}</td>
                                    <td>@if($branch->status == 1) <p class="text-success">ใช้งาน</p> @else <p class="text-danger">ยกเลิก</p> @endif</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{$branch->id}}">แก้ไข</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @foreach($branchs as $branch)
                    <div class="modal fade" id="modal-lg{{$branch->id}}"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$branch->description}}</h4>
                                </div>
                                <div class="modal-body">
                                <img class="img-fluid" src="/storage/{{$branch->background}}" alt="Photo">
                                </div>
                                <div class="modal-footer text-right ">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="modal-edit{{$branch->id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่มสาขาปริญญา</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/branch/update/{{$branch->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                    <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail3">ชื่อสาขาปริญญา</label>
                                                    <input required type="text" value="{{$branch->description}}" class="form-control" id="description" name="description" placeholder="ชื่อ สาขาปริญญา">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">พื้นหลัง</label> <code>W8.9cm. X H6cm.</code>
                                                    <input type="file" class="form-control" name="background" multiple >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">สถานะ</label>
                                                    <select class="form-control" name="status" >
                                                        <option value="1" @if($branch->status == 1) selected @endif>ใช้งาน</option>
                                                        <option value="0" @if($branch->status == 0) selected @endif>ยกเลิก</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endforeach
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