@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.survey.actions.create'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <survey-form
                :action="'{{ url('admin/surveys') }}'"
                v-cloak
                inline-template>

                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ trans('admin.survey.actions.create') }}
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-8">
                                @include('admin.survey.components.form-elements')
                            </div>
                            <div class="col-lg-4">
                                @include('vendor.media-uploader', [
                                    'mediaCollection' => app(App\Models\Survey::class)->getMediaCollection('survey'),
                                    'label' => 'Images'
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </survey-form>

        </div>

    </div>


@endsection
