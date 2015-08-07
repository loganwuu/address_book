<?php
    // contact class //
    class Contact
    {
        private $name;
        private $phone;
        private $address;

        // constructor //
        function __construct($contact_name, $contact_phone, $contact_address)
        {
            $this->$name = $contact_name;
            $this->$phone = $contact_phone;
            $this->$address = $contact_address;
        }

        // setters //
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setPhoneNum($new_phone)
        {
            $this->phone_num = $new_phone;
        }

        function setAddress($new_address)
        {
            $this->address = $new_address;
        }

        // getters //
        function getName()
        {
            return $this->name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function getAddress()
        {
            return $this->address;
        }

        // save each new instancs of contact into the array of contacts //
        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }

        // return all instances of contacts saved in the user cookies //
        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        // delete all instances of contacts saved in the user cookies //
        static function deleteAll()
        {
            $_SESSION['list_of_contacts'] = array();
        }
    }
?>
