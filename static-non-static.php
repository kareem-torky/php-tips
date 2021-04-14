<?php 

class User 
{ 
    public function __call($name, $arguments)
    {
        if ($name == 'get') {
            call_user_func([$this, 'getNonStatic']);
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name == 'get') {
            call_user_func([__CLASS__, 'getStatic']);
        }
    }

    public function getNonStatic()
    {
        echo "called non-static <br>";
        // your implementation here
    }

    public static function getStatic()
    {
        echo "called static <br>";
        // your implementation here
    }

    public static function where()
    {
        echo "called where <br>";
        // your implementation here
        return new static();
    }
}

$user1 = User::get();
$user2 = User::where()->get();