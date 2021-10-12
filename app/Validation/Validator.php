<?php

namespace App\Validation;


// COMPONENT QUI AFFICHE UNE ERREUR SI IL Y A UN SOUCIS DANS LE FORMULAIRE
class Validator {

    private $data;
    private $errors;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                        default:
                            # code...
                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    // SI IL N'Y A RIEN DANS LE FORM IL RETOURNE CETTE ERREUR
    private function required(string $name, string $value)
    {
        $value = trim($value);

        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis.";
        }
    }

    // SI IL Y A - DE 3 CARACTÈRES SUR LE NOM IL RETOURNE CETTE ERREUR
    private function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères";
        }
    }

    private function getErrors(): ?array
    {
        return $this->errors;
    }
}
