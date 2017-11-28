<?php

class NewsModel extends Model
{
    /* 业务逻辑层实现 */
   public function getList($news_id=1){
   		$where['news_id'] = 1;
   		$item = $this ->where($where)->selectAll();
   		return $item;
   }
}