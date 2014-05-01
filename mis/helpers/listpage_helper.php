<?php
function lib_list_page($prefix_url,$current_page, $total_page,$page_half_range=10, $has_head_tail=false, $query_string='')
{

	$str = "<div class=\"page-cont\"><div class=\"page-inner\">";

	//added by wangjun 
	if ($has_head_tail)
	{
		$str = $str."<a href=\"".$prefix_url."search_page_id=1" .  $query_string . "\">首页</a>";
	}
	//added end

	if($current_page > 1)
	{
		$str = $str."<a class=\"page-navigator-prev\" href=\"".$prefix_url."search_page_id=".($current_page-1). $query_string . "\">上一页</a>";
	}else{
		$str = $str."<span class=\"page-navigator-prev-disable\">上一页</span>";
	}
	
	
	
	for($i=$current_page-$page_half_range; $i < $current_page; $i++)
	{
		if($i > 0)
		{
			$str = $str."<a class=\"page-navigator-number\" href=\"".$prefix_url. "search_page_id=". $i . $query_string ."\">".$i."</a>";
		}
	}
	$str = $str."<span class=\"page-navigator-current\">".$current_page."</span>";
	for($i=($current_page+1); $i < ($current_page+$page_half_range); $i++)
  {
		if($i <= $total_page)
		{
                	$str = $str."<a class=\"page-navigator-number\" href=\"".$prefix_url."search_page_id=".$i. $query_string . "\">".$i."</a>";
		}
  }

	if($current_page < $total_page)
  {
     $str = $str."<a class=\"page-navigator-next\" href=\"".$prefix_url."search_page_id=".($current_page+1). $query_string . "\">下一页</a>";
  }else{
     $str = $str."<span class=\"page-navigator-next-disable\">下一页</span>";
  }
  

	//added by wangjun
	if ($has_head_tail)
	{
		$str = $str."<a href=\"".$prefix_url."search_page_id=".$total_page.  $query_string. "\">末页</a>&nbsp;";
	}
	//added end

	$str = $str."</div></div>";
	return $str;
}

function lib_list_page_light($prefix_url, $current_page, $page_half_range=10, $has_head_tail=false, $query_string='',$intLastPage,$intNextPage)
{

	$str = "<div class=\"p\">";

	//added by wangjun 
	if ($has_head_tail)
	{
		$str = $str."<a href=\"".$prefix_url."search_page_id=1" .  $query_string . "\"><font size=\"3\">[首页] </font></a>&nbsp;";
	}
	//added end

	if($current_page > 1)
	{
		$str = $str."<a href=\"".$prefix_url."search_page_id=".($intLastPage). $query_string . "\"><font size=\"3\">上一页</font></a>&nbsp;";
	}

	for($i=$current_page-$page_half_range; $i < $current_page; $i++)
	{
		if($i > 0)
		{
			$str = $str."<a href=\"".$prefix_url. "search_page_id=". $i . $query_string ."\">[".$i."]</a>&nbsp;";
		}
	}
		$str = $str.$current_page."&nbsp;";
		$str = $str."<a href=\"".$prefix_url."search_page_id=".($intNextPage). $query_string . "\"><font size=\"3\">下一页</font></a>&nbsp;";

//	for($i=($current_page+1); $i < ($current_page+$page_half_range); $i++)
//  {
//		if($i <= $total_page)
//		{
//                	$str = $str."<a href=\"".$prefix_url."page=".$i. $query_string . "\">[".$i."]</a>&nbsp;";
//		}
//  }
//
//	if($current_page < $total_page)
//  {
//     $str = $str."<a href=\"".$prefix_url."page=".($current_page+1). $query_string . "\"><font size=\"3\">下一页</font></a>";
//  }

	//added by wangjun
//	if ($has_head_tail)
//	{
//		$str = $str."<a href=\"".$prefix_url."page=".$total_page.  $query_string. "\"><font size=\"3\"> [末页]</font></a>&nbsp;";
//	}
	//added end

	$str = $str."</div>";
	return $str;
}
/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
