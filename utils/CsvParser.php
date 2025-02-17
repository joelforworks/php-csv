<?php
namespace App\utils;

class CsvParser {
    private $csv;

    /**
     *
     * Read the csv a
     *
     * @param    string  $csv path to the csc
     *
     */
    function __construct($csv){
        $this->csv = file_get_contents($csv);
    }
    /**
     *
     * Return the name for each field on database
     *
     * @param    string  $csv path to the csc
     *
     */
    function getFields(){
        [$line] = explode("\n", $this->csv);
        $words =  explode(";", $line);
        
        $fields=[];
        foreach($words as $field){
            [,$parse] = explode("/", $field);
            echo "$parse\n";
            $fields[] = $parse;
        }
        return implode(", ", $fields);
    }
    /**
     *
     * Return the name for each field on database with data type  VARCHAR      * for all.
     *
     * @param    string  $csv path to the csc
     *
     */
    function getFieldsWithType(){
        //[$line] = explode("\n", $this->csv);
        //$words =  explode(";", $line);
        $lines = explode("\n", $this->csv);
        $headerLine = trim($lines[0]);
        $words = explode(";", $headerLine);
        $fields=[];
        foreach($words as $field){
            [,$parse] = explode("/", $field);
            echo "`$parse` VARCHAR(255)\n";
            $fields[] = "`$parse` VARCHAR(255)";
        }
        return implode(", ", $fields);
    }
    /**
     *
     * Return all registers
     *
     * @param    string  $csv path to the csc
     *
     */
    function getRegisters() {
        $lines = array_slice(explode("\n", $this->csv), 1);

        $registers = [];
    foreach ($lines as $line) {
        if (trim($line) === "") continue; 

        $register = explode(";", $line);
        $registers[] = "(" . implode(", ", array_map(function($value) {
            return $value === "" ? "''" : "'" . addslashes(trim($value)) . "'";
        }, $register)) . ")";
    }

        return implode(", ", $registers);
    }
}
