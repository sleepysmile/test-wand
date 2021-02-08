<?php

namespace app\controllers;

use app\models\Comment;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex(string $encodeOwner)
    {
        $comments = Comment::getCommentsList($encodeOwner, ['text']);

        return $this->renderPartial('index', [
            'comments' => $comments,
            'encodeOwner' => $encodeOwner,
            'model' => new Comment()
        ]);
    }

    public function actionCreate($encodeOwner)
    {
        $data = Comment::decodeOwnerData($encodeOwner);
        $comment = new Comment([
            'owner_class' => $data[0],
            'owner_id' => $data[1],
        ]);
        $post = Yii::$app->request->post();

        if ($comment->load($post) && $comment->save()) {
            return $this->asJson([
                'success' => true,
                'item' => $this->renderPartial('item', [
                    'comment' => $comment
                ]),
            ]);
        }

        return $this->asJson([
            'success' => false,
            'item' => '',
        ]);
    }
}