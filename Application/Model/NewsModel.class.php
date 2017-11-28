<?php

class NewsModel extends Model
{
    /* 业务逻辑层实现 */
   public function getList($where,$page=1,$limit=10){

   		$item = $this ->where($where)->selectAll();
   		return $item;
   }
}