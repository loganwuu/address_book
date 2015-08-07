<?php
    class Contact
    {
        private $name;
        private $phone_num;
        private $address;

        function __construct($name, $phone_num, $address)
        {
            $this->$name = $name;
            $this->$phone_num = $phone_num;
            $this->$address = $address;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function setPhoneNum($new_phone_num)
        {
            $this->phone_num = (integer) $new_phone_num;
        }

        function setAddress()
        {
            $this->address = (string) $new_address;
        }

        function getName()
        {
            return $this->name;
        }

        function getPhoneNum()
        {
            return $this->phone_num;
        }

        function getAddress()
        {
            return $this->address;
        }

        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_contacts'] = array();
        }
    }
?>
