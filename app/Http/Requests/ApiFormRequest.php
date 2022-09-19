<?php

namespace  App\Http\Requests;

use AliSuliman\MicroFeatures\Exceptions\Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        $e = (new ValidationException($validator));

        throw new Exception(collect($e->errors())->first()[0],$e->getTrace(),422);
    }
    public function validationData(): array
    {
        return $this->all() + $this->route()->parameters;
    }
    public abstract function rules();
}
