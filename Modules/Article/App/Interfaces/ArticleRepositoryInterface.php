<?php

namespace Modules\Article\App\Interfaces;

interface ArticleRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function destroy($id);
    public function store(array $data);
    public function update($id, array $data);
}
