@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.question.actions.index'))

@section('body')
    <div class="container-xl">

        <div class="card">

            <questions-form
                :action="'{{ route('admin/surveys/store-answer', $survey->id) }}'"
                :data="{{ $form->toJson() }}"
                v-cloak
                inline-template>

                <form class="form form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ $survey->title }}
                    </div>

                    <div class="card-body">

                        <div class="form-group"
                             :class="{'has-danger': errors.has('responden'), 'has-success': this.fields.responden && this.fields.responden.valid }">
                            <label for="responden"
                                   class="col-form-label text-dark">{{ trans('admin.responden.columns.nama_responden') }}</label>
                            <div>
                                <multiselect v-model="form.responden"
                                             v-validate="'required'"
                                             id="ajax"
                                             label="fullname"
                                             track-by="id"
                                             placeholder="Cari Responden"
                                             open-direction="bottom"
                                             :options="responden"
                                             :multiple="false"
                                             :searchable="true"
                                             :loading="isLoading"
                                             :internal-search="false"
                                             :options-limit="30"
                                             :limit="10"
                                             :limit-text="limitText"
                                             :max-height="300"
                                             :show-no-results="true"
                                             :hide-selected="true"
                                             @search-change="asyncFind"
                                             @select="toggleSelected">
                                    <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
                                </multiselect>

                                <div v-if="errors.has('responden')" class="form-control-feedback form-text" v-cloak>
                                    @{{errors.first('responden') }}
                                </div>
                            </div>
                        </div>

                        <pre class="language-json"><code>@{{internalValue}}</code></pre>

                        <hr>

                        @forelse ($survey->questions as $key=>$question)
                            @if($question->question_type === 'text')
                                <div class="form-group"
                                     :class="{'has-danger': errors.has('q{{ $question->id }}_answer'), 'has-success': fields.q{{ $question->id }}_answer && fields.q{{ $question->id }}_answer.valid }">
                                    <label for="q{{ $question->id }}_answer" class="text-dark">
                                        {{ $key+1 }} . {{ $question->title }}</label>
                                    <input type="text" v-model="form.q{{ $question->id }}_answer"
                                           v-validate="'{{ $question->flag }}'"
                                           @input="validate($event)" class="form-control"
                                           :class="{'form-control-danger': errors.has('q{{ $question->id }}_answer'), 'form-control-success': fields.q{{ $question->id }}_answer && fields.q{{ $question->id }}_answer.valid}"
                                           id="q{{ $question->id }}_answer" name="q{{ $question->id }}_answer"
                                           placeholder="{{ $question->placeholder ?? 'Enter Your Answer' }}">
                                    {{--<div v-if="errors.has('q{{ $question->id }}_answer')"
                                         class="form-control-feedback form-text" v-cloak>@{{  errors.first("q{{ $question->id }}_answer") }}
                                    </div> --}}
                                    <div
                                        class="form-control-feedback form-text text-muted">{{ $question->help_text }}</div>
                                </div>
                            @elseif($question->question_type === 'textarea')
                                <div class="form-group"
                                     :class="{'has-danger': errors.has('q{{ $question->id }}_answer'), 'has-success': fields.q{{ $question->id }}_answer && fields.q{{ $question->id }}_answer.valid }">
                                    <label for="q{{ $question->id }}_answer" class="text-dark">{{ $key+1 }}
                                        . {{ $question->title }}</label>
                                    <div>
                                        <wysiwyg v-model="form.q{{ $question->id }}_answer"
                                                 v-validate="'{{ $question->flag }}'"
                                                 id="q{{ $question->id }}_answer" name="q{{ $question->id }}_answer"
                                                 :config="mediaWysiwygConfig"></wysiwyg>
                                    </div>
                                    {{--<div v-if="errors.has('q{{ $question->id }}_answer')"
                                         class="form-control-feedback form-text" v-cloak>@{{errors.first('q{{ $question->id }}_answer') }}
                                    </div>--}}
                                    <div
                                        class="form-control-feedback form-text text-muted">{{ $question->help_text }}</div>
                                </div>
                            @elseif($question->question_type === 'radio')
                                <div class="form-group"
                                     :class="{'has-danger': errors.has('q{{ $question->id }}_answer'), 'has-success': fields.q{{ $question->id }}_answer && fields.q{{ $question->id }}_answer.valid }">
                                    <label for="q{{ $question->id }}_answer" class="text-dark">{{ $key+1 }}
                                        . {{ $question->title }}</label>
                                    @foreach($question->option_name as $key=>$value)
                                        <div class="ml-md-auto form-check">
                                            <input class="form-check-input" name="q{{ $question->id }}_answer"
                                                   type="radio"
                                                   v-validate="'{{ $question->flag }}'"
                                                   v-model="form.q{{ $question->id }}_answer"
                                                   value="{{$value}}"
                                                   id="q{{ $question->id }}_{{ $key }}"
                                                   name="q{{ $question->id }}_answer"/>
                                            <label class="form-check-label"
                                                   for="q{{ $question->id }}_{{ $key }}">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                    {{--<div v-if="errors.has('q{{ $question->id }}_answer')"
                                         class="form-control-feedback form-text" v-cloak>@{{errors.first('q{{ $question->id }}_answer') }}
                                    </div>--}}
                                    <div
                                        class="form-control-feedback form-text text-muted">{{ $question->help_text }}</div>
                                </div>
                            @elseif($question->question_type === 'checkbox')
                                <div class="form-group"
                                     :class="{'has-danger': errors.has('q{{ $question->id }}_answer'), 'has-success': fields.q{{ $question->id }}_answer && fields.q{{ $question->id }}_answer.valid }">
                                    <label for="q{{ $question->id }}_answer" class="text-dark">{{ $key+1 }}
                                        . {{ $question->title }}</label>
                                    @foreach($question->option_name as $key=>$value)
                                        <div class="ml-md-auto">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   v-validate="'{{ $question->flag }}'"
                                                   v-model="form.q{{ $question->id }}_answer"
                                                   value="{{$value}}"
                                                   id="q{{ $question->id }}_{{ $key }}"
                                                   name="q{{ $question->id }}_answer">
                                            <label class="form-check-label"
                                                   for="q{{ $question->id }}_{{ $key }}">{{ $value }}</label>
                                            {{--<input type="hidden" name="q{{ $question->id }}_answer" :value="form.q{{ $question->id }}_answer">--}}
                                        </div>
                                    @endforeach
                                    {{--<div v-if="errors.has('q{{ $question->id }}_answer')"
                                         class="form-control-feedback form-text" v-cloak>@{{errors.first('q{{ $question->id }}_answer') }}
                                    </div>--}}
                                    <div
                                        class="form-control-feedback form-text text-muted">{{ $question->help_text }}</div>
                                </div>
                            @endif
                        @empty
                            <span class='flow-text center-align'>Nothing to show</span>
                        @endforelse
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            Submit Survey
                        </button>
                    </div>
                </form>

            </questions-form>
        </div>
    </div>

@endsection
