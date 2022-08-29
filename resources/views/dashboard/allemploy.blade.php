@extends('layouts.master')


@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('contain')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-md-offset-6 text-right">
                    <strong>Select Language: </strong>
                </div>
                <div class="col-md-4">
                    <select class="form-control changeLang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>bangla</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 mt-3">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <table id="example" class="" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>{{ __('userinfo.name') }}</th>
                                    <th>{{ __('userinfo.mobile') }}</th>
                                    <th>{{ __('userinfo.email') }}</th>
                                    <th>{{ __('userinfo.address') }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employs as $key => $employ)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $employ->name }}</td>
                                        <td>{{ $employ->mobile }}</td>
                                        <td>{{ $employ->email }}</td>
                                        <td>{{ $employ->address }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('employ.sendEmail', $employ->id) }}">
                                                    <button type="button" class="btn btn-default">
                                                        <i class="fa fa-solid fa-envelope"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('employ.edit', $employ->id) }}">
                                                    <button type="button" class="btn btn-default">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('employ.delete', $employ->id) }}">
                                                    <button type="button" class="btn btn-default">
                                                        <i class="fa fa-solid fa-trash"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
