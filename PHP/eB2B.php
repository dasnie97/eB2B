<?php

class PhoneKeyboardConverter{

    #region Private fields

    private $Output;
    private $Keyboard = array(
        2 => "A",
        22 => "B",
        222 => "C",
        3 => "D",
        33 => "E",
        333 => "F",
        4 => "G",
        44 => "H",
        444 => "I",
        5 => "J",
        55 => "K",
        555 => "L",
        6 => "M",
        66 => "N",
        666 => "O",
        7 => "P",
        77 => "Q",
        777 => "R",
        7777 => "S",
        8 => "T",
        88 => "U",
        888 => "V",
        9 => "W",
        99 => "X",
        999 => "Y",
        9999 => "Z",
        0 => " ",
    );

    #endregion

    #region Private methods

    private function convertToNumeric($Input)
    {
        try {
            $UpperCaseInput = strtoupper($Input);
            $Keyboard = array_flip($this->Keyboard);
            $Converted = "";
    
            foreach (str_split($UpperCaseInput) as $char) {
                $Converted .= $Keyboard[$char].",";
            }
            return rtrim($Converted, ",");
        } catch (\Throwable $th) {
            echo ($th->getMessage());
            exit();
        }
    }

    private function convertToString($Input)
    {
        try {
            $Splitted = explode(",", $Input);
            $Output = "";
    
            for ($i=0; $i < count($Splitted); $i++) {
                if (array_key_exists($Splitted[$i], $this->Keyboard)) {
                    $Output .= $this->Keyboard[$Splitted[$i]];
                }
                else{
                    throw new Exception("Input string invalid! ");
                }
            }
            return strtolower($Output);
        } catch (\Throwable $th) {
            echo ($th->getMessage());
            return null;
        }

    }

    // Decide in which direction conversion should happen
    private function convertInput($Input)
    {
        try
        {
            if ($Input == preg_replace("/[^a-zA-Z\s]+/", "", $Input)){
                return $this->convertToNumeric($Input);
            }
            if ($Input == preg_replace("/[^0-9,]+/", "", $Input))
            {
                return $this->convertToString($Input);
            }
            throw new Exception("Input string not valid! Please check your message.");
        }
        catch (Exception $e)
        {   
            echo ($e->getMessage());
            exit();
        }
    }

    #endregion

    #region Public methods

    public function showOutput()
    {
        if (!is_null($this->Output))
        {
            echo "Converted message: ".$this->Output."\n";
        }
    }

    #endregion
    
    function __construct($Input)
    {
        $this->Output = $this->convertInput($Input);
    }
}

function welcomeUser()
{
echo <<<END
====================

Welcome to OldPhone message converter! Please enter message to convert it to its old phone keybord representation or vice versa!.

========== NOTE ==========
If you want to convert regular string message to its numeric representation - use only english lower and upper case letters and spacebar.
If you want to convert old phone numeric message to its string representation - use only digits separated by commas.

========== EXAMPLE ==========
Ela nie ma kota => 33,555,2,0,66,444,33,0,6,2,0,55,666,8,2
5,2,22,555,33,222,9999,66,444,55 => jablecznik

====================

END;
}

function getUserInput()
{
    $Input = readline("Enter input: ");
    $isString = $Input == preg_replace("/[^a-zA-Z\s]+/", "", $Input);
    $isNumeric = $Input == preg_replace("/[^0-9,]+/", "", $Input);
    if (($isString || $isNumeric) && $Input != "")
    {
        return $Input;
    }
    else
    {
        echo "Input string invalid! ";
        return null;
    }
}

//==================================================================================
welcomeUser();
while (true)
{
    $UserInput = getUserInput();
    if (!is_null($UserInput))
    {
        $Message = new PhoneKeyboardConverter($UserInput);
        $Message->showOutput();
    }

    $UserResponse = readline("Wanna try again? (Y/N): ");
    if (!str_contains(strtolower($UserResponse), "y"))
    {
        echo "Thank you for using OldPhone converter!\n";
        exit();
    }
}