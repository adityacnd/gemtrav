<?php
use PHPUnit\Framework\TestCase;

class ActionChatTest extends TestCase
{
    public function test_send_message()
{
    // Setup
    $sender_id = 1;
    $receiver_id = 2;
    $message_text = "Halo, apa kabar?";

    // Execute
    $this->do_send_message($sender_id, $receiver_id, $message_text);

    // Assert
    $this->assertEquals('Message sent', $this->get_result());
}

public function test_send_message_to_superadmin()
{
    // Setup
    $sender_id = 1;
    $receiver_id = 'superadmin';
    $message_text = "Saya ingin berbicara dengan admin.";

    // Execute
    $this->do_send_message($sender_id, $receiver_id, $message_text);

    // Assert
    $this->assertEquals('Message sent to superadmin', $this->get_result());
}


    private function do_send_message($sender_id, $receiver_id, $message_text)
    {
        // Simulate session
        $_SESSION['user_id'] = $sender_id;

        // Execute the code to be tested
        $result = call_user_func(function () use ($sender_id, $receiver_id, $message_text) {
            // Simulate database interaction
            return 'Message sent';
        });

        return $result;
    }

    private function get_result()
    {
        return $_SESSION['result'];
    }
}
