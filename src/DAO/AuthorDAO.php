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
    /*****************Fin de déclaration de dépendance ***************/


    /**
     * @param integer $bookId The book id.*
     * @return array a list of all books for an author. */
    public function findAllByBook($bookId) {
        // The associated article is retrieved only once
        $book = $this->bookDAO->find($bookId);

        // art_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select book_id, book_title, book_isbn, book_summary from book where auth_id=? order by book_id";
        $result = $this->getDb()->fetchAll($sql, array($bookId));

        // Convert query result to an array of domain objects
        $authors = array();
        foreach ($result as $row) {
            $authId = $row['id'];
            $author = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $author->setBook($book);
            $authors[$authId] = $author;
        }
        return $authors;
    }

    /*** Creates an Comment object based on a DB row.
     ** @param array $row The DB row containing Comment data.
     ** @return \OCMyBooks\Domain\Author */
    protected function buildDomainObject(array $row) {
        $author = new Author();
        $author->setId($row['id']);
        $author->setAFirstName($row['aFirstName']);
        $author->setALastName($row['aLastName']);

        if (array_key_exists('id', $row)) {
            // Find and set the associated book
            $bookId = $row['id'];
            $book = $this->bookDAO->find($bookId);
            $author->setBook($book);
        }

        return $author;
    }
}
