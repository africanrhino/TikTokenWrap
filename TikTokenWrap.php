class TikTokenWrap {

    public static function encode($input_string, $encoding) { 
        $escaped_input_string = escapeshellarg($input_string);
       // print_r($input_string);die();
        $command = "python -c 'import tiktoken; enc = tiktoken.get_encoding(\"$encoding\"); import sys; print(\" \".join(str(token) for token in enc.encode(sys.argv[1])))'  $escaped_input_string ";
        $output = self::executeCommand($command);

        $parts = explode(" ", trim($output));
        $tokens = array_slice($parts, 0, -1);
        $cost = count($parts);
        return array("encoded" => $tokens, "cost" => $cost);


        $o = explode(' ',trim($output));
        return $o;
    }

    public static function decode($encoded_string, $encoding) { 
        $command = "python -c 'import tiktoken; enc = tiktoken.get_encoding(\"$encoding\"); print(enc.decode([".implode(',',$encoded_string)."]))'";
        $output = self::executeCommand($command);
        return trim($output);
    }

    private static function executeCommand($command) {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("pipe", "w")
        );

        $process = proc_open($command, $descriptorspec, $pipes);
        if (!is_resource($process)) {
            throw new Exception("Could not execute command");
        }

        fwrite($pipes[0], '');
        fclose($pipes[0]);

        $stdout = stream_get_contents($pipes[1]);
        fclose($pipes[1]);

        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[2]);

        $return_value = proc_close($process);

        if ($return_value !== 0) {
            throw new Exception("Command failed with exit code $return_value: $stderr");
        }

        return $stdout;
    }

    function countTokens($tokens){

        return count($tokens);
    }

}
