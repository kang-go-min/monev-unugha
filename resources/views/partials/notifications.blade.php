@if (Session::has('success'))
    <div class="alert alert-dismissible fade show g-bg-teal g-color-white rounded-0" role="alert">
        <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-check g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">
          <strong>Sukses</strong> {{ Session::get('success') }}
        </span>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
        <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-ban g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">
          <strong>Oh snap!</strong> {{ Session::get('error') }}
        </span>
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-dismissible fade show g-bg-yellow rounded-0" role="alert">
        <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-info g-font-size-25"></i>
        </span>
            <span class="media-body align-self-center">
          <strong>Warning!</strong> {{ Session::get('warning') }}
        </span>
        </div>
    </div>
@endif

@if($errors->any())
<div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
    <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-ban g-font-size-25"></i>
        </span>
        <span class="media-body align-self-center">
            <strong>Opps Something went wrong</strong>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </span>
    </div>
</div>
@endif
