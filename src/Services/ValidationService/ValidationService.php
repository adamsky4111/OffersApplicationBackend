<?php

namespace App\Services\ValidationService;

use App\Entity\BaseEntity;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationService implements ValidationServiceInterface
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(BaseEntity $entity)
    {
        $errors = $this->validator->validate($entity);

        if (0 !== count($errors)) {
            $normalizeErrors = [];
            foreach ($errors as $error) {
                $normalizeErrors['errors'][] = $error->getMessage();
            }

            return $normalizeErrors;
        }

        return null;
    }
}
