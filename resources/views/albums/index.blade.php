@extends('layouts.main')

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
                        <h4>{{ $album->name }}</h4>
                        <a href="{{ url('albums/' . $album->id . '/edit') }}" class="btn btn-link text-success">
                            <span class="text-success">Edit</span>
                        </a>
                        <a href="#confirm" class="btn btn-link delete-album text-danger" data-toggle="modal">
                            <span class="text-danger">Delete</span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <h5 class="text-center">No albums.</h5>
        @endforelse
    </div>
    <!-- pagination -->
</div>
<!-- Modal confirm -->
<div id="confirm" class="modal fade">
    <div class="modal-dialog modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this album?</p>
                <p>This will remove all images in there.</p>
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
            var $form = $(this).closest('form');
            console.log($form);
            $('#confirm-delete').on('click', function() {
                $form.trigger('submit');
            });
        });
    });
</script>
@endsection