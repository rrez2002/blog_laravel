@switch(Session::all())
    @case(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">
                {{Session::get('info')}}
            </p>
        </div>
    </div>
    @break
    @case(Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-success ">
                {{Session::get('success')}}
            </p>
        </div>
    </div>
    @break
    @case(Session::has('danger'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-danger">
                {{Session::get('danger')}}
            </p>
        </div>
    </div>
    @break
    @case(Session::has('warning'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-warning">
                {{Session::get('warning')}}
            </p>
        </div>
    </div>
    @break

@endswitch
