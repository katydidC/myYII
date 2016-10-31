<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Category;
use yii\db\Query;
use yii\data\Pagination;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $id = intval(Yii::$app->request->get("id"));
        if ($id < 0) {
            $this->goHome();
        }
        
        $category = new Category();
        //栏目详细信息
        $catInfo = $category->findById($id);
        if (!$catInfo) {
            $this->goHome();
        }
        
        //栏目下商品的总数
        $count = (new Query())->from(Yii::$app->db->tablePrefix . "goods")->where([
            'cat_id' => $id,
            'is_delete' => 0
        ])->count();
        $query = (new Query())
//         ->select("g.*, c.cat_name")
            ->from(Yii::$app->db->tablePrefix . "goods g")
            ->leftJoin(Yii::$app->db->tablePrefix . "category c", "g.cat_id = c.cat_id")
            ->where([
            'g.cat_id' => $id,
            'is_delete' => 0
        ]);
        $pages = new Pagination(['totalCount' =>$count, 'pageSize' => '4']);
        $list = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render("index", [
            'catInfo' =>$catInfo,
            'list' =>$list,
            'pages' => $pages
        ]);
        
        
//         $model = new Category();
        //第一种
//         $row = (new Query())->from(Yii::$app->db->tablePrefix . "category")->all();
        //第二种
        $query = (new Query())->from(Yii::$app->db->tablePrefix . "category");
        $command = $query->createCommand();
        $row = $command->queryAll();
        var_dump($row);
        var_dump($command->sql);
        return $this->render('index');
    }
}
