<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">@{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">@{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('json_{{ $locale }}'), 'has-success': fields.json_{{ $locale }} && fields.json_{{ $locale }}.valid }">
                <label for="json_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.answer.columns.json') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.json.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('json_{{ $locale }}'), 'form-control-success': fields.json_{{ $locale }} && fields.json_{{ $locale }}.valid }" id="json_{{ $locale }}" name="json_{{ $locale }}" placeholder="{{ trans('admin.answer.columns.json') }}">
                    <div v-if="errors.has('json_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('json_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('survey_id'), 'has-success': fields.survey_id && fields.survey_id.valid }">
    <label for="survey_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.answer.columns.survey_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.survey_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('survey_id'), 'form-control-success': fields.survey_id && fields.survey_id.valid}" id="survey_id" name="survey_id" placeholder="{{ trans('admin.answer.columns.survey_id') }}">
        <div v-if="errors.has('survey_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('survey_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.answer.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.answer.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ip_address'), 'has-success': fields.ip_address && fields.ip_address.valid }">
    <label for="ip_address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.answer.columns.ip_address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ip_address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ip_address'), 'form-control-success': fields.ip_address && fields.ip_address.valid}" id="ip_address" name="ip_address" placeholder="{{ trans('admin.answer.columns.ip_address') }}">
        <div v-if="errors.has('ip_address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ip_address') }}</div>
    </div>
</div>


