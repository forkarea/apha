<?php
declare(strict_types = 1);

namespace Apha\StateStore\Storage;

use Apha\StateStore\Document;

interface StateStorage
{
    /**
     * @param string $identity
     * @param Document $document
     * @return void
     */
    public function upsert(string $identity, Document $document);

    /**
     * @param string $identity
     * @return void
     */
    public function delete(string $identity);

    /**
     * @param string $identity
     * @return Document
     * @throws DocumentNotFoundException
     */
    public function find(string $identity): Document;

    /**
     * @param int $offset
     * @param int $limit
     * @return Document[]
     */
    public function findAll(int $offset = 0, int $limit = 500): array;

    /**
     * @return void
     */
    public function clear();

    /**
     * @param array $criteria
     * @param int $offset
     * @param int $limit
     * @return Document[]
     */
    public function findBy(array $criteria, int $offset = 0, int $limit = 500): array;
}