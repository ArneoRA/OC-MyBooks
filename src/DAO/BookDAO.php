<?php

namespace OCMyBooks\DAO;

use Doctrine\DBAL\Connection;
use OCMyBooks\Domain\Book;

class BookDAO extends DAO
{
    /**
     * Retourne une liste de tous les articles triés par date décroissante. *
     * @return array A list of all books.
     * C'est équivalent à getArticles créé précédemment */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Converti le resultat de la requete en tableau d'objets du domaine
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }
    /**
     * Renvoie un article correspondant à l'identifiant fourni en *
     * @param integer $id
     * @return \OCMyBooks\Domain\Book
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);
        /*Sort si une exception est trouvé : aucun article correspondant n'est trouvé*/
    }

    /**
     * @param array $row
     * @return \OCMyBooks\Domain\Book
     */
    protected function buildDomainObject(array $row) {
        $book = new Book();
        $book->setId($row['id']);
        $book->setTitle($row['title']);
        $book->setIsbn($row['isbn']);
        $book->setSummary($row['summary']);
        $book->setAuthid($row['authid']);
        return $book;
    }

}
