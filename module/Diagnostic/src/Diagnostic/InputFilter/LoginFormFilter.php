<?php
namespace Diagnostic\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\Validator\Hostname;

/**
 * Login Form Filter
 *
 * @package Diagnostic\Form
 * @author Jerome De Almeida <jerome.dealmeida@vesperiagroup.com>
 */
class LoginFormFilter extends InputFilter
{
    public function __construct($adapter)
    {
        $this->add(array(
            'name' => 'email',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'allow' => Hostname::ALLOW_DNS,
                        'useMxCheck' => true,
                    ),
                ),
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Diagnostic\Validator\PasswordStrength',
                ),
            ),
        ));
    }
}

