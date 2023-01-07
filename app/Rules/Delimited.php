<?php

namespace App\Rules;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Delimited implements Rule
{
    /** @var string|array|\Illuminate\Contracts\Validation\Rule */
    protected Rule|string|array $rule;

    /** @var int|null */
    protected int|null $minimum = null;

    /** @var int|null */
    protected int|null $maximum = null;

    /** @var bool */
    protected bool $allowDuplicates = false;

    /** @var string */
    protected string $message = '';

    /** @var string */
    protected string $separatedBy = ',';

    /** @var bool */
    protected bool $trimItems = true;

    /** @var string */
    protected string $validationMessageWord = 'item';

    /** @var array */
    protected array $customErrorMessages;

    /**
     * @param \Illuminate\Contracts\Validation\Rule|string|array $rule
     * @param array $customErrorMessages
     */
    public function __construct(Rule|string|array $rule, array $customErrorMessages = [])
    {
        $this->rule = $rule;
        $this->customErrorMessages = $customErrorMessages;
    }

    /**
     * @param int $minimum
     * @return $this
     */
    public function min(int $minimum): static
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * @param int $maximum
     * @return $this
     */
    public function max(int $maximum): static
    {
        $this->maximum = $maximum;

        return $this;
    }

    /**
     * @param bool $allowed
     * @return $this
     */
    public function allowDuplicates(bool $allowed = true): static
    {
        $this->allowDuplicates = $allowed;

        return $this;
    }

    /**
     * @param string $separator
     * @return $this
     */
    public function separatedBy(string $separator): static
    {
        $this->separatedBy = $separator;

        return $this;
    }

    /**
     * @return $this
     */
    public function doNotTrimItems(): static
    {
        $this->trimItems = false;

        return $this;
    }

    /**
     * @param string $word
     * @return $this
     */
    public function validationMessageWord(string $word): static
    {
        $this->validationMessageWord = $word;

        return $this;
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if ($this->trimItems) {
            $value = trim($value);
        }

        $items = extract_collection($value, $this->separatedBy, $this->trimItems);

        if (!is_null($this->minimum)) {
            if ($items->count() < $this->minimum) {
                $this->message = $this->getErrorMessage($attribute, 'min', [
                    'min' => $this->minimum,
                    'actual' => $items->count(),
                    'item' => Str::plural($this->validationMessageWord, $items->count()),
                ]);

                return false;
            }
        }

        if (!is_null($this->maximum)) {
            if ($items->count() > $this->maximum) {
                $this->message = $this->getErrorMessage($attribute, 'max', [
                    'max' => $this->maximum,
                    'actual' => $items->count(),
                    'item' => Str::plural($this->validationMessageWord, $items->count()),
                ]);

                return false;
            }
        }

        foreach ($items as $item) {
            [$isValid, $validationMessage] = $this->validate($attribute, $item);

            if (!$isValid) {
                $this->message = $validationMessage;

                return false;
            }
        }

        if (!$this->allowDuplicates) {
            if ($items->unique()->count() !== $items->count()) {
                $this->message = $this->getErrorMessage($attribute, 'unique');

                return false;
            }
        }

        return true;
    }

    /**
     * @return mixed|string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @param string $attribute
     * @param string $item
     * @return array
     */
    protected function validate(string $attribute, string $item): array
    {
        $attribute = Arr::last(explode('.', $attribute));

        $validator = Validator::make(
            [$attribute => $item],
            [$attribute => $this->rule],
            $this->customErrorMessages
        );

        return [
            $validator->passes(),
            $validator->getMessageBag()->first($attribute),
        ];
    }

    protected function getErrorMessage($attribute, $rule, $data = []): array|string|Translator|Application|null
    {
        if (array_key_exists($attribute . '.' . $rule, $this->customErrorMessages)) {
            return __($this->customErrorMessages[$attribute . '.' . $rule], $data);
        }

        return __('validationRules::messages.delimited.' . $rule, $data);
    }
}
