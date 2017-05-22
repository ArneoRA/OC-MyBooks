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
         * Associed Book
         * @var OCMyBooks\Domain\Book
         */
        private $aBook;

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

        public function getABook()
        {   return $this->aBook;  }

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

        public function setABook(Book $aBook) {
        $this->aBook = $aBook;
        return $this;
    }


    }
