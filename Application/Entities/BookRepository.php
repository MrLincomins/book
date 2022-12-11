<?php

declare(strict_types=1);

namespace Application\Entities;

interface BookRepository
{
    public function all(): array;

    public function getById(int $id): ?Book;

    public function create(string $name, string $author, string $year, string $ISBN, string $count, string $genre): array;

    public function findOne(array $attributes): ?Book;

    public function findMany(array $attributes): array;

    public function delete(int $id): array;

    public function tooYear($too, $from): array;

    public function top100(): array;

    public function edit(string $id, string $name, string $author, string $year, string $ISBN, string $count, string $genre): array;

    public function findGenre(string $id): array;

    public function allGenres(): array;

    public function addGenre(string $genre): array;

    public function deleteGenre(string $id): array;

    public function editGenre(string $id, string $genre): array;

    public function search(string $name): array;
}