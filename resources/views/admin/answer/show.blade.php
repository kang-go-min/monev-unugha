@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.answer.actions.edit', ['name' => $answer->user->name]))

@section('body')

    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-pencil"></i> {{ trans('admin.answer.actions.detail', ['name' => $answer->user->name]) }}
                <button type="submit" class="btn btn-primary  btn-spinner btn-sm pull-right m-b-0" :disabled="submiting" v-on:click="savePDF">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                    {{ trans('admin.answer.actions.download') }}
                </button>
            </div>

            <div class="card-body">
            </div>

        </div>
    </div>

@endsection
