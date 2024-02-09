<?php

namespace  Modules\Article\App\Repositories;

use Modules\Article\App\Interfaces\ArticleRepositoryInterface;
use Modules\Article\App\Models\Article;
use Modules\Article\App\Helpers\UploadeHelper;

class ArticleRepository implements ArticleRepositoryInterface
{
    use UploadeHelper;

    public function getAll()
    {
        return Article::all();
    }
    public function store(array $data)
    {
        return Article::create($data);

    }
    public function getById($id)
    {
        return Article::find($id);
    }
    public function update($id, $data)
    {
        $article = $this->getById($id);
        if (isset($data['photo'])) {
            $imageName = $this->upload($data['photo'], 'article');
            $article->photo = $imageName;
            $article->save();
        }
        $article->update($data);
        return $article;
    }

    public function destroy($id)
    {
        $article = $this->getById($id);
        $article->delete();
    }
}
