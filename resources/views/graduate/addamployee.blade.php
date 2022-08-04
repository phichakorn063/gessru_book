@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายชื่อบัณฑิต ตาม สาขาปริญญา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">รายชื่อบัณฑิต ตาม สาขาปริญญา</li>
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
                    <h3 class="card-title">รายการรายชื่อบัณฑิต ตาม สาขาปริญญา</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-block btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-add">เพิ่มรายชื่อบัณฑิต</button>
                    </div>

                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่ม</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/addamployee" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                              
                                                <div class="form-group">
                                                    <label for="inputEmail3">ชื่อพนักงาน</label>
                                                    <input required type="text" class="form-control" id="name" name="name" placeholder="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3">หน้าที่</label>
                                                    <input required type="text" class="form-control" id="duty" name="duty" placeholder="duty">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">ประเภทรูป</label>
                                                    <select class="form-control" name="type_photo">
                                                        <option value="1">URL</option>
                                                        <option value="2">Server</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3">รูปเมื่อเลือก URL</label>
                                                    <input required type="text" class="form-control" id="photo_url" name="photo_url" placeholder="URL">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3">รูปเมื่อเลือก Server</label> <code>W249px X H314</code>
                                                    <input type="file" class="form-control" name="photo_server" multiple>
                                                </div>
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
                                    <th>ลำดับ</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>หน้าที่</th>
                                    <th>รูป</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
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