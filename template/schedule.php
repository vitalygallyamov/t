<?
//Обработка формы
if( !isset( $_POST["point_otp"] ) ){ $point_otp=24; }else{ $point_otp=$_POST["point_otp"]; }
if( !isset( $_POST["point_prib"] ) ){ $point_prib=0; }else{ $point_prib=$_POST["point_prib"]; }
if( !isset( $_POST["route"] ) ){ $route=0; }else{ $route=$_POST["route"]; }
if( !isset( $_POST["type"] ) ){ $type=0; }else{ $type=$_POST["type"]; }
if( !isset( $_POST["ticket"] ) ){ 
    if( isset( $_GET["type"] ) ){ 
        $ticket=0; }
    else{ $ticket=1; } 
}
else{ $ticket=$_POST["ticket"]; }

if( isset( $_POST["find"] ) || isset( $_GET["type"] ) )
{?>
<section>
    <div id="text">
<?
    if( $route==0 ){ $par1="<>"; }else{ $par1="="; }
    if( $point_otp==0 ){ $par2="<>"; }else{ $par2="="; }
    if( $point_prib==0 ){ $par3="<>"; }else{ $par3="="; }
    if( $type==0 ){ $par4="<>"; }else{ $par4="="; }

    for( $j=0;$j<=$ticket;$j++ )
    {
        $point_otp_ = $point_otp;
        $point_prib_ = $point_prib;

        if($j!=0){
            $point_temp = $point_otp; 
            $point_otp_=$point_prib; 
            $point_prib_=$point_temp; 
            $par_temp=$par2; 
            $par2=$par3; 
            $par3=$par_temp; 
        }

        $query="SELECT * from auto_path, auto_route where auto_route.id=auto_path.route and route $par1 '$route' and type $par4 '$type' and point_otp $par2 '$point_otp_' and point_prib $par3 '$point_prib_' order by time_otp, time_prib";

        if(isset($_GET["type"])){
            $query="SELECT * from auto_path, auto_route where auto_route.id=auto_path.route and type = '".$_GET["type"]."' order by time_otp, time_prib";
        }

        $result = $DB->iterate($query);

        if($result->getNumRows() > 0)
        {
            if( $j==0 ){ print"<h2>Результат поиска</h2>"; }else{ print"<h2>Обратный рейс</h2>"; }
            print"<table>
            <tr class=ticket_head>
                <th width=50> &nbsp; №</th>
                <th width=130>Отправление</th>
                <th width=50>Время</th>
                <th width=130>Прибытие</th>
                <th width=50>Время</th>
                <th width=150>Дни следования</th>
                <th width=100>Расстояние, км.</th>
                <th>Цена, руб.</th>
            </tr>";
        }
        foreach ($result as $item) {
            $nomer_find = $item->nomer;
            $point_otp_find = auto_point($item->point_otp);
            $time_otp_find = $item->time_otp;
            $point_prib_find = auto_point( $item->point_prib);
            $time_prib_find = $item->time_prib;
            $days_find = $item->days;
            $distance_find = $item->distance;
            $cost_find = $item->cost;
            print"<tr>
                <td> &nbsp; $nomer_find</td>
                <td>$point_otp_find</td>
                <td>$time_otp_find</td>
                <td>$point_prib_find</td>
                <td>$time_prib_find</td>
                <td>$days_find</td>
                <td>$distance_find</td>
                <td>$cost_find</td>
            </tr>";
            // if($i < $items->getNumRows() - 1){ 
            //     print"<tr height=1><td colspan=8 style='background: #ffffff;'></td></tr><tr height=4><td colspan=8></td></tr>"; 
            // }
        }
        if( $result->getNumRows() != 0 ){ print"</table>"; }
    }
    print"<br>";
?>
    </div>
</section>
<?}else{?>
<section id="schedule">
    <h1>Пассажирам</h1>
    <h2>Расписание движения</h2>
    <a class="link" href="#s">Схемы городских автобусных маршрутов</a>
    <a class="link" href="#s">Льготный проезд</a>
    <a class="link" href="#s">Заказ автобусов</a>
    <div class="both"></div>
    <form id="schedule-form" action="index.php?r=<?=$current_page_id?>" method=post>
        <div class="form-title">
            <span>Поиск необходимого рейса</span>
            <a href="#s">Город</a>
            <a href="#s">Пригород</a>
            <a href="#s">Дачные</a>
            <br />
            Время в расписании указано местное
        </div>
        <table>
            <tr>
                <td class="label"><label>Пункт отправления</label></td>
                <td>
                    <select name="point_otp" class="select-field">
                        <option value="0">Не учитывать пункт назначения</option>
                        <?foreach ($pageData['auto_point'] as $value) {
                            $selected = '';
                            if($point_otp == $value->id)
                                $selected = 'selected="selected"';
                            echo "<option $selected value='{$value->id}'>{$value->name}</option>";
                        }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Номер маршрута</label></td>
                <td>
                    <select name="route" class="select-field">
                        <option value="0">Не учитывать номер маршрута</option>
                        <?foreach ($pageData['auto_route'] as $value) {
                            $selected = '';
                            if($route == $value->id)
                                $selected = 'selected="selected"';
                            echo "<option value='{$value->id}'>{$value->nomer}</option>";
                        }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Пункт назначения</label></td>
                <td>
                    <select name="point_prib" class="select-field">
                        <option value="0">Не учитывать пункт назначения</option>
                        <?foreach ($pageData['auto_point'] as $value) {
                            $selected = '';
                            if($point_prib == $value->id)
                                $selected = 'selected="selected"';
                            echo "<option value='{$value->id}'>{$value->name}</option>";
                        }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Туда-обратно</label></td>
                <td><input name="ticket" type="checkbox" <?=($ticket ? 'checked="checked"' : '')?> value="1"/></td>
            </tr>
        </table>
        <div class="submit">
            <div>
                <a class="grey" onclick='' href="#reset">Сброс</a>
                <input class="green" type="submit" name="find" value="Искать &rarr;">
            </div>
        </div>
    </form>
</section>
<?}?>
