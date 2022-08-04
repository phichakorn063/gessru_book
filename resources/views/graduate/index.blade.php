@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายชื่อบัณฑิต</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">รายชื่อบัณฑิต</li>
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
                    <h3 class="card-title">รายการรายชื่อบัณฑิต</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-outline-success btn-sm " data-toggle="modal" data-target="#modal-ImPortExcel">ImPortExcel</button>
                        <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-add">เพิ่มรายชื่อบัณฑิต</button>
                    </div>

                    <div class="modal fade" id="modal-ImPortExcel">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">ImPortExcel</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/graduate/import/excel" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">ไฟล์</label> <code>เฉพาะไฟล์ Excel เท่านั้น</code>
                                                    <input type="file" class="form-control" name="excel_file" multiple required>
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
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่มรายชื่อบัณฑิต</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/graduate" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3">ลำดับ บัณฑิต</label>
                                                    <input required type="text" class="form-control" id="numberGraduate" name="numberGraduate" placeholder="studentCode">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3">รหัสนักศึกษา</label>
                                                    <input required type="text" class="form-control" id="studentCode" name="studentCode" placeholder="studentCode">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3">ชื่อบัณฑิต</label>
                                                    <input required type="text" class="form-control" id="name" name="name" placeholder="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3">ปริญญาบัณฑิต</label>
                                                    <input required type="text" class="form-control" id="description" name="description" placeholder="description">
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
                        {{$graduates->links()}}
                        <table id="example1" class="table table-hover text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>no</th>
                                    <th>name</th>
                                    <th>studentCode</th>
                                    <th>description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($graduates as $graduate)
                                <tr class="text-center">
                                    <td>{{$graduate->numberGraduate}}</td>
                                    <td>{{$graduate->name}}</td>
                                    <td>{{$graduate->studentCode}}</td>
                                    <td>{{$graduate->description}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$graduates->links()}}
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

<!-- excel -->
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
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
            dom: 'Bfrtip',
            pageLength: 100,
            buttons: [{
                extend: 'excel',
                filename: 'รายชื่อบัณฑิต',
            }, ]
        });
    });
</script>

@endsection