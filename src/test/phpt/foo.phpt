--TEST--
Reproduce octal output from stream wrapper invocation
--FILE--
<?php
class Stream {
    public function stream_open($path, $mode, $options, $opened_path) {

        return true;
    }

    public function stream_write($data) {
        return (int) (strlen($data) - 2);
    }
}

stream_wrapper_register('test', Stream::class);
file_put_contents('test://file.txt', 'foobarbaz');
?>
--EXPECT--
Warning: file_put_contents(): Only 7 of 9 bytes written, possibly out of free disk space in - on line 14