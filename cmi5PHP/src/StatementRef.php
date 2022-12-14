<?php
/*
    Copyright 2014 Rustici Software

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
*/

namespace cmi5;

use InvalidArgumentException;

class StatementRef implements VersionableInterface, StatementTargetInterface, ComparableInterface
{
    use ArraySetterTrait, FromJSONTrait, AsVersionTrait, SignatureComparisonTrait;

    private $objectType = 'StatementRef';

    protected $id;

    public function __construct() {
        if (func_num_args() == 1) {
            $arg = func_get_arg(0);

            $this->_fromArray($arg);
        }
    }

    public function getObjectType() { return $this->objectType; }

    public function setId($value) {
        if (isset($value) && ! preg_match(Util::UUID_REGEX, $value)) {
            throw new InvalidArgumentException('arg1 must be a UUID');
        }
        $this->id = $value;
        return $this;
    }
    public function getId() { return $this->id; }
}
