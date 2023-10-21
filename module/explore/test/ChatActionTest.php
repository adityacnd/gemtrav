<?php
// ChatActionTest.php
use PHPUnit\Framework\TestCase;

// require_once 'ChatAction.php';
// ChatActionTest.php
require_once 'CustomMysqliMock.php';
class ChatActionTest extends TestCase
{
    private $koneksiMock;
    protected function setUp(): void
    {
        $this->koneksiMock = new CustomMysqliMock();
    }
    public function testProcessMessageSuccess()
    {
        // Mock koneksi database
        $koneksiMock = $this->getMockBuilder('mysqli')
            ->disableOriginalConstructor()
            ->getMock();

        $koneksiMock->expects($this->once())
            ->method('query')
            ->willReturn(true);

            $chatAction = new ChatAction($this->koneksiMock);
        $result = $chatAction->processMessage(1, 2, 'Hello, World!');

        $this->assertTrue($result);
    }

    public function testProcessMessageFailure()
    {
        // Mock koneksi database
        $koneksiMock = $this->getMockBuilder('mysqli')
            ->disableOriginalConstructor()
            ->getMock();

        $koneksiMock->expects($this->once())
            ->method('query')
            ->willReturn(false);

            $chatAction = new ChatAction($this->koneksiMock);
        $result = $chatAction->processMessage(1, 2, 'Hello, World!');

        $this->assertFalse($result);
    }
}

?>