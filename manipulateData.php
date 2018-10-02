<?php 


class manipulateData
{
    private $value_arr = array();
    private $replace_keys = array();
    private $ix = 1;
    private $tempdata = array();

    function changeJson($tmpDefs)
    {
        foreach ($tmpDefs as $key => &$value) {
            // Look for values starting with 'function('
            if (strpos($value, 'function(') === 0) {
                // Store function string.
                $this->value_arr[] = $value;
                // Replace function string in $foo with a ‘unique’ special key.
                $value = '%' . $key . $this->ix . '%';
                // Later on, we’ll look for the value, and replace it.
                $this->replace_keys[] = '"' . $value . '"';
                $this->ix++;
            }
        }
        $this->tempdata[] = $tmpDefs;
        return $tmpDefs;
    }

    public function getManipulate()
    {
        $json = json_encode($this->tempdata);
// Replace the special keys with the original string.
        $jsonResult = str_replace($this->replace_keys, $this->value_arr, $json);
        return $jsonResult;
    }
}