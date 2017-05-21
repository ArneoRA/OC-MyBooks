<?php

    namespace OCMyBooks\Domain;

    class Book
    {
        /**
         * Book id
         * @var [int]
         */
        private $id;
        /**
         * Book title
         * @var [string]
         */
        private $title;
        /**
         * Book isbn
         * @var [string]
         */
        private $isbn;
        /**
         * Book summary
         * @var [string]
         */
        private $summary;

        /**
         * Book Author ID
         * @var [int]
         */
        private $authid;

        /**
         * GETTERS
         */
        public function getId()
        {  return $this->id;   }

        public function getTitle()
        {   return $this->title;  }

        public function getIsbn()
        {   return $this->isbn;  }

        public function getSummary()
        {   return $this->summary;  }

        public function getAuthid()
        {   return $this->authid;  }

        /**
         * SETTERS
         */

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function setTitle($title) {
            $this->title = $title;
            return $this;
        }

        public function setIsbn($isbn){
            $this->isbn = $isbn;
            return $this;
        }

        public function setSummary($summary) {
            $this->summary = $summary;
            return $this;
        }

        public function setAuthid($authid) {
            $this->authid = $authid;
            return $this;
        }
    }
