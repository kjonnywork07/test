@extends('admin.layouts.master')

@section('title', 'Permissions')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 @if (Session::has('success'))
 <div class="alert alert-success">{{ Session::get('success') }}</div>
 @endif
 @if (Session::has('danger'))
 <div class="alert alert-danger">{{ Session::get('danger') }}</div>
 @endif
      
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permissions</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                @can('create_permissions')
                
                <a href="{{route('permissions-create')}}" class="btn btn-primary">Create Permission</a>
                @endcan
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $i=0; @endphp
                  @forelse($permissions as $permission)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$permission->name}}</td>
                      <td>
                        
                        <div class="btn-group">
                        @can('update_permissions')
                        <a href="{{route('permissions-edit',$permission->id)}}"  class="btn btn-success btn-flat" >
                          <i class="fas fa-edit"></i>
                        </a>
                        @endcan
                        @can('delete_permissions')
                        <a href="{{route('permissions-delete',$permission->id)}}"  class="btn btn-danger btn-flat" onclick="return confirm('Are you realy want to delete this')">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                        @endcan
                        <!-- <button type="button" class="btn btn-default btn-flat">
                          <i class="fas fa-align-right"></i>
                        </button> -->
                      </div>
                      </td>
                    </tr>
                    @empty
                        <p>No users</p>
                    @endforelse
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
@section('addonStyle')
<!-- datatable -->
  <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" >
  <link rel="stylesheet" href="{{asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" >
  <!-- datatable -->
@stop
@section('addonScripts')
<!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{asset('/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop