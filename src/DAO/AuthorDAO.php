<?php

namespace OCMyBooks\DAO;

use OCMyBooks\Domain\Author;

class AuthorDAO extends DAO
{
    /**
     * * @var \OCMyBooks\DAO\BookDAO
    */
    private $bookDAO;

    public function setBookDAO(BookDAO $bookDAO) {
        $this->bookDAO = $bookDAO;
    }

    /**
     * @param integer $bookId The book id.*
     * @return array the author info corresponding to the book ID */
    public function findBook($bookId) {
        // The associated book is retrieved only once
        $book = $this->bookDAO->find($bookId);

        $sql = "select * from author,book where author.auth_id = book.auth_id AND book.book_id=?";
        $result = $this->getDb()->fetchAssoc($sql, array($bookId));

        if ($result)
            return $this->buildDomainObject($result);
        else
            throw new \Exception("No Author matching id " . $bookId);

    }

    /*** Creates an Comment object based on a DB row.
     ** @param array $result The DB result containing Author data.
     ** @return \OCMyBooks\Domain\Author */
    protected function buildDomainObject(array $result) {
        $author = new Author();
        $author->setId($result['auth_id']);
        $author->setAFirstName($result['auth_first_name']);
        $author->setALastName($result['auth_last_name']);

        if (array_key_exists('bookId', $result)) {
            // Find and set the associated book
            $bookId = $result['id'];
            $book = $this->bookDAO->find($bookId);
            $author->setABook($book);
        }

        return $author;
    }
}
