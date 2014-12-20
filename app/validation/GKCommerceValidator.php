<?php namespace App\Validation;
 
class GKCommerceValidator extends \Illuminate\Validation\Validator
{
    public function toJson($resource)
    {
        $this->messages();
        $errors = array();
        $code_map = array();

        foreach ($this->failedRules as $field => $codes)
            $code_map[$field] = array_keys($codes)[0];

        foreach ($this->messages()->toArray() as $field => $messages) {
            $error = array(
                "resource" => $resource,
                "field"    => $field,
                "code"     => $code_map[$field],
                "messages" => array() 
            );

            foreach ($messages as $message)
                $error['messages'][] = $message;

            $errors[] = $error;
        }

        return json_encode(array(
            "message" => "Validation Failed",
            "errors"  => $errors));
    }
}