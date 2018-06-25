@extends('layouts.main')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <h3 class="text-center">My albums</h3>
    <hr />
    <div class="row">
        @forelse($albums as $album)
            <div class="col-sm-6 col-md-3">
                <div class="">
                    <a href="{{ url('albums/' . $album->id) }}"  title="Browse">
                        <img src="{{ asset('img/no-image.png') }}" alt="Title photo">
                    </a>
                    <div class="">
                        <h4 class="text-center">{{ $album->name }}</h4>
                        <a href="{{ url('albums/' . $album->id . '/edit') }}" class="btn btn-link text-success">
                            <span class="text-success">Edit</span>
                        </a>

                        {!! Form::open(['url' => 'albums/' . $album->id, 'method' => 'delete', 'class' => '']) !!}

                        <!-- Submit -->
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger form-control',]) !!}
                        </div>

                        {!! Form::close() !!}

                        <a href="#confirm" class="btn btn-link delete-album text-danger" data-toggle="modal" data-id="{{ $album->id }}">
                            <span class="text-danger">Delete</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- TODO pagination -->
        @empty
            <h5 class="text-center">No albums.</h5>
        @endforelse
    </div>
</div>
<!-- Modal confirm -->
<div id="confirm" class="modal fade">
    <div class="modal-dialog modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this album?</p>
                <p>This will remove all images in it.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="confirm-delete" type="button" class="btn btn-danger"
                        data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(ev){
        $('.delete-album').on('click', function(e) {
            let albumId = $(this).attr('data-id');
            $('#confirm-delete').on('click', function() {
                let url = '{!! url('albums')  !!}' + '/' + albumId,
                    token = '{!! csrf_token() !!}';

                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });
console.log(token);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    type: 'DELETE',
                    url: url,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (xhr,status,error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            });
        });
    });
</script>
@endsection