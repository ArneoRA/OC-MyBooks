<?php

    namespace OCMyBooks\Domain;

    class Author
    {
        /**
         * auth_id
         * @var [int]
         */
        private $id;
        /**
         * auth_first_name
         * @var [string]
         */
        private $aFirstName;
        /**
         * auth_last_name
         * @var [type]
         */
        private $aLastName;

        /**
         * GETTERS
         *
         */
        public function getId()
        {   return $this->id;  }

        public function getAFirstName()
        {   return $this->aFirstName;   }

        public function getALastName()
        {   return $this->aLastName;  }

        /**
         * SETTERS
         */
        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function setAFirstName($aFirstName) {
            $this->aFirstName = $aFirstName;
            return $this;
        }

        public function setALastName($aLastName) {
            $this->aLastName = $aLastName;
            return $this;
        }
    }
