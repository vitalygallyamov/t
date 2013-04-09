<?php
function getMenu($r_id, $razdel_id){
	global $DB;

	$query = "select id, name, razdel from pages where ( razdel='0' and id<>'23' ) order by id";
	/* вывод левого меню */
	$items = $DB->iterate($query);
	$list = '';

	if($items->getNumRows() > 0){
		$list .= '<ul class="root">';
		foreach($items as $item)
		{
			$id = $item->id;
			$name = $item->name;

			$active = '';
			if($r_id == $id || $razdel == $id) $active = 'root-active';
			$list .= "<li class='root-item $active'><a href='index.php?r=$id'>$name</a>";

			//sub-menu
			$query = "select id, name from pages where razdel='$id' order by id";
			$items_sub = $DB->iterate($query);
			$number_sub = mysql_numrows($result_sub);

			$sub_menu = '';

			if($items_sub->getNumRows() > 0){
				$list .= '<ul class="sub-menu">';
				foreach($items_sub as $item_s)
				{
					$id = $item_s->id;
					$name = $item_s->name;

					$active = '';
					if($r_id == $id || $razdel == $id) $active = 'sub-item-active';
					
					$list .= "<li class='sub-item $active'><a href='index.php?r=$id'>&ndash;&nbsp;&nbsp;$name</a>";
				}
				$list .= '</ul>';
			}
			//sub-menu

			$list .= '</li>';			
		}
		$list .='</ul>';
	}
	return $list;
}

function auto_point($id)
{
	global $DB;
	$query = "select id, name from auto_point where id='$id' ";
	$result = $DB->iterate($query);
	foreach($result as $item)
	{
		return $item->name;
	}
}

function getDataForPagination($table, $id, $page = 0, $limit = 10){
	global $DB;

	$count = $DB->fetchOne("SELECT COUNT(*) FROM $table");
	if (!isset($_GET["n"]) && $count > $limit){
        $count = ceil($count / $limit);
        $pagination = '<ul>';
        for($i = 1; $i <= $count; $i++){
        	$active = '';
        	if(!isset($_GET['page']) && $i == 1)
        		$pagination .= "<li class='active'>$i</li>";
        	elseif($page == $i)
        		$pagination .= "<li class='active'>$i</li>";
        	else
        		$pagination .= "<li><a href='index.php?r=$id&page=$i'>$i</a></li>";
        }
        $pagination .= '</ul>';
    }
	return $pagination;
}

function getView($name){
	global $pageData, $DB, $current_page_id;

	switch ($name) {
		case 'schedule':{
			$query = "SELECT id, name FROM auto_point ORDER BY name";
			$pageData['auto_point'] = $DB->iterate($query);

			$query="SELECT id, nomer FROM auto_route ORDER BY nomer";
			$pageData['auto_route'] = $DB->iterate($query);

			require_once('template/'.$name.".php");
			break;
		}
		case 'news':{
			$limit = 10;
			$pageData['pagination'] = getDataForPagination($name, $current_page_id, $pageData['page'], $limit);

			$offset = ($pageData['page'] == 0 ? 0 : ($pageData['page']-1) * 10);
			$query = "SELECT * FROM news ORDER BY dat DESC LIMIT $offset, $limit";

			if( isset( $_GET["n"] ) ) //Детально
            {
                $query = "SELECT id, dat, name, content FROM news WHERE id='".$_GET["n"]."'";
            }

			$pageData['content'] = $DB->iterate($query);
			require_once('template/'.$name.".php");
			break;
		}
		case 'book':{
			$limit = 10;
			$pageData['pagination'] = getDataForPagination($name, $current_page_id, $pageData['page'], $limit);

			$offset = ($pageData['page'] == 0 ? 0 : ($pageData['page']-1) * 10);
			$query = "SELECT name, picture, content FROM book ORDER BY id DESC LIMIT $offset, $limit";

			$pageData['content'] = $DB->iterate($query);
			require_once('template/'.$name.".php");
			break;
		}
		default:
			require_once('template/'.$name.".php");
			break;
	}
}
?>