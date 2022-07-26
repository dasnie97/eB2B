<?php

class PhoneKeyboardConverter{

    private $Output;

    function __construct($Input)
    {
        $Sanitized = $this->filterInput($Input);
        $Converted = $this->convertInput($Sanitized);

        $this->Output = $Converted;
    }

    private function convertToNumeric($Input)
    {

    }

    private function convertToString($Input)
    {

    }

    // Leave only alphanumeric chars comma and whitespaces
    private function filterInput($Input)
    {
        $Sanitized = preg_replace("/[^a-zA-Z0-9\s,]+/", "", $Input);
        return $Sanitized;
    }

    private function convertInput($Input)
    {
        $Letters = preg_replace("/[^a-zA-Z\s]+/", "", $Input);
        $Digits = preg_replace("/[^0-9,]+/", "", $Input);
    }

    public function showOutput()
    {
        echo "Converted message: ".$this->Output."\n";
    }
}

function welcomeUser()
{
    echo "====================\n\n";
    echo "Welcome to OldPhone message converter! Please enter message to convert it to its old phone keybord representation or vice versa!.\n\n";
    echo "========== NOTE ==========\n";
    echo "If you want to convert regular string message to its numeric representation - use only english lower and upper case letters and spacebar.\n";
    echo "If you want to convert old phone numeric message to its string representation - use only digits separated by commas.\n\n";
    echo "========== EXAMPLE ==========\n";
    echo "Ela nie ma kota => 33,555,2,0,66,444,33,0,6,2,0,55,666,8,2\n";
    echo "5,2,22,555,33,222,9999,66,444,55 => jablecznik\n\n";
}

function getUserInput()
{
    while (true)
    {
        $Input = readline("Enter input: ");
        $Sanitized = preg_replace("/[^a-zA-Z0-9\s,]+/", "", $Input);
        if ($Sanitized == $Input)
        {
            break;
        }
        else
        {
            $UserResponse = readline("Not allowed character present in input string! Try again? (Y/N): ");
            if (!str_contains(strtolower($UserResponse), "y"))
            {
                echo "Thank you for using OldPhone converter!\n";
                exit();
            }
        }
    }
    return $Input;
}


welcomeUser();
// Main loop
while (true)
{
    $UserInput = getUserInput();
    $Message = new PhoneKeyboardConverter($UserInput);
    $Message->showOutput();

    $UserResponse = readline("Wanna try again? (Y/N): ");
    if (!str_contains(strtolower($UserResponse), "y"))
    {
        echo "Thank you for using OldPhone converter!\n";
        exit();
    }
}
