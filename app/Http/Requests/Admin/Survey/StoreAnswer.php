<?php

namespace App\Http\Requests\Admin\Survey;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class StoreAnswer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.answer.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'responden' => ['required'],
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized($surveyId): array
    {
        $sanitized = $this->validated();

        $request = collect($this->except('wysiwygMedia'))
            ->map(function ($item, $key) use ($surveyId) {
                $explode = explode('_', $key);

                $data['responden_id'] = $this->getRespondenId();
                $data['question_id'] = Str::substr($explode[0], 1);
                $data['survey_id'] = $surveyId;
                $data['answer'] = is_array($item) ? json_encode($item) : $item;
                return $data;
            });

        return $request->merge($sanitized)->toArray();
    }


    public function getRespondenId()
    {
        if ($this->has('responden')) {
            return $this->get('responden')['id'];
        }
        return null;
    }
}
