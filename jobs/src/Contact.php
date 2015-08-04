<?php
    class Contact
    {
        private $name;
        private $email;
        private $phone;

        function __construct($new_name, $new_email, $new_phone)
        {
            $this->name = $new_name;
            $this->email = $new_email;
            $this->phone = $new_phone;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setEmail($new_email)
        {
            $this->email = $new_email;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }

        function getPhone()
        {
            return $this->phone;
        }
    }
?>
