<?php
// CustomMysqliMock.php
class CustomMysqliMock extends mysqli
{
    public function query($query)
    {
        return true; // or false, depending on your test case
    }
}

?>