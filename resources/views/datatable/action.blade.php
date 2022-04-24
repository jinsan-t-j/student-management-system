<div class="row justify-content-around align-items-center">
    @if (isset($data['edit_url']))
        <div class="col-lg-3 mb-2">
            <a href="{{ $data['edit_url'] }}">
                <button type="button" class="btn btn-outline-info js-click-ripple-enabled"
                    data-toggle="click-ripple">Edit</button>
            </a>
        </div>
    @endif
    
    @if (isset($data['delete_url']))
        <div class="col-lg-3 mb-2">
            <form action="{{ $data['delete_url'] }}" method="POST" class="confirm-delete">
                {{ method_field('DELETE') }}
                @csrf
                <input type="hidden" value="{{ $data['id'] }}" name="id">
                <button type="submit" class="d-block btn btn-circle btn-danger btn-delete">
                    <i class="fa fa-times"></i>
                </button>
            </form>
        </div>
    @endif
</div>
